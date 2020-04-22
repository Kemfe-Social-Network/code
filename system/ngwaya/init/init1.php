<?php
//echo $_SERVER['DOCUMENT_ROOT'];
ini_set('display_errors', 1);
error_reporting(~1);
define("DS", "/");

define("SITE_ROOT", $_SERVER['DOCUMENT_ROOT'] . "/system");

define("LIB_PATH", SITE_ROOT . DS . 'ngwaya');
require_once(LIB_PATH . DS . 'session' . DS . 'session.php');
require_once(LIB_PATH . DS . 'db' . DS . 'config.php');

require_once(LIB_PATH . DS . 'func' . DS . 'func.php');
require_once(LIB_PATH . DS . 'dbclass' . DS . 'dbclass.php');

require_once(LIB_PATH . DS . 'dbobject' . DS . 'dbobject.php');

require_once(LIB_PATH . DS . 'paging' . DS . 'paging.php');
require_once(LIB_PATH . DS . 'user' . DS . 'user.php');

require_once(LIB_PATH . DS . 'post' . DS . 'comment.php');
require_once(LIB_PATH . DS . 'post' . DS . 'image.php');
require_once(LIB_PATH . DS . 'post' . DS . 'post.php');
require_once(LIB_PATH . DS . 'post' . DS . 'vote.php');
require_once(LIB_PATH . DS . 'post' . DS . 'community.php');
require_once(LIB_PATH . DS . 'post' . DS . 'group.php');
require_once(LIB_PATH . DS . 'post' . DS . 'payment.php');
require_once(LIB_PATH . DS . 'post' . DS . 'refer.php');
require_once(LIB_PATH . DS . 'post' . DS . 'follow.php');
require_once(LIB_PATH . DS . 'post' . DS . 'join.php');
require_once(LIB_PATH . DS . 'post' . DS . 'report.php');
