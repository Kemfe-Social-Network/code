<?php

if (isset($_COOKIE['auth'])) {
	$loggedIn =  true;
}else{
	$loggedIn =  false;
}

require_once 'public/layouts/head.php';
$search_terms =  "";

if(isset($_GET['search']) && !empty($_GET['search'])){
    $search_terms =  $_GET['search'];
}
?>
<input type="hidden" id="search_post" value="<?php echo $search_terms;?>" />
<div class="col-md-6 gedf-main offset-md-3" >

         

            <div id="post_wrapper_div">

                
            </div>
         </div>
<script src="/public/js/search.js?v=<?php echo $version;?>"></script>