<?php

if (isset($_COOKIE['auth'])) {
	$loggedIn =  true;
}else{
	$loggedIn =  false;
}

if ($loggedIn == true) {
require_once 'public/layouts/head.php';

$actual_link = "{$_SERVER['REQUEST_URI']}";

// Implementaion of preg_split() function
$result = preg_split('/[\/,]+/', $actual_link , -1, PREG_SPLIT_NO_EMPTY);


?>
<input type="hidden" id="url_for_post" value="<?php echo $result[1]; ?>">
<div style="clear: both;"></div>

<?php require_once 'public/layouts/home-page.php'; ?>

<script type="text/javascript" src="/public/js/posts2.js?v=<?php echo $version;?>"></script>
<?php

}else{

	?>


	<?php
}
require_once 'public/layouts/footer.php';
?>
