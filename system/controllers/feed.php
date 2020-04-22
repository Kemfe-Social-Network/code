<?php
class Feed extends Controller
{
  public function fetch_post($page = 0)
  {
    $per_page = 10;
    $offset = ((int) $page - 1) * $per_page;

    $courses = array();
    global $db;
    $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
    $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
    $joined = "SELECT community_id FROM espals_joined_community WHERE user_id = {$loggedIn_user}";
    $rs =  $db->query($joined);

    $groupArray = array();
    while ($rset = $db->fetchQuery($rs)) {

      array_push($groupArray, $rset['community_id']);
    }
    $tags = implode(', ', $groupArray);


    $ishas =  count($groupArray);

    if ($ishas > 0) {
      // code...
      $has_community = " WHERE espals_community_post.is_approve = 1 AND espals_community_post.community IN ({$tags}) ";
    } else {
      $has_community = " WHERE espals_community_post.is_approve = 1 ";
    }

    // $sql = " SELECT espals_community_post.*, espals_community_category.name, user.user_id, user.user_img, espals_community_category.members";
    // $sql .= " FROM espals_community_post ";
    // $sql .= " INNER JOIN espals_community_category ON espals_community_post.community = espals_community_category.id ";
    // $sql .= "  INNER JOIN user ON espals_community_post.post_author = user.id AND espals_community_category.user_id = {$loggedIn_user} ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 10 ";

    $sql2 = " SELECT DISTINCT espals_community_post.*, espals_community_category.name, espals_community_category.slug, espals_community_category.id AS cat_id,";
    $sql2 .= " user.user_id, user.user_img, espals_community_category.members ";
    $sql2 .= " FROM espals_community_post ";
    $sql2 .= " INNER JOIN espals_community_category ";
    $sql2 .= " ON espals_community_post.community = espals_community_category.id ";
    $sql2 .= " INNER JOIN user ON espals_community_post.post_author = user.id  ";
    $sql2 .= " WHERE espals_community_post.community IN ({$tags}) ";
    $sql2 .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 10 ";


    $sql = " SELECT DISTINCT espals_community_post.*, espals_joined_community.user_id AS kwese, espals_community_category.name, espals_community_category.slug, espals_community_category.id AS cat_id,";
    $sql .= " espals_community_vote.type, user.user_id, user.user_img, espals_community_category.members ";
    $sql .= " FROM espals_community_post ";
    $sql .= " INNER JOIN espals_community_category ";
    $sql .= " ON espals_community_post.community = espals_community_category.id ";
    $sql .= " INNER JOIN user ON espals_community_post.post_author = user.id  ";
    $sql .= " LEFT JOIN espals_community_vote ON espals_community_vote.user_id = {$loggedIn_user} AND espals_community_vote.post_id = espals_community_post.id";
    $sql .= " LEFT JOIN espals_joined_community ON espals_community_category.id = espals_joined_community.community_id AND espals_joined_community.user_id = {$loggedIn_user}";
    $sql .= $has_community;
    $sql .= "  AND espals_community_post.post_date > NOW() - INTERVAL 1 DAY   AND espals_community_post.post_date < NOW() + INTERVAL 1 DAY";
    $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT {$offset}, {$per_page} ";

    //$sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 30 ";


    $rs_2 =   $db->query($sql);
    // echo "<pre>";
    // print_r($db->fetchQuery($rs));
    // echo "</pre>";

    while ($a = $db->fetchQuery($rs_2)) {
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
      $obj->kwese = $a['kwese'];
      $obj->slug = $a['slug'];
      $obj->cat_id = $a['cat_id'];

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

  public function fetch_post_other()
  {
    $per_page = 5;
    $offset = ((int) $_POST['page'] - 1) * $per_page;
    global $db;

    $loggedIn_user = my_decrypt($_COOKIE['auth'], KEY);
    $joined = "SELECT community_id FROM espals_joined_community WHERE user_id = {$loggedIn_user}";
    $rs =  $db->query($joined);

    $groupArray = array();
    while ($rset = $db->fetchQuery($rs)) {

      array_push($groupArray, $rset['community_id']);
    }
    $tags = implode(', ', $groupArray);


    $ishas =  count($groupArray);

    if ($ishas > 0) {
      // code...
      $has_community = " WHERE espals_community_post.is_approve = 1 AND espals_community_post.community IN ({$tags}) ";
    } else {
      $has_community = " WHERE espals_community_post.is_approve = 1 ";
    }

    // $sql = " SELECT espals_community_post.*, espals_community_category.name, user.user_id, user.user_img, espals_community_category.members";
    // $sql .= " FROM espals_community_post ";
    // $sql .= " INNER JOIN espals_community_category ON espals_community_post.community = espals_community_category.id ";
    // $sql .= "  INNER JOIN user ON espals_community_post.post_author = user.id AND espals_community_category.user_id = {$loggedIn_user} ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 10 ";

    $sql2 = " SELECT DISTINCT espals_community_post.*, espals_community_category.name,";
    $sql2 .= " user.user_id, user.user_img, espals_community_category.members ";
    $sql2 .= " FROM espals_community_post ";
    $sql2 .= " INNER JOIN espals_community_category ";
    $sql2 .= " ON espals_community_post.community = espals_community_category.id ";
    $sql2 .= " INNER JOIN user ON espals_community_post.post_author = user.id  ";
    $sql2 .= " WHERE espals_community_post.community IN ({$tags}) ";
    $sql2 .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 10 ";


    $sql = " SELECT DISTINCT espals_community_post.*, espals_joined_community.user_id AS kwese, espals_community_category.name, espals_community_category.slug,";
    $sql .= " espals_community_vote.type, user.user_id, user.user_img, espals_community_category.members ";
    $sql .= " FROM espals_community_post ";
    $sql .= " INNER JOIN espals_community_category ";
    $sql .= " ON espals_community_post.community = espals_community_category.id ";
    $sql .= " INNER JOIN user ON espals_community_post.post_author = user.id  ";
    $sql .= " LEFT JOIN espals_community_vote ON espals_community_vote.user_id = {$loggedIn_user} AND espals_community_vote.post_id = espals_community_post.id";
    $sql .= " LEFT JOIN espals_joined_community ON espals_community_category.id = espals_joined_community.community_id AND espals_joined_community.user_id = {$loggedIn_user}";
    $sql .= $has_community;

    switch ($_POST['type']) {
      case 'popular':
        $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT  {$offset}, {$per_page} ";
        break;
      case 'hot':
        $sql .= "  AND espals_community_post.post_date > NOW() - INTERVAL 7 DAY AND espals_community_post.post_date < NOW() + INTERVAL 7 DAY ";
        $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT  {$offset}, {$per_page} ";
        break;
      case 'trending':
        $sql .= "  AND espals_community_post.post_date > NOW() - INTERVAL 1 DAY   AND espals_community_post.post_date < NOW() + INTERVAL 1 DAY";
        $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT {$offset}, {$per_page} ";
        break;
      case 'new':
        $sql .= " ORDER BY espals_community_post.post_date DESC LIMIT  {$offset}, {$per_page} ";
        break;
      default:
        // code...
        break;
    }



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
      $obj->post_content = ($a['post_content']);

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
      $obj->slug = $a['slug'];

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

  public function fetch_comment($id = 0)
  {
    $serkey =  (int) $id;
    global $db;
    $sql = "SELECT espals_community_comment.*, user.user_id, user.user_img FROM `espals_community_comment`INNER JOIN user ON espals_community_comment.comment_sender_id = user.id WHERE espals_community_comment.post_id= {$serkey} ORDER BY parent_comment_id asc, id asc";

    $result = $db->query($sql);
    $record_set = array();
    while ($row = $db->fetchQuery($result)) {
      $obj = new stdClass();
      $obj->comment = $row['comment'];
      $obj->parent_comment_id = $row['parent_comment_id'];
      $obj->id = $row['id'];
      $obj->user_id = $row['user_id'];
      $obj->user_img = $row['user_img'];
      $obj->post_id = $row['post_id'];
      $obj->comment_sender_id = $row['comment_sender_id'];
      $obj->comment_upvote = $row['comment_upvote'];


      $obj->date = ShowDateSingle(strtotime($row['date']));
      $record_set[] = $obj;
    }
    // mysqli_free_result($result);
    //
    // mysqli_close($conn);
    echo json_encode($record_set);
  }

  public function fetch_community($limit)
  {
    $limit_returned = (int) $limit;
    $loggedIn_user = 0;
    if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
      $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
    }
    global $db;
    $sql = " SELECT g.*, COUNT(m.community_id) AS members, u.id AS enterred ";
    $sql .= " FROM espals_community_category AS g ";
    $sql .= " LEFT JOIN espals_joined_community AS m ON g.id = m.community_id ";
    $sql .= " LEFT JOIN user AS u ON m.user_id = {$loggedIn_user}";
    $sql .= " GROUP BY g.id ";
    $sql .= "  ORDER BY members DESC LIMIT {$limit_returned} ";
    //HAVING members > 0 
    // $sql = " SELECT espals_community_category.name, espals_community_category.img_url, COUNT(DISTINCT espals_joined_community.id) AS members, espals_community_category.id, espals_joined_community.community_id ";
    // $sql .= " FROM espals_community_category";
    // $sql .= "   LEFT JOIN espals_joined_community ON espals_community_category.id = espals_joined_community.community_id ";
    // $sql .= "   ORDER BY members LIMIT {$limit_returned} ";

    $rs =   $db->query($sql);

    $courses = array();
    while ($value = $db->fetchQuery($rs)) {
      $obj = new stdClass();
      $obj->id = $value['id'];
      $obj->name = $value['name'];
      $obj->slug = $value['slug'];
      $obj->members = $value['members'];
      $obj->img_url = $value['img_url'];
      $obj->enterred = $value['enterred'];

      $courses[] = $obj;
    }
    echo json_encode($courses);
  }

  public function fetch_community_joined($limit)
  {
    global $db;
    $key = KEY;
    $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
    $limit_returned = (int) $limit;
    // $sql = " SELECT espals_community_category.name, COUNT(espals_joined_community.id) AS members, espals_joined_community.id, espals_joined_community.community_id ";
    // $sql .= " FROM espals_community_category";
    // $sql .= "   INNER JOIN espals_joined_community ON espals_community_category.id = espals_joined_community.community_id ";
    // $sql .= "   AND espals_joined_community.user_id = {$loggedIn_user} ORDER BY espals_community_category.members LIMIT {$limit_returned} ";

    $sql = " SELECT g.*, m.community_id, COUNT(m.community_id) AS members ";
    $sql .= " FROM espals_community_category AS g ";
    $sql .= " LEFT JOIN espals_joined_community AS m ON g.id = m.community_id AND m.user_id = {$loggedIn_user} ";
    $sql .= " GROUP BY g.id HAVING members > 0 ";

    $rs =   $db->query($sql);

    $courses = array();
    while ($a = $db->fetchQuery($rs)) {
      $obj = new stdClass();
      $obj->id = $a['id'];
      $obj->name = $a['name'];
      $obj->slug = $a['slug'];
      $obj->members = $a['members'];
      $obj->community_id = $a['community_id'];
      $courses[] = $obj;
    }

    echo json_encode($courses);
  }


  public function fetch_community_joined_by_id($id)
  {
    global $db;
    $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
    $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
    $id_returned = (int) $id;
    $sql = " SELECT espals_community_category.name, espals_community_category.slug, espals_community_category.members, espals_joined_community.id, espals_joined_community.community_id ";
    $sql .= " FROM espals_community_category";
    $sql .= "   INNER JOIN espals_joined_community ON espals_community_category.id = espals_joined_community.community_id ";
    $sql .= "   AND espals_joined_community.user_id = {$loggedIn_user} AND espals_joined_community.community_id = {$id_returned} ORDER BY espals_community_category.members LIMIT 1 ";

    $rs =   $db->query($sql);

    $courses = array();
    while ($a = $db->fetchQuery($rs)) {
      $obj = new stdClass();
      $obj->id = $a['id'];
      $obj->name = $a['name'];
      $obj->slug = $a['slug'];
      $obj->members = $a['members'];
      $obj->community_id = $a['community_id'];
      $courses[] = $obj;
    }

    echo json_encode($courses);
  }
}
