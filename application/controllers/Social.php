
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//Include Hybridauth autoloader
require APPPATH . '/third_party/hybridauth/autoload.php';

//Import Hybridauth's namespace
use Hybridauth\Hybridauth;

class Social extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        //Load URL helper
        $this->load->helper('url');

        //Load session library
        $this->load->library('session');
    }

    //Displays social login links
    function index()
    {
        //Instantiate Hybridauth's classes
        $hybrid = new Hybridauth($this->getHybridConfig());

        //Get enabled providers array
        $providers = $hybrid->getProviders();

        //List a link to login
        foreach ($providers as $provider)
        {

            $href = sprintf(base_url('%s/auth/%s/') , strtolower($this->router->fetch_class()) , $provider);
            printf('<p><a href="%s">Login with %s</p>', $href, $provider);
        }
    }

    //Processes social login
    function auth($provider = NULL)
    {
        $service = NULL;

        try
        {
            //Instantiate Hybridauth's classes
            $hybrid = new Hybridauth($this->getHybridConfig());

            //Check if given provider is enabled
            if ((isset($provider)) && in_array($provider, $hybrid->getProviders()))
            {
                $this->session->set_userdata('provider', $provider);
            }

            //Update variable with the valid provider
            $provider = $this->session->userdata('provider');

            if ($provider)
            {
                $service = $hybrid->authenticate($provider);
                if ($service->isConnected())
                {
                    //Get user profile
                    $profile = $service->getUserProfile();

                    //Get user contacts
                    $contacts = $service->getUserContacts();

                    /*
                    Disconnect the service else HA would reuse stored session data
                    rather making a fresh request in case the user has denied permissions
                    in the previous authorization request
                    */
                    $service->disconnect();

                    $this->session->unset_userdata('provider');

                    //Display the profile data

                    $data['name']     = $profile->displayName;
                    $data['email']    = $profile->email;
                    $data['phone']    = $profile->phone;
                    $data['photoURL'] = $profile->photoURL;
                    $data['password'] = $profile->displayName;


            $usercheck = $this->db->where('phone',$data['phone'])
                    ->or_where('email',$data['email'])
                    ->get('users')->num_rows();
            if($usercheck > '0')
            {
                $query = $this->db->where('email',$data['email'])
                ->get('users');
                $user = $query->row();
                $this->session->set_userdata('user_data',$user);
                $this->session->set_flashdata('success','User Logged In Successfully');
                redirect(base_url());
            }
            else
            {
                $url = $data['photoURL'];
                /* Extract the filename */
                $filename = substr($url, strrpos($url, '/') + 1);
                /* Save file wherever you want */
                file_put_contents('uploads/'.$filename, file_get_contents($url));
                unset($data['photoURL']);
                $data['role'] = '3';
                $data['status'] = '1';
                $data['image'] = $filename;
                $data['password']= md5($data['password']);
                $this->db->insert('users',$data);

                $enpassword = $data['password'];
                $query = $this->db->where('email',$data['email'])
                ->where('password', $enpassword)
                ->get('users');
                $user = $query->row();
                $this->session->set_userdata('user_data',$user);

                $this->session->set_flashdata('success','User Logged In  Successfully');
                redirect(base_url());
            }
                    //print_r($profile);
                }
                else
                {
                    $this->session->set_flashdata('showmsg', array('msg' => 'Sorry! We couldn\'t authenticate your identity.'));
                }
            }
        }
        catch(Exception $e)
        {
            if (isset($service) && $service->isConnected()) 
                $service->disconnect();

            $error = 'Sorry! We couldn\'t authenticate you.';
            $this->session->set_flashdata('showmsg', array('msg' => $error));
            $error .= '\nError Code: ' . $e->getCode();
            $error .= '\nError Message: ' . $e->getMessage();

            log_message('error', $error);
        }

        //redirect();
    }

    //Hybridauth configuration
    private function getHybridConfig()
    {
        $config = array(

            'callback' => site_url('social/auth/') ,

            'providers' => array(
                'Google' => array(
                    'enabled' => true,
                    'keys' => array(
                        'id' => '831264828590-77jv6mpolk68nobr3h4bn5372kjou76v.apps.googleusercontent.com',
                        'secret' => 'xj-ZDWMIbYrELoZb9XktIRk9'
                    ) ,
                    'scope' => 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
                ) ,

                'Facebook' => array(
                    'enabled' => true,
                    'keys' => array(
                        'id' => (ENVIRONMENT == 'development') ? 'DEVELOPMENT_APP_ID' : 'PRODUCTION_APP_ID',
                        'secret' => (ENVIRONMENT == 'development') ? 'DEVELOPMENT_APP_SECRET' : 'PRODUCTION_APP_SECRET'
                    ) ,
                    'scope' => 'email, public_profile'
                ) ,

                'Twitter' => array(
                    'enabled' => true,
                    'keys' => array(
                        'key' => 'APP_KEY',
                        'secret' => 'APP_SECRET'
                    )
                )
            ) ,

            'hybrid_debug' => array(
                'debug_mode' => 'info', /* none, debug, info, error */
                'debug_file' => APPPATH . '/logs/log-' . date('Y-m-d') . '.php'
            )
        );

        return $config;
    }
}