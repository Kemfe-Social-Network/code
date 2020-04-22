<?php

if (isset($_COOKIE['auth'])) {
  $loggedIn =  true;
} else {
  $loggedIn =  false;
}

if ($loggedIn == true) {
  require_once 'public/layouts/head.php';
  ?>
  <style media="screen">
    .inforide {
      box-shadow: 0 0 16px 0 rgba(0, 0, 0, .06);
      background-color: white;

      height: 125px;
    }



    .rideone {
      background-color: #f8f8f8;
      padding-top: 25px;
      text-align: center;
      height: 125px;
      margin-left: 15px;

    }

    .ridetwo {
      background-color: #f8f8f8;
      padding-top: 30px;
      text-align: center;
      height: 125px;
      margin-left: 15px;

    }

    .ridethree {
      background-color: #f8f8f8;
      padding-top: 35px;
      text-align: center;
      height: 125px;
      margin-left: 15px;

    }

    .fontsty {
      margin-right: -15px;
    }

    .fontsty h2 {
      color: #6E6E6E;
      font-size: 35px;
      margin-top: 15px;
      text-align: right;
      margin-right: 30px;
    }

    .fontsty h4 {
      color: #6E6E6E;
      font-size: 25px;
      margin-top: 20px;
      text-align: right;
      margin-right: 30px;
    }

    .content-wrapper {



      background: transparent;
    }

    .table>tbody>tr>td,
    .table>tfoot>tr>td {
      vertical-align: middle;
    }

    @media screen and (max-width: 600px) {
      table#cart tbody td .form-control {
        width: 20%;
        display: inline !important;
      }

      .actions .btn {
        width: 36%;
        margin: 1.5em 0;
      }

      .actions .btn-info {
        float: left;
      }

      .actions .btn-danger {
        float: right;
      }

      table#cart thead {
        display: none;
      }

      table#cart tbody td {
        display: block;
        padding: .6rem;
        min-width: 320px;
      }

      table#cart tbody tr td:first-child {
        background: #333;
        color: #fff;
      }

      table#cart tbody td:before {
        content: attr(data-th);
        font-weight: bold;
        display: inline-block;
        width: 8rem;
      }



      table#cart tfoot td {
        display: block;
      }

      table#cart tfoot td .btn {
        display: block;
      }

    }
  </style>
  <div class="content-wrapper">
    <div class="container">
      <div class="row">

        <!-- Icon Cards-->
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
          <div class="inforide">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                <i class="fas fa-money-check-alt fa-2x"></i>
              </div>
              <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                <h4 style="margin-top: 5px;">Earnings</h4>
                <h2 style="margin-top: -5px;"><?php echo number_format($data_user_data['earnings'], 2); ?></h2>
                <h6 class="text-right text-success" style="margin-right: 20px;">Power: <?php echo number_format($data_user_data['power'], 2); ?> <small>KFC</small></h6>
                <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#bankModal" name="button" style="margin-bottom: -25px; margin-left: -43%; border-radius: 0 !important;"><i class="fas fa-toolbox"></i> Withdraw</button>
                <br>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
          <div class="inforide">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">
                <i class="fas fa-blog fa-2x"></i>
              </div>
              <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                <h4>Posts</h4>
                <h2><?php echo $data_user_data['posts']; ?></h2>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
          <div class="inforide">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridethree">

                <i class="fas fa-restroom fa-2x"></i>

              </div>
              <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                <h4>Referrals</h4>
                <h2><?php echo $data_user_data['referred_user']; ?></h2>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <section id="tabs" class="mt-4 pt-4">

    <div class="container mt-4 text-center">
      <div class="bg-white p-2">
        <h3 class="text-uppercase text-info" style="font-size: 24px;">Refer & get 100% bonus</h3>
        <p class=" col-md-6" style="margin: 0 auto; font-size: 14px;"> Get 100% rebate when you refer someone through your referral link to the platform. You must have at least 50k KFC in your power wallet to earn benefits..</p>
        <form class="mt-2">
          <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
          <div class="input-group mb-2 mr-sm-2">

            <input type="text" class="form-control text-success" id="referal_link" style="" value="https://kemfe.com/home/referal/<?php echo $data_user_data['id']; ?>" placeholder="">
            <button class="btn btn-warning" type="button" style="border-radius:0;" data-clipboard-target="#referal_link"> <i class="fas fa-copy"></i> Copy</button>
          </div>
        </form>
      </div>

    </div>
  </section>
  <section id="tabs" class="project-tab">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-4">
          <h4 class="mb-4 mt-4">Account Overview</h4>
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-reward-tab" data-toggle="tab" href="#nav-reward" role="tab" aria-controls="nav-reward" aria-selected="true"><i class="fas fa-blog"></i> Post Rewards</a>
              <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-restroom"></i> Referrals</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-donate"></i> Deposit</a>
              <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fas fa-toolbox"></i> Withdrawal </a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-reward" role="tabpanel" aria-labelledby="nav-reward-tab">
              <table id="cart" class="table table-hover table-condensed">
                <thead>
                  <tr>
                    <th style="width:50%">User</th>
                    <th style="width:10%">Source</th>
                    <th style="width:8%">Amount</th>
                    <th style="width:22%" class="text-center">Date</th>
                    <th style="width:10%">Action</th>
                  </tr>
                </thead>
                <tbody id="reward_table_data">

                </tbody>

              </table>
            </div>

            <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <table id="cart" class="table table-hover table-condensed">
                <thead>
                  <tr>
                    <th style="width:50%">Name</th>
                    <th style="width:10%">Email</th>
                    <th style="width:8%">Earned</th>
                    <th style="width:22%" class="text-center">Date</th>
                    <th style="width:10%"></th>
                  </tr>
                </thead>
                <tbody id="referral_table_data">

                </tbody>

              </table>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <table id="cart" class="table table-hover table-condensed">
                <thead>
                  <tr>
                    <th style="width:30%">Transaction ID</th>
                    <th style="width:15%">Reference</th>
                    <th style="width:10%">Amount</th>
                    <th style="width:25%" class="text-center">Date</th>
                    <th style="width:10%"></th>
                  </tr>
                </thead>
                <tbody id="user_deposit_table_data">

                </tbody>

              </table>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              <table id="cart" class="table table-hover table-condensed">
                <thead>
                  <tr>
                    <th style="width:30%">Wallet Address</th>
                    <th style="width:15%"> Amount</th>
                    <th style="width:10%">Fee</th>
                    <th style="width:10%">Receive Amount</th>
                    <th style="width:15%" class="text-center">Date</th>
                    <th style="width:10%"></th>
                  </tr>
                </thead>
                <tbody id="withdrawal_table_data">

                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Modal -->
  <div class="modal fade" id="bankModal" tabindex="-1" role="dialog" aria-labelledby="bankModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bankModalLabel">Withdraw KFC</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="name"><b>Amount</b></i></label>
            <input type="number" class="form-control" id="amount" value="" placeholder="eg: 1000">
          </div>

          <div class="form-group">
            <label for="name"><b>My Ethereum Wallet Address</b></i></label>
            <input type="text" class="form-control" id="name" value="" placeholder="Enter ethereum wallet address">
          </div>

          <!-- <div class="form-group">
            <label for="number"><b>Acount Number</b></i></label>
            <input type="number" class="form-control" id="number" value="" placeholder="Enter account number">
          </div> -->

          <div class="form-group">


            <!-- <label for="bank"><b>Bank Name</b></i></label> <select type="text" class="form-control " id="bank">
              <option selected>Choose</option>
              <option value="access">Access Bank</option>
              <option value="citibank">Citibank</option>
              <option value="diamond">Diamond Bank</option>
              <option value="ecobank">Ecobank</option>
              <option value="fidelity">Fidelity Bank</option>
              <option value="fcmb">First City Monument Bank (FCMB)</option>
              <option value="fsdh">FSDH Merchant Bank</option>
              <option value="gtb">Guarantee Trust Bank (GTB)</option>
              <option value="heritage">Heritage Bank</option>
              <option value="Keystone">Keystone Bank</option>
              <option value="rand">Rand Merchant Bank</option>
              <option value="skye">Skye Bank</option>
              <option value="stanbic">Stanbic IBTC Bank</option>
              <option value="standard">Standard Chartered Bank</option>
              <option value="sterling">Sterling Bank</option>
              <option value="suntrust">Suntrust Bank</option>
              <option value="union">Union Bank</option>
              <option value="uba">United Bank for Africa (UBA)</option>
              <option value="unity">Unity Bank</option>
              <option value="wema">Wema Bank</option>
              <option value="zenith">Zenith Bank</option>
            </select> -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-warning btn-sm" id="withdrawBTN" onclick="Withdraw()"><i class="fas fa-arrow-right"></i> Withdraw</button>
        </div>
      </div>
    </div>
  </div>
  <script src="/public/js/account.js?v=<?php echo $version; ?>" charset="utf-8"></script>
  <script src="/public/js/clipboard.min.js" charset="utf-8"></script>
  <script type="text/javascript">
    var clipboard = new ClipboardJS('.btn');

    clipboard.on('success', function(e) {
      toastMessage("Success", "Copied", 'success', "slide");

      e.clearSelection();
    });

    clipboard.on('error', function(e) {
      console.error('Action:', e.action);
      console.error('Trigger:', e.trigger);
    });
  </script>
<?php } else {
  redirect_to('/');
} ?>