<?php include('dashboard-header.php'); ?>

<section class="user-profile section">
	<div class="container">
		<nav>
		  <div class="nav nav-tabs" id="nav-tab" role="tablist">
		     <a class="nav-item nav-link btn btncolor active" id="nav-dashboard-tab" data-toggle="tab" href="#nav-dashboard" role="tab" aria-controls="nav-dashboard" aria-selected="true">Dashboard</a>
		     <a class="nav-item nav-link btn btncolor" id="nav-activity-tab" data-toggle="tab" href="#nav-activity" role="tab" aria-controls="nav-activity" aria-selected="false">Activity</a>     
		     <a class="nav-item nav-link btn btncolor" id="nav-accounts-tab" data-toggle="tab" href="#nav-accounts" role="tab" aria-controls="nav-accounts" aria-selected="false">Accounts</a>
		  </div>
		</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel" aria-labelledby="nav-dashboard-tab">

  	<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user-dashboard-profile">
						<!-- User Image -->
								<div class="profile-thumb">
									<?php if (!empty(user_details()->image)) { ?>
										 <img src="<?= base_url('assets/frontend/images/user/'); ?><?=user_details()->image;?>" alt="" class="rounded-circle">
									<?php }else{ ?>
									<img src="<?= base_url('assets/frontend/images/user/'); ?>Sample_User_Icon.png" alt="" class="rounded-circle">
								    <?php } ?>
								</div>
								<!-- User Name -->
						<h5 class="text-center"><?= user_details()->name; ?></h5>
						<p>Joined
						<?php
						 $yrdata = strtotime(user_details()->created_on);
						    echo date('F d, Y', $yrdata);
						 ?>
						
						</p>
					</div>
					<!-- Dashboard Links -->					 
					<?php include 'profile-dashboard.php'; ?>
					<!-- Dashboard Links -->

				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
					<!-- Edit Personal Info -->

					<style type="text/css">

						img{ max-width:100%;}
						.inbox_people {
							background: #f8f8f8 none repeat scroll 0 0;
							float: left;
							overflow: hidden;
							width: 40%; border-right:1px solid #c4c4c4;
						}
						.inbox_msg {
							border: 1px solid #c4c4c4;
							clear: both;
							overflow: hidden;
						}
						.top_spac{ margin: 20px 0 0;}
						.recent_heading {float: left; width:40%;}
						.srch_bar {
							display: inline-block;
							text-align: right;
							width: 60%; padding:
						}
						.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}
						.recent_heading h4 {
							color: #05728f;
							font-size: 21px;
							margin: auto;
						}
						.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
						.srch_bar .input-group-addon button {
							background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
							border: medium none;
							padding: 0;
							color: #707070;
							font-size: 18px;
						}
						.srch_bar .input-group-addon { margin: 0 0 0 -27px;}
						.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
						.chat_ib h5 span{ font-size:13px; float:right;}
						.chat_ib p{ font-size:14px; color:#989898; margin:auto}
						.chat_img {
							float: left;
							width: 11%;
						}
						.chat_ib {
							float: left;
							padding: 0 0 0 15px;
							width: 88%;
						}
						.chat_people{ overflow:hidden; clear:both;}
						.chat_list {
							border-bottom: 1px solid #c4c4c4;
							margin: 0;
							padding: 18px 16px 10px;
						}
						.inbox_chat { height: 550px; overflow-y: scroll;}
						.active_chat{ background:#ebebeb;}
						.incoming_msg_img {
							display: inline-block;
							width: 6%;
						}
						.received_msg {
							display: inline-block;
							padding: 0 0 0 10px;
							vertical-align: top;
							width: 92%;
						}
						.received_withd_msg p {
							background: #ebebeb none repeat scroll 0 0;
							border-radius: 3px;
							color: #646464;
							font-size: 14px;
							margin: 0;
							padding: 5px 10px 5px 12px;
							width: 100%;
						}
						.time_date {
							color: #747474;
							display: block;
							font-size: 12px;
							margin: 8px 0 0;
						}
						.received_withd_msg { width: 57%;}
						.mesgs {
							float: left;
							padding: 30px 15px 0 25px;
							width: 60%;
						}
						.sent_msg p {
							background: #05728f none repeat scroll 0 0;
							border-radius: 3px;
							font-size: 14px;
							margin: 0; color:#fff;
							padding: 5px 10px 5px 12px;
							width:100%;
						}
						.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
						.sent_msg {
							float: right;
							width: 46%;
						}
						.input_msg_write input {
							background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
							border: medium none;
							color: #4c4c4c;
							font-size: 15px;
							min-height: 48px;
							width: 100%;
						}
						.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
						.msg_send_btn {
							background: #05728f none repeat scroll 0 0;
							border: medium none;
							border-radius: 50%;
							color: #fff;
							cursor: pointer;
							font-size: 17px;
							height: 33px;
							position: absolute;
							right: 0;
							top: 11px;
							width: 33px;
						}
						.messaging { padding: 0 0 50px 0;}
						.msg_history {
							height: 516px;
							overflow-y: auto;
						}
					</style>
					<!-- <div class="widget personal-info"> -->
						<div>
						<!-- <h3 class="widget-header user">Personal Chat</h3> -->
						<?php if(count($chat_users) > '0') { ?>
							<div class="messaging">
								<div class="inbox_msg">
									<div class="inbox_people">
										<div class="headind_srch">
											<div class="recent_heading">
												<h4>Recent</h4>
											</div>
											<div class="srch_bar">
												<div class="stylish-input-group">
													<input type="text" class="search-bar"  placeholder="Search" >
												</div>
											</div>
										</div>
										<div class="inbox_chat">
											<?php $i='1';
											foreach($chat_users as $chats) { 

												?>
												<div <?php if($i == '1') { echo "id='#openedmsg'"; } ?>  data-receiver_id="<?= $chats; ?>" class="chat_list <?php if($i == '1') { echo "active_chat"; } ?> msglist_user">
													<?php if($i == '1') { ?>
														<script>
															$(document).ready(function() {
																var receiver_id = <?= $chats; ?>;
																$("#ReciverId_txt").val(receiver_id);
															});
														</script>
													<?php } ?>
													<div class="chat_people">
														<div class="chat_img"> <img src="<?= base_url('assets/frontend/images/user/'); ?>Sample_User_Icon.png" alt="User"> </div>
														<div class="chat_ib">
															<h5><?= user_details_by_id($chats)->name; ?> <span class="chat_date">
																<?php
																$timestamp = strtotime(get_latest_chat($chats)->message_date_time);
																echo $newDate = date('d F', $timestamp); 
																?>
															</span>
														</h5>
														<p><?php
														$this->load->helper('text');
														echo character_limiter(get_latest_chat($chats)->message, 40); ?></p>
													</div>
												</div>
											</div>
											<?php $i++; } ?>
										</div>
									</div>
									<div class="mesgs" id="content">
										<div class="msg_history" id="dumppy">
										</div>
										<input type="hidden" id="ReciverId_txt" value="">
										<div class="type_msg">
											<div class="input_msg_write">
												<input type="text" class="write_msg message" placeholder="Type a message" />
												<input type="file" name="file" class="upload_attachmentfile "/>
												<button class="msg_send_btn btnSend" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php } else { ?>
							<center><h3>No Chat Fount </h3></center>
						<?php } ?>
					</div>

					<!-- chat template End -->

				</div>
	</div>


  </div>


  <div class="tab-pane fade" id="nav-activity" role="tabpanel" aria-labelledby="nav-activity-tab">
  	
  	<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">				 
					<!-- Dashboard Links -->					 
					 <?php include('activity-links.php'); ?>					  
					  
					<!-- Dashboard Links -->

				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Edit Personal Info -->
				<div class="widget personal-info">
					<h3 class="widget-header user">Personal Information</h3>
					<table class="table table-bordered">
					  <tbody>
					    <tr>
					      <td>Name</td>
					      <td colspan="2"><?= user_details()->name; ?></td>
					    </tr>
					    <tr>
					      <td>Phone:</td>
					      <td><?= user_details()->phone; ?></td>
					      
					    </tr>
					    <tr>
					      <td>Email:</td>
					      <td><?= user_details()->email; ?></td>
					      
					    </tr>
					    
					  </tbody>
					</table>
				</div>
				<!-- Change Password -->
				 
				
			</div>
	</div>

  </div>

  
  <div class="tab-pane fade" id="nav-accounts" role="tabpanel" aria-labelledby="nav-accounts-tab">
  	
  	<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">				 
					<!-- Dashboard Links -->					 
					 <?php include('accounts-links.php'); ?>					  
					<!-- Dashboard Links -->

				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Edit Personal Info -->
				<div class="widget personal-info">
					<h3 class="widget-header user">Personal Information</h3>
					<table class="table table-bordered">
					  <tbody>
					    <tr>
					      <td>Name</td>
					      <td colspan="2"><?= user_details()->name; ?></td>
					    </tr>
					    <tr>
					      <td>Phone:</td>
					      <td><?= user_details()->phone; ?></td>
					      
					    </tr>
					    <tr>
					      <td>Email:</td>
					      <td><?= user_details()->email; ?></td>
					      
					    </tr>
					    
					  </tbody>
					</table>
				</div>
				<!-- Change Password -->
				 
				
			</div>
	</div>

  </div>
</div>
		
	</div>
</section>

<?php include('footer.php'); ?>
	<script src="<?=base_url('assets/chat.js');?>"></script> 


