<?php
class Account extends Controller
{

  public function index()
  {
    global $db;
    $this->view('stats/index');
  }

  public function get_user_rewards($page = "")
  {
    if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
      global $db;

      $key = KEY;
      $name = $_COOKIE['auth'];
      $decrypted_user =  my_decrypt($name, $key);




      $sql  = " SELECT post.post_url, person.user_id, vote.earn, vote.type, vote.id, vote.isclaimed, vote.date";
      $sql .= " FROM espals_community_vote AS vote INNER JOIN espals_community_post AS post ";
      $sql .= "  ON vote.post_id = post.id INNER JOIN user AS person ON vote.user_id = person.id ";
      $sql .= " WHERE  vote.post_author = {$decrypted_user} ";
      $data = $db->query($sql);
      $courses = array();
      while ($a = $db->fetchQuery($data)) {
        $obj = new stdClass();
        $obj->name      =   $a['user_id'];
        $obj->earn    =   niajaFormat(number_format($a['earn'], 2));
        $obj->type     =   $a['type'];
        $obj->post_url     =   $a['post_url'];
        $obj->isclaimed     =   $a['isclaimed'];
        $obj->id     =   $a['id'];
        $obj->date      =   ShowDate(strtotime($a['date']));
        if ($a['isclaimed']) {
          $obj->status = '<button class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>';

          //$obj->status = '<button class="btn btn-warning btn-sm" id="' . $a['id'] . '-' . $a['earn'] . '" onclick="claimit(this.id)"><i class="fa fa-award"></i> Claim</button>';
        } else {
          $obj->status = '<button class="btn btn-warning btn-sm" id="' . $a['id'] . '-' . $a['earn'] . '" onclick="claimit(this.id)"><i class="fa fa-award"></i> Claim</button>';
        }
        $courses[] = $obj;
      }

      echo json_encode($courses);
    }
  }



  public function fetch_referral($page = "")
  {
    if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
      global $db;

      $key = KEY;
      $name = $_COOKIE['auth'];
      $decrypted_user =  my_decrypt($name, $key);

      $sql  = "SELECT refer.*, user.user_id, user.user_code ";
      $sql .= " FROM user LEFT JOIN refer ON user.id = refer.user ";
      $sql .= " WHERE refer.referred_by = {$decrypted_user} ";
      $data = $db->query($sql);
      $courses = array();
      while ($a = $db->fetchQuery($data)) {
        $obj = new stdClass();
        $obj->name      =   $a['user_id'];
        $obj->earned    =   niajaFormat(number_format($a['earned'], 2));
        $obj->email     =   $a['user_code'];
        $obj->date      =   ShowDate(strtotime($a['date']));
        if ($a['earned'] > 0) {
          $obj->status = '<button class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>';
        } else {
          $obj->status = '<button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>';
        }
        $courses[] = $obj;
      }

      echo json_encode($courses);
    }
  }


  public function fetch_user_deposit($page = "")
  {
    if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
      global $db;

      $key = KEY;
      $name = $_COOKIE['auth'];
      $decrypted_user =  my_decrypt($name, $key);

      $sql  = "SELECT * FROM `espals_transaction` WHERE `user_id` = {$decrypted_user} AND `message` = 'KFC PAYMENT' ";

      $data = $db->query($sql);
      $courses = array();
      while ($a = $db->fetchQuery($data)) {
        $obj = new stdClass();
        $obj->trans_id      =   $a['trxref'];
        $obj->reference     =   $a['message'];
        $obj->amount    =   niajaFormat(number_format($a['amount'], 2));
        $obj->date      =   ShowDate(strtotime($a['date']));
        if ($a['status'] == 1) {
          $obj->status = '<button class="btn btn-success btn-sm"><i class="fa fa-check"></i> Success</button>';
        } else {
          $obj->status = '<button class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Failed</button>';
        }
        $courses[] = $obj;
      }

      echo json_encode($courses);
    }
  }

  public function user_withdraw()
  {
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();
    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {

      $key = KEY;
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
      //$user,  $name, $bank, $number, $amount
      $make_withdraw  = makeWithdrawal($loggedIn_user, debioCleanInput($_POST["name"]), debioCleanInput($_POST["amount"]), $post_currtime);
      if ($make_withdraw) {
        $data["Ok"] = "OK";
        $data["msg"] = "Withdrawal completed successfully";
      } else {
        $error["msg"] = "Withdrawal was not successful";
        $data["error"] = $error;
      }
    } else {
      // access denied
      $error["msg"] = "Access denied";
      $data["error"] = $error;
    }

    echo json_encode($data);
  }

  public function claim()
  {
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();
    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {

      $key = KEY;
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

      $make_withdraw  = makeclaim($loggedIn_user, (int) $_POST["id"], (float) $_POST["amount"]);
      if ($make_withdraw) {
        $data["Ok"] = "OK";
        $data["msg"] = "claim completed successfully";
      } else {
        $error["msg"] = "claim was not successful";
        $data["error"] = $error;
      }
    } else {
      // access denied
      $error["msg"] = "Access denied";
      $data["error"] = $error;
    }

    echo json_encode($data);
  }

  public function fetch_withdrawal_by_user($page = "")
  {
    if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
      global $db;

      $key = KEY;
      $name = $_COOKIE['auth'];
      $decrypted_user =  my_decrypt($name, $key);

      $sql  = "SELECT * FROM `espals_withdrawal` WHERE `user` = {$decrypted_user}";
      //`id`, `name`, `bank`, `number`, `amount`, `user`, `settled`, `date`
      $data = $db->query($sql);
      $courses = array();
      while ($a = $db->fetchQuery($data)) {
        $obj = new stdClass();
        $obj->name      =   $a['name'];
        $obj->bank     =   $a['amount'];
        $obj->number     =   $a['number'];

        $obj->amount    =   niajaFormat(number_format($a['amount'], 2));
        $obj->date      =   ShowDate(strtotime($a['date']));
        if ($a['settled'] == 1) {
          $obj->status = '<button class="btn btn-success btn-sm"><i class="fa fa-check"></i> Paid</button>';
        } else {
          $obj->status = '<button class="btn btn-warning btn-sm"><i class="fa fa-pause"></i> Pending</button>';
        }
        $courses[] = $obj;
      }

      echo json_encode($courses);
    }
  }

  public function fetch_withdrawal_by_admin($page = "")
  {
    if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
      global $db;

      $key = KEY;
      $name = $_COOKIE['auth'];
      $decrypted_user =  my_decrypt($name, $key);

      $sql  = "SELECT * FROM `espals_withdrawal` ORDER BY `id` DESC ";
      //`id`, `name`, `bank`, `number`, `amount`, `user`, `settled`, `date`
      $data = $db->query($sql);
      $courses = array();
      while ($a = $db->fetchQuery($data)) {
        $obj = new stdClass();
        $obj->name      =   $a['name'];
        $obj->bank     =   $a['amount'];
        $obj->number     =   $a['number'];

        $obj->amount    =   niajaFormat(number_format($a['amount'], 2));
        $obj->date      =   ShowDate(strtotime($a['date']));
        if ($a['settled'] == 1) {
          $obj->status = '<button class="btn btn-success btn-sm"><i class="fa fa-check"></i> Paid</button>';
        } else {
          $obj->status = '<button class="btn btn-warning btn-sm"><i class="fa fa-pause"></i> Pending</button>';
        }
        $courses[] = $obj;
      }

      echo json_encode($courses);
    }
  }
}
