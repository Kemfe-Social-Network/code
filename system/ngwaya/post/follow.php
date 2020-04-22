<?php
require_once(LIB_PATH . DS . 'dbclass' . DS . 'dbclass.php');
require_once(LIB_PATH . DS . 'dbobject' . DS . 'dbobject.php');

class FollowMe extends dbObject
{
    protected static $tName = "espals_follow_system";
    protected static $db_fields  = array('id', 'following', 'user', 'date');
    public $id;
    public $following;
    public $user;
    public $date;
}
