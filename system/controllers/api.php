<?php
class Api extends Controller
{

	public function vote_post()
	{

		$success = array();
		$error = array();
		$data = array();
		$post_time = time();

		$post_currtime = date('Y-m-d H:i:s', $post_time);

		if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
			$key = KEY;
			$loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

			if (
				isset($_POST['id']) && !empty($_POST['id']) &&
				isset($_POST['type']) &&  !empty($_POST['type'])
				&& isset($_POST['author']) &&  !empty($_POST['author'])
			) {
				$type = debioCleanInput($_POST['type']);
				$post_id  = (int) $_POST['id'];
				$author  = $_POST['author'];
				$commit = vote_post_count(
					$loggedIn_user,
					$type,
					$post_id,
					$author,
					$post_currtime
				);

				if ($commit) {
					$data["Ok"] = "Voted";
				} else {
					$error["msg"] = "Error occurred. Try again later";
					$data["error"] = $error;
				}
			} else {
				$error["msg"] = "Error occurred. Try again later";
				$data["error"] = $error;
			}
		} else {
			$error["msg"] = "Access denied";
			$data["error"] = $error;
		}

		echo json_encode($data);
	}


	public function follow()
	{

		$success = array();
		$error = array();
		$data = array();
		$post_time = time();

		$post_currtime = date('Y-m-d H:i:s', $post_time);

		if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
			$key = KEY;
			$loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

			if (
				isset($_POST['id']) && !empty($_POST['id'])
			) {

				$user  = (int) $_POST['id'];
				$follow =  new FollowMe();
				$follow->following = $user;
				$follow->user = $loggedIn_user;
				$follow->date = $post_currtime;


				if ($follow->save()) {
					$data["Ok"] = "Followed";
				} else {
					$error["msg"] = "Error occurred. Try again later";
					$data["error"] = $error;
				}
			} else {
				$error["msg"] = "Error occurred. Try again later";
				$data["error"] = $error;
			}
		} else {
			$error["msg"] = "Access denied";
			$data["error"] = $error;
		}

		echo json_encode($data);
	}

	public function commentvote_post()
	{

		$success = array();
		$error = array();
		$data = array();
		$post_time = time();

		$post_currtime = date('Y-m-d H:i:s', $post_time);

		if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
			$key = KEY;
			$loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

			if (
				isset($_POST['id']) && !empty($_POST['id']) &&
				isset($_POST['type']) &&  !empty($_POST['type'])
				&& isset($_POST['author']) &&  !empty($_POST['author'])
			) {
				$type = debioCleanInput($_POST['type']);
				$comment_id  = (int) $_POST['id'];
				$post_id  = (int) $_POST['post_id'];
				$author  = $_POST['author'];
				if (check_if_obj_exits_table2("espals_community_vote", "user_id", $loggedIn_user, "post_id", $comment_id) == false) {
					$commit = vote_comment_count(
						$loggedIn_user,
						$type,
						$post_id,
						$comment_id,
						$author,
						$post_currtime

					);

					if ($commit) {
						$data["Ok"] = "Voted";
					} else {
						$error["msg"] = "Error occurred. Try again later";
						$data["error"] = $error;
					}
				} else {
					$error["msg"] = "cannot vote twice.";
					$data["error"] = $error;
				}
			} else {
				$error["msg"] = "Error occurred. Try again later";
				$data["error"] = $error;
			}
		} else {
			$error["msg"] = "Access denied";
			$data["error"] = $error;
		}

		echo json_encode($data);
	}


	public function show_missing()
	{
		// code...
		$success = array();
		$error = array();
		$data = array();
		$number = array($_POST['lotto']);
		//print_r($number[0]);
		$missing = array();
		for ($i = 1; $i < 48; $i++) {
			if (in_array($i, $number[0])) { } else {
				array_push($missing, $i);
			}
		}
		$data["Ok"] = $missing;
		echo json_encode($data);
	}
	public function leave_community()
	{
		$success = array();
		$error = array();
		$data = array();
		$post_time = time();
		$key = KEY;
		$loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
		$cat_id = (int) $_POST['id'];
		$post_currtime = date('Y-m-d H:i:s', $post_time);
		if (delete_by_user("espals_joined_community", "user_id", $loggedIn_user, "community_id", $cat_id)) {

			$success["msg"] = "You left. Hope to see you soon!";
			$data["Ok"] = $success["msg"];
		} else {
			$error["msg"] = "Error occurred while trying to leave the community";
			$error["who"] = "login_error";
			$data["error"] = $error;
		}

		echo json_encode($data);
	}


	public function join_community()
	{
		$success = array();
		$error = array();
		$data = array();
		$post_time = time();
		$key = KEY;
		$loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
		$cat_id = (int) $_POST['id'];
		$post_currtime = date('Y-m-d H:i:s', $post_time);
		if (check_if_obj_exits_table2("espals_joined_community", "user_id", $loggedIn_user, "community_id", $cat_id) == false) {
			$group =  new Group();
			$group->community_id = $cat_id;
			$group->user_id =  $loggedIn_user;
			$group->date = $post_currtime;

			if ($group->save()) {

				$success["msg"] = "Post Completed";
				$data["Ok"] = $success["msg"];
			} else {
				$group =  new Group();
				$group->community_id = (int) $_POST['id'];
				$group->user_id =  my_decrypt($_COOKIE['auth'], $key);
				$group->date = $post_currtime;

				if ($group->save()) {
					$success["msg"] = "Post Completed";
					$data["Ok"] = $success["msg"];
				} else {
					$error["msg"] = "Unknown error has occurred. Try again later.";
					$error["who"] = "login_error";
					$data["error"] = $error;
				}
			}
		} else {
			$error["msg"] = "you are already in this community.";
			$error["who"] = "login_error";
			$data["error"] = $error;
		}
		echo json_encode($data);
	}

	public function join_community_string()
	{
		$success = array();
		$error = array();
		$data = array();
		$post_time = time();
		$key = KEY;
		$loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

		$cat_id =  $_POST['id'];
		//echo $cat_id." \n";
		$cat_id  = join_community_by_community_name($cat_id);
		$post_currtime = date('Y-m-d H:i:s', $post_time);
		if (check_if_obj_exits_table2("espals_joined_community", "user_id", $loggedIn_user, "community_id", $cat_id) == false) {
			$group =  new Group();
			$group->community_id = $cat_id;
			$group->user_id =  $loggedIn_user;
			$group->date = $post_currtime;

			if ($group->save()) {

				$success["msg"] = "Post Completed";
				$data["Ok"] = $success["msg"];
			} else {
				$group =  new Group();
				$group->community_id = (int) $_POST['id'];
				$group->user_id =  my_decrypt($_COOKIE['auth'], $key);
				$group->date = $post_currtime;

				if ($group->save()) {
					$success["msg"] = "Post Completed";
					$data["Ok"] = $success["msg"];
				} else {
					$error["msg"] = "Unknown error has occurred. Try again later.";
					$error["who"] = "login_error";
					$data["error"] = $error;
				}
			}
		} else {
			$error["msg"] = "you are already in this community.";
			$error["who"] = "login_error";
			$data["error"] = $error;
		}
		echo json_encode($data);
	}


	public function user_create_community()
	{
		$success = array();
		$error = array();
		$data = array();
		$post_time = time();
		$key = KEY;

		$post_currtime = date('Y-m-d H:i:s', $post_time);
		$get_user_has_page = Person::findById(my_decrypt($_COOKIE['auth'], $key));
		//	print_r($get_user_has_page);
		if ($get_user_has_page->power >= 50000  || strtolower($get_user_has_page->user_code) == "kemfe.com@gmail.com") {

			if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['desc']) && !empty($_POST['desc'])) {
				if (!preg_match("/\\s/", $_POST['name'])) {


					if (check_if_obj_exits_table("espals_community_category", "name", debioCleanInput(trim($_POST['name']))) == false) {
						global $db;
						$community = new Community();
						$creator_id = my_decrypt($_COOKIE['auth'], $key);
						$community->description = debioCleanInput(trim($_POST['desc']));
						$community->name = debioCleanInput(trim($_POST['name']));
						$community->slug = slugify(debioCleanInput(trim(strtolower($_POST['name']))));
						$community->img_url = "communiy_default.png";
						$community->date = $post_currtime;
						$community->user_id =  $creator_id;

						if (isset($_POST['restrict']) && !empty($_POST['restrict'])) {
							if ($_POST['restrict'] == "public") {
								$community->restriction = 0;
							} else if ($_POST['restrict'] == "restricted") {
								$community->restriction = 1;
							} else if ($_POST['restrict'] == "private") {
								$community->restriction = 2;
							}

							$community_sql_query_string = "INSERT INTO `espals_community_category`(`id`, `user_id`,
						 `description`, `name`, `img_url`, `restriction`, `slug`, `date`) 
						VALUES (null,'{$community->user_id}','{$community->description}','{$community->name}',
						'{$community->img_url}','{$community->restriction}','{$community->slug}','{$community->date}')";

							if ($db->query($community_sql_query_string)) {
								$community_last_inserted_id = $db->lastInsertedId();
								$user = Person::findById($creator_id);
								$user->has_community = 1;
								$user->save();
								$group =  new Group();

								$group->community_id = $community->id;
								$group->user_id =  $creator_id;
								$group->date = $post_currtime;
								$group_sql_query_string = "INSERT INTO `espals_joined_community`(`id`, `user_id`, `community_id`, `date`) 
							VALUES (null,'{$group->user_id}','{$community_last_inserted_id}','{$group->date}')";
								$db->query($group_sql_query_string);

								$success["msg"] = "Post Completed";
								$data["Ok"] = $success["msg"];
							} else {
								$error["msg"] = "Unknown error has occurred. Try again later.";
								$error["who"] = "login_error";
								$data["error"] = $error;
							}
						} else {
							$error["msg"] = "Please select community type";
							$error["who"] = "login_error";
							$data["error"] = $error;
						}
					} else {
						$error["msg"] = "Community name already exist.";
						$error["who"] = "login_error";
						$data["error"] = $error;
					}
				} else {
					$error["msg"] = "Community name must not have any space.";
					$error["who"] = "login_error";
					$data["error"] = $error;
				}
				//check for space
			} else {
				$error["msg"] = "Community name or description is empty. Check & try again.";
				$error["who"] = "login_error";
				$data["error"] = $error;
			}
		} else {
			$error["msg"] = "Only premium or gold member are allowed to create community!!!";
			$error["who"] = "login_error";
			$data["error"] = $error;
		}

		echo json_encode($data);
	}


	public function comments_post()
	{
		$success = array();
		$error = array();
		$data = array();
		$post_time = time();


		$post_currtime = date('Y-m-d H:i:s', $post_time);

		if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
			$comment_type  			= $_POST['comment_type'];
			$post_id			 			= $_POST['post_id'];
			$parent_id 					= $_POST['parent_id'];
			$text 							= debioCleanInput(addslashes($_POST['text']));
			$post_currtime 			= $post_currtime;
			$user 		          = my_decrypt($_COOKIE['auth'], KEY);

			$save_comment = save_comment_and_reward_user($comment_type, $post_id, $parent_id, $text, $post_currtime, $user);
			if ($save_comment) {
				$success["msg"] = "Comment posted was successful!";
				$data["Ok"] = $success["msg"];
			} else {
				$error["msg"] = "Comment was not successful & try again!";
				$error["who"] = "login_error";
				$data["error"] = $error;
			}
		} else {
			$error["msg"] = "Access not granted!";
			$error["who"] = "login_error";
			$data["error"] = $error;
		}


		echo json_encode($data);
	}
	public function user_post()
	{
		define('UPLOAD_DIR', 'public/images/post-images/');
		$key = KEY;
		$success = array();
		$error = array();
		$data = array();
		$post_time = time();
		$post_currtime = date('Y-m-d H:i:s', $post_time);

		if (isset($_POST['url_type']) && $_POST['url_type'] == "photo" || $_POST['url_type'] == "gif") {
			if ($_POST['community'] == "0") {
				$error["msg"] = "Please select community & try again.";
				$error["who"] = "login_error";
				$data["error"] = $error;
			} else {

				$poster_user_id = my_decrypt($_COOKIE['auth'], $key);
				$community_data = get_community_restriction($_POST['community']);

				if (is_numeric($community_data['user_id']) && is_numeric($community_data['restriction'])) {

					if (isset($_POST['dynamicTitle']) || isset($_POST['images'])) {

						$imageCount = sizeof($_POST['images']);
						if ($imageCount == 1) {

							$post =  new Post();

							$post->post_unique_id = random_strings(6);
							$post->post_author = my_decrypt($_COOKIE['auth'], $key);
							if ($_POST['url_type'] == "photo") {
								$post->post_type = "image";
							} else if ($_POST['url_type'] == "gif") {
								$post->post_type = "gif";
							}


							$post->post_date = $post_currtime;

							$unique_id =  uniqid();

							if ($_POST['url_type'] == "photo") {
								$image_parts = explode(";base64,", $_POST['images'][0]);
								$image_type_aux = explode("image/", $image_parts[0]);
								$image_type = $image_type_aux[1];
								$image_base64 = base64_decode($image_parts[1]);
								$img_name =  $unique_id . '.' . $image_type_aux[1];
								$data = getimagesizefromstring($image_base64);

								$file = UPLOAD_DIR . $img_name;
							}

							if (isset($_POST['dynamicTitle']) && !empty($_POST['dynamicTitle'])) {

								$post->post_title = debioCleanInput($_POST['dynamicTitle']);
								$post->post_url = slugify($_POST['dynamicTitle']);
							} else {
								$post->post_url = $unique_id;
							}
							if ($_POST['url_type'] == "photo") {

								$post->post_images = $img_name . "-" . $data[0] . "-" . $data[1];
								$post->community = debioCleanInput($_POST['community']);

								if (file_put_contents($file, $image_base64)) {
									compress_image($file, $file, 32);
									$image_insert =  new Image();

									if ($community_data['restriction'] == 0) {
										$post->is_approve = 1;
									} else if ($community_data['user_id'] ==  $poster_user_id) {
										$post->is_approve = 1;
									}

									$post->save();
									reward_user_post($post->id, $post->post_author);
									// $image_insert->post_id = $post->id;
									// $image_insert->image_url = $img_name;
									// $image_insert->date = $post_currtime;
									// $image_insert->save();

									$success["msg"] = "Post Completed";
									$data["Ok"] = $success["msg"];
								}
							} else if ($_POST['url_type'] == "gif") {
								$post->post_images = $_POST['images'][0];
								$post->community = debioCleanInput($_POST['community']);
								$image_insert =  new Image();
								if ($community_data['restriction'] == 0) {
									$post->is_approve = 1;
								} else if ($community_data['user_id'] ==   my_decrypt($_COOKIE['auth'], $key)) {
									$post->is_approve = 1;
								}

								$post->save();
								reward_user_post($post->id, $post->post_author);
								// $image_insert->post_id = $post->id;
								// $image_insert->image_url = $_POST['images'][0];
								// $image_insert->date = $post_currtime;
								// $image_insert->save();
								$success["msg"] = "Post Completed";
								$data["Ok"] = $success["msg"];
							}
						} // end of if images = 1
						else {
							$img_raw_url = "";
							$post =  new Post();
							$post->post_author = my_decrypt($_COOKIE['auth'], $key);
							if ($_POST['url_type'] == "photo") {
								$post->post_type = "image";
							} else if ($_POST['url_type'] == "gif") {
								$post->post_type = "gif";
							}

							$post->post_date = $post_currtime;
							$unique_id =  uniqid();
							if (isset($_POST['dynamicTitle']) && !empty($_POST['dynamicTitle'])) {

								$post->post_title = debioCleanInput($_POST['dynamicTitle']);
								$post->post_url = slugify($_POST['dynamicTitle']);
							} else {
								$post->post_url = $unique_id;
							}

							$post->community = debioCleanInput($_POST['community']);
							$post->post_unique_id = random_strings(6);

							if ($community_data['restriction'] == 0) {
								$post->is_approve = 1;
							} else if ($community_data['user_id'] ==   my_decrypt($_COOKIE['auth'], $key)) {
								$post->is_approve = 1;
							}

							if ($post->save()) {

								$img_raw_url = "";
								foreach ($_POST['images'] as $index => $value) {
									if ($_POST['url_type'] == "photo") {

										$image_parts = explode(";base64,", $value);
										$image_type_aux = explode("image/", $image_parts[0]);
										$image_type = $image_type_aux[1];
										$image_base64 = base64_decode($image_parts[1]);
										$img_name =  uniqid() . '.' . $image_type_aux[1];
										$data = getimagesizefromstring($image_base64);
										$file = UPLOAD_DIR . $img_name;
									} else if ($_POST['url_type'] == "gif") {
										$img_name = $value;
									}


									// $image_insert =  new Image();
									// $image_insert->post_id = $post->id;
									// $image_insert->image_url = $img_name;
									// $image_insert->date = $post_currtime;
									$img_raw_url .= " " . $img_name . "-" . $data[0] . "-" . $data[1];
									// if($image_insert->save()){


									// }

									if ($_POST['url_type'] == "photo") {
										file_put_contents($file, $image_base64);
										compress_image($file, $file, 32);
									}
								}

								$update_img = Post::findById($post->id);

								$update_img->post_images = $img_raw_url;
								$update_img->is_multi_image = 1;

								if ($update_img->save()) {
									reward_user_post($post->id, $post->post_author);
									$success["msg"] = "Post Completed";
									$data["Ok"] = $success["msg"];
								}
							}
						}
					} // dynamic title or images
				} // of of get_community_id
				else { }
			}
		} else if (isset($_POST['url_type']) && $_POST['url_type'] == "url" || $_POST['url_type'] == "youtube") {
			if ($_POST['community'] == "0") {
				$error["msg"] = "Please select community & try again.";
				$error["who"] = "login_error";
				$data["error"] = $error;
			} else {
				$community_data = get_community_restriction($_POST['community']);

				if (is_numeric($community_data['user_id']) && is_numeric($community_data['restriction'])) {
					$post = new Post();
					$post->post_author = my_decrypt($_COOKIE['auth'], $key);
					$post->post_title = debioCleanInput($_POST['url_title']);
					$post->post_type = debioCleanInput($_POST['url_type']);

					$post->post_url = slugify($_POST['url_title']);
					$post->post_unique_id = random_strings(6);

					if (isset($_POST['dynamicTitle']) && !empty($_POST['dynamicTitle'])) {
						$post->mySay = debioCleanInput($_POST['dynamicTitle']);
					}

					$post->post_content = debioCleanInput($_POST['url_desc']);
					$post->external_link = debioCleanInput($_POST['url_post_url']);
					$post->post_date = $post_currtime;
					$post->post_images = debioCleanInput($_POST['url_image']);
					$post->community = debioCleanInput($_POST['community']);

					if ($community_data['restriction'] == 0) {
						$post->is_approve = 1;
					} else if ($community_data['user_id'] ==   my_decrypt($_COOKIE['auth'], $key)) {
						$post->is_approve = 1;
					}

					if ($post->save()) {
						reward_user_post($post->id, $post->post_author);
						$success["msg"] = "Post Completed";
						$data["Ok"] = $success["msg"];
					} else {
						echo "errro from here";
						$error["msg"] = "Unknown error occurred. Please try again later";
						$error["who"] = "login_error";
						$data["error"] = $error;
					}
				}
			} /// url youtube
		} else if (isset($_POST['url_type']) && $_POST['url_type'] == "text") {
			if ($_POST['community'] == "0" || empty($_POST['dynamicTitle'])) {
				$error["msg"] = "Please select community & try again.";
				$error["who"] = "login_error";
				$data["error"] = $error;
			} else {
				$community_data = get_community_restriction($_POST['community']);
				if (is_numeric($community_data['user_id']) && is_numeric($community_data['restriction'])) {
					$community = (int) $_POST['community'];
					$post = new Post();
					$poster_user_id = my_decrypt($_COOKIE['auth'], $key);
					$post->post_author = my_decrypt($_COOKIE['auth'], $key);

					$post->post_url = slugify(trim(strtolower($_POST['dynamicTitle'])));

					$post->post_title = debioCleanInput($_POST['dynamicTitle']);
					$post->post_type = debioCleanInput($_POST['url_type']);
					$post->community = $community;
					$post->post_date = $post_currtime;

					$allowed = '<div><span><pre><p><br><hr><hgroup><h1><h2><h3><h4><h5><h6>
					<ul><ol><li><dl><dt><dd><strong><em><b><i><u>
					<img><a><abbr><address><blockquote><area><audio><video>
					<form><fieldset><label><input>
					<caption><table><tbody><td><tfoot><th><thead><tr>
					';
					$post->post_content = strip_tags($_POST['dynamicContent'], $allowed);

					$post->post_unique_id = random_strings(6);


					if ($community_data['restriction'] == 0) {
						$post->is_approve = 1;
					} else if ($community_data['user_id'] ==   my_decrypt($_COOKIE['auth'], $key)) {
						$post->is_approve = 1;
					}

					if ($post->save()) {
						reward_user_post($post->id, $post->post_author);
						$success["msg"] = "Post Completed";
						$data["Ok"] = $success["msg"];
					} else {
						$error["msg"] = "Unknown error has occurred. please try again later";
						$error["who"] = "login_error";
						$data["error"] = $error;
					}
				}
			}
		} else { }
		echo json_encode($data);
	}
	public function user_login()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		$success = array();
		$error = array();
		$data = array();

		//	echo $form_data->email;
		$check_user = Person::authenticate(debioCleanInput($form_data->email),  debioCleanInput($form_data->password));
		//echo $check_user;
		if ($check_user) {
			$key = KEY;
			$cookie_name = "auth";
			$cipher = my_encrypt($check_user->id, $key);
			if (setcookie($cookie_name, $cipher, time() + 96000, '/')) {

				$success["msg"] = "OK";
				$data["Ok"] = $success["msg"];
			}
		} else {

			$error["msg"] = "Email & password combination is incorrect!";
			$error["who"] = "login_error";
			$data["error"] = $error;
		}

		echo json_encode($data);
	}
	public function user_registration()
	{
		$form_data = json_decode(file_get_contents("php://input"));
		$success = array();
		$error = array();
		$data = array();

		if (!isset($form_data->email) || empty($form_data->email) || !filter_var($form_data->email, FILTER_VALIDATE_EMAIL)) {

			$error["msg"] = "Please provide a valid email address!";
			$error["who"] = "email_field_error";
			$data["error"] = $error;
		} else if (!isset($form_data->password) || empty($form_data->password) || !strlen($form_data->password) > 8) {
			$error["msg"] = "Password must be aleast 8 characters long!";
			$error["who"] = "password_field_error";
			$data["error"] = $error;
		} else if (!isset($form_data->username) || empty($form_data->username) || preg_match("/\\s/", $form_data->username)) {
			$error["msg"] = "Please enter valid username & space is not allowed!";
			$error["who"] = "username_field_error";
			$data["error"] = $error;
		} else if (check_if_obj_exits("user_id", debioCleanInput($form_data->username))) {
			$error["msg"] = "Username already taken. Change & try again!";
			$error["who"] = "username_field_error";
			$data["error"] = $error;
		} else if (check_if_obj_exits("user_code", debioCleanInput($form_data->email))) {
			$error["msg"] = "Email address already taken. Change & try again!";
			$error["who"] = "email_field_error";
			$data["error"] = $error;
		} else {
			$key = KEY;
			$user = new Person();
			$time = time();
			global $db;
			$dateTime = date('Y-m-d H:i:s', $time);

			$user->user_id = debioCleanInput($form_data->username);
			$user->user_code = debioCleanInput($form_data->email);
			$user->password = sha1($form_data->password);
			$user->user_email_code = sha1(debioCleanInput($form_data->username));
			$user->create_at = $dateTime;
			$user->user_img = "user_default";
			$user->update_at = $dateTime;
			if ($user->save()) {

				$cookie_name = "auth";
				$cipher = my_encrypt($db->lastInsertedId(), $key);
				if (setcookie($cookie_name, $cipher, time() + 96000, '/')) {
					//`id`, `user`, ``, ``, ``
					if (isset($_COOKIE['refer']) && !empty($_COOKIE['refer'])) {
						$refer =  new Refer();
						$refer->user = $db->lastInsertedId();
						$refer->referred_by = (int) $_COOKIE['refer'];
						$refer->date = $dateTime;
						$refer->earned = 0;

						$refer->save();
					}
					$success["msg"] = "Registration was was complete";
					$data["Ok"] = $success["msg"];
				}
			}

			//insert to database
		}


		echo json_encode($data);
	}
}
