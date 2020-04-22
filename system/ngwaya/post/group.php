<?php
require_once (LIB_PATH.DS.'dbclass'.DS.'dbclass.php');
require_once (LIB_PATH.DS.'dbobject'.DS.'dbobject.php');

class Group extends dbObject{
  protected static $tName = "espals_joined_community";
  protected static $db_fields  = array('id', 'user_id', 'community_id', 'date');
   public $id;
   public $user_id;
   public $community_id;
   public $date;



}

?>
