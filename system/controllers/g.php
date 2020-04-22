<?php

/**
 *
 */
class G extends Controller
{
  public function index($value='')
  {
    global $db;
    $loggedIn_user = 0;
    if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
     
      $loggedIn_user = my_decrypt($_COOKIE['auth'], KEY);
    }
    $sql = " SELECT g.*, COUNT(m.community_id) AS member_count, u.id AS enterred ";
    $sql .= " FROM espals_community_category AS g ";
    $sql .= " INNER JOIN espals_joined_community AS m ON g.id = m.community_id AND g.slug = '{$value}' ";
    $sql .= " LEFT JOIN user AS u ON m.user_id = u.id AND u.id = {$loggedIn_user} LIMIT 1";

    
    $data = $db->fetchQuery($db->query($sql));
    $this->view('group/index', $data);
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

      $sql = " SELECT DISTINCT espals_community_post.*, espals_joined_community.user_id AS kwese, espals_community_category.name, espals_community_category.slug, espals_community_category.id AS cat_id,";
      $sql .= " espals_community_vote.type, user.user_id, user.user_img, espals_community_category.members ";
      $sql .= " FROM espals_community_post ";
      $sql .= " INNER JOIN espals_community_category ";
      $sql .= " ON espals_community_post.community = espals_community_category.id ";
      $sql .= " INNER JOIN user ON espals_community_post.post_author = user.id  ";
      $sql .= $left;
      $sql .= " WHERE espals_community_category.slug = '{$catName[0]}' ";
      $match = false;
      switch ($catName[1]) {
        case 'best':
        $sql .= " AND espals_community_post.post_date > NOW() - INTERVAL 30 DAY   AND espals_community_post.post_date < NOW() + INTERVAL 30 DAY ";

        $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 10 ";
        $match = true;
        break;

        case 'trending':
        $sql .= "  AND espals_community_post.post_date > NOW() - INTERVAL 1 DAY   AND espals_community_post.post_date < NOW() + INTERVAL 1 DAY";

        $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 20 ";
        $match = true;
        break;

        case 'hot':
        $sql .= "  AND espals_community_post.post_date > NOW() - INTERVAL 7 DAY AND espals_community_post.post_date < NOW() + INTERVAL 7 DAY ";

        $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 20 ";
        $match = true;
        break;

        case 'new':

        $sql .= " ORDER BY espals_community_post.post_date DESC LIMIT 20 ";
        $match = true;
        break;

        case 't10':
        $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 10 ";
        $match = true;
        break;

        case 't100':
        $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 100 ";
        $match = true;
        break;

        case 'newt100':
        $sql .= " ORDER BY espals_community_post.post_date DESC LIMIT 100 ";
        $match = true;
        break;

        case 'newt10':
        $sql .= " ORDER BY espals_community_post.post_date DESC LIMIT 10 ";
        $match = true;
        break;


        case 'topyes':
         $sql .= "  AND  DATE(espals_community_post.post_date) = DATE(NOW() - INTERVAL 1 DAY ";
         $sql .= "  ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 100 ";
          break;

        case 'topl7':
        $sql .= "  AND espals_community_post.post_date > NOW() - INTERVAL 7 DAY AND espals_community_post.post_date < NOW() + INTERVAL 7 DAY ";

        $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 100 ";
        $match = true;

          break;
        case 'topl30':
        $sql .= "  AND espals_community_post.post_date > NOW() - INTERVAL 30 DAY AND espals_community_post.post_date < NOW() + INTERVAL 30 DAY ";

        $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 100 ";
        $match = true;
          break;
        case 'top10':
        $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 10 ";
        $match = true;
          break;
        case 'top20':
        $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 20 ";
        $match = true;
          break;

        case 'top50':
        $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 50 ";
        $match = true;
          break;

        case 'top100':
        $sql .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 100 ";
        $match = true;
          break;

        case 'newyes':
        $sql .= "  AND  DATE(espals_community_post.post_date) = DATE(NOW() - INTERVAL 1 DAY ";
        $sql .= "  ORDER BY espals_community_post.post_date DESC LIMIT 100 ";

          break;

        case 'newl7':
        $sql .= "  AND espals_community_post.post_date > NOW() - INTERVAL 7 DAY AND espals_community_post.post_date < NOW() + INTERVAL 7 DAY ";

        $sql .= " ORDER BY espals_community_post.post_date DESC LIMIT 100 ";

          break;

        case 'newl30':
        $sql .= "  AND espals_community_post.post_date > NOW() - INTERVAL 30 DAY AND espals_community_post.post_date < NOW() + INTERVAL 30 DAY ";

        $sql .= " ORDER BY espals_community_post.post_date DESC LIMIT 100 ";

          break;

        case 'new10':
        $sql .= " ORDER BY espals_community_post.post_date DESC LIMIT 10 ";
        $match = true;
          break;

        case 'new20':
        $sql .= " ORDER BY espals_community_post.post_date DESC LIMIT 30 ";
        $match = true;
          break;

        case 'new50':
        $sql .= " ORDER BY espals_community_post.post_date DESC LIMIT 50 ";
        $match = true;
          break;

        case 'new100':
        $sql .= " ORDER BY espals_community_post.post_date DESC LIMIT 100 ";
        $match = true;
          break;
      default:

          break;
      }


      $rs =   $db->query($sql);
      while ($a = $db->fetchQuery($rs)) {
          $obj = new stdClass();
            $obj->id = $a['id'];
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
            $obj->slug = $a['slug'];
            $obj->cat_id = $a['cat_id'];


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

}
?>
