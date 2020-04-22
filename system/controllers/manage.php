<?php
class Manage extends Controller
{
  public function index()
  {
    global $db;
    $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
	  $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
    $sql = "SELECT * FROM `espals_community_category` WHERE `user_id` = {$loggedIn_user}";
    $sql_run = $db->query($sql);
    $data  = array();
    while ($get_rs = $db->fetchQuery($sql_run)) {
      array_push($data, $get_rs);
    }
    $this->view('manage/index', $data);
  }

  public function community($value='')
  {
    $this->view('manage/community');
  }


  public function moderate($value='')
  {
    	$this->view('manage/moderate');
  }

  
  public function fetch_post($value = "")
  {
    
    global $db;
    $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
    $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
    $has_community = " WHERE espals_community_post.is_approve = 0 AND espals_community_post.community IN ({$value}) ";
  
  
  $sql = " SELECT DISTINCT espals_community_post.*, espals_community_category.name,";
  $sql .= " espals_community_vote.type, user.user_id, user.user_img, espals_community_category.members ";
  $sql .= " FROM espals_community_post ";
  $sql .= " INNER JOIN espals_community_category ";
  $sql .= " ON espals_community_post.community = espals_community_category.id ";
  $sql .= " INNER JOIN user ON espals_community_post.post_author = user.id  ";
  $sql .= " LEFT JOIN espals_community_vote ON espals_community_vote.user_id = {$loggedIn_user} AND espals_community_vote.post_id = espals_community_post.id";
  $sql .= $has_community;
  $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 10 ";
  
  
     $rs =   $db->query($sql);
  // echo "<pre>";
  // print_r($db->fetchQuery($rs));
  // echo "</pre>";
  
     while ($a = $db->fetchQuery($rs)) {
         $obj = new stdClass();
           $obj->id = $a['id'];
           $obj->post_author = $a['post_author'];
           $obj->post_title = $a['post_title'];
           $obj->post_type = $a['post_type'];
           $obj->post_content = debioCleanInput($a['post_content']);
  
           $obj->post_url = $a['post_url'];
           $obj->mySay = $a['mySay'];
  
  
           $obj->is_multi_image = $a['is_multi_image'];
           $obj->external_link = $a['external_link'];
           $obj->up_vote = $a['up_vote'];
           $obj->post_comment_count = $a['post_comment_count'];
           $obj->post_earnings = number_format($a['post_earnings'], 2);
           $obj->down_vote = $a['down_vote'];
           $obj->is_approve = $a['is_approve'];
           $obj->post_date = $a['post_date'];
          //  $result = preg_split('/[\s-]+/', trim($a['post_images']) , -1, PREG_SPLIT_NO_EMPTY);
          //  echo "<pre>";
          //  print_r();
          // echo "</pre>";
  
           $obj->post_images = trim($a['post_images']);
  
           $obj->name = $a['name'];
           $obj->user_id = $a['user_id'];
           $obj->user_img = $a['user_img'];
           $obj->post_unique_id = $a['post_unique_id'];
           $obj->type_of_vote = $a['type'];
           $obj->post_date = ShowDate(strtotime($a['post_date']));
  
           $courses[] = $obj;
       }
  
       echo json_encode($courses);
  }


  public function approva_and_delete()
{
	$success = array();
	$error = array();
	$data = array();
	$post_time = time();

	$post_currtime = date('Y-m-d H:i:s', $post_time);

	if(isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])){
		$key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
		$loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

	if (isset($_POST['id']) && !empty($_POST['id']) &&
			isset($_POST['type']) &&  !empty($_POST['type'])
	) {
				$type = debioCleanInput($_POST['type']);
				$post_id  = (int)$_POST['id'];
				
				$commit = do_approva_or_delete($loggedIn_user,	$type,	$post_id);

				if($commit){
					$data["Ok"] = "OK";
				}else{
					$error["msg"] = "Error occurred. Try again later";
					$data["error"] = $error;
				}
	}else{
		$error["msg"] = "Error occurred. Try again later";
		$data["error"] = $error;
	}
}else{
	$error["msg"] = "Access denied";
	$data["error"] = $error;
}

echo json_encode($data);
}
}
?>
