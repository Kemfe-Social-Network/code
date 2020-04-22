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

<?php
}else {
  redirect_to("/");
}
