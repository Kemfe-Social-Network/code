<?php
require_once (LIB_PATH.DS.'dbclass'.DS.'dbclass.php');
require_once (LIB_PATH.DS.'dbobject'.DS.'dbobject.php');

class Block extends dbObject{
  protected static $tName = "espals_block_user";
  protected static $db_fields  = array('id', 'blocked_user', 'user', 'date');
   public $id;
   public $blocked_user;
   public $user;
   public $date;
}

?>
