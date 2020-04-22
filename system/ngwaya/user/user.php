<?php
require_once(LIB_PATH . DS . 'dbclass' . DS . 'dbclass.php');
require_once(LIB_PATH . DS . 'dbobject' . DS . 'dbobject.php');
class Person extends dbObject
{
	protected static $tName = "user";
	protected static $db_fields  = array(
		'id', 'user_id', 'user_code', 'password', 'user_email_code',
		'user_img', 'earnings', 'power', 'about', 'banner', 'is_active', 'create_at',
		'update_at', 'mSlug', 'kSlug', 'pSlug', 'has_community', 'membership_type', 'membership_date'
	);
	public $id;
	public $user_id;
	public $user_code;
	public $password;
	public $user_email_code;
	public $user_img;
	public $earnings;
	public $power;
	public $about;
	public $banner;
	public $is_active;
	public $create_at;
	public $update_at;
	public $mSlug;
	public $kSlug;
	public $pSlug;
	public $eth_price;
	public $has_community;
	public $membership_type;
	public $membership_date;



	public static function authenticate($email = "", $password = "")
	{
		global $db;
		$email = $db->SQLEscape($email);
		$password = $db->SQLEscape($password);

		$sql  = "SELECT * FROM  " . static::$tName;
		$sql .= " WHERE user_code ='{$email}' ";
		$sql .= "AND password ='" . sha1($password) . "' ";
		$sql .= "LIMIT 1";
		$rsArray = static::findBySql($sql);
		return !empty($rsArray) ? array_shift($rsArray) : false;
	}

	public static function activate($email = "", $code = "")
	{
		global $db;
		$email = $db->SQLEscape($email);
		$code = $db->SQLEscape($code);

		$sql  = "SELECT * FROM  " . static::$tName;
		$sql .= " WHERE user_code ='{$email}' ";
		$sql .= "AND user_email_code ='{$code}' ";
		$sql .= "LIMIT 1";
		$rsArray = static::findBySql($sql);
		return !empty($rsArray) ? array_shift($rsArray) : false;
	}
}
