<?php
require_once (LIB_PATH.DS.'dbclass'.DS.'dbclass.php');
require_once (LIB_PATH.DS.'dbobject'.DS.'dbobject.php');

class Subscription extends dbObject{
  protected static $tName = "espals_transaction";
  protected static $db_fields  = array('id', 'user_id', 'message', 'redirecturl', 'reference', 'response', 'status', 'trans', 'trxref', 'amount');
  public $id;
  public $user_id;
  public $message;
  public $redirecturl;
  public $reference;
  public $response;
  public $status;
  public $trans;
  public $trxref;
  public $amount;




}

?>
