<?php
require_once(LIB_PATH . DS . 'dbclass' . DS . 'dbclass.php');
require_once(LIB_PATH . DS . 'dbobject' . DS . 'dbobject.php');

class Report extends dbObject
{
    protected static $tName = "espals_community_report";
    protected static $db_fields  = array('id', 'post_id', 'report_reason', 'type', 'reporter', 'date');
    public $id;
    public $post_id;
    public $report_reason;
    public $type;
    public $date;


    public static function findById($id = 0)
    {
        global $db;
        $rsArray = static::findBySql("SELECT * FROM " . static::$tName . " WHERE post_id=" . $db->SQLEscape($id) . " LIMIT 1");
        return !empty($rsArray) ? array_shift($rsArray) : false;
    }
}
