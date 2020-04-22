<?php
require_once (LIB_PATH.DS.'dbclass'.DS.'dbclass.php');
require_once (LIB_PATH.DS.'dbobject'.DS.'dbobject.php');

class Refer extends dbObject{
   protected static $tName = "refer";
   protected static $db_fields  = array('id', 'user', 'referred_by', 'date', 'earned', 'claim_amount', 'date_update');
   public $id;
   public $user;
   public $referred_by;
   public $date;
   public $earned;
   public $claim_amount;
   public $date_update;

   public static function findById($id=0) {
		global $db;
		$rsArray = static::findBySql("SELECT * FROM ".static::$tName." WHERE user=".$db->SQLEscape($id)." LIMIT 1");
		return !empty($rsArray) ? array_shift($rsArray) : false;

   }

   

   
}

?>
