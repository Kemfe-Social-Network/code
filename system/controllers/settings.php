<?php
class Settings extends Controller
{
  public function index($name = '', $otherName = '')
  {
    $data = "";
    $name = "";

    $this->view('/home/settings', $data);
  }
  
 

  public function change_email()
  {
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();

    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if(isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])){
      $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

    if (isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['password']) &&  !empty($_POST['password'])){
          $user = Person::findById($loggedIn_user);
          if(sha1($_POST['password']) == $user->password){
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
               if(check_if_obj_exits("user_code", debioCleanInput($_POST['email']))){
        				$error["msg"] = "Email address already taken. Change & try again!";
        				$error["who"] = "email_field_error";
        				$data["error"] = $error;
        			}else{
                $user->user_code = $_POST['email'];
                if($user->save()){
                  $data["Ok"] = "OK";
                }else{
                  $error["msg"] = "Error occurred. Try again later";
                  $data["error"] = $error;
                }
              }

            }else{
              $error["msg"] = "Please enter a valid email address";
              $data["error"] = $error;
            }

          }else{
            $error["msg"] = "Password in incorrect! check and try again";
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

  public function change_password()
  {
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();

    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if(isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])){
      $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

    if (isset($_POST['current_password']) && !empty($_POST['current_password']) &&
        isset($_POST['new_password']) &&  !empty($_POST['new_password'])
      && isset($_POST['confirm_new_password']) &&  !empty($_POST['confirm_new_password'])){
          $user = Person::findById($loggedIn_user);
          if(sha1($_POST['current_password']) == $user->password){
            if($_POST['new_password'] == $_POST['confirm_new_password']){
              $user->password = sha1($_POST['new_password']);
              if($user->save()){
                $data["Ok"] = "OK";
              }else{
                $error["msg"] = "Error occurred. Try again later";
                $data["error"] = $error;
              }
            }else{
              $error["msg"] = " Your password and confirmation password do not match";
              $data["error"] = $error;
            }

          }else{
            $error["msg"] = "Password in incorrect! check and try again";
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

  public function change_display_name()
  {
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();

    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if(isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])){
      $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

    if (isset($_POST['display_name']) && !empty($_POST['display_name'])){
          $user = Person::findById($loggedIn_user);
          if(check_if_obj_exits("user_id", debioCleanInput($_POST['display_name']))){
            $error["msg"] = "Username already taken. Change & try again!";
            $error["who"] = "username_field_error";
            $data["error"] = $error;

        }else{
            $user->user_id = debioCleanInput($_POST['display_name']);
            if($user->save()){
             $data["Ok"] = "OK";
           }else{
             $error["msg"] = "Error occurred. Try again later";
             $data["error"] = $error;
           }
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



  public function update_about_me()
  {
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();

    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if(isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])){
      $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

    if (isset($_POST['about_me']) && !empty($_POST['about_me'])){
          $user = Person::findById($loggedIn_user);

          $user->about = debioCleanInput($_POST['about_me']);
          if($user->save()){
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


  public function update_notification()
  {
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();

    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if(isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])){
      $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

    if (isset($_POST['type']) && !empty($_POST['type']) &&
        isset($_POST['status']) && !empty($_POST['status'])){
          $type = $_POST['type'];
          $status = $_POST['status'];

          $update_notification = update_notification($type, $status, $loggedIn_user);
          if($update_notification){
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


  public function fetch_blocked_users()
  {
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();

    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if(isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])){
      global $db;
      $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
      $sql_query_string = "SELECT user.user_id FROM `user` INNER JOIN espals_block_user ON user.id = espals_block_user.blocked_user WHERE espals_block_user.user = {$loggedIn_user}";
      $sql_run_query= $db->query($sql_query_string);
      $record_set = array();
      while ($row = $db->fetchQuery($sql_run_query)) {
        $obj = new stdClass();
        $obj->user_id = $row['user_id'];

       $record_set[] = $obj;
      }
      $data['data'] = $record_set;
  }else{
    $error["msg"] = "Access denied";
    $data["error"] = $error;
  }

  echo json_encode($data);
  }


  public function fetch_notifications()
  {
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();

    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if(isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])){
      global $db;
      $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
      $sql_query_string = "SELECT * FROM `espals_notifications` WHERE `user_id` = '{$loggedIn_user}'";
      $sql_run_query= $db->query($sql_query_string);
      $record_set = array();
      while ($row = $db->fetchQuery($sql_run_query)) {
        $obj = new stdClass();
        $obj->type = $row['type'];
        $obj->status = $row['status'];
       $record_set[] = $obj;
      }
      $data['data'] = $record_set;
  }else{
    $error["msg"] = "Access denied";
    $data["error"] = $error;
  }

  echo json_encode($data);
  }
  public function block_user()
  {
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();

    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if(isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])){
      global $db;
      $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
      if(isset($_POST['username']) && !empty($_POST['username'])){
        $user = debioCleanInput($_POST['username']);
        $rs_user = get_user_id_by_username($user);

        if($rs_user > 0){
          $check  = user_already_block($rs_user);
          if($check == false){
            if(block_user($rs_user, 1, $loggedIn_user)){
                $data["Ok"] = "OK";
            }else{
              $error["msg"] = "error occurred while trying to block user.";
              $data["error"] = $error;
            }
          }else{
            $error["msg"] = "You have already block the user";
            $data["error"] = $error;
          }
        }else{
          $error["msg"] = "Please enter a valid username";
          $data["error"] = $error;
        }
      }else{
        $error["msg"] = "Please enter a valid username";
        $data["error"] = $error;
      }
  }else{
    $error["msg"] = "Access denied";
    $data["error"] = $error;
  }

  echo json_encode($data);
  }

  public function unblock_user()
  {
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();

    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if(isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])){
      global $db;
      $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
      if(isset($_POST['username']) && !empty($_POST['username'])){
        $user = debioCleanInput($_POST['username']);
        $rs_user = get_user_id_by_username($user);

        if($rs_user > 0){
          $check  = user_already_block($rs_user);
          if($check == true){
            if(block_user($rs_user, 0, $loggedIn_user)){
                $data["Ok"] = "OK";
            }else{
              $error["msg"] = "error occurred while trying to unblock user.";
              $data["error"] = $error;
            }
          }else{
            $error["msg"] = "user not in block list";
            $data["error"] = $error;
          }
        }else{
          $error["msg"] = "Please enter a valid username";
          $data["error"] = $error;
        }
      }else{
        $error["msg"] = "Please enter a valid username";
        $data["error"] = $error;
      }
  }else{
    $error["msg"] = "Access denied";
    $data["error"] = $error;
  }

  echo json_encode($data);
  }

  public function update_image()
  {
    define('UPLOAD_DIR', 'public/images/user-images/');
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();

    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if(isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])){
      $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

    if (isset($_POST['input_image_value']) && !empty($_POST['input_image_value'])){
      $uuu = "";
          $image_parts = explode(";base64,",$_POST['input_image_value']);
          $image_type_aux = explode("image/", $image_parts[0]);
          $image_type = $image_type_aux[1];
          $img_name =  uniqid() . '.'.$image_type_aux[1];
          $image_base64 = base64_decode($image_parts[1]);
        //  $img_name =  uniqid() . '.'.$image_type_aux[1];
          // file_put_contents($file, $image_base64);
            $file = UPLOAD_DIR . $img_name;



           if(file_put_contents($file, $image_base64)){

            if(compress_image($file, $file, 32)){
                $user = Person::findById($loggedIn_user);
                if($_POST['type'] == "avarta_image"){
                    $user->user_img =  $img_name;
                }else{
                  $user->banner =  $img_name;
                }

                $user->save();

            }

           }

        //   $user = Person::findById($loggedIn_user);
        //
        //   $user->about = debioCleanInput($_POST['about_me']);
        //   if($user->save()){
        //   $data["Ok"] = "OK";
        // }else{
        //   $error["msg"] = "Error occurred. Try again later";
        //   $data["error"] = $error;
        // }

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
