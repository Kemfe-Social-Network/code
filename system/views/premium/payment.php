<?php

if (isset($_COOKIE['auth'])) {
  $loggedIn =  true;
} else {
  $loggedIn =  false;
}

if ($loggedIn == true) {
  require_once 'public/layouts/head.php';
  $actual_link = "{$_SERVER['REQUEST_URI']}";

  // Implementaion of preg_split() function
  $result = preg_split('/[\/,]+/', $actual_link, -1, PREG_SPLIT_NO_EMPTY);

  //print_r($data_user_data);
  ?>



  <input type="hidden" id="amount_sub" value="<?php echo $result[2]; ?>">
  <input type="hidden" id="type_sub" value="<?php echo $result[3]; ?>">
  <input type="hidden" id="user_code" value="<?php echo $data_user_data['user_code']; ?>">

  <div class="mt-4 col-md-8 offset-md-2" style="margin-top: 70px;">
    <h3 class="mb-4 text-uppercase text-center"><i class="fas fa-shield-alt fa-3x text-warning"></i> <br> Kemfe subscritions</h3>
    <form style="text-align: center;">
      <script src="https://js.paystack.co/v1/inline.js"></script>
      <button type="button" onclick="payWithPaystack()" class="btn btn-success btn-block col-md-6 offset-md-3"> Make payment </button>
    </form>
  </div>




  <script>
    function payWithPaystack() {
      var handler = PaystackPop.setup({
        key: 'pk_live_7e0617b72b4c3ab66ec46fa8a361f7bf40c3a56d',
        email: $("#user_code").val(),
        amount: parseFloat($("#amount_sub").val() + "00"),

        callback: function(response) {
          var type_sub = $("#type_sub").val();
          var amount_sub = $("#amount_sub").val();
          var value = 'message=' + response.message + '';
          //value += '&redirecturl='+response.redirecturl+'';
          value += '&reference=' + response.reference + '';
          value += '&response=' + response.message + '';
          value += '&status=' + response.status + '';
          value += '&trans=' + response.trans + '';
          value += '&trxref=' + response.trxref + '';
          value += '&sub_type=' + type_sub + '';
          value += '&amount_sub=' + amount_sub + '';

          //value = 'amount='+response.message+'';
          $.ajax({
            url: "/premium/record_payment",
            type: "POST",
            data: value,
            success: function(response) {


              var data = JSON.parse(response);


              if (data.Ok) {

                toastMessage("Success", "Your payment was successful", 'success', "slide");
              } else {
                // console.log(data.error);
                toastMessage("Error", data.error.msg, 'error', "slide");
              }
              // you will get response from your php page (what you echo or print)

            },
            error: function(jqXHR, textStatus, errorThrown) {
              //console.log(textStatus, errorThrown);
            }


          });
        },
        onClose: function() {

        }
      });
      handler.openIframe();
    }
  </script>


  <script>
    PaystackPop.setup({
      key: 'pk_live_7e0617b72b4c3ab66ec46fa8a361f7bf40c3a56d',
      email: $("#user_code").val(),
      amount: parseFloat($("#amount_sub").val() + "00"),
      container: 'paystackEmbedContainer',
      callback: function(response) {


      },
    });
  </script>
<?php } else {
  redirect_to('/');
} ?>