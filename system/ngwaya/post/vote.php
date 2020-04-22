<?php
require_once (LIB_PATH.DS.'dbclass'.DS.'dbclass.php');
require_once (LIB_PATH.DS.'dbobject'.DS.'dbobject.php');

class Vote extends dbObject{
  protected static $tName = "espals_community_vote";
  protected static $db_fields  = array('id', 'user_id', 'type', 'post_id', 'earn', 'date');
   public $id;
   public $user_id;
   public $type;
   public $post_id;
   public $earn;
   public $date;




}

?>
