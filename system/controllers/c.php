<?php

/**
 *
 */
class C extends Controller
{

	public function donate()
	{
		$success = array();
		$error = array();
		$data = array();
		$post_time = time();
		$post_currtime = date('Y-m-d H:i:s', $post_time);

		if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {

			$key = KEY;
			$loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

			$donate  = tipUser($loggedIn_user, debioCleanInput($_POST["user"]), debioCleanInput($_POST["post"]), (float) $_POST["amount"],   $post_currtime);
			if ($donate) {
				$data["Ok"] = "OK";
				$data["msg"] = "Completed successfully";
			} else {
				$error["msg"] = "Donation was not successful, check your balance and try again";
				$data["error"] = $error;
			}
		} else {
			// access denied
			$error["msg"] = "Access denied";
			$data["error"] = $error;
		}

		echo json_encode($data);
	}
	public function index($category = '', $id = '', $link_url = '')
	{

		$loggedIn_user = 0;
		if (isset($_COOKIE['auth'])) {
			$loggedIn_user = (int) my_decrypt($_COOKIE['auth'], KEY);
		}


		$data = "";
		$name = "";

		global $db;

		$sql = "SELECT espals_community_post.*, user.user_id, espals_community_category.img_url, espals_community_category.name ";
		$sql .= " ,espals_community_vote.type FROM espals_community_post ";
		$sql .= " INNER JOIN espals_community_category ";
		$sql .= " ON espals_community_post.community = espals_community_category.id ";
		$sql .= " INNER JOIN user ON espals_community_post.post_author = user.id ";
		$sql .= " LEFT JOIN espals_community_vote ON espals_community_vote.user_id = {$loggedIn_user} AND espals_community_vote.post_id = espals_community_post.id";
		$sql .= " WHERE `post_unique_id` = '{$id}' AND `post_url` = '{$link_url}' ";
		$data = $db->fetchQuery($db->query($sql));
		$this->view('r/index', $data);
	}
}
