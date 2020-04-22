<?php
if (isset($_COOKIE['auth'])) {
	$loggedIn =  true;
}else{
	$loggedIn =  false;
}
  require_once 'public/layouts/head.php';

 ?>
 <link rel="stylesheet" href="/public/css/solving.css?v=<?php echo $version;?>"/>
<div id="quick-filters-name" style="padding: 10px 10px;">
	<div class="media mb-2"><img width="32" height="32" class="rounded-circle mr-3 topCommunity" src="/public/images/community-images/<?php echo $data['img_url'];?>" alt="<?php echo $data['name']; ?>"><div class="media-body"><h5 style="font-weight: lighter; cursor: pointer;" class="mt-0 "><?php echo $data['name']; ?> </h5></div></div>

</div>
 <div id="quick-filters" >

	 <?php
	 $actual_link = "{$_SERVER['REQUEST_URI']}";

	 // Implementaion of preg_split() function
	 $result = preg_split('/[\/,]+/', $actual_link , -1, PREG_SPLIT_NO_EMPTY);
?>
   <div class="container">
		 <input type="hidden" id="pod_id" name="" value="<?php if(isset($result[1])){echo $result[1]; }else{ echo null;}  ?>">
     <div class="p-0">
         <div class="">
             <div class="col">
               <small style="font-size: 10px;">SORT </small>
                 <ul>
                   <li>|</li>
                     <li>
                       <div class="dropdown show">
  <a class="btn btn-default btn-sm dropdown-toggle changer" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-thumbtack"></i> Popular <i class="fa fa-caret-down"></i>
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#" id="<?php echo $result[1];?>_best" onclick="filter(this.id)">  <i class="fa fa-thumbtack"></i> Popular</i></a>
		<a class="dropdown-item" href="#" id="<?php echo $result[1];?>_hot" onclick="filter(this.id)">  <i class="fa fa-fire"></i> Hot</i></a>
    <a class="dropdown-item" href="#" id="<?php echo $result[1];?>_trending" onclick="filter(this.id)">  <i class="fa fa-sort-amount-up-alt"></i> Trending</i></a>
    <a class="dropdown-item" href="#" id="<?php echo $result[1];?>_new" onclick="filter(this.id)">  <i class="fa fa-sort-numeric-up-alt"></i> New</a>
  </div>
</div>
                     </li>
                     <li><button class="my btn btn-sm btn-outline-info" id="<?php echo $result[1];?>_t10" onclick="filter(this.id)">Top 10</button></li>
                     <li><button class="my btn btn-sm btn-outline-danger" id="<?php echo $result[1];?>_t100" onclick="filter(this.id)">Top 100</button></li>
                 </ul>

             </div>
         </div>
     </div>
   </div>
 </div>


 <div class="container gedf-wrapper">
    <div class="row">
      <div class="col-md-3 mobHide mlkl">
        <div style="position: sticky; position: -webkit-sticky; top: 57px;">

<div class="card mt-2" style="padding: 5px;">


			<h5 class="card-title  text-bold" style="padding: 10px; font-size: 12px;">TOP POSTS</h5>

	<a class="dropdown-item text-info" href="#" id="<?php echo $result[1];?>_best" onclick="filter(this.id)">  <i class="fa fa-thumbtack"></i> Popular</i></a>
	<a class="dropdown-item text-info" href="#" id="<?php echo $result[1];?>_hot" onclick="filter(this.id)">  <i class="fa fa-fire"></i> Hot</i></a>
	<a class="dropdown-item text-info" href="#" id="<?php echo $result[1];?>_trending" onclick="filter(this.id)">  <i class="fa fa-sort-amount-up-alt"></i> Trending</i></a>

	<label for="">Filter</label>
	<select class="form-control" name="">
		<option value="<?php echo $result[1]?>_best">All Date</option>
		<option value="<?php echo $result[1]?>_topyes">Yesterday</option>
		<option value="<?php echo $result[1]?>_topl7">Last 7 days</option>
		<option value="<?php echo $result[1]?>_topl30">Last 30 days</option>
		<option value="<?php echo $result[1]?>_top10">Top 10 posts</option>
		<option value="<?php echo $result[1]?>_top20">Top 20 posts</option>
		<option value="<?php echo $result[1]?>_top50">Top 50 posts</option>
		<option value="<?php echo $result[1]?>_top100">Top 100 posts</option>
	</select>
		<h5 class="card-title  bg-bold" style="padding: 10px; font-size: 12px;">NEW POSTS</h5>

		<a class="dropdown-item text-info" href="#" id="<?php echo $result[1];?>_new" onclick="filter(this.id)">  <i class="fa fa-sort-numeric-up-alt"></i> New</a>
		<label for="">Filter</label>
		<select class="form-control" name="">
			<option value="<?php echo $result[1]?>_new">All Date</option>
			<option value="<?php echo $result[1]?>_newyes">Yesterday</option>
			<option value="<?php echo $result[1]?>_newl7">Last 7 days</option>
			<option value="<?php echo $result[1]?>_newl30">Last 30 days</option>
			<option value="<?php echo $result[1]?>_new10">last 10 posts</option>
			<option value="<?php echo $result[1]?>_new20">Last 20 posts</option>
			<option value="<?php echo $result[1]?>_new50">Last 50 posts</option>
			<option value="<?php echo $result[1]?>_new100">Last 100 posts</option>
		</select>

<br>
</div>


							</div>
      </div>
      <div class="col-md-6 gedf-main">
	  <?php require 'public/layouts/wysiwygrawdev.php'; ?>
	  <?php require_once 'public/layouts/postDiv.php';?>
        <div class="" id="post_wrapper_div">

        </div>
      </div>
      <div class="col-md-3 mobHide ">
        <div style="position: sticky; position: -webkit-sticky; top: 57px;">
             	<div class="card gedf-card" style="">
    				<div class="card-body " style="padding: 10px;">
							<div class="media mb-2"><img width="32" height="32" class="rounded-circle mr-3 topCommunity" src="/public/images/community-images/<?php echo $data['img_url'];?>" alt="<?php echo $data['name']; ?>"><div class="media-body"><h5 style="font-weight: lighter; cursor: pointer;" class="mt-0 "><?php echo $data['name']; ?> </h5></div></div>
							<div class="row">
									<div class="col-6">
										<?php echo  $data['member_count']?> <br><small>Members</small>
									</div>
									<!-- <div class="col-6" style="border-left: 1px solid #f8f8f8;">
										1 <br><small>Online</small>
									</div> -->
							</div>
				<p class="card-text fourteenpx">
<?php echo  $data['description']?>
</p>
        <button class="btn btn-info btn-block btn-sm" id="<?php echo $result[1]; ?>" onclick="joinCommunityString(this.id)">Join</button>
    </div>
</div>

                <div class="card gedf-card">
                    <div class="card-body">
                        <h5 class="card-title tenpx">USEFUL RESOURCES</h5>
  									</div>
                </div>

								<div class="card gedf-card">
										<div class="card-body">
												<h5 class="card-title tenpx">MODERATORS</h5>
										</div>
								</div>
								<?php require_once 'public/layouts/footer-links.php'; ?>
									</div>
      </div>
    </div>
 </div>
 <script type="text/javascript" src="/public/js/func.js?v=<?php echo $version;?>"></script>
 <script type="text/javascript" src="/public/js/group.js?v=<?php echo $version;?>"></script>
 <script>
 fetch_community_joined();
 </script>
 <?php
 require_once 'public/layouts/footer.php';
 ?>
