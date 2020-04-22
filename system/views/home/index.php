<?php

if (isset($_COOKIE['auth'])) {
	$loggedIn =  true;
}else{
	$loggedIn =  false;
}

if ($loggedIn == true) {
require_once 'public/layouts/head.php';
?>

<div style="clear: both;"></div>




<?php
require_once 'public/layouts/home-page.php';
?>
<script type="text/javascript" src="public/js/posts.js?v=<?php echo $version;?>"></script>

<?php require_once 'public/layouts/footer.php'; ?>
<?php 

}else{

	?>

<!DOCTYPE html>
<html>
<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143088108-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-143088108-1');
</script>
<?php $version = "1.0"; ?>
	<link href="/public/css/login.css" rel="stylesheet" id="bootstrap-css">
  <?php require_once 'public/layouts/boilerplate.php'; ?>
  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php if (isset($namespae_site_title)) {echo $namespae_site_title;}else{echo "Kemfe.com | Online Community";}?></title>
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php if (isset($namespae_site_title)) {echo $namespae_site_title;}else{echo "Kemfe.com | Online Community";}?>" />
	<meta property="og:description" content="<?php if (isset($namespae_site_desc)) {echo $namespae_site_desc;}else{echo "";}?>" />
	<meta property="og:url" content="<?php if (isset($namespae_site_url)) {echo $namespae_site_url;}else{echo "https://kemfe.com/";}?>" />
	<meta property="article:section" content="<?php if (isset($namespae_site_section)) {echo $namespae_site_section;}else{echo "AskKemfe";}?>" />
	<meta property="article:published_time" content="<?php if (isset($namespae_site_section)) {echo $namespae_site_section;}else{echo "";}?>" />
	<meta property="og:image" content="<?php if (isset($namespae_site_image)) {echo $namespae_site_image;}else{echo "https://kemfe.com/images/public/bg_q2.jpg";}?>" />
	<meta property="og:image:secure_url" content="<?php if (isset($namespae_site_image)) {echo $namespae_site_image;}else{echo "https://kemfe.com/public/images/bg_q2.jpg";}?>" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="<?php if (isset($namespae_site_desc)) {echo $namespae_site_desc;}else{echo "";}?>" />
	<meta name="twitter:title" content="<?php if (isset($namespae_site_title)) {echo $namespae_site_title;}else{echo "Kemfe.com | Online Community";}?>" />
	<meta name="twitter:image" content="<?php if (isset($namespae_site_image)) {echo $namespae_site_image;}else{echo "https://kemfe.com/public/images/bg_q2.jpg";}?>" />

  <link rel="icon" type="image/png" href="/public/images/espals-logo.png" />

</head>
<body class="loginBg">


      <div class="container login-container">
      <div class="row">
        <div class="col-md-6 ads">
        	<br><br><br>
         <p class="communicationItem"><i class="fas fa-search "></i> Follow your interests.</p>
         <p class="communicationItem"><i class="fas fa-users "></i> Listen to what people are saying.
</p>
         <p class="communicationItem"><i class="fas fa-comment "></i> Join the conversation.
</p>
       <p class="communicationItem"><i class="fas fa-donate "></i> Get paid while doing all these!
</p>
        </div>
        <div class="col-md-6 login-form" ng-app="myApp" ng-controller="formController">
          <div class="profile-img">
           <img src="public/images/espals-logo.png" width="100"  alt="logo" class="img-fluid">
          </div>
          <input type="hidden" id="hidden_data">
   			<?php

   			require_once 'public/layouts/login.php';
   			require_once 'public/layouts/register.php';
   			require_once 'public/layouts/forgot.php';
   			 ?>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="public/js/login.js?v=<?php echo $version;?>"></script>
    <script type="text/javascript" src="public/js/func.js?v=<?php echo $version;?>"></script>
  <script>

    var application = angular.module("myApp", []);
    application.controller("formController", function ($scope, $sce, $http) {
        $scope.insert = {};
        $scope.login = {};


        $scope.loginUser = function() {
           disabledBtn("Validating", "loginBtnService");
					 		console.log($scope.login)
                     $http({
                         method: "POST",
                         url: "api/user_login",
                         data: $scope.login,

                     }).then(function successCallback(rs) {

                        enableBtn("Sign In &nbsp;<i class=\"fas fa-sign-in-alt\"></i> ", "loginBtnService");
                     if(rs.data.error){
                        var message = msgAlert("danger", rs.data.error.msg);
                          $scope.login_error = $sce.trustAsHtml(message);


                     }else if (rs.data.Ok) {
                       var message = msgAlert("success", "Success");
                         $scope.login_error = $sce.trustAsHtml(message);

            setTimeout(function() {
               location.reload();
           }, 1000);
                     }

               // this callback will be called asynchronously
               // when the response is available
             }, function errorCallback(response) {

               // called asynchronously if an error occurs
               // or server returns response with an error status.
             });
        }

        $scope.registerData = function () {

           disabledBtn("Please Wait", "insertData");

          $http({
              method: "POST",
              url: "api/user_registration",
              data: $scope.insert,

          }).then(function successCallback(response) {
            console.log(response);
            $("#hidden_data").val(response.data);
             enableBtn("Sign Up &nbsp;<i class=\"fas fa-sign-in-alt\"></i>", "insertData");
          if(response.data.error){
             var message = msgAlert("danger", response.data.error.msg);
            if(response.data.error.who == "email_field_error"){
              $scope.email_field_error = $sce.trustAsHtml(message);
            }else if(response.data.error.who == "password_field_error"){
                $scope.password_field_error = $sce.trustAsHtml(message);
            }else if(response.data.error.who == "username_field_error"){
                $scope.username_field_error = $sce.trustAsHtml(message);
            }


          }else if (response.data.Ok) {

            $("#successRegPage").show("slow")
            $("#register").hide("slow")
            setTimeout(function() {
    location.reload();
}, 2000);
          }

    // this callback will be called asynchronously
    // when the response is available
  }, function errorCallback(response) {

    // called asynchronously if an error occurs
    // or server returns response with an error status.
  });
        }
    });

  </script>
</body>
</html>

	<?php
}

?>
