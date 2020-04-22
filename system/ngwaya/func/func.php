<?php
require_once(LIB_PATH . DS . 'dbclass' . DS . 'dbclass.php');

date_default_timezone_set('Africa/Lagos');
$currtime2 = time();
$currtime = date('Y-m-d H:i:s', $currtime2);
//Use to redirect user to a specified location.


function curl_without_auth($var = null)
{
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => 'http://kemfe.com:8000/' . $var,
		//CURLOPT_URL => 'http://localhost:7000/' . $var,
		CURLOPT_USERAGENT => 'server'
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) { } else {
		return $response;
	}
}


function slugify($text)
{
	// replace non letter or digits by -
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	// trim
	$text = trim($text, '-');

	// remove duplicate -
	$text = preg_replace('~-+~', '-', $text);

	// lowercase
	$text = strtolower($text);

	if (empty($text)) {
		return 'n-a';
	}

	return $text;
}

function makeWithdrawal($user,  $name, $amount, $time)
{
	global $db;
	$commit = false;
	$db->autoCommit();

	$check_balance_query_string = "SELECT COUNT(id) AS count_user FROM `user` WHERE `id` = {$user} AND `earnings` >= {$amount} ";
	$check_balance_execute_query = $db->query($check_balance_query_string);
	$get_balance = $db->fetchQuery($check_balance_execute_query);

	if ($get_balance['count_user'] == 1) {
		//(`id`, `name`, `bank`, `number`, `amount`, `user`, `date`)
		$add_withdrawal_query_string = "INSERT INTO `espals_withdrawal` VALUES (null, '{$name}','ETH','KFC',{$amount},{$user},0,'{$time}')";
		$deduct_earnings_query_string = "UPDATE `user` SET `earnings` = `earnings` - {$amount} WHERE `user`.`id` = '{$user}';";
		$add_withdrawal_query = $db->query($add_withdrawal_query_string);
		$q1 = $db->affectedRows();

		if ($q1 > 0) {
			//  echo "succeeded at 1";
			$commit = true;
		} else {
			//echo $add_withdrawal_query_string;
			$commit = false;
		}

		$deduct_earnings_query = $db->query($deduct_earnings_query_string);
		$q2 = $db->affectedRows();

		if ($q2 > 0) {
			//  echo "succeeded at 2";
			$commit = true;
		} else {
			$commit = false;
		}

		if ($q1 > 0 && $q2 > 0) {
			$db->Commit();
			$commit = true;
		} else {
			$db->RollBack();
			$commit = false;
		}
		return $commit;
	}
}


function makeclaim($user,  $claim_id, $claim_amount)
{
	global $db;
	$commit = false;
	$db->autoCommit();

	$update_vote_query_string = "UPDATE `espals_community_vote` SET `isclaimed` = true WHERE `id` = '{$claim_id}' AND 	`earn` >= '{$claim_amount}' AND `isclaimed` = false;";
	$credit_earnings_query_string = "UPDATE `user` SET `earnings` = `earnings`+ {$claim_amount} WHERE `user`.`id` = '{$user}';";
	$db->query($update_vote_query_string);
	$q1 = $db->affectedRows();

	if ($q1 > 0) {
		//  echo "succeeded at 1";
		$commit = true;
	} else {
		//echo $add_withdrawal_query_string;
		$commit = false;
	}

	$db->query($credit_earnings_query_string);
	$q2 = $db->affectedRows();

	if ($q2 > 0) {
		//  echo "succeeded at 2";
		$commit = true;
	} else {
		$commit = false;
	}

	if ($q1 > 0 && $q2 > 0) {
		$db->Commit();
		$commit = true;
	} else {
		$db->RollBack();
		$commit = false;
	}
	return $commit;
}


function tipUser($user, $post_author, $post_id, $tip_amount, $time)
{
	global $db;
	$commit = false;
	$db->autoCommit();

	$deduct_query_string = "UPDATE `user` SET `earnings` = `earnings`- {$tip_amount} WHERE `user`.`id` = '{$user}' AND `earnings` >= {$tip_amount}";
	$credit_earnings_query_string = "UPDATE `user` SET `earnings` = `earnings`+ {$tip_amount} WHERE `user`.`id` = '{$post_author}';";
	$update_transaction = "INSERT INTO `espals_transaction`(`id`, `user_id`, `message`, `redirecturl`, `reference`, `response`, `status`, `trans`, `trxref`, `amount`, `date`)
	 VALUES (null,'{$user}','post tip','NA','{$post_author}','{$post_id}',1,'NA','NA','{$tip_amount}','{$time}')";

	// echo $deduct_query_string;
	// echo $credit_earnings_query_string;
	// echo $update_transaction;

	$db->query($deduct_query_string);
	$q1 = $db->affectedRows();


	if ($q1 > 0) {
		//echo "succeeded at 1";
		$commit = true;
	} else {

		//echo $add_withdrawal_query_string;
		$commit = false;
	}

	$db->query($credit_earnings_query_string);
	$q2 = $db->affectedRows();

	if ($q2 > 0) {
		//echo "succeeded at 2";
		$commit = true;
	} else {
		$commit = false;
	}

	$db->query($update_transaction);
	$q3 = $db->affectedRows();

	if ($q1 > 0 && $q2 > 0 && $q3 > 0) {
		$db->Commit();
		$commit = true;
	} else {
		$db->RollBack();
		$commit = false;
	}
	return $commit;
}


function powerUpAndRebate($amount, $user, $referal)
{
	global $db;
	$commit = false;
	$db->autoCommit();

	$do_power_up = "UPDATE `user` SET `earnings` = `earnings`- {$amount},  `power` = `power` + {$amount} WHERE `user`.`id` = '{$user}' AND `earnings` >= {$amount}";

	$rebate = "UPDATE `user` SET `earnings` = `earnings`+ {$amount} WHERE `user`.`id` = '{$referal}'";

	$referalTable = "UPDATE `refer` SET `earned` = `earned`+ {$amount} WHERE `refer`.`referred_by` = '{$referal}'";

	$db->query($do_power_up);
	$q1 = $db->affectedRows();

	$db->query($rebate);
	$q2 = $db->affectedRows();

	$db->query($referalTable);
	$q3 = $db->affectedRows();


	if ($q1 > 0 && $q2 > 0 && $q3 > 0) {
		$db->Commit();
		$commit = true;
	} else {
		$db->RollBack();
		$commit = false;
	}
	return $commit;
}

function powerUpOnly($amount, $user)
{
	global $db;
	$commit = false;
	$db->autoCommit();

	$do_power_up = "UPDATE `user` SET `earnings` = `earnings`- {$amount},  `power` = `power` + {$amount} WHERE `user`.`id` = '{$user}' AND `earnings` >= {$amount}";

	//$rebate = "UPDATE `user` SET `earnings` = `earnings`- {$amount} WHERE `user`.`id` = '{$referal}'";



	$db->query($do_power_up);
	$q1 = $db->affectedRows();




	if ($q1 > 0) {
		$db->Commit();
		$commit = true;
	} else {
		$db->RollBack();
		$commit = false;
	}
	return $commit;
}


function makeDeposit($amount, $user, $hash, $date)
{
	global $db;
	$commit = false;
	$db->autoCommit();

	$do_power_up = "UPDATE `user` SET `earnings` = `earnings` + {$amount} WHERE `user`.`id` = '{$user}'";

	$tx =  "INSERT INTO `espals_transaction`(`id`, `user_id`, `message`, `redirecturl`, `reference`, `response`, `status`, `trans`, `trxref`, `amount`, `date`) VALUES (null,{$user},'KFC PAYMENT','nill','nill','nill',1,'nill','{$hash}',{$amount},'{$date}')";
	//$rebate = "UPDATE `user` SET `earnings` = `earnings`- {$amount} WHERE `user`.`id` = '{$referal}'";



	$db->query($do_power_up);
	$q1 = $db->affectedRows();


	$db->query($tx);
	$q2 = $db->affectedRows();


	if ($q1 > 0 && $q2 > 0) {
		$db->Commit();
		$commit = true;
	} else {
		$db->RollBack();
		$commit = false;
	}
	return $commit;
}



function do_approva_or_delete($loggedIn_user,	$type,	$post_id)
{
	global $db;
	$commit = false;
	$sql = "";
	$approve = "UPDATE `espals_community_post` SET `is_approve` = '1' WHERE `espals_community_post`.`id` = {$post_id};";
	$delete = "DELETE FROM `espals_community_post` WHERE `id` = {$post_id}";

	if ($type == "delete") {
		$sql = $delete;
	} else if ($type == "approve") {
		$sql = $approve;
	}

	if ($db->query($sql)) {
		$commit = true;
	} else {
		$commit = false;
	}

	return $commit;
}
function get_reward_point($type)
{
	global $db;
	$sql = "SELECT `point` FROM `espal_reward_point` WHERE `type` = '{$type}' LIMIT 1";

	$run_query =  $db->query($sql);
	$get_point = $db->fetchQuery($run_query);

	return (float) $get_point['point'];
}


function get_transaction_hash($hash)
{
	global $db;
	$sql = "SELECT COUNT(`id`) AS counts FROM `espals_transaction` WHERE `trxref` = '{$hash}' LIMIT 1";

	$run_query =  $db->query($sql);
	$get_point = $db->fetchQuery($run_query);

	return (float) $get_point['counts'];
}

function get_referal_id($user)
{
	global $db;
	$sql = "SELECT `referred_by` FROM `refer` WHERE `user` = '{$user}' LIMIT 1";

	$run_query =  $db->query($sql);
	$get_point = $db->fetchQuery($run_query);

	return (float) $get_point['referred_by'];
}


function join_community_by_community_name($type)
{
	global $db;
	$sql = "SELECT `id` FROM `espals_community_category` WHERE `name` = '{$type}' LIMIT 1";

	$run_query =  $db->query($sql);
	$get_id = $db->fetchQuery($run_query);

	return (int) $get_id['id'];
}



function get_community_restriction($id)
{
	global $db;
	$rt_id = (int) $id;
	$sql = "SELECT `user_id`,`restriction` FROM `espals_community_category` WHERE `id` = {$rt_id}";

	$run_query =  $db->query($sql);
	$get_data = $db->fetchQuery($run_query);

	return $get_data;
}


function get_post_author_by_post_id($post_id)
{
	global $db;
	$sql = "SELECT `post_author` FROM `espals_community_post` WHERE `id` = '{$post_id}' LIMIT 1";

	$run_query =  $db->query($sql);
	$get_post_author = $db->fetchQuery($run_query);

	return $get_post_author['post_author'];
}

function update_notification($type, $status, $user)
{
	global $db;
	$rt_status = $status;
	$status_to_int = ($status == "on") ? 0 : 1;

	if ($rt_status == "on") {
		$rt_status = 0;
	} else {
		$rt_status = 1;
	}
	$commit = false;

	$insert_notification_query = "INSERT INTO `espals_notifications` (`id`, `user_id`, `type`, `status`, `date`) VALUES (NULL, '{$user}', '{$type}', '{$rt_status}', CURRENT_TIMESTAMP);";
	$update_notification_query = "UPDATE `espals_notifications` SET `status` = '{$status_to_int}' WHERE `type` = '{$type}' AND `user_id` = '{$user}';";


	$run_update_notification_query =  $db->query($update_notification_query);
	$q1 = $db->affectedRows();
	if ($q1 == 0) {
		$run_insert_notification_query =  $db->query($insert_notification_query);
		$q2 = $db->affectedRows();
		if ($q2 > 0) {
			$commit = true;
		}
	} else {
		$commit = true;
	}

	return $commit;
}

function user_already_block($user)
{
	global $db;
	$query_string = "SELECT COUNT(`id`) AS exist_count FROM `espals_block_user` WHERE `blocked_user` = '{$user}' ";
	$run_query =  $db->query($query_string);
	$get_query_count = $db->fetchQuery($run_query);

	return ($get_query_count['exist_count'] > 0) ? true : false;
}
function block_user($blocked_user, $type, $user)
{
	global $db;

	if ($type == 1) {
		$dynamic_query = "INSERT INTO `espals_block_user` (`id`, `blocked_user`, `user`, `date`) VALUES (NULL, '{$blocked_user}', '{$user}', CURRENT_TIMESTAMP);";
	} else {
		$dynamic_query = "DELETE FROM `espals_block_user` WHERE `espals_block_user`.`blocked_user` = '{$blocked_user}'";
	}
	$commit = false;



	$run_dynamic_query =  $db->query($dynamic_query);
	$q1 = $db->affectedRows();
	if ($q1 > 0) {
		$commit = true;
	} else {
		$commit = false;
	}

	return $commit;
}


function save_comment_and_reward_user($comment_type, $post_id, $parent_id, $text, $post_currtime, $user)
{
	global $db;
	$commit = false;
	$db->autoCommit();
	$post_author = get_post_author_by_post_id($post_id);
	$get_reward_point =  get_reward_point("comment");
	$poster_share = $get_reward_point / 2;
	$update_post_comment_count = "UPDATE `espals_community_post` SET `post_comment_count` = `post_comment_count` + 1,  `post_earnings` = `post_earnings` + {$poster_share}  WHERE `espals_community_post`.`id` = {$post_id};";

	$insert_comment = "INSERT INTO `espals_community_comment`
  (`id`, `post_id`, `parent_comment_id`, `comment`, `comment_sender_id`,
  `date`, `comment_type`,   `comment_earnings`)
  VALUES (null, '{$post_id}', '{$parent_id}', '{$text}', '{$user}', '{$post_currtime}', '{$comment_type}', {$poster_share} )";

	//$reward_user = "UPDATE `user` SET `earnings` = `earnings` + {$poster_share} WHERE `user`.`id` = {$user};";

	//$reward_post_author = "UPDATE `user` SET `earnings` = `earnings` + {$poster_share} WHERE `user`.`id` = {$post_author};";


	$run_query_update_post_comment_count = $db->query($update_post_comment_count);
	$q1 = $db->affectedRows();

	$run_query_insert_comment = $db->query($insert_comment);
	$q2 = $db->affectedRows();

	//   $run_query_reward_user = $db->query($reward_user);
	//   $q3 = $db->affectedRows();

	//   $run_query_reward_post_author = $db->query($reward_post_author);
	//   $q4 = $db->affectedRows();


	if ($q1 > 0  && $q2 > 0) {
		$db->Commit();
		$commit = true;
	} else {
		$db->RollBack();
		$commit = false;
	}

	return $commit;
}


function reward_user_post($post_id, $user)
{
	global $db;
	$commit = false;
	$db->autoCommit();

	$get_reward_point =  get_reward_point("post");
	$poster_share = $get_reward_point;
	$update_post_earnings = "UPDATE `espals_community_post` SET  `post_earnings` = `post_earnings` + {$poster_share}  WHERE `espals_community_post`.`id` = {$post_id};";

	$reward_user = "UPDATE `user` SET `earnings` = `earnings` + {$poster_share} WHERE `user`.`id` = {$user};";


	$run_query_update_post_earnings = $db->query($update_post_earnings);
	$q1 = $db->affectedRows();



	// $run_query_reward_user = $db->query($reward_user);
	// $q3 = $db->affectedRows();




	if ($q1 > 0) {
		$db->Commit();
		$commit = true;
	} else {
		$db->RollBack();
		$commit = false;
	}

	return $commit;
}



function vote_post_count(
	$user_id = "",
	$type = "",
	$post_id = "",
	$post_author = "",
	$date = ""
) {
	global $db;
	$commit = false;
	$db->autoCommit();
	$earn = get_reward_point("upvote");

	$vote = "INSERT INTO `espals_community_vote` VALUES (null,{$user_id},'{$type}',{$post_id}, {$post_author}, {$earn} , false,'{$date}') ";
	$give_earner = "UPDATE `user` SET `earnings` = `earnings` + {$earn} WHERE `user`.`id` = {$post_author};";
	$update_vote_count = "UPDATE `espals_community_post` SET `up_vote` = `up_vote` + 1,  `post_earnings` = `post_earnings` + {$earn}  WHERE `espals_community_post`.`id` = {$post_id};";


	if ($type == "downvote") {
		$give_earner = "UPDATE `user` SET `earnings` = `earnings` + 0 WHERE `user`.`id` = {$post_author};";
		$update_vote_count = "UPDATE `espals_community_post` SET `down_vote` = `down_vote` + 1,  `post_earnings` = `post_earnings` + 0  WHERE `espals_community_post`.`id` = {$post_id};";
	}

	$db->query($vote);
	$q1 = $db->affectedRows();

	if ($q1 > 0) {

		$db->query($update_vote_count);
		$q3 = $db->affectedRows();
		if ($q3 > 0) {

			$db->Commit();
			$commit = true;
		} else {
			$db->RollBack();
		}
	}


	return $commit;
}


function vote_comment_count(
	$user_id = "",
	$type = "",
	$post_id = "",
	$id = "",
	$post_author = "",
	$date = ""

) {
	global $db;
	$commit = false;
	$db->autoCommit();
	$earn = get_reward_point("cupvote");

	$vote = "INSERT INTO `espals_community_vote` VALUES (null,{$user_id},'{$type}',{$id}, {$post_author}, {$earn} , false,'{$date}') ";

	$update_vote_count = "UPDATE `espals_community_comment` SET `comment_upvote` = `comment_upvote` + 1, `comment_earnings` = `comment_earnings` + {$earn}   WHERE `espals_community_comment`.`id` = {$id};";



	if ($type == "commentdownvote") {
		$update_vote_count = "UPDATE `espals_community_comment` SET `comment_upvote` = `comment_downvote` + 0, `comment_earnings` = `comment_earnings` + 0   WHERE `espals_community_comment`.`id` = {$id};";
	}


	$db->query($vote);
	$q1 = $db->affectedRows();

	if ($q1 > 0) {

		$db->query($update_vote_count);
		$q3 = $db->affectedRows();
		if ($q3 > 0) {

			$db->Commit();
			$commit = true;
		} else {
			$db->RollBack();
		}
	}


	return $commit;
}

function orientation($width, $height)
{
	$orientation = "";


	if ((int) $width >= (int) $height) {
		$orientation = 'landscape';
	} else if ((int) $width < (int) $height) {
		$orientation = 'portrait';
	} else {
		if ((int) $height >= 500) {
			$orientation = 'landscape';
		} else if ((int) $height < 500) {
			$orientation = 'landscape';
		}
	}
	return $orientation;
}

function formatUrl($value = '')
{
	$url1 = str_replace(';', '', debioCleanInput(trim(strtolower($value))));
	$url2 = str_replace('.', '', $url1);
	$url77 = str_replace('\'', '', $url2);
	$url3 = str_replace('?', '', $url77);
	$url4 = str_replace('+', '', $url3);
	$urltt = str_replace('&', '', $url4);
	$url5 = str_replace(':', '', $urltt);
	$url5nwe1 = str_replace('=', '', $url5);
	$url5nwe2 = str_replace('+', '', $url5nwe1);
	$url5nwe3 = str_replace('#', '', $url5nwe2);
	$url5nwe4 = str_replace('!', '', $url5nwe3);
	$url5nwe5 = str_replace('*', '', $url5nwe4);
	$url5nwe6 = str_replace('%', '', $url5nwe5);
	$url5nwe7 = str_replace('/', '', $url5nwe6);
	$url5nwe8 = str_replace('\\', '', $url5nwe7);

	$url6 = str_replace(',', '', $url5nwe6);
	$url7 = str_replace('---', '-', $url6);
	$url8 = str_replace('--', '-', $url7);
	$url9 =  str_replace(" ", "-", $url8);
	return $url9;
}
function redirect_to($location = NULL)
{
	if ($location != NULL) {
		header("Location: {$location}");
		exit;
	}
}
function countK($value = '')
{
	$views = $value;
	if ($views > 1000) {
		$views_count = $views * 1 / 1000;
		$views_k = round($views_count, PHP_ROUND_HALF_UP);
		return $views_k;
	} else {
		return $views;
	}
}
function format_post($data = '')
{


	if ($data['post_type'] == "text") {
		return '
	<img width="32" height="32" src="/public/images/community-images/' . $data['img_url'] . '" class="rounded-circle mr-3 topCommunity">
	<div class="media-body">
		<h5 class="mt-0 twelvepx">' . $data['name'] . ' <br><small class="twelvepx">Posted by ' . $data['user_id'] . ' ' . ShowDate(strtotime($data['post_date'])) . ' </small></h5>

	</div></div>
			<h4 class="txtTill">' . $data['post_title'] . '</h4>
			<div class="txtTillContent">' . $data['post_content'] . '
			<div class="mt-2 mb-2"><button class="btn btn-sm btn-link"><i class="fas fa-comments "></i> Comments</button>
			<button class="btn btn-sm btn-link" id="' . $data['id'] . '" onclick="report_post(this.id)"><i class="fas fa-flag "></i> Report</button>
			<button class="btn btn-sm btn-link" data-toggle="modal" data-target="#tipUser">&#8358; Tipping </button></div></div>
	';
	} else if ($data['post_type'] == "image") {
		$images =  $data['post_images'];
		$bg_id =  $data['id'];
		$result = preg_split("/[\s,]+/", trim($images));
		$rs = preg_split("/[\s-]+/", $result[0]);

		if ($data['is_multi_image'] == 1) {

			$result = preg_split("/[\s,]+/", trim($images));
			$image_loop_count = 0;
			$carousel_item = "";
			$orient = "";
			foreach ($result as $value) {
				$is_active = "";

				if ($image_loop_count == 0) {
					$is_active = "active";
				}

				$image_loop_count += 1;
				$rs = preg_split('/-/',  $value, -1, PREG_SPLIT_NO_EMPTY);

				$img_bg = "/public/images/post-images/" . $rs[0];

				if ($image_loop_count == 1) {
					$orient = orientation($rs[1], $rs[2]);
				}



				if (sizeof($result) > 5 && $image_loop_count == 5) {
					$orient = "demo_5";
					$moreCount = sizeof($result) - 5;
					$carousel_item .= '<div onclick="loadSlider(' . $bg_id . ', '  . $image_loop_count . ');" class=""  style="background-image: url(' . $img_bg . ')">
							<div class="moreImages">+' . $moreCount . '</div></div>';
				} else {
					$carousel_item .= '<div onclick="loadSlider(' . $bg_id . ', ' . $image_loop_count . ')" class="' . $is_active . '"  style="background-image: url(' . $img_bg . ')">
							<input type="hidden" id="modalImagesId_' . $bg_id . '" value="' . $images . '">
							</div>';
				}
			}

			return '
			<img width="32" height="32" src="/public/images/community-images/' . $data['img_url'] . '" class="rounded-circle mr-3 topCommunity">
			<div class="media-body">
				<h5 class="mt-0 twelvepx">' . $data['name'] . ' <br><small class="twelvepx">Posted by ' . $data['user_id'] . ' ' . ShowDate(strtotime($data['post_date'])) . ' </small></h5>
		
			</div></div>
					<p class="">' . $data['post_title'] . '</p>
					<div class="txtTillContent">
					<div style="text-align: center;">
					<div id="" class="demo_' . $image_loop_count . ' ' . $orient . '">'  . $carousel_item . '</div>
					</div>
					<div class="mt-2 mb-2"><button class="btn btn-sm btn-link"><i class="fas fa-comments "></i> Comments (' . $data['post_comment_count'] . ')</button>
					<button class="btn btn-sm btn-link" id="' . $data['id'] . '" onclick="report_post(this.id)"><i class="fas fa-flag "></i> Report</button>
					<button class="btn btn-sm btn-link" data-toggle="modal" data-target="#tipUser">&#8358;
		 Tipping </button></div></div>
			';
		} else {
			return '
	<img width="32" height="32" src="/public/images/community-images/' . $data['img_url'] . '" class="rounded-circle mr-3 topCommunity">
	<div class="media-body">
		<h5 class="mt-0 twelvepx">' . $data['name'] . ' <br><small class="twelvepx">Posted by ' . $data['user_id'] . ' ' . ShowDate(strtotime($data['post_date'])) . ' </small></h5>

	</div></div>
			<p class="">' . $data['post_title'] . '</p>
			<div class="txtTillContent">
			<div style="text-align: center;">
			<img class="img-fluid" style=""  src="/public/images/post-images/' . $rs[0] . '" />
			</div>
			<div class="mt-2 mb-2"><button class="btn btn-sm btn-link"><i class="fas fa-comments "></i> Comments (' . $data['post_comment_count'] . ')</button>
			<button class="btn btn-sm btn-link" id="' . $data['id'] . '" onclick="report_post(this.id)"><i class="fas fa-flag "></i> Report</button>
			<button class="btn btn-sm btn-link" data-toggle="modal" data-target="#tipUser">&#8358;
 Tipping </button></div></div>
	';
		}
	} else if ($data['post_type'] == "gif") {
		$images =  $data['post_images'];


		return '
	<img width="32" height="32" src="/public/images/community-images/' . $data['img_url'] . '" class="rounded-circle mr-3 topCommunity">
	<div class="media-body">
		<h5 class="mt-0 twelvepx">' . $data['name'] . ' <br><small class="twelvepx">Posted by ' . $data['user_id'] . ' ' . ShowDate(strtotime($data['post_date'])) . ' </small></h5>

	</div></div>
			<p class="">' . $data['post_title'] . '</p>
			<div class="txtTillContent">
			<div style="text-align: center;">
			<img class="img-fluid" style=""  src="' . $images . '" />
			</div>
			<div class="mt-2 mb-2"><button class="btn btn-sm btn-link"><i class="fas fa-comments "></i> Comments</button>
			<button class="btn btn-sm btn-link" id="' . $data['id'] . '" onclick="report_post(this.id)"><i class="fas fa-flag "></i> Report</button>
			<button class="btn btn-sm btn-link" data-toggle="modal" data-target="#tipUser">&#8358;
 Tipping </button></div></div>
	';
	} else if ($data['post_type'] == "url") {
		$images =  $data['post_images'];


		return '
	<img width="32" height="32" src="/public/images/community-images/' . $data['img_url'] . '" class="rounded-circle mr-3 topCommunity">
	<div class="media-body">
		<h5 class="mt-0 twelvepx">' . $data['name'] . ' <br><small class="twelvepx">Posted by ' . $data['user_id'] . ' ' . ShowDate(strtotime($data['post_date'])) . ' </small></h5>

	</div></div>
	<h5 class="text-left" >' . $data['post_title'] . '<br> <a target="_blank" class="extLink btn btn-link" href="' . $data['external_link'] . '"><i class="fas fa-external-link-square-alt"></i> ' . $data['external_link'] . '</a></h5>

			<div class="txtTillContent">
			<div style="text-align: center;">
			<img class="img-fluid" style=""  src="' . $images . '" />
			</div>

			<div class="mt-2 mb-2"><button class="btn btn-sm btn-link"><i class="fas fa-comments "></i> Comments</button>
			<button class="btn btn-sm btn-link" id="' . $data['id'] . '" onclick="report_post(this.id)"><i class="fas fa-flag "></i> Report</button>
			<button class="btn btn-sm btn-link" data-toggle="modal" data-target="#tipUser">&#8358;
 Tipping</button></div></div>
	';
	} else if ($data['post_type'] == "youtube") {
		$images =  $data['post_images'];
		$parts = parse_url($data['external_link']);

		if ($parts['host'] == "www.youtube.com" || $parts['host'] == "youtube.com") {
			$clean = str_replace("&feature=youtu.be", "", $parts["query"]);
			$clean = str_replace("&feature", "", $clean);
			$clean = str_replace("v=", "/", $clean);
			$youtubeUrl = $clean;
		} else {
			$youtubeUrl = $parts['path'];
		}




		return '
	<img width="32" height="32" src="/public/images/community-images/' . $data['img_url'] . '" class="rounded-circle mr-3 topCommunity">
	<div class="media-body">
		<h5 class="mt-0 twelvepx">' . $data['name'] . ' <br><small class="twelvepx">Posted by ' . $data['user_id'] . ' ' . ShowDate(strtotime($data['post_date'])) . ' </small></h5>

	</div></div>
	<h5 class="text-left" >' . $data['post_title'] . '<br> <a target="_blank" class="extLink btn btn-link" href="' . $data['external_link'] . '"><i class="fas fa-external-link-square-alt"></i> ' . $data['external_link'] . '</a></h5>

			<div class="txtTillContent">
			<div style="text-align: center;">
			<iframe width="100%" height="400px" src="https://www.youtube.com/embed' . $youtubeUrl . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>

			<div class="mt-2 mb-2"><button class="btn btn-sm btn-link"><i class="fas fa-comments "></i> Comments</button>
			<button class="btn btn-sm btn-link" id="' . $data['id'] . '" onclick="report_post(this.id)"><i class="fas fa-flag "></i> Report</button>
			<button class="btn btn-sm btn-link" data-toggle="modal" data-target="#tipUser">&#8358;
 Tipping</button></div></div>
	';
	}
}

function random_strings($length_of_string)
{
	return substr(
		bin2hex(random_bytes($length_of_string)),
		0,
		$length_of_string
	);
}


function ShowDate($timestamp)
{
	$stf = 0;
	$cur_time = time();
	$diff = $cur_time - $timestamp;
	$phrase = array('second', 'minute', 'hour', 'day', 'week', 'month', 'year', 'decade');
	$length = array(1, 60, 3600, 86400, 604800, 2630880, 31570560, 315705600);
	for ($i = sizeof($length) - 1; ($i >= 0) && (($no =  $diff / $length[$i]) <= 1); $i--);
	if ($i < 0) $i = 0;
	$_time = $cur_time  - ($diff % $length[$i]);
	$no = floor($no);
	if ($no <> 1) $phrase[$i] .= 's';
	$value = sprintf("%d %s ", $no, $phrase[$i]);
	if (($stf == 1) && ($i >= 1) && (($cur_time - $_time) > 0)) $value .= time_ago($_time);
	return $value . ' ago ';
}

function get_user_id_by_username($value = '')
{
	global $db;
	$sql = "SELECT id FROM user WHERE user_id = '{$value}'";
	$query = $db->query($sql);
	$rs = $db->fetchQuery($query);
	return (int) $rs['id'];
}

function ShowDateSingle($timestamp)
{
	$stf = 0;
	$cur_time = time();
	$diff = $cur_time - $timestamp;
	$phrase = array('s', 'm', 'h', 'd', 'w', 'm', 'y', 'd');
	$length = array(1, 60, 3600, 86400, 604800, 2630880, 31570560, 315705600);
	for ($i = sizeof($length) - 1; ($i >= 0) && (($no =  $diff / $length[$i]) <= 1); $i--);
	if ($i < 0) $i = 0;
	$_time = $cur_time  - ($diff % $length[$i]);
	$no = floor($no);
	if ($no <> 1) $phrase[$i];
	$value = sprintf("%d %s", $no, $phrase[$i]);
	if (($stf == 1) && ($i >= 1) && (($cur_time - $_time) > 0)) $value .= time_ago($_time);
	return  str_replace(" ", "", $value);
}

function compress_image($source_url, $destination_url, $quality)
{

	$info = getimagesize($source_url);

	if ($info['mime'] == 'image/jpeg')
		$image = imagecreatefromjpeg($source_url);

	elseif ($info['mime'] == 'image/gif')
		$image = imagecreatefromgif($source_url);

	elseif ($info['mime'] == 'image/png')
		$image = imagecreatefrompng($source_url);

	imagejpeg($image, $destination_url, $quality);
	return $destination_url;
}

// Naira format
function niajaFormat($r)
{
	//"&#x20a6;" .
	return  $r . " KFC";
}
// Strips out HTML, javascript and style tags, and Strip multi-line comments,
function debioCleanInput($input)
{
	$search = array(
		'@<script[^>]*?>.*?</script>@si', // Strip out javascript
		'@<[\/\!]*?[^<>]*?>@si', // Strip out HTML tags
		'@<style[^>]*?>.*?</style>@siU', // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@', // Strip multi-line comments
	);
	$output = preg_replace($search, '', $input);
	return $output;
}

function debioCleanInput2($input)
{
	$search = array(
		'@’@si', // Strip out javascript
		'@<[\/\!]*?[^<>]*?>@si', // Strip out HTML tags
		'@<style[^>]*?>.*?</style>@siU', // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@', // Strip multi-line comments
	);
	$output = preg_replace($search, '', $input);
	return $output;
}

function clean_html($value = '')
{
	$search = array(

		'@<script[^>]*?>.*?</script>@si', // Strip out javascript
		'@<style[^>]*?>.*?</style>@siU', // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@', // Strip multi-line comments
		'/<div>(.*?)<\/div>/',
		'/<br>(.*?)/',
	);

	$output = preg_replace($search, '$1', $value);
	return $output;
}
function debioCleanInput21($input)
{
	$search = array(

		'@<script[^>]*?>.*?</script>@si', // Strip out javascript
		'@<style[^>]*?>.*?</style>@siU', // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@', // Strip multi-line comments
	);
	$output = preg_replace($search, '', $input);
	return $output;
}

//Includes specified template name

function getTemplateByName($tName = "")
{

	require_once(SITE_ROOT . DS . 'new' . DS . 'layout' . DS . $tName);
}

function check_if_obj_exits($colname = "", $objname = "")
{
	global $db;
	$colname = $db->SQLEscape($colname);
	$objname = $db->SQLEscape($objname);

	$sql  = "SELECT id FROM user";
	$sql .= " WHERE {$colname} ='{$objname}' ";
	$sql .= "LIMIT 1";
	$result = $db->query($sql);
	if ($db->numRows($result) > 0) {
		return true;
	} else {
		return false;
	}
}

function check_if_obj_exits_table($table = "", $colname = "", $objname = "")
{
	global $db;
	$colname = $db->SQLEscape($colname);
	$objname = $db->SQLEscape($objname);

	$sql  = "SELECT id FROM {$table}";
	$sql .= " WHERE {$colname} ='{$objname}' ";
	$sql .= "LIMIT 1";
	$result = $db->query($sql);
	if ($db->numRows($result) > 0) {
		return true;
	} else {
		return false;
	}
}

function check_if_obj_exits_table2($table = "", $colname = "", $objname = "", $colname2 = "", $objname2 = "")
{
	global $db;
	$colname = $db->SQLEscape($colname);
	$objname = $db->SQLEscape($objname);
	$objname2 = $db->SQLEscape($objname2);
	$colname2 = $db->SQLEscape($colname2);

	$sql  = "SELECT id FROM {$table}";
	$sql .= " WHERE {$colname} ='{$objname}' ";
	$sql .= " AND {$colname2} ='{$objname2}' ";
	$sql .= "LIMIT 1";
	$result = $db->query($sql);
	if ($db->numRows($result) > 0) {
		return true;
	} else {
		return false;
	}
}



function delete_by_user($table = "", $colname = "", $objname = "", $colname2 = "", $objname2 = "")
{
	global $db;
	$colname = $db->SQLEscape($colname);
	$objname = $db->SQLEscape($objname);
	$objname2 = $db->SQLEscape($objname2);
	$colname2 = $db->SQLEscape($colname2);

	$sql  = "DELETE FROM {$table}";
	$sql .= " WHERE {$colname} ='{$objname}' ";
	$sql .= " AND {$colname2} ='{$objname2}' ";
	$sql .= "LIMIT 1";
	$db->query($sql);

	if ($db->affectedRows() > 0) {
		return true;
	} else {
		return false;
	}
}



function check_if_obj_exits_staff($colname = "", $objname = "")
{
	global $db;
	$colname = $db->SQLEscape($colname);
	$objname = $db->SQLEscape($objname);

	$sql  = "SELECT id FROM users";
	$sql .= " WHERE {$colname} ='{$objname}' ";
	$sql .= "LIMIT 1";
	$result = $db->query($sql);
	if ($db->numRows($result) > 0) {
		return true;
	} else {
		return false;
	}
}


function my_encrypt($data, $key)
{
	// Remove the base64 encoding from our key
	$encryption_key = base64_decode($key);
	// Generate an initialization vector
	$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
	// Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
	$encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
	// The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
	return base64_encode($encrypted . '::' . $iv);
}

function my_decrypt($data, $key)
{
	// Remove the base64 encoding from our key
	$encryption_key = base64_decode($key);
	// To decrypt, split the encrypted data from our IV - our unique separator used was "::"
	list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
	return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}




function output_message($message = "")
{
	if (!empty($message)) {
		return $message;
	} else {
		return "";
	}
}



// 		if ($fetch['tSCoins'] > 5 && $fetch['debioActive'] == 0){

// 		}
// 		$result = mysqli_query($debioLink, $sql);

// 		$resultToArray = mysqli_fetch_array($result);

// 		$totalSmsP = $resultToArray['tSCPurchased'];
// 		$emailInArray = $resultToArray['debioEmail'];
// 		$totalcoins = $resultToArray['tSCoins'];
// 		$phoneInArray = $resultToArray['debioPhone'];
// 		$totalCreditT = $resultToArray['tSCTransfered'];
// 		$usernameInArray = $resultToArray['debioUsername'];
// 		$activeInArray = $resultToArray['debioActive'];
// 		$debioPassKey = $resultToArray['debioPassKey'];


function mailGod($value = '')
{
	$message = '
	<html>
	<head>
	  <title>bitcaz Mail Center</title>

	</head>
	<body>
	<style>
	.msg_wrapper{
	  width: 100%;
	  max-width: 768px;
	  margin: 0 auto;
	  box-shadow: 0 2px 3px rgba(0,0,0,0.08);
	    border: 1px solid #ececec;
	  border-top: 4px solid #358CCE;

	  background: white;
	  padding: 10px;
	}
	*{
	  font-family: Arial;
	}

	.footer{
	  border-top: 4px solid #c9302c;
	  margin-top: 10px;
	  margin-bottom: 10px;
	}
	p{
	  line-height: 1;
	}
	.link-color{
	  color:#358CCE !important;
	}
	.logo_sec{
	  border-bottom: 1px solid #ececec;
	  padding-bottom: 10px;
	  margin-bottom: 20px;
	}

	.mail{

	}
	</style>
	  <div class="msg_wrapper">
	  <div class="logo_sec">
	  <a href="http://bitsense.biz/"><img src="https://bitsense.biz/img/logo.png" style="width: 100px;" /></a>
	  </div>

	<div class="mail">
	' . $value . '
	<br>
	  <b>Regards,</b>
	<p>Support Team | <b>bitsense.biz </b> |</p>
	<p>E-mail: support@bitsense.biz</p>
	<p>Web : <a href="http://bitsense.biz/" class="link-color">www.bitsense.biz</a> </p>
	<br>
	</div>
	  <div class="footer">
	  <p>This e-mail is confidential. It may also be legally privileged.
	If you are not the addressee you may not copy, forward, disclose
	or use any part of it. If you have received this message in error,
	please delete it and all copies from your system and notify the
	sender immediately by return e-mail.</p>
	<p>
	<br>
	Internet communications cannot be guaranteed to be timely,
	secure, error or virus-free. The sender does not accept liability
	for any errors or omissions.
	</p>

	<p>
	<br>
	Kemfe would never send you emails asking you to enter your account information on any site other than <a href="http://bitsense.biz/" class="link-color">www.bitsense.biz</a>  Any of such mails MUST be forwarded to spoof@bitsense.biz
	</p>
	  </div>
	  </div>

	</body>
	</html>
	';

	return $message;
}
