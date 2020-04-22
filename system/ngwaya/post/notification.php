<?php
require_once (LIB_PATH.DS.'dbclass'.DS.'dbclass.php');
require_once (LIB_PATH.DS.'dbobject'.DS.'dbobject.php');

class Notification extends dbObject{
  protected static $tName = "espals_notifications";
  protected static $db_fields  = array('id', 'user_id', 'type', 'status', 'date');
   public $id;
   public $user_id;
   public $type;
   public $status;
   public $date;




}

?>
