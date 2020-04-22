<?php
$version = "0.2.4";
if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
	global $db;


	$name = $_COOKIE['auth'];
	$decrypted_user =	my_decrypt($name, KEY);

	$sql = "SELECT COUNT(distinct refer.id) AS referred_user, COUNT(distinct espals_community_post.id) AS posts, user.*,  COUNT(distinct  t.id) AS following, COUNT( distinct f.id) AS followers ";
	$sql .= " FROM user LEFT JOIN espals_community_post ON user.id = espals_community_post.post_author ";
	$sql .= " LEFT JOIN refer ON user.id = refer.referred_by AND refer.referred_by = {$decrypted_user} ";
	$sql .= " LEFT JOIN espals_follow_system t ON user.id = t.user ";
	$sql .= " LEFT JOIN espals_follow_system f ON user.id = f.following ";
	$sql .= " WHERE user.id = {$decrypted_user} ";

	$data_user_data = $db->fetchQuery($db->query($sql));
}

$popular_icon = '<svg class="svg-icon-2" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><polygon points="12.5 3.5 20 3.5 20 11 17.5 8.5 11.25 14.75 7.5 11 2.5 16 0 13.5 7.5 6 11.25 9.75 15 6"></polygon></svg>';

$new_icon = '<svg class="svg-icon-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M1.25,17.5V7.5h5v10Zm11.25,0h-5V5H5l5-5,5,5H12.5Zm1.25,0v-5h5v5Z"></path></svg>';

$sponsored_icon = '<svg class="svg-icon-2" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Espals Sponsored</title><path d="M13.535 15.785c-1.678.244-2.883.742-3.535 1.071v-5.113a2 2 0 0 0-2-2H4.217c.044-.487.076-1.016.076-1.629 0-1.692-.489-2.968-.884-3.722L4.8 3.001H10v4.742a2 2 0 0 0 2 2h3.783c.06.67.144 1.248.22 1.742.097.632.182 1.177.182 1.745 0 1.045-.829 2.291-2.65 2.555m5.028-12.249l-2.242-2.242a1 1 0 0 0-.707-.293H4.386a1 1 0 0 0-.707.293L1.436 3.536a1 1 0 0 0-.069 1.337c.009.011.926 1.2.926 3.241 0 1.304-.145 2.24-.273 3.065-.106.684-.206 1.33-.206 2.051 0 1.939 1.499 4.119 4.364 4.534 2.086.304 3.254 1.062 3.261 1.065a1.016 1.016 0 0 0 1.117.004c.011-.007 1.18-.765 3.266-1.069 2.864-.415 4.363-2.595 4.363-4.534 0-.721-.099-1.367-.206-2.051-.128-.825-.272-1.761-.272-3.065 0-2.033.893-3.199.926-3.241a.999.999 0 0 0-.07-1.337"></path></svg>';
$user_icon = '<svg class="svg-icon-2" viewBox="0 0 250 250" xmlns="http://www.w3.org/2000/svg"><g fill="inherit"><path d="M146.8 142.6h-37.6c-31.1 0-56.5 25.3-56.5 56.5 0 5.2 4.2 9.4 9.4 9.4h131.8c5.2 0 9.4-4.2 9.4-9.4 0-31.2-25.3-56.5-56.5-56.5zM128 130.7c20.1 0 36.4-16.3 36.4-36.4v-9.4c0-20.1-16.3-36.4-36.4-36.4S91.6 64.8 91.6 84.9v9.4c0 20.1 16.3 36.4 36.4 36.4z"></path></g></svg>';
?>
<!DOCTYPE html>
<html>

<head>

	<?php
	require_once 'public/layouts/boilerplate.php';

	?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143088108-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-143088108-1');
	</script>
	<title><?php if (isset($namespae_site_title)) {
				echo $namespae_site_title;
			} else {
				echo "Kemfe.com | Online Community";
			} ?></title>
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php if (isset($namespae_site_title)) {
											echo $namespae_site_title;
										} else {
											echo "Kemfe.com | Online Community";
										} ?>" />
	<meta property="og:description" content="<?php if (isset($namespae_site_desc)) {
													echo $namespae_site_desc;
												} else {
													echo "";
												} ?>" />
	<meta property="og:url" content="<?php if (isset($namespae_site_url)) {
											echo $namespae_site_url;
										} else {
											echo "https://kemfe.com/";
										} ?>" />
	<meta property="article:section" content="<?php if (isset($namespae_site_section)) {
													echo $namespae_site_section;
												} else {
													echo "AskKemfe";
												} ?>" />
	<meta property="article:published_time" content="<?php if (isset($namespae_site_section)) {
															echo $namespae_site_section;
														} else {
															echo "";
														} ?>" />
	<meta property="og:image" content="<?php if (isset($namespae_site_image)) {
											echo $namespae_site_image;
										} else {
											echo "https://kemfe.com/images/public/bg_q2.jpg";
										} ?>" />
	<meta property="og:image:secure_url" content="<?php if (isset($namespae_site_image)) {
														echo $namespae_site_image;
													} else {
														echo "https://kemfe.com/public/images/bg_q2.jpg";
													} ?>" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="<?php if (isset($namespae_site_desc)) {
													echo $namespae_site_desc;
												} else {
													echo "";
												} ?>" />
	<meta name="twitter:title" content="<?php if (isset($namespae_site_title)) {
											echo $namespae_site_title;
										} else {
											echo "Kemfe.com | Online Community";
										} ?>" />
	<meta name="twitter:image" content="<?php if (isset($namespae_site_image)) {
											echo $namespae_site_image;
										} else {
											echo "https://kemfe.com/public/images/bg_q2.jpg";
										} ?>" />
</head>

<body>


	<nav class="navbar navbar-expand-sm fixed-top  navbar-light bg-light" style="background-color: white !important;     border-bottom: 1px solid rgba(0,0,0,0.25);">
		<a class="navbar-brand" href="/">
			<img src="/public/images/espals-logo.png" width="30" height="30" alt="logo">
			<b id="logo-text" class="text-info">kemfe</b>
		</a>
		<div class="social-part" id="dropdownlist">
			<div class="dropdown">
				<button type="button" class="btn btn-outline-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
					<i class="fa fa-thumbtack text-warning"></i> <span id="dropdownlist_text"> Trending</span>
					<span></span> <span class="fas fa-caret-down" id="dropdownlist_caret" style="float: right; margin-top: 5px;"></span>
				</button>
				<div class="dropdown-menu" style="max-height: 400px; overflow: auto;">
					<input style=" border: 1px solid rgb(237, 239, 241);
    background-color: rgb(246, 247, 248); width: 90%; margin: 0 auto; border-radius: 0; height: 26px;" class="form-control mt-2 mb-2" type="search" placeholder="Filter" id="filter_header" aria-label="Search">
					<h5 class="dps">Kemfe Feeds</h5>
					<a class="dropdown-item" href="/r/popular"> <i class="fa fa-arrow-up text-primary"></i> Popular</a>
					<a class="dropdown-item" href="/r/hot"><i class="fa fa-fire text-danger"></i> Hot</a>
					<a class="dropdown-item" href="/r/trending"><i class="fa fa-sort-amount-up-alt text-info"></i> Trending</a>
					<a class="dropdown-item" href="/r/new"><i class="fa fa-sort-numeric-up-alt text-success"></i> New</a>

					<h5 class="dps mt-2 mb-2">Other</h5>
					<a class="dropdown-item" href="https://instafinex.com/trade?PairName=KFC-NGN"> <img src="/public/images/espals-logo.png" width="22" height="22" alt="logo"> Buy/Sell KFC </a>
					<a class="dropdown-item" href="#"><svg class="svg-icon" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
							<title>Kemfe Sponsored</title>
							<path d="M13.535 15.785c-1.678.244-2.883.742-3.535 1.071v-5.113a2 2 0 0 0-2-2H4.217c.044-.487.076-1.016.076-1.629 0-1.692-.489-2.968-.884-3.722L4.8 3.001H10v4.742a2 2 0 0 0 2 2h3.783c.06.67.144 1.248.22 1.742.097.632.182 1.177.182 1.745 0 1.045-.829 2.291-2.65 2.555m5.028-12.249l-2.242-2.242a1 1 0 0 0-.707-.293H4.386a1 1 0 0 0-.707.293L1.436 3.536a1 1 0 0 0-.069 1.337c.009.011.926 1.2.926 3.241 0 1.304-.145 2.24-.273 3.065-.106.684-.206 1.33-.206 2.051 0 1.939 1.499 4.119 4.364 4.534 2.086.304 3.254 1.062 3.261 1.065a1.016 1.016 0 0 0 1.117.004c.011-.007 1.18-.765 3.266-1.069 2.864-.415 4.363-2.595 4.363-4.534 0-.721-.099-1.367-.206-2.051-.128-.825-.272-1.761-.272-3.065 0-2.033.893-3.199.926-3.241a.999.999 0 0 0-.07-1.337"></path>
						</svg> Sponsored</a>
					<h5 class="dps">Top Communities</h5>
					<div id="pour_community"></div>
				</div>
			</div>

		</div>
		<div class="">
			<form class="form-inline" method="get" action="/search">
				<button class="btn btn-info" type="submit"><i class="fas fa-search"></i></button>
				<input class="form-control" name="search" type="search" placeholder="Search Kemfe" aria-label="Search">

			</form>
		</div>
		<a href="/r/popular" title="Popular posts" class="btn listBtn btn-sm listBtnLM"><i class="fa fa-thumbtack text-warning"></i> </a>
		<a href="/r/hot" title="Hot posts" class="btn listBtn btn-sm"><i class="fa fa-fire text-danger"></i> </a>
		<a href="/r/trending" title="Trending posts" class="btn listBtn btn-sm "><i class="fa fa-sort-amount-up-alt text-info"></i> </a>
		<a href="/r/new" title="New posts" class="btn listBtn btn-sm "><i class="fa fa-sort-numeric-up-alt text-success"></i> </a>


		<span id="sepHeader" style="border-left: 1px solid rgb(237, 239, 241);; height: 36px; margin-left: 10px;"></span>
		<?php
		if ($loggedIn == false) {
			?>
			<a href="/" class="btn  btn-sm rlBtn btn-primary myBtnStyle myright">LOG IN </a>
			<a href="/" class="btn  btn-sm rlBtn btn-outline-warning myBtnStyle myright">SIGN UP </a>

		<?php
		} else if ($loggedIn == true) {

			?>
			<a href="" class="btn listBtn btn-sm listBtnLM text-warning"> <i class="fas fa-comment"></i> </a>
			<a href="" class="btn listBtn btn-sm"> <i class="fas fa-envelope"></i> </a>

		<?php
		}
		?>



		<div class="social-part <?php if ($loggedIn == true) : ?>
     	login_dropDown
     <?php endif ?>" id="<?php if ($loggedIn == false) : ?>login_dropDown<?php endif ?>">
			<div class="dropdown">
				<?php
				if ($loggedIn == true) {
					?>
					<button type="button" class="btn btn-outline-default dropdown-toggle mymagR" data-toggle="dropdown">
						<span class="userLoggedInIcon" style="display: none;">
							<?php echo $user_icon ?>
						</span>
						<span class="userStatsHeader"><span style="position: absolute; top: 0; text-transform: capitalize;" class="userInfo"><?php echo $data_user_data['user_id']; ?></span> <small style="position: absolute; top: 15px; left: 34px;     color: rgb(168, 170, 171);
"> <?php echo niajaFormat(number_format($data_user_data['earnings'], 2)); ?> </small></span>
						<span></span> <span class="fas fa-caret-down" id="" style="float: right; margin-top: 5px;"></span>
					</button>

				<?php
				} else {
					?>
					<button type="button" class="btn btn-outline-default dropdown-toggle mymagR" data-toggle="dropdown">
						<?php echo $user_icon; ?>
						<span></span> <span class="fas fa-caret-down" id="" style="float: right; margin-top: 5px;"></span>
					</button>
				<?php
				}

				?>
				<div class="dropdown-menu">
					<?php if ($loggedIn == true) { ?>
						<h5 class="dps">My Stuff</h5>
						<a class="dropdown-item" href="/user/<?php echo strtolower($data_user_data['user_id']) ?>"> <i class="fas fa-user text-info"></i> &nbsp; All Info</a>
						<a class="dropdown-item" href="/account"><i class="fas fa-user-circle text-dark"></i> &nbsp; My Account</a>
						<a class="dropdown-item" href="/settings"><i class="fas fa-cog text-primary"></i> &nbsp; Settings</a>
						<?php



							if ($data_user_data['has_community'] == 1) {
								?>
							<h5 class="dps">Manage</h5>
							<a class="dropdown-item" href="/manage/"><i class="fas fa-assistive-listening-systems text-danger"></i> &nbsp; My Community</a>

						<?php
							}

							?>

						<?php
							if ($data_user_data['is_mod'] == 5) {
								?>

							<a class="dropdown-item" href="/manage/moderate"><i class="fas fa-user-secret text-success"></i> &nbsp; Moderate Community</a>

					<?php
						}
					}
					?>

					<h5 class="dps">More Stuff</h5>
					<a class="dropdown-item" href="/regulations/how-it-works"> <i class="fas fa-info-circle text-info"></i> &nbsp;How it works</a>
					<a class="dropdown-item" href="/premium"> <i class="fas fa-shield-alt text-warning"></i> &nbsp; Power Up</a>
					<a class="dropdown-item" href="/regulations/about-us"> <i class="fas fa-users text-danger"></i> &nbsp; About Us</a>



					<div class="dropdown-divider">


					</div>

					<?php
					if ($loggedIn == true) {
						if (strtolower($data_user_data['user_code']) == "kemfe.com@gmail.com" || strtolower($data_user_data['user_code']) == "dteweb@outlook.com") {
							?>

							<h5 class="dps">Admin Link</h5>
							<a class="dropdown-item" href="/storekeeper/"><i class="fas fa-user-secret text-info"></i> &nbsp; Manage Admin</a>

					<?php
						}
					}
					?>
					<a class="dropdown-item" href="/logout"> <i class="fas fa-key text-danger"></i> &nbsp; Logout</a>
				</div>
			</div>

		</div>

		</div>

	</nav>
	<br>
	<br>