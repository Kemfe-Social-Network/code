<?php

if (isset($_COOKIE['auth'])) {
	$loggedIn =  true;
}else{
	$loggedIn =  false;
}

if ($loggedIn == true) {
require_once 'public/layouts/head.php';
?>
<link rel="stylesheet" href="/public/css/settings.css?v=<?php echo $version;?>">

<style media="screen">
.chip {
	display: inline-block;
	height: 32px;
	font-size: 13px;
	font-weight: 500;
	color: rgba(0,0,0,0.6);
	line-height: 32px;
	padding: 0 12px;
	border-radius: 16px;
	background-color: #e4e4e4;
	margin-bottom: 5px;
	margin-right: 5px;
}

.chip i{
	cursor: pointer;
}

</style>
<section id="tabs" class="project-tab">

            <div class="container">
              <h5><i class="fas fa-cog"></i> User settings</h5>
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-account-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-account" aria-selected="true">Account</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>


                                <a class="nav-item nav-link" id="nav-privacy_security-tab" data-toggle="tab" href="#nav-privacy_security" role="tab" aria-controls="nav-privacy_security" aria-selected="false">Privacy & Security</a>
                                <a class="nav-item nav-link" id="nav-notifications-tab" data-toggle="tab" href="#nav-notifications" role="tab" aria-controls="nav-notifications" aria-selected="false">Notifications</a>
                                <a class="nav-item nav-link" id="nav-premium-tab" data-toggle="tab" href="#nav-premium" role="tab" aria-controls="nav-premium" aria-selected="false"> Kemfe Premium</a>

                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                              <!-- Tab 1-->
                              <br>
                              <h5>Account settings</h5>
                              <br>

                              <div class="col-md-6" style="border-bottom: 1px solid #eee; padding-left: 0">
                                <h6 style="font-size: 10px">ACCOUNT PREFERENCES</h6>


                              </div>


                                <br>
                                <div class="col-md-6" style=" padding-left:0px !important">
                                  <div class="row">


                                  <div class="col-md-6"><h5>Email Address</br>
<small style="font-size: 12px;"><?php echo $data_user_data['user_code'];?></small></h5> </div><div class="col-md-6"><button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#changeEmailModal" style="float: right;">Change</button></div>
<div class="col-md-6"><h5>Change password
</br>
<small style="font-size: 12px;">Password must be at least 6 characters long

</small></h5> </div><div class="col-md-6"><button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#changePaswordModal" style="float: right;">Change</button></div>
  </div></div>
<br><br>

  <div class="col-md-6" style="border-bottom: 1px solid #eee; padding-left: 0">
    <h6 style="font-size: 10px">DEACTIVATE ACCOUNT
</h6>


  </div>
	  <div class="col-md-6" >
	<button class="btn btn-sm btn-link text-danger" style="font-size: 12px; float: right; font-weight: bolder;"><i class="fas fa-trash"></i> DEACTIVATE ACCOUNT</button>
  </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                  <!-- Tab 2-->
																	<!-- Tab 1-->
		                              <br>
		                              <h5>Customize Profile</h5>
		                              <br>

		                              <div class="col-md-6" style="border-bottom: 1px solid #eee; padding-left: 0">
		                                <h6 style="font-size: 10px">PROFILE INFORMATION
</h6>


		                              </div>
																	<br>
																	<div class=""><h5>Display name (optional)
</br>
<small style="font-size: 12px;">Change your username/display name.

</small></h5>
<div class=""><input class="form-control col-md-6" id="display_name" placeholder="Display name (optional)" maxlength="20" type="text" value="">
	<div class=""><small>20 Characters</small></div>
	<button class="btn btn-sm btn-outline-info" id="change_display_name" onclick="change_display_name()"><i class="fas fa-save"></i> Save</button>
</div>
 </div>

 <br>
	<div class=""><h5>About (optional)

</br>
<small style="font-size: 12px;">A brief description of yourself shown on your profile.



</small></h5>
<div class="">
	<textarea placeholder="About (optional)" maxlength="200" id="about_me" rows="4" class="form-control col-md-6" style="margin-bottom: 0px; resize: both;"></textarea>
<div class=""><small>200 Characters</small></div>
<button class="btn btn-sm btn-outline-info" id="about_me_button" onclick="update_about_me()"><i class="fas fa-save"></i> Save</button>
</div>
</div>
<br>
<div class=""><h5>Avatar and banner image


</br>
<small style="font-size: 12px;">Images must be .png or .jpg format</small></h5>
<div class="">
<button class="btn col-md-2 buttonl" name="button" id="avarta_image" onclick="select_image(this.id)">
<h1><i class="fas fa-upload"></i></h1>
<small>Drag and Drop or <br>Upload Avatar Image</small>
</button>
<input type="file" accept="image/x-png,image/jpeg"  class="form-control" name="files" id="image_upload"  style="display: none;">

<button class="btn col-md-4 buttonl" name="button" id="banner_image" onclick="select_image(this.id)">
<h1><i class="fas fa-upload"></i></h1>
<small>Drag and Drop or Upload Banner Image</small>
</button>
<div class="">
<form class="" id="refinned">

</form>
</div>

</div>
</div>



                            </div>
                            <div class="tab-pane fade" id="nav-privacy_security" role="tabpanel" aria-labelledby="nav-privacy_security-tab">
                              <!-- Tab 2-->


															<!-- Tab 1-->
															<br>
															<h5>Privacy & security settings
</h5>
															<br>

															<div class="col-md-6" style="border-bottom: 1px solid #eee; padding-left: 0">
																<!-- <h6 style="font-size: 10px">ADVANCED SECURITY

</h6> -->
 <h6 style="font-size: 10px">BLOCKED USERS

</h6>

															</div>


																<br>
																<div class="col-md-6" style=" padding-left:0px !important">
																	<div class="row">

																




																		<div id="div_for_blocked_user">

																		</div>
																	<!-- <div class="col-md-6"><h5><a href="#" class="btn-link" style="font-size: 16px;">Two-factor authentication <i class="fas fa-external-link-alt"></i> </a></br>
<small style="font-size: 12px;">Increase your account's security by requiring a one-time use code along with your username and password

</small></h5> </div><div class="col-md-6"><a href="#"  style="float: right;"><i class="fas fa-arrow-right"></i> </a></div> -->

	</div></div>
<br><br>

	<div class="col-md-6" style="border-bottom: 1px solid #eee; padding-left: 0">
		<h6 style="font-size: 10px">MESSAGING PRIVACY

</h6>


	</div>
	<br>
	<div class=""><h5>Blocked users list

</br>
<small style="font-size: 12px;">

</small></h5>
<div class=""><input class="form-control col-md-6" id="user_to_block" placeholder="ADD USER TO BLOCKED LIST" maxlength="20" type="text" value="">
<div class=""></div>
<button class="btn btn-sm btn-outline-info mt-2" id="block_user_btn" onclick="block_user()"><i class="fas fa-save"></i> Save</button>
</div>
</div>


</div>
                            <div class="tab-pane fade" id="nav-notifications" role="tabpanel" aria-labelledby="nav-notifications-tab">
                              <!-- Tab 2-->

															<br>
															<h5>Notifications settings</h5>
															<br>

															<div class="col-md-6" style="border-bottom: 1px solid #eee; padding-left: 0">
																<h6 style="font-size: 10px">INBOX NOTIFICATION</h6>


															</div>


																<br>
																<div class="col-md-6" style=" padding-left:0px !important">
																	<div class="row">


																	<div class="col-md-6"><h5>Conversations in inbox
</br>
<small style="font-size: 12px;">Display conversations within the messages section of your inbox</small></h5>
</div>
<div class="col-md-6">
	<div class=""  style="float: right;">
	<label class="switch">
		<input type="checkbox" checked id="conversations_in_inbox" value="on" onclick="switch_btn(this.id)">
		<span class="slider round"></span>
	</label>
</div>
</div>

	</div></div>


<br>
<div class="col-md-6" style=" padding-left:0px !important">
	<div class="row">


	<div class="col-md-6"><h5>Mark as read in inbox

</br>
<small style="font-size: 12px;">Mark messages as read when I open my inbox


</small></h5>
</div>
<div class="col-md-6">
<div class=""  style="float: right;">
<label class="switch">
<input type="checkbox" checked value="on" id="mark_as_read_in_inbox" onclick="switch_btn(this.id)">
<span class="slider round"></span>
</label>
</div>
</div>

</div></div>
<br><br>
<div class="col-md-6" style="border-bottom: 1px solid #eee; padding-left: 0">
	<h6 style="font-size: 10px">EMAIL NOTIFICATION
</h6>


</div>


<br>
<div class="col-md-6" style=" padding-left:0px !important">
	<div class="row">


	<div class="col-md-6"><h5>Email notifications


</br>
<small style="font-size: 12px;">If turned off, you will still receive administrative emails
</small></h5>
</div>
<div class="col-md-6">
<div class=""  style="float: right;">
<label class="switch">
<input type="checkbox" value="on" checked id="email_notifications" onclick="switch_btn(this.id)">
<span class="slider round"></span>
</label>
</div>
</div>

</div></div>
<br>

		<div class="col-md-6" style=" ">
			<div class="row">


			<div class="col-md-6"><h5>Unread messages



		</br>
		<small style="font-size: 12px;">Receive unread messages via email



		</small></h5>
		</div>
		<div class="col-md-6">
		<div class=""  style="float: right;">
		<label class="switch">
		<input type="checkbox" value="off" id="unread_messages" onclick="switch_btn(this.id)">
		<span class="slider round"></span>
		</label>
		</div>
		</div>

		</div></div>

<br>
				<div class="col-md-6" style=" ">
					<div class="row">


					<div class="col-md-6"><h5>Email digests




				</br>
				<small style="font-size: 12px;">Receive periodic emails with the top posts from your favorite communities






				</small></h5>
				</div>
				<div class="col-md-6">
				<div class=""  style="float: right;">
				<label class="switch">
				<input type="checkbox" value="on" checked id="email_digests" onclick="switch_btn(this.id)">
				<span class="slider round"></span>
				</label>
				</div>
				</div>

				</div></div>

				<br><br>
				<div class="col-md-6" style="border-bottom: 1px solid #eee; padding-left: 0">
					<h6 style="font-size: 10px">PUSH NOTIFICATIONS

				</h6>


				</div>


				<br>
				<div class="col-md-6" style=" padding-left:0px !important">
					<div class="row">


					<div class="col-md-6"><h5>Unread messages



				</br>
				<small style="font-size: 12px;">Receive notifications for private messages, comments to your posts, replies to your comments, and mentions of your username



				</small></h5>
				</div>
				<div class="col-md-6">
				<div class=""  style="float: right;">
				<label class="switch">
				<input type="checkbox" value="on" checked id="push_unread_messages" onclick="switch_btn(this.id)">
				<span class="slider round"></span>
				</label>
				</div>
				</div>

				</div></div>
				<br>

				<div class="col-md-6" style=" padding-left:0px !important">
					<div class="row">


					<div class="col-md-6"><h5>Chat messages




				</br>
				<small style="font-size: 12px;">Receive notifications when a user chats with you or sends a chat request to you






				</small></h5>
				</div>
				<div class="col-md-6">
				<div class=""  style="float: right;">
				<label class="switch">
				<input type="checkbox" value="on" checked id="chat_messages" onclick="switch_btn(this.id)">
				<span class="slider round"></span>
				</label>
				</div>
				</div>

				</div></div>
				<br>



				<div class="col-md-6" style=" padding-left:0px !important">
					<div class="row">


					<div class="col-md-6"><h5>Trending posts





				</br>
				<small style="font-size: 12px;">Receive notifications for trending posts from your favorite communities









				</small></h5>
				</div>
				<div class="col-md-6">
				<div class=""  style="float: right;">
				<label class="switch">
				<input type="checkbox" value="on" checked  id="trending_posts" onclick="switch_btn(this.id)">
				<span class="slider round"></span>
				</label>
				</div>
				</div>

				</div></div>
				<br>
                            </div>
                            <div class="tab-pane fade" id="nav-premium" role="tabpanel" aria-labelledby="nav-premium-tab">
                              <!-- Tab 2-->
                              <br>
                              <h5>Kemfe Premium</h5>
                              <br>

                              <p style="font-size: 12px">Kemfe Premium is a subscription membership that upgrades your account with extra features.</p><br>
                              <div class="col-md-6" style="border-bottom: 1px solid #eee; padding-left: 0">
                                <h6 style="font-size: 10px">SUBSCRIPTION STATUS</h6>


                              </div>
                                  <br>
                                <p style="font-size: 12px">Get Kemfe Premium and help support Kemfe.</p>
                                <br>
                                <div class="col-md-6" style=" padding-left: 0">
                                  <a href="/premium" class="btn btn-link text-link">Go Premium <i class="fas fa-external-link-alt"></i></a>
                                  <a href="/premium" class="btn btn-link text-link" style="float: right;"> <i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>


				<?php //print_r($data_user_data); ?>
<!-- Modal -->
<div class="modal fade" id="changeEmailModal" tabindex="-1" role="dialog" aria-labelledby="changeEmailModalLabel" aria-hidden="true">
    <div class="modal-center">
        <div class="modal-dialog .modal-align-center">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid transparent; ">
                    <h4 class="modal-title" id="changeEmailModalLabel"> <i class="fas fa-envelope"></i> Update your email</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>

                    </button>


                </div>
                <div class="modal-body">Update your email below. Please use a valid email address, because we would use it to sent you notifications.
									 <form>
										 <div class="form-group">

											<input type="password" class="form-control" id="password" placeholder="Current Password">
										</div>
									  <div class="form-group">

											<input type="email" class="form-control " id="email" placeholder="New email">
									    <input type="hidden" value="<?php echo $data_user_data['password']; ?>" id="hidden_key" placeholder="New email">
									    </div>

									</form>
								</div>
                <div class="modal-footer" style="border-top: 1px solid transparent;">
                    <button type="button" class="btn btn-outline-warning text-uppercase" data-dismiss="modal" style="font-size: 13px;">Maybe later</button>
                    <button onclick="changeEmail()" type="button" class="btn btn-primary text-uppercase " id="changeEmail" style="font-size: 13px;">Save Email</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="changePaswordModal" tabindex="-1" role="dialog" aria-labelledby="changePaswordModalLabel" aria-hidden="true">
    <div class="modal-center">
        <div class="modal-dialog .modal-align-center">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom: 1px solid transparent; ">
                    <h4 class="modal-title" id="changePaswordModalLabel"> <i class="fas fa-envelope"></i> Update your password</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>

                    </button>


                </div>
                <div class="modal-body">
									 <form>
										 <div class="form-group">

											<input type="password" class="form-control" id="current_password" placeholder="Current Password">
										</div>
									  <div class="form-group">
											<input type="password" class="form-control" id="new_password" placeholder="New Password">

									    </div>

											<div class="form-group">
												<input type="password" class="form-control" id="confirm_new_password" placeholder="Confirm New Password">

										    </div>

									</form>
								</div>
                <div class="modal-footer" style="border-top: 1px solid transparent;">
                    <button type="button" class="btn btn-outline-warning text-uppercase" data-dismiss="modal" style="font-size: 13px;">Maybe later</button>
                    <button onclick="changePassword()" type="button" class="btn btn-primary text-uppercase " id="changePassword" style="font-size: 13px;">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/public/js/settings.js?v=<?php echo $version;?>" charset="utf-8"></script>
<?php }else{ redirect_to("/");} require_once 'public/layouts/footer.php'; ?>
