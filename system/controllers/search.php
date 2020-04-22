<?php
class Search extends Controller
{
  public function index($value='')
  {
  
    $this->view('search/index');
  }


  public function fetch_data($value='')
  {
    $courses = array();
    $key = 'Kp7GeqelWuHNsao9tlL5ud+Tx54mQEUXDnhby1tZuYg=';
   
    if (isset($_COOKIE['auth'])) {
        $loggedIn_user = (int) my_decrypt($_COOKIE['auth'], $key);
    }else{
        $loggedIn_user =  0;
    }
    $overall_data = array();

    $post_array = array(); 
    global $db;
    $search = $value;
    $sql = "SELECT * FROM espals_community_post WHERE `post_title` LIKE '%{$search}%'";
    $sql .= " OR `post_content` LIKE '%{$search}%'";
    $sql .= " OR `mySay` LIKE '%{$search}%'";
   
    $query_run = $db->query($sql);

    while($a = $db->fetchQuery($query_run)){
        
        array_push($post_array, $a['id']);
    }
    $tags = implode(', ', $post_array);
    $ishas =  count($post_array);

    if ($ishas > 0) {
    $has_community = " WHERE espals_community_post.is_approve = 1 AND espals_community_post.id IN ({$tags}) ";
    
    $sql_post = " SELECT DISTINCT espals_community_post.*, espals_joined_community.user_id AS kwese, espals_community_category.name,  espals_community_category.id AS cat_id,";
    $sql_post .= " espals_community_vote.type, user.user_id, user.user_img, espals_community_category.members ";
    $sql_post .= " FROM espals_community_post ";
    $sql_post .= " INNER JOIN espals_community_category ";
    $sql_post .= " ON espals_community_post.community = espals_community_category.id ";
    $sql_post .= " INNER JOIN user ON espals_community_post.post_author = user.id  ";
    $sql_post .= " LEFT JOIN espals_community_vote ON espals_community_vote.user_id = {$loggedIn_user} AND espals_community_vote.post_id = espals_community_post.id";
    $sql_post .= " LEFT JOIN espals_joined_community ON espals_community_category.id = espals_joined_community.community_id AND espals_joined_community.user_id = {$loggedIn_user}";
    $sql_post .= $has_community;
    $sql_post .= " ORDER BY espals_community_post.up_vote DESC, espals_community_post.post_date DESC LIMIT 10 ";
      
    $rs =   $db->query($sql_post);
    
    
       while ($ai = $db->fetchQuery($rs)) {
             $obj = new stdClass();
             $obj->id = $ai['id'];
             $obj->post_author = $ai['post_author'];
             $obj->post_title = $ai['post_title'];
             $obj->post_type = $ai['post_type'];
             $obj->post_content = debioCleanInput($a['post_content']);
             $obj->post_url = $ai['post_url'];
             $obj->mySay = $ai['mySay'];
             $obj->is_multi_image = $ai['is_multi_image'];
             $obj->external_link = $ai['external_link'];
             $obj->up_vote = $ai['up_vote'];
             $obj->post_comment_count = $ai['post_comment_count'];
             $obj->post_earnings = number_format($ai['post_earnings'], 2);
             $obj->down_vote = $ai['down_vote'];
             $obj->is_approve = $ai['is_approve'];
             $obj->post_date = $ai['post_date'];
             $obj->kwese = $ai['kwese'];
             $obj->cat_id = $ai['cat_id'];
             $obj->post_images = trim($ai['post_images']);
             $obj->name = $ai['name'];
             $obj->user_id = $ai['user_id'];
             $obj->user_img = $ai['user_img'];
             $obj->post_unique_id = $ai['post_unique_id'];
             $obj->type_of_vote = $ai['type'];
             $obj->post_date = ShowDate(strtotime($ai['post_date']));
    
             $courses[] = $obj;
         }

    }else{

     }

     echo json_encode($courses);
    
    
  }
  
}
 ?>