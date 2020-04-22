<?php

class User extends Controller
{

  public function index()
  {
      $this->view('profile/index');
  }


  public function fetch_post($type){

    $catName = preg_split('/[\_,]+/', $type , -1, PREG_SPLIT_NO_EMPTY);
    global $db;
    if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
      $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';

      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
      $left = " LEFT JOIN espals_community_vote ON espals_community_vote.user_id = {$loggedIn_user} AND espals_community_vote.post_id = espals_community_post.id";
      $left .= " LEFT JOIN espals_joined_community ON espals_community_category.id = espals_joined_community.community_id AND espals_joined_community.user_id = {$loggedIn_user}";
  
    }else{
      $left = " LEFT JOIN espals_community_vote ON espals_community_vote.user_id = 0 AND espals_community_vote.post_id = espals_community_post.id";
      $left .= " LEFT JOIN espals_joined_community ON espals_community_category.id = espals_joined_community.community_id AND espals_joined_community.user_id = 0";
      
    }
  $id = $loggedIn_user;
    if($catName[2] == "post"){


    $joined = "SELECT post_id FROM espals_community_vote WHERE user_id = {$id}";
    $joined_query =  $db->query($joined);

    $groupArray = array();
    while ($rset = $db->fetchQuery($joined_query)) {

       array_push($groupArray, $rset['post_id']);
    }
     $tags = implode(', ', $groupArray);

    $sql = " SELECT DISTINCT espals_community_post.*, espals_joined_community.user_id AS kwese, espals_community_category.name,";
    $sql .= " espals_community_vote.type, user.user_id, user.user_img, espals_community_category.members ";
    $sql .= " FROM espals_community_post ";
    $sql .= " INNER JOIN espals_community_category ";
    $sql .= " ON espals_community_post.community = espals_community_category.id ";
    $sql .= " INNER JOIN user ON espals_community_post.post_author = user.id  ";
    $sql .= $left;
    $sql .= " WHERE espals_community_vote.user_id IN ($tags) ";
    $match = false;




    switch ($catName[1]) {
      case 'all':
        $sql .= " AND espals_community_vote.type = 'upvote' OR  espals_community_vote.type = 'downvote' ";

        break;
      case 'upvote':
        $sql .= " AND espals_community_vote.type = 'upvote' ";
        break;
      case 'downvote':
        $sql .= " AND espals_community_vote.type = 'downvote' ";
        break;
      case 'yesterday':
         $sql .= "  AND  DATE(espals_community_post.post_date) = DATE(NOW() - INTERVAL 1 DAY ";
        break;
      case 'last7':
         $sql .= "  AND espals_community_post.post_date > NOW() - INTERVAL 7 DAY AND espals_community_post.post_date < NOW() + INTERVAL 7 DAY ";

        break;
      case 'last30':
         $sql .= "  AND espals_community_post.post_date > NOW() - INTERVAL 30 DAY AND espals_community_post.post_date < NOW() + INTERVAL 30 DAY ";
        break;
      case 'mypost':
        $sql .= " AND espals_community_post.post_author = {$id} ";
        break;
      default:
        // code...
        break;

    }
    $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 100 ";
    $match = true;
    $courses  = array();
    $rs =   $db->query($sql);
    while ($a = $db->fetchQuery($rs)) {
        $obj = new stdClass();
          $obj->id = $a['id'];
          $obj->uuid = 'post';
          $obj->post_author = $a['post_author'];
          $obj->post_title = $a['post_title'];
          $obj->post_type = $a['post_type'];
          $obj->post_content = debioCleanInput($a['post_content']);

          $obj->post_url = $a['post_url'];
          $obj->mySay = $a['mySay'];
          $obj->post_content = $a['post_content'];
          $obj->is_multi_image = $a['is_multi_image'];
          $obj->external_link = $a['external_link'];
          $obj->up_vote = $a['up_vote'];
          $obj->post_comment_count = $a['post_comment_count'];
          $obj->post_earnings = number_format($a['post_earnings'], 2);
          $obj->down_vote = $a['down_vote'];
          $obj->is_approve = $a['is_approve'];
          $obj->post_date = $a['post_date'];
          $obj->kwese = $a['kwese'];


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
      $db->closeCon();
    }else if($catName[2] == "comment"){
      $sql = "SELECT espals_community_comment.*, espals_community_post.post_unique_id, espals_community_post.post_url, espals_community_category.name, user.user_id, user.user_img FROM `espals_community_comment`INNER JOIN user ON espals_community_comment.comment_sender_id = user.id ";
      $sql .=  " INNER JOIN espals_community_post ON espals_community_comment.post_id = espals_community_post.id ";
        $sql .= " INNER JOIN  espals_community_category ON espals_community_post.community = espals_community_category.id WHERE espals_community_comment.comment_sender_id= {$id} ";

      switch ($catName[1]) {
        case 'new':

        $sql .= " ORDER BY parent_comment_id asc, id desc LIMIT 100";
          break;
        case 'old':
          $sql .= " ORDER BY parent_comment_id asc, id asc LIMIT 100";
          break;
          case 'all':
            $sql .= " ORDER BY parent_comment_id asc, id asc LIMIT 100";
            break;
        case 'yesterday':
          $sql .= "  AND  DATE(espals_community_comment.date) = DATE(NOW() - INTERVAL 1 DAY ";
          $sql .= " ORDER BY parent_comment_id asc, id asc LIMIT 100";
          break;
        case 'last7':
          $sql .= "  AND espals_community_comment.date > NOW() - INTERVAL 7 DAY AND espals_community_comment.date < NOW() + INTERVAL 7 DAY ";
          $sql .= " ORDER BY parent_comment_id asc, id asc LIMIT 100";
          break;
        case 'last30':
          $sql .= "  AND espals_community_comment.date > NOW() - INTERVAL 30 DAY AND espals_community_comment.date < NOW() + INTERVAL 30 DAY ";
          $sql .= " ORDER BY parent_comment_id asc, id asc LIMIT 100";
          break;
        default:
          // code...
          break;
      }

      $result = $db->query($sql);
      $record_set = array();
      while ($row = $db->fetchQuery($result)) {
        $obj = new stdClass();
        $obj->uuid = 'comment';
        $obj->user_img = $row['user_img'];
        $obj->post_url =    $row['post_url'];
        $obj->name =    $row['name'];
        $obj->post_unique_id =    $row['post_unique_id'];
        $obj->comment = $row['comment'];
        $obj->parent_comment_id = $row['parent_comment_id'];
        $obj->id = $row['id'];
        $obj->user_id = $row['user_id'];

        $obj->date = ShowDateSingle(strtotime($row['date']));
      $record_set[] = $obj;
      }
      echo json_encode($record_set);
    }
  }


}

 ?>
