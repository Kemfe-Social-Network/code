<?php
require_once (LIB_PATH.DS.'dbclass'.DS.'dbclass.php');
require_once (LIB_PATH.DS.'dbobject'.DS.'dbobject.php');

class Community extends dbObject{
  protected static $tName = "espals_community_category";

  protected static $db_fields  = array('id', 'user_id', 'description', 'name', 'img_url', 'members', 'restriction', 'slug', 'date');
   public $id;
   public $user_id;
   public $description;
   public $name;
   public $img_url;
   public $members;
   public $restriction;
   public $slug;
   public $date;


   public static function findAllByLimit($limit=0) {
     $sql = "SELECT * FROM ".static::$tName;
     $sql .= " ORDER BY members DESC ";
     $sql .= "LIMIT {$limit}";
     return static::findBySql($sql);

   }

}

?>
