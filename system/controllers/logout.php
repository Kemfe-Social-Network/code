<?php
class Logout extends Controller
{

  public function index()
  {
    $cookie_name = 'auth';
    unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
   $res = setcookie($cookie_name, '', time() - 3600);

   redirect_to("/");
  }
}
