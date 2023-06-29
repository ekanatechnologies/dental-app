<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library("braintree_lib");
    }

		private function printJSON($var){
				echo json_encode($var);
		}

    public function get_token()
    {
        $token = $this->braintree_lib->create_client_token();
        $this->printJSON($token);
    }

    public function checkout()
    {
        if($this->input->post())
        {
            $amount = $this->input->post('amount');
            $nonce  = $this->input->post('payment_method_nonce');

            $gateway = init_payment();
            // $result = $gateway->transaction()->sale([
            //     'amount' => $amount,
            //     'paymentMethodNonce' => $nonce,
            //     'options' => [
            //         'submitForSettlement' => true
            //     ]
            // ]);
            $result = $gateway->transaction()->sale([
                  'merchantAccountId' => 'provider_sub_merchant_account',
                  'amount' => '10.00',
                  'paymentMethodNonce' => $nonceFromTheClient,
                  'deviceData' => $deviceDataFromTheClient,
                  'serviceFeeAmount' => "1.00"
                ]);

            if ($result->success || !is_null($result->transaction)) {
                $transaction = $result->transaction;
                echo $transaction;
                exit();
                //header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
            } else {
                $errorString = "";

                foreach($result->errors->deepAll() as $error) {
                    $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
                }

                print_r($errorString);
                exit;
                //header("Location: " . $baseUrl . "index.php");
            }
        }
    }

}
?>
