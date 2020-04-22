<?php
require_once (LIB_PATH.DS.'dbclass'.DS.'dbclass.php');
require_once (LIB_PATH.DS.'dbobject'.DS.'dbobject.php');

class Post extends dbObject{
  protected static $tName = "espals_community_post";
  protected static $db_fields  = array('id', 'post_author', 'post_title', 'post_type', 'post_url', 'post_unique_id', 'mySay', 'post_content', 'community', 'is_multi_image', 'external_link', 'up_vote',
   'down_vote', 'post_comment_count', 'post_earnings', 'is_approve', 'post_date', 'post_images');
   public $id;
   public $post_author;
   public $post_title;
   public $post_type;
   public $post_url;
   public $post_unique_id;
   public $mySay;
   public $post_content;
   public $community;
   public $is_multi_image;
   public $external_link;
   public $up_vote;
   public $down_vote;
   public $post_comment_count;
   public $post_earnings;
   public $is_approve;
   public $post_date;
   public $post_images;

}

?>
