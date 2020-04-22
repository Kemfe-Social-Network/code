<?php

$address =  my_decrypt($data->pSlug, KEY);

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
    <link rel="stylesheet" href="/public/css/ethereum.css">
    <link rel="stylesheet" href="/public/css/cus.css">

    <input type="hidden" id="amount_sub" value="<?php echo $result[2]; ?>">
    <input type="hidden" id="type_sub" value="<?php echo $result[3]; ?>">
    <input type="hidden" id="user_code" value="<?php echo $data_user_data['user_code']; ?>">
    <style>
        .loader {
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 120px;
            height: 120px;

            animation: spin 2s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <div class="mt-4 col-md-8 offset-md-2" style="margin-top: 70px;">
        <h3 class="mb-4 text-uppercase text-center"><i class="fas fa-shield-alt fa-3x text-warning"></i> <br> Kemfe subscritions</h3>
        <!-- <div class="loader" style="text-align:center;"></div>
  <p class="text-center">Please wait....</p> -->
    </div>


    <div class=" register col-md-6 offset-md-3">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="power-tab" data-toggle="tab" href="#power" role="tab" aria-controls="power" aria-selected="true">Power Up</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Make Deposit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Verify Deposit</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active  form-new" id="power" role="tabpanel" aria-labelledby="power-tab">

                        <div class="row register-form">
                            <div class="col-md-6">
                                <img src="/public/images/cable.png" class="img-fluid mt-4" />
                            </div>
                            <div class="col-md-6">
                                <form method="post" id="power_up_data">
                                    <div class="customer-info transactionamount">
                                        <div class="customer-email">Balance: <span><?php echo number_format($data_user_data['earnings'], 2); ?> KFC</span></div>
                                        <div class="transactionamount">
                                            Power: <span><?php echo number_format($data_user_data['power'], 2) ?> KFC </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="amount" class="form-control" placeholder="Enter power amount *" value="" required="" />
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-success btn-sm btn-block" id="pbtn" onclick="power(this.id)" type="button">Add Power</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show  form-new" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="row register-form">
                            <div class="col-md-6">
                                <img src="https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=<?php echo $address ?>" />
                            </div>
                            <div class="col-md-6">
                                <form method="post">
                                    <div class="customer-info">
                                        <div class="customer-email"><?php echo $data->user_code; ?></div>
                                        <div class="transactionamount">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="addressEther" class="form-control" placeholder="Enter myEther wallet *" value="<?php echo $address; ?>" required="" />
                                    </div>
                                    <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        After payment copy your transaction hash & click verify payment to verify your payment
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success btn-sm btn-block" data-clipboard-action="cut" data-clipboard-target="#addressEther" type="button">Copy wallet Address</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show  form-new" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        <div class="row register-form">
                            <div class="col-md-12">
                                <form method="post" id="verify_form_data">
                                    <br>
                                    <h6 class="text-uppercase">Verify your payment</h6>
                                    <p>Enter the transaction hash you got from <b>etherscan.io</b> , <b>MetaMask
                                        </b> or any ethereum wallet provider below to verify your payment</p>
                                    <div class="form-group">
                                        <input type="text" name="hash" class="form-control" placeholder="Enter transaction hash *" value="" required="" />
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-info btn-sm btn-block" type="button" id="vbtn" onclick="verify_payment(this.id)">Verify payment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <?php require_once("public/layouts/other-footer.php") ?>
    <script src="/public/js/clipboard.min.js"></script>
    <script>
        var clipboard = new ClipboardJS('.btn');

        clipboard.on('success', function(e) {
            console.info('Action:', e.action);
            console.info('Text:', e.text);
            console.info('Trigger:', e.trigger);

            e.clearSelection();
        });

        clipboard.on('error', function(e) {
            console.error('Action:', e.action);
            console.error('Trigger:', e.trigger);
        });

        function verify_payment(id) {


            var value = $("#verify_form_data").serialize();



            disabledBtn("", id);

            $.ajax({
                url: "/premium/update_point",
                type: "POST",
                data: value,
                success: function(response) {



                    var data = JSON.parse(response);

                    enableBtn("<i class=\"fas fa-save\"></i> Verify Payment", id);

                    if (data.Ok) {


                        toastMessage("Success", "Done!", 'success', "slide");
                        window.location.reload();
                    } else {

                        toastMessage("Error", data.error.msg, 'error', "slide");
                    }
                    // you will get response from your php page (what you echo or print)

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }


            });

        }

        function power(id) {


            var value = $("#power_up_data").serialize();



            disabledBtn("", id);

            $.ajax({
                url: "/premium/power_it",
                type: "POST",
                data: value,
                success: function(response) {

                    console.log(response);


                    var data = JSON.parse(response);

                    enableBtn("<i class=\"fas fa-arrow-right\"></i> Add Power", id);

                    if (data.Ok) {


                        toastMessage("Success", "Power up was successful!", 'success', "slide");
                        window.location.reload();
                    } else {

                        toastMessage("Error", data.error.msg, 'error', "slide");
                    }
                    // you will get response from your php page (what you echo or print)

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }


            });

        }
    </script>


<?php } else {
    redirect_to('/');
} ?>