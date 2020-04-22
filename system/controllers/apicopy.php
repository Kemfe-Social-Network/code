public function user_post()
	{

			define('UPLOAD_DIR', 'public/images/post-images/');
			$key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
			$success = array();
			$error = array();
			$data = array();
			$post_time = time();

			$post_currtime = date('Y-m-d H:i:s', $post_time);


			if(isset($_POST['url_type']) && $_POST['url_type'] == "photo" || $_POST['url_type'] == "gif"){
				if($_POST['community'] == "0"){
					$error["msg"] = "Please select community & try again.";
					$error["who"] = "login_error";
					$data["error"] = $error;
				}else{
					$poster_user_id = my_decrypt($_COOKIE['auth'], $key);
					$community_data = get_community_restriction($_POST['community']);

			if(!empty($community_data['user_id']) && !empty($community_data['restriction'])){
				if(isset($_POST['dynamicTitle']) || isset($_POST['images'])){

			$imageCount = sizeof($_POST['images']);

			if($imageCount == 1){
				$post =  new Post();

				$post->post_unique_id = random_strings(6);
				$post->post_author = my_decrypt($_COOKIE['auth'], $key);
				if($_POST['url_type'] == "photo"){
				$post->post_type = "image";
				}else if($_POST['url_type'] == "gif"){
				$post->post_type = "gif";
				}


				$post->post_date = $post_currtime;

				 $unique_id =  uniqid();

				 if($_POST['url_type'] == "photo"){
				 $image_parts = explode(";base64,",$_POST['images'][0]);
				 $image_type_aux = explode("image/", $image_parts[0]);
				 $image_type = $image_type_aux[1];
				 $image_base64 = base64_decode($image_parts[1]);
				 $img_name =  $unique_id . '.'.$image_type_aux[1];
				 $data = getimagesizefromstring($image_base64);

				 $file = UPLOAD_DIR . $img_name;
			 }

				if (isset($_POST['dynamicTitle']) && !empty($_POST['dynamicTitle'])) {

					$post->post_title = debioCleanInput($_POST['dynamicTitle']);
					$post->post_url = formatUrl($_POST['dynamicTitle']);

				}else{
					$post->post_url = $unique_id;
				}
					if($_POST['url_type'] == "photo"){
					$post->post_images = $img_name."-".$data[0]."-".$data[1];
					$post->community = debioCleanInput($_POST['community']);

					if(file_put_contents($file, $image_base64)){
						compress_image($file, $file, 32);
						$image_insert =  new Image();

					if($community_data['restriction'] == 0){
						$post->is_approve = 1;
					}else if($community_data['user_id'] ==  $poster_user_id){
						$post->is_approve = 1;
					}

						$post->save();

						$image_insert->post_id = $post->id;
						$image_insert->image_url = $img_name;
						$image_insert->date = $post_currtime;
						$image_insert->save();
						$success["msg"] = "Post Completed";
						$data["Ok"] = $success["msg"];
					}
				}else if($_POST['url_type'] == "gif"){
						$post->post_images = $_POST['images'][0];
						$post->community = debioCleanInput($_POST['community']);
						$image_insert =  new Image();
						if($community_data['restriction'] == 0){
							$post->is_approve = 1;
						}else if($community_data['user_id'] ==   my_decrypt($_COOKIE['auth'], $key)){
							$post->is_approve = 1;
						}

						$post->save();

						$image_insert->post_id = $post->id;
						$image_insert->image_url = $_POST['images'][0];
						$image_insert->date = $post_currtime;
						$image_insert->save();
						$success["msg"] = "Post Completed";
						$data["Ok"] = $success["msg"];
				}

			}else{
				$img_raw_url = "";
				$post =  new Post();
				$post->post_author = my_decrypt($_COOKIE['auth'], $key);
					 if($_POST['url_type'] == "photo"){
						 $post->post_type = "image";
					 }else if($_POST['url_type'] == "gif"){
						 $post->post_type = "gif";
					 }

				$post->post_date = $post_currtime;
				$unique_id =  uniqid();

				if (isset($_POST['dynamicTitle']) && !empty($_POST['dynamicTitle'])) {

					$post->post_title = debioCleanInput($_POST['dynamicTitle']);
					$post->post_url = formatUrl($_POST['dynamicTitle']);

				}else{
					$post->post_url = $unique_id;
				}
				$post->community = debioCleanInput($_POST['community']);
				$post->post_unique_id = random_strings(6);
				if($community_data['restriction'] == 0){
					$post->is_approve = 1;
				}else if($community_data['user_id'] ==   my_decrypt($_COOKIE['auth'], $key)){
					$post->is_approve = 1;
				}
				if ($post->save()) {
						foreach($_POST['images'] as $index => $value) {
						if($_POST['url_type'] == "photo"){

							$image_parts = explode(";base64,",$value);
							$image_type_aux = explode("image/", $image_parts[0]);
							$image_type = $image_type_aux[1];
							$image_base64 = base64_decode($image_parts[1]);
							$img_name =  uniqid() . '.'.$image_type_aux[1];
							$data = getimagesizefromstring($image_base64);
							$file = UPLOAD_DIR . $img_name;

						}else if($_POST['url_type'] == "gif"){
								$img_name = $value;
						}


						$image_insert =  new Image();
						$image_insert->post_id = $post->id;
						$image_insert->image_url = $img_name;
						$image_insert->date = $post_currtime;
						$img_raw_url .= " ".$img_name."-".$data[0]."-".$data[1];
						if($image_insert->save()){
							if($_POST['url_type'] == "photo"){
							 file_put_contents($file, $image_base64);
							 compress_image($file, $file, 32);

						 }

						}



						}


						$update_img = Post::findById($post->id);

						$update_img->post_images = $img_raw_url;
						$update_img->is_multi_image = 1;

						if($update_img->save()){
							$success["msg"] = "Post Completed";
							$data["Ok"] = $success["msg"];
						}
				}


			}

	}//check if isset
			}else{
				$error["msg"] = "Unknown error occurred. Please try again later";
				$error["who"] = "login_error";
				$data["error"] = $error;
			}
	}//check community
}else if(isset($_POST['url_type']) && $_POST['url_type'] == "url" || $_POST['url_type'] == "youtube" ){
if($_POST['community'] == "0"){
	$error["msg"] = "Please select community & try again.";
	$error["who"] = "login_error";
	$data["error"] = $error;
}else{
	   $community_data = get_community_restriction($_POST['community']);
	   echo $community_data['user_id']."was";
	   echo $community_data['restriction']."restrictions";
		if(!empty($community_data['user_id']) && !empty($community_data['restriction'])){

			$post = new Post();
			$post->post_author = my_decrypt($_COOKIE['auth'], $key);
			$post->post_title = debioCleanInput($_POST['url_title']);
			$post->post_type = debioCleanInput($_POST['url_type']);

			$post->post_url = formatUrl($_POST['url_title']);
			$post->post_unique_id = random_strings(6);

		 if (isset($_POST['dynamicTitle']) && !empty($_POST['dynamicTitle'])) {
				$post->mySay = debioCleanInput($_POST['dynamicTitle']);
			}

		 $post->post_content = debioCleanInput($_POST['url_desc']);
		 $post->external_link = debioCleanInput($_POST['url_post_url']);
		 $post->post_date = $post_currtime;
		 $post->post_images = debioCleanInput($_POST['url_image']);
		 $post->community = debioCleanInput($_POST['community']);
		 if($community_data['restriction'] == 0 || $community_data['user_id'] ==   my_decrypt($_COOKIE['auth'], $key)){
			$post->is_approve = 1;
		

	if($post->save()){
		$success["msg"] = "Post Completed";
		$data["Ok"] = $success["msg"];
	}
		else{
			echo "errro from here";
			$error["msg"] = "Unknown error occurred. Please try again later";
			$error["who"] = "login_error";
			$data["error"] = $error;
		}

}//check community





}else if(isset($_POST['url_type']) && $_POST['url_type'] == "text"){
	if($_POST['community'] == "0" || empty($_POST['dynamicTitle'])){
		$error["msg"] = "Please select community & try again.";
		$error["who"] = "login_error";
		$data["error"] = $error;
	}else{

		$community_data = get_community_restriction($_POST['community']);

		if(!empty($community_data['user_id']) && !empty($community_data['restriction'])){
			$community = (int) $_POST['community'];
		$post = new Post();
		$poster_user_id = my_decrypt($_COOKIE['auth'], $key);
		$post->post_author = $poster_user_id;
		$url1 = str_replace(';', '', debioCleanInput(trim(strtolower($_POST['dynamicTitle']))));
		$url2 = str_replace('.', '', $url1);
		$url3 = str_replace('?', '', $url2);
		$url4 = str_replace('+', '', $url3);
		$url5 = str_replace(':', '', $url4);
		$url6 = str_replace(',', '', $url5);
		$url7 = str_replace('---', '-', $url6);
		$url8 = str_replace('--', '-', $url7);
		$post->post_url = str_replace(" ","-",$url8);

		$post->post_title = debioCleanInput($_POST['dynamicTitle']);
		$post->post_type = debioCleanInput($_POST['url_type']);
		$post->community = $community;
		$post->post_date = $post_currtime;
		$post->post_content = debioCleanInput21($_POST['dynamicContent']);
		$post->post_unique_id = random_strings(6);
		if($community_data['restriction'] == 0){
			$post->is_approve = 1;
		}else if($community_data['user_id'] ==   my_decrypt($_COOKIE['auth'], $key)){
			$post->is_approve = 1;
		}
		if($post->save()){
			$success["msg"] = "Post Completed";
			$data["Ok"] = $success["msg"];
		}else{
			$error["msg"] = "Unknown error has occurred. please try again later";
			$error["who"] = "login_error";
			$data["error"] = $error;
		}
		}else{
			$error["msg"] = "Unknown error occurred. Please try again later";
			$error["who"] = "login_error";
			$data["error"] = $error;
		}
	}
}

echo json_encode($data);
	}