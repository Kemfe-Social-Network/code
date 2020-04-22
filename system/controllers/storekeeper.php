<?php
class Storekeeper extends Controller
{

  public function index()
  {
    global $db;
    $sql = "SELECT * FROM `espal_reward_point`";
    $query_run = $db->query($sql);
    $data_pay = array();
    while ($a = $db->fetchQuery($query_run)) {
      array_push($data_pay, $a);
    }
    $this->view('storekeeper/index', $data_pay);
  }

  public function update_point()
  {
    global $db;
    $success = array();
	  $error = array();
	  $data = array();
	  $post_time = time();

    $post_currtime = date('Y-m-d H:i:s', $post_time);
    
    if(isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])){
      $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
      $user = Person::findById($loggedIn_user);

      if(strtolower($user->user_code) == "dteweb@outlook.com" || strtolower($user->user_code) == "kemfe.com@gmail.com"){
        if(isset(($_POST['type'])) && isset($_POST['point'])){
          $type = debioCleanInput($_POST['type']);
          $point = (float)$_POST['point'];
          $sql = "UPDATE `espal_reward_point` SET `point` = {$point}  WHERE `type` = '{$type}';";
          $db->query($sql);
          if($db->affectedRows() > 0){
            $data["Ok"] = "OK";
          }else{
            $error["msg"] = "Update failed";
            $data["error"] = $error;
          }
        }else{
          $error["msg"] = "No value passed";
          $data["error"] = $error;
        }
        
      }else{
        $error["msg"] = "Access denied";
	      $data["error"] = $error;
      }
    }else{
      $error["msg"] = "Access denied";
	    $data["error"] = $error;
    }
    echo json_encode($data);
  }
}
