<?php

if (isset($_COOKIE['auth'])) {
	$loggedIn =  true;
} else {
	$loggedIn =  false;
}
// echo "<pre>";
// print_r($data);
// echo "</pre>";


if ($data['post_type'] == "image") {
	$result = preg_split('/-/', $data['post_images'], -1, PREG_SPLIT_NO_EMPTY);

	if ($data['is_multi_image'] == 0) {
		$namespae_site_image = "https://kemfe.com/public/images/post-images/" . trim($result[0]);
	} else if ($data['is_multi_image'] == 1) {
		$namespae_site_image = "https://kemfe.com/public/images/post-images/" . trim($result[0]);
	}
	// Display result 

} else if ($data['post_type'] == "url") {
	$namespae_site_image = $data['post_images'];
}

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
	$link = "https";
else
	$link = "http";

// Here append the common URL characters. 
$link .= "://";

// Append the host(domain name, ip) to the URL. 
$link .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL 
$link .= $_SERVER['REQUEST_URI'];

// Print the link 
$namespae_site_url = $link;
$namespae_site_title = $data['post_title'];




// echo "<pre>";
// var_dump($data);

$data_type = $data["type"];
$down =  "fa-arrow-down";
$up =  "fa-arrow-up";

if ($data_type == "upvote") {
	$up =  "fa-check";
} else if ($data_type == "downvote") {
	$down =  "fa-check";
}
$isB = "";
$up_vote = countK($data['up_vote']);
$post_author = $data['post_author'];
$post_auth_id = $data['id'];
$downv_id = "downvote_{$post_auth_id}_{$post_author}";
$upv_id = "upvote_{$post_auth_id}_{$post_author}";
$pst_earnings = number_format($data['post_earnings'], 2);
$cid = "vote_count_{$post_auth_id}";
if ($data['type'] == "upvote" || $data['type'] == "downvote") {
	$isB = "disabled";
} else {
	$isB = 'onclick="vote(this.id)"';
}
$bbb = "
<span><button class=\"btn btn-sm btn-success\"  {$isB}  id=\"{$upv_id}\"><i class=\"fas {$up}\"></i> </button> </span>
<span id=\"{$cid}\">{$up_vote}</span>
<span><button class=\"btn btn-sm btn-outline-danger\" {$isB} id=\"{$downv_id}\"><i class=\"fas {$down}\" ></i> </button> </span>
";
$money = "<div class=\"pstearn btn\"><span class=\"badge badge-default badge-pill\" style=\"font-size: 12px;\"> (₦ {$pst_earnings}) {$pst_earnings} KFC</span></div>";
?>
<?php require_once 'public/layouts/head.php'; ?>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5d48117f3387b20012d768e8&product=inline-share-buttons' async='async'></script>

<link href="/public/css/comments.css" rel="stylesheet">
<link href="/public/css/grid.css?v=<?php echo $version; ?>" rel="stylesheet">

<style>
	.txtTillContent img {
		max-width: 100% !important;
		height: auto !important;
		;
	}

	.btn_wrapper button.pstDown {
		color: #dc3545 !important;
	}


	.btn_wrapper button.pstUp {
		color: #20c997 !important;
		margin: 0px;
	}
</style>
<?php require_once 'public/layouts/edit.php'; ?>
<div class="container-fluid" style="background: rgba(68,78,89,0.5); min-height: 92vh;">
	<div class="container">
		<div class="rPostHeader" style="background:#1c1c1c; color: white; padding: 10px; overflow: hidden;">
			<span> <span><?php echo $money; ?></span>
			</span> <span style=" float: right;"><a href="/" class="btn btn-sm btn-outline-warning"> <i class="fas fa-times"></i> Close </a></span>
		</div>

		<div class="rPostContent" style="background:#DAE0E6; padding: 10px; overflow: hidden;">
			<div class="row">
				<div class="col-md-8 ">


					<div class="bg-white mt-4" style="padding: 10px; border-radius: 4px;">
						<div class="row">

							<div class="col-md-1 text-center">
								<span>
									<!--The button --> <?php echo $bbb; ?></span>
							</div>
							<div class="col-md-11">
								<div class="">
									<div class="media mb-2">


										<?php echo format_post($data); ?>







										<div id="">
											<div class="sharethis-inline-share-buttons mb-2"></div>
											<form id="cs_form_dynamics" class="cs_form_dynamics">
												<!--<div class="row" >
										<div class="col-md-10">
											<input type="text" name="text" class="textBoxClass" id="commentBox"  placeholder="Write a comment">
										</div>
										<div class="col-md-2" style="text-align: right;">
											<button class="btn-add-post-type btptimage" type="button"></button>
											<button class="btn-add-post-type btptgif" type="button"></button>
										</div>
									</div>
									'<div class="row" >'+
				            '<div class="col-md-10">'+
				              '<input type="text" name="text" class="textBoxClass" id="commentBox_2"  placeholder="Write a comment">'+
				            '</div>'+
				            '<div class="col-md-2" style="text-align: right;">'+
				              '<button class="btn-add-post-type btptimage" type="button"></button>&nbsp;'+
				              '<button class="btn-add-post-type btptgif" type="button"></button>'+
				            '</div>'+
				          '</div>'+

								 -->
												<div class="newCome_wrapper" style="">
													<div class="input-group">
														<div class="input-group-append">
															<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
														</div>
														<textarea name="text" id="commentBox" class="form-control type_msg" placeholder="Type your message..."></textarea>
														<div class="input-group-append" id="boo">
															<span class="input-group-text send_btn" id="send_btn"><i class="fas fa-location-arrow"></i></span>
														</div>
													</div>
												</div>

												<input type="hidden" id="parent_id" name="parent_id" value="0" />
												<input type="hidden" name="comment_type" value="text_comment" />

												<input type="hidden" name="post_id" id="post_id_server" value="<?php echo $data['id']; ?>" />
											</form>
										</div>

									</div>



								</div>

								<div id="output" style="padding: 20px;"></div>
							</div>

						</div>
					</div>
					<div class="col-md-4">
						<div class="card mt-4" style="padding: 5px;">
							<h4 class="text-uppercase tenpx">Advertisement</h4>
							<img src="/public/images/kemfe-300-250.png" class="card-img-top img-fluid" alt="...">

						</div>

						<div class="card mt-4" style="padding: 5px;">
							<h4 class="text-uppercase tenpx">Advertisement</h4>
							<img src="/public/images/instafinex-300x250.jpg" class="card-img-top img-fluid" alt="...">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="tipUser" tabindex="-1" role="dialog" aria-labelledby="tipUserModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tipUserModalLabel">Tip User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<input type="number" id="tip_amount" placeholder="Enter amount" class="form-control">
					<input type="hidden" id="post_a" value="<?php echo $post_author; ?>">
					<input type="hidden" id="post_a_id" value="<?php echo $post_auth_id; ?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary btn-sm tipUser_btn" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary btn-sm" id="tipUserBtn" onclick="tipUSer()"><i class="fas fa-arrow-right"></i> Send</button>
				</div>
			</div>
		</div>
	</div>
	<script src="/public/js/commentFeeds.js?v=<?php echo $version; ?>"></script>
	<script src="/public/js/tip.js?v=<?php echo $version; ?>"></script>

	<?php

	require_once 'public/layouts/footer.php';
	?>