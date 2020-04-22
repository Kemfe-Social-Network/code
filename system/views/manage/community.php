<?php

if (isset($_COOKIE['auth'])) {
	$loggedIn =  true;
}else{
	$loggedIn =  false;
}

if ($loggedIn == true) {
require_once 'public/layouts/head.php';
?>

<link rel="stylesheet" href="/public/css/solving.css?v=<?php echo $version;?>"/>
<div id="quick-filters" >

<?php
$actual_link = "{$_SERVER['REQUEST_URI']}";

// Implementaion of preg_split() function
$result = preg_split('/[\/,]+/', $actual_link , -1, PREG_SPLIT_NO_EMPTY);


// Display result

?>
<input type="hidden" value="<?php echo $result[2];?>" id="community_id">
 <div class="container">
  <input type="hidden" id="pod_id" name="" value="<?php if(isset($result[1])){echo $result[1]; }else{ echo null;}  ?>">
   <div class="p-0">
       <div class="">
           <div class="col">
             <small style="font-size: 10px;">Moderate </small>
               <ul>
                 <li>|</li>
                   <li>
                     <div class="dropdown show">
<a class="btn btn-default btn-sm dropdown-toggle changer" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa fa-thumbtack"></i>Pending Posts <i class="fa fa-caret-down"></i>
</a>

<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <a class="dropdown-item" href="#" id="<?php echo $result[1];?>_all_post" onclick="filter(this.id)">  <i class="fa fa-thumbtack"></i> Posts</i></a>
 <a class="dropdown-item" href="#" id="<?php echo $result[1];?>_all_comment" onclick="filter(this.id)">  <i class="fa fa-comment"></i> Comments</i></a>

</div>
</div>
                   </li>
                   </ul>

           </div>
       </div>
   </div>
 </div>
</div>
<section id="tabs" class="project-tab">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-account-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-account" aria-selected="true">Pending Post</a>
                                <!-- <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Community Profile</a>


                                <a class="nav-item nav-link" id="nav-privacy_security-tab" data-toggle="tab" href="#nav-privacy_security" role="tab" aria-controls="nav-privacy_security" aria-selected="false">Privacy & Security</a>
                                <a class="nav-item nav-link" id="nav-notifications-tab" data-toggle="tab" href="#nav-notifications" role="tab" aria-controls="nav-notifications" aria-selected="false">Notifications</a> -->

                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                              <!-- Tab 1-->
                                <div id="post_wrapper_div" style="max-width: 560px;"></div>
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

                            



                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="/public/js/admin-fun.js?v=<?php echo $version;?>"></script>
        <script src="/public/js/manage.js?v=<?php echo $version;?>"></script>
<?php
}else {
  redirect_to("/");
}
