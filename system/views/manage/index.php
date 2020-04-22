<?php

if (isset($_COOKIE['auth'])) {
	$loggedIn =  true;
}else{
	$loggedIn =  false;
}

if ($loggedIn == true) {
require_once 'public/layouts/head.php';
?>

<style>
	body{
		background: #222;
	}
</style>

<?php
$actual_link = "{$_SERVER['REQUEST_URI']}";

// Implementaion of preg_split() function
$result = preg_split('/[\/,]+/', $actual_link , -1, PREG_SPLIT_NO_EMPTY);

// Display result
// foreach ($data as $key => $value) {
// 	print_r($value);
// }

$communities = "";
for ($i=0; $i < sizeof($data); $i++) { 
	echo $data[$i]['name']."<br>";
	$communities .= '<div class="media mb-2">
	<img width="32" height="32" src="/public/images/community-images/'.  $data[$i]['img_url'] .'" class="rounded-circle mr-3 topCommunity">
	<div class="media-body">
	<h5 class="mt-0 twelvepx">'.  $data[$i]['name'] .' <br><small class="twelvepx">0 Members</small></h5>
	<a href="community/'. $data[$i]['id'].'/'.  $data[$i]['name'] .'" id="6" class="btn btn-sm btn-fposts mediaObject"><i class="fas fa-arrow-right twelvepx"></i> Manage</a>
	</div>
	</div>';

}


?>
  
  <div class="col-md-6 bg-light offset-md-3 p-md-5 p-1 mt-5">
	<h4 class="text-center text-info">
		Manage Communities
	</h4>
	<hr>
		<?php echo $communities; ?>
  </div>

<?php
}else {
  redirect_to("/");
}
