<?php

use function GuzzleHttp\Psr7\str;

class Premium extends Controller
{
  public function index()
  {
    $this->view('premium/index');
  }


  public function update_point()
  {
    global $db;
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();

    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
      $key = KEY;
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
      $user = Person::findById($loggedIn_user);
      $type = debioCleanInput($_POST['hash']);
      $check = get_transaction_hash($type);
      if ($check == 0) {

        $response = curl_without_auth("api/getStatus/" . $type);



        if (empty($response)) { } else {
          $rs =  json_decode($response,  true);
          if (isset($rs['code']) && $rs['code'] == "BAD") {
            $error["msg"] = "Verification failed. Please check if your have entered correct information.";
            $data["error"] = $error;
          } else if (isset($rs['code']) && $rs['code'] == "OK") {
            if (
              strtolower($rs['user']) == strtolower(my_decrypt($user->pSlug, KEY))
              && strtolower($rs['to']) == strtolower(CONTRACT)
            ) {
              /// run transaction
              $send =  makeDeposit($rs['value'], $loggedIn_user,  $type,  $post_currtime);
              if ($send) {
                $data["Ok"] = "OK";
              } else {
                $error["msg"] = "Unknown error please contact support";
                $data["error"] = $error;
              }
            } else {
              $error["msg"] = "Invalid transaction";
              $data["error"] = $error;
            }
          }
        }
      } else {
        $error["msg"] = "Transaction hash already used";
        $data["error"] = $error;
      }
      //che
    }
    echo json_encode($data);
  }




  public function payment()
  {
    $this->view('premium/payment');
  }

  public function ethereum()
  {

    global $db;
    $sql = "SELECT * FROM `espal_reward_point` WHERE `type` = 'ethereum' ";
    $query_run = $db->query($sql);
    $get_price = $db->fetchQuery($query_run);

    $cookie_name = "ether_price";
    $cookie_value = (float) $get_price['point'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    $key = KEY;
    $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
    $person =  Person::findById($loggedIn_user);

    if ($person->pSlug == "") {
      $response =  curl_without_auth("api/createWallet");


      if (empty($response)) { } else {
        $rs =  json_decode($response,  true);
        $person->mSlug = my_encrypt($rs['mnemonic'], $key);
        $person->kSlug = my_encrypt($rs['key'], $key);
        $person->pSlug = my_encrypt($rs['address'], $key);

        $person->save();

        //  if(isset($rs['error'])){
        //    $error["msg"] = $rs['error']['message'];
        //    $data["error"] = $error;
        //  }else if(isset($rs['response'])){

        //   $success["msg"] = $rs['response']['data']['message'];
        //   $success["status"] = "OK";
        //   $data["success"] = $success;

        //  }

      }
    }



    $this->view('premium/ethereum', $person);
  }
  public function choose($name = '', $otherName = '')
  {
    $key = KEY;
    $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);
    $this->view('premium/choose-payment-type', $loggedIn_user);
  }

  public function record_payment()
  {
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();

    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
      $key = KEY;
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

      if (
        isset($_POST['message']) && !empty($_POST['message']) &&
        isset($_POST['reference']) &&  !empty($_POST['reference'])
        && isset($_POST['status'])    &&  !empty($_POST['status'])
        && isset($_POST['trans'])     &&  !empty($_POST['trans'])
        && isset($_POST['trxref'])    &&  !empty($_POST['trxref'])
        && isset($_POST['trxref'])    &&  !empty($_POST['trxref'])
      ) {
        $pay = new Subscription();
        $pay->message = $_POST['message'];
        $pay->reference = $_POST['reference'];
        $pay->status = $_POST['status'];
        $pay->trans = $_POST['trans'];
        $pay->trxref = $_POST['trxref'];
        $pay->redirecturl = $_POST['trxref'];
        $pay->response = $_POST['response'];
        $pay->user_id = $loggedIn_user;
        $pay->amount = 1825;

        if ($pay->save()) {
          if ($_POST['status'] == 'success') {
            $user =  Person::findById($loggedIn_user);
            $user->membership_type = debioCleanInput($_POST['sub_type']);
            $user->membership_date = $post_currtime;
            $user->save();

            $amount =  (float) $_POST['amount_sub'] * 0.75;
            $refer =  Refer::findById($loggedIn_user);
            if ($refer) {
              $refer->earned =  $refer->earned + $amount;
              $refer->claim_amount =  $refer->claim_amount + $amount;
              $refer->save();
              $data["Ok"] = "Payment received";
            }
          } else {
            $error["msg"] = "Payment failed";
            $data["error"] = $error;
          }
        } else {
          $error["msg"] = "Error occurred. Try again later";
          $data["error"] = $error;
        }
      } else {
        $error["msg"] = "Error occurred. Try again later";
        $data["error"] = $error;
      }
    } else {
      $error["msg"] = "Access denied";
      $data["error"] = $error;
    }

    echo json_encode($data);
  }


  public function power_it()
  {
    $success = array();
    $error = array();
    $data = array();
    $post_time = time();

    $post_currtime = date('Y-m-d H:i:s', $post_time);

    if (isset($_COOKIE['auth']) && !empty($_COOKIE['auth'])) {
      $key = KEY;
      $loggedIn_user = my_decrypt($_COOKIE['auth'], $key);

      if (
        isset($_POST['amount'])  && $_POST['amount'] > 0
      ) {
        $user = Person::findById($loggedIn_user);
        $is_first = true;
        if ($user->power > 0) {
          $is_first = false;
          $rs = powerUpOnly((float) $_POST['amount'],  $loggedIn_user);
          if (!$rs) {
            $error["msg"] = "Power up failed try again later";
            $data["error"] = $error;
          } else {
            $data["Ok"] = "Done";
          }
        } else {
          if ($_POST['amount'] >= 50000) {
            $id =  get_referal_id($loggedIn_user);

            if ($id > 0) {
              $rs = powerUpAndRebate((float) $_POST['amount'],  $loggedIn_user, $id);
              if (!$rs) {
                $error["msg"] = "Power up failed try again later";
                $data["error"] = $error;
              } else {
                $data["Ok"] = "Done";
              }
            } else {
              $rs = powerUpOnly((float) $_POST['amount'],  $loggedIn_user);
              if (!$rs) {
                $error["msg"] = "Power up failed try again later";
                $data["error"] = $error;
              } else {
                $data["Ok"] = "Done";
              }
            }
          } else {
            $error["msg"] = "Minimum power for first time is 50K KFC. Make deposit and try again.";
            $data["error"] = $error;
          }
        }
      } else {
        $error["msg"] = "Error occurred. Try again later";
        $data["error"] = $error;
      }
    } else {
      $error["msg"] = "Access denied";
      $data["error"] = $error;
    }

    echo json_encode($data);
  }
}
