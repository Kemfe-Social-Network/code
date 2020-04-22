<?php
require_once (LIB_PATH.DS.'dbclass'.DS.'dbclass.php');
require_once (LIB_PATH.DS.'dbobject'.DS.'dbobject.php');

class Comments extends dbObject{
  protected static $tName = "espals_community_comment";
  protected static $db_fields  = array('id', 'post_id', 'comment_id', 'parent_comment_id', 'comment', 'comment_sender_id', 'date', 'comment_type', 'comment_image_url', 'comment_upvote', 'comment_downvote', 'comment_earnings', 'comment_report');
   public $id;
   public $post_id;
   public $comment_id;
   public $parent_comment_id;
   public $comment;
   public $comment_sender_id;
   public $date;
   public $comment_type;
   public $comment_image_url;
   public $comment_upvote;
   public $comment_downvote;
   public $comment_earnings;
   public $comment_report;



}

?>
