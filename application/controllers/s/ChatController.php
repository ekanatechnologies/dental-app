<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class ChatController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!is_logged_in()){
			redirect("userlogin");
		}
		$this->load->model(['ChatModel','OuthModel','UserModel','SeesionModel']);
		$this->load->helper('string');
		$this->load->model('Home_model','home_model');
	}

	public function index(){		
		$data['title'] = 'Chat';
		$loggedin_id =  user_details()->id;
		//$condition= "`sender_id` = ".$loggedin_id."  OR  `receiver_id` = ".$loggedin_id."";
		$data['recent_chats'] = $this->db
		->select('receiver_id')
		->where('sender_id',$loggedin_id)
		->group_by('receiver_id')
		->order_by('id','desc')
		->get('chat')->result();
		$receiver_ids = $data['recent_chats'];

		$receiverids  = array();
		foreach($receiver_ids as $ids){
			$receiverids[] = $ids->receiver_id;
		}

		$sender_ids  = 		$this->db
		->select('sender_id')
		->where('receiver_id',$loggedin_id)
		->group_by('sender_id')
		->order_by('id','desc')
		->get('chat')->result();

		$senderids = array();
		foreach($sender_ids as $ids){
			$senderids[] = $ids->sender_id;
		}

		$output = array_unique( array_merge( $receiverids , $senderids ) );
		if (($key = array_search($loggedin_id, $output)) !== false) {
			unset($output[$key]);
		}

		$data['chat_users']= $output;

		$this->load->view('front/chat_template',$data);
	}


	public function user_index(){		
		$data['title'] = 'Chat';
		$loggedin_id =  user_details()->id;
		//$condition= "`sender_id` = ".$loggedin_id."  OR  `receiver_id` = ".$loggedin_id."";
		$data['recent_chats'] = $this->db
		->select('receiver_id')
		->where('sender_id',$loggedin_id)
		->group_by('receiver_id')
		->order_by('id','desc')
		->get('chat')->result();
		$receiver_ids = $data['recent_chats'];

		$receiverids  = array();
		foreach($receiver_ids as $ids){
			$receiverids[] = $ids->receiver_id;
		}

		$sender_ids  = 		$this->db
		->select('sender_id')
		->where('receiver_id',$loggedin_id)
		->group_by('sender_id')
		->order_by('id','desc')
		->get('chat')->result();

		$senderids = array();
		foreach($sender_ids as $ids){
			$senderids[] = $ids->sender_id;
		}

		$output = array_unique( array_merge( $receiverids , $senderids ) );
		if (($key = array_search($loggedin_id, $output)) !== false) {
			unset($output[$key]);
		}

		$data['chat_users']= $output;

		$this->load->view('front/user_chat_template',$data);
	}	
	
	public function send_text_message(){
		$post = $this->input->post();
		$messageTxt='NULL';
		$attachment_name='';
		$file_ext='';
		$mime_type='';
		
		if(isset($post['type'])=='Attachment'){ 
			$AttachmentData = $this->ChatAttachmentUpload();
			//print_r($AttachmentData);
			$attachment_name = $AttachmentData['file_name'];
			$file_ext = $AttachmentData['file_ext'];
			$mime_type = $AttachmentData['file_type'];

		}else{
			$messageTxt = reduce_multiples($post['messageTxt'],' ');
		}	

		$data=[
			'sender_id' => user_details()->id,
			'receiver_id' => $post['receiver_id'],
			'message' =>   $messageTxt,
			'attachment_name' => $attachment_name,
			'file_ext' => $file_ext,
			'mime_type' => $mime_type,
					'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm
					'ip_address' => $this->input->ip_address(),
				];

				$query = $this->ChatModel->SendTxtMessage($this->OuthModel->xss_clean($data)); 
				$response='';
				if($query == true){
					$response = ['status' => 1 ,'message' => '' ];
				}else{
					$response = ['status' => 0 ,'message' => 'sorry we re having some technical problems. please try again !' 						];
				}
				echo json_encode($response);
			}

			public function send_text_message_init(){
				$post = $this->input->post();
				$messageTxt='NULL';
				$attachment_name='';
				$file_ext='';
				$mime_type='';

				if(isset($post['type'])=='Attachment'){ 
					$AttachmentData = $this->ChatAttachmentUpload();
			//print_r($AttachmentData);
					$attachment_name = $AttachmentData['file_name'];
					$file_ext = $AttachmentData['file_ext'];
					$mime_type = $AttachmentData['file_type'];

				}else{
					$messageTxt = reduce_multiples($post['messageTxt'],' ');
				}	

				$data=[
					'sender_id' => user_details()->id,
					'receiver_id' => $post['receiver_id'],
					'message' =>   $messageTxt,
					'attachment_name' => $attachment_name,
					'file_ext' => $file_ext,
					'mime_type' => $mime_type,
					'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm
					'ip_address' => $this->input->ip_address(),
				];

				$query = $this->ChatModel->SendTxtMessage($this->OuthModel->xss_clean($data)); 
				$response='';
				if($query == true){
					$this->session->set_flashdata('success','Message Sent Successfully');
					redirect($_SERVER['HTTP_REFERER']);
				}else{
					$this->session->set_flashdata('error','Message Sending Fail Please Try Again !');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}

			public function ChatAttachmentUpload(){


				$file_data='';
				if(isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])){	
					$config['upload_path']          = './uploads/attachment';
					$config['allowed_types']        = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
				//$config['max_size']             = 500;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('attachmentfile'))
					{
						echo json_encode(['status' => 0,
							'message' => '<span style="color:#900;">'.$this->upload->display_errors(). '<span>' ]); die;
					}
					else
					{
						$file_data = $this->upload->data();
					//$filePath = $file_data['file_name'];
						return $file_data;
					}
				}

			}

			public function get_chat_history_by_vendor(){
				$receiver_id =  $this->input->get('receiver_id');

				$Logged_sender_id = user_details()->id;

				$history = $this->ChatModel->GetReciverChatHistory($receiver_id);
				foreach($history as $chat):

					$message_id = $this->OuthModel->Encryptor('encrypt', $chat['id']);
					$sender_id = $chat['sender_id'];
					$userName = user_details_by_id($chat['sender_id'])->name;
					$userPic = $this->UserModel->PictureUrlById($chat['sender_id']);

					$message = $chat['message'];
					$messagedatetime = date('d M H:i A',strtotime($chat['message_date_time']));

					?>
					<?php
					$messageBody='';
            	if($message=='NULL'){ //fetach media objects like images,pdf,documents etc
            		$classBtn = 'right';
            		if($Logged_sender_id==$sender_id){$classBtn = 'left';}

            		$attachment_name = $chat['attachment_name'];
            		$file_ext = $chat['file_ext'];
            		$mime_type = explode('/',$chat['mime_type']);

            		$document_url = base_url('uploads/attachment/'.$attachment_name);

            		if($mime_type[0]=='image'){
            			$messageBody.='<img src="'.$document_url.'" onClick="ViewAttachmentImage('."'".$document_url."'".','."'".$attachment_name."'".');" class="attachmentImgCls">';	
            		}else{
            			$messageBody='';
            			$messageBody.='<div class="attachment">';
            			$messageBody.='<h4>Attachments:</h4>';
            			$messageBody.='<p class="filename">';
            			$messageBody.= $attachment_name;
            			$messageBody.='</p>';

            			$messageBody.='<div class="pull-'.$classBtn.'">';
            			$messageBody.='<a download href="'.$document_url.'"><button type="button" id="'.$message_id.'" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a>';
            			$messageBody.='</div>';
            			$messageBody.='</div>';
            		}


            	}else{
            		$messageBody = $message;
            	}
            	?>



            	<?php if($Logged_sender_id!=$sender_id){?>     
            		<!-- Message. Default to the left -->
            		<div class="incoming_msg">
            			<div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
            			<div class="received_msg">
            				<div class="received_withd_msg">
            					<p><?=$messageBody;?></p>
            					<span class="time_date"> <?=$messagedatetime;?></span></div>
            				</div>
            			</div>

            			<!-- /.direct-chat-msg -->
            		<?php }else{?>
            			<!-- Message to the right -->
            			<div class="outgoing_msg">
            				<div class="sent_msg">
            					<p><?=$messageBody;?></p>
            					<span class="time_date"> <?=$messagedatetime;?></span> </div>
            				</div>

            				<!-- /.direct-chat-msg -->
            			<?php }?>

            			<?php
            		endforeach;

            	}
            	public function chat_clear_client_cs(){
            		$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );

            		$messagelist = $this->ChatModel->GetReciverMessageList($receiver_id);

            		foreach($messagelist as $row){

            			if($row['message']=='NULL'){
            				$attachment_name = unlink('uploads/attachment/'.$row['attachment_name']);
            			}
            		}

            		$this->ChatModel->TrashById($receiver_id); 


            	}

            	function sendFCM($message, $id, $message_info='', $type ='') {
            		$message = 'hello';
            		$message_info = 'test';
            		$API_ACCESS_KEY = "AIzaSyAnNKpvcR160iRXTAME0jVlJEyFDVq3Ghc";

            		$url = 'https://fcm.googleapis.com/fcm/send';

            		$fields = array (
            			'registration_ids' => array (
            				$id
            			),
            			'data' => array (
            				"message" => $message,
            				'message_info' => $message_info,
            			),                
            			'priority' => 'high',
            			'notification' => array(
            				'title' => $message['title'],
            				'body' => $message['body'],                            
            			),
            		);
            		$fields = json_encode ( $fields );

            		$headers = array (
            			'Authorization: key=' . $API_ACCESS_KEY,
            			'Content-Type: application/json'
            		);
            		$ch = curl_init ();
            		curl_setopt ( $ch, CURLOPT_URL, $url );
            		curl_setopt ( $ch, CURLOPT_POST, true );
            		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
            		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
            		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
            		$result = curl_exec ( $ch );
            		curl_close ( $ch );
            	}
            	
            	public function get_new_chat()
            	{
            		$Logged_sender_id = user_details()->id;
            		$currenttime = date('Y-m-d H:i:s');
            		$previoustime = date('Y-m-d H:i:s',time() - 3);
            		echo $msg = $this->db
            		->where('receiver_id',$Logged_sender_id)
            		->where('message_date_time >=',$previoustime)
            		->where('message_date_time <=',$currenttime)
            		->get('chat')->num_rows();

            	}
            }