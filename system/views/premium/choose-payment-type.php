<?php

if (isset($_COOKIE['auth'])) {
	$loggedIn =  true;
}else{
	$loggedIn =  false;
}

if ($loggedIn == true) {
require_once 'public/layouts/head.php';
?>

<style>
	body{
		background: #222;
	}
</style>

<?php
$actual_link = "{$_SERVER['REQUEST_URI']}";

// Implementaion of preg_split() function
$result = preg_split('/[\/,]+/', $actual_link , -1, PREG_SPLIT_NO_EMPTY);

// Display result
// foreach ($data as $key => $value) {
// 	print_r($value);
// }



?>
  
  <div class="col-md-6 bg-light offset-md-3 p-md-5 p-1 mt-5 text-center">
	<h4 class="text-center text-info text-uppercase" style="font-size: 13px;">
		Choose payment type
	</h4>
	   <hr>
		<button class="btn btn-success text-uppercase" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-university fa-3x"></i>
            <br>
            Bank Tranfer
        </button>

        <a class="btn btn-info text-uppercase text-white" href="/premium/ethereum/<?php echo $result[3]; ?>">
        <i class="fab fa-ethereum fa-3x"></i>
            <br>
            Pay With ETH
</a>


        <a class="btn btn-warning text-uppercase" href="/premium/payment/<?php echo $result[2]."/".$result[3];?>">
            <i class="fas fa-credit-card fa-3x"></i>
            <br>
            Card Payment
        </a>
  </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bank Transfer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="alert alert-warning">
      
        <strong>Warning:</strong> Please use this code <b>(<?php echo $data; ?>)</b> as your depositor's name when making payment. to avoid delay in processing your payment.
    </div>
        <p>Bank: <b>FCMB</b></p>
        <p>Account Number: <b>5420689010</b></p>
        <p>Account Name: <b>Bitbegin LTD</b></p>
      </div>
     

    </div>
  </div>
</div>
<?php
}else {
  redirect_to("/");
}
