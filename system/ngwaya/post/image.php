<?php
require_once (LIB_PATH.DS.'dbclass'.DS.'dbclass.php');
require_once (LIB_PATH.DS.'dbobject'.DS.'dbobject.php');

class Image extends dbObject{
  protected static $tName = "espals_community_images";
  protected static $db_fields  = array('id', 'image_url', 'post_id', 'comment_count', 'up_vote', 'down_vote', 'date');
   public $id;
   public $image_url;
   public $post_id;
   public $comment_count;
   public $up_vote;
   public $down_vote;
   public $date;



}

?>
