<?php

if (isset($_COOKIE['auth'])) {
    $loggedIn =  true;
} else {
    $loggedIn =  false;
}

if ($loggedIn == true) {
    require_once 'public/layouts/head.php';
    ?>
    <link rel="stylesheet" href="/public/css/payment.css?v=<?php echo $version; ?>">
    <link rel="stylesheet" href="/public/css/cus.css">
    <div style="clear: both;"></div>
    <!-- class="jumbotron"-->
    <div class="jumbotron ui">
        <div class="container">
            <h1 class="display-4">Power <span class="text-warning">Up</span></h1>


            <p class="lead">
                Powering Up increases your earning experience, gives you access to special benefits, <br> and directly support the growth of Kemfe ecosystem. The more Kemfe is user-supported,<br> the freer we are to make Kemfe the best rewarding community for all.
            </p>
            <!-- <p class="lead">
                <a class="btn btn-warning btn-lg" href="#kps" role="button">GET KEMFE PREMIUM</a>
            </p> -->
        </div>
    </div>



    <div class="box">
        <div class="container">
            <h4 class="text-center">Enjoy Endless rewards. </h4>
            <div class="text-center col-md-6 offset-md-3">
                Powering up allows you to increase your earning power.
                Your Daily reward pool grant will be much higher.
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-4  col-xs-12">

                    <div class="box-part text-center">

                        <img src="/public/images/reward.png" style="height: 80px;" class="img-fluid">

                        <div class="title">
                            <h4>Enjoy Endless rewards
                            </h4>
                        </div>

                        <div class="text">
                            <span> Powering up allows you to increase your earning power. Your Daily reward pool grant will be much higher.
                            </span>
                        </div>


                    </div>


                </div>

                <div class="col-lg-3 col-md-4  col-xs-12">

                    <div class="box-part text-center">

                        <img src="/public/images/billboard.png" style="height: 80px;" class="img-fluid">

                        <div class="title">
                            <h4>Access to Daily, Weekly & Monthly Contest.

                            </h4>
                        </div>

                        <div class="text">
                            <span>
                                Kemfe runs various contests that allow users winners to earn extra reward and recognitions within the ecosystem.

                            </span>
                        </div>



                    </div>
                </div>







                <div class="col-lg-3 col-md-4  col-xs-12">

                    <div class="box-part text-center">

                        <img src="/public/images/medal.png" style="height: 80px;" class="img-fluid">

                        <div class="title">
                            <h4>Access to create a community </h4>
                        </div>

                        <div class="text">
                            <span> To create a community of your own, you will need to have a minimum amount of KFC. Powering up is a faster way to qualify. You can also power up with KFC you earn through posting, commenting and up voting..</span>
                        </div>


                    </div>


                </div>



                <div class="col-lg-3 col-md-4  col-xs-12">

                    <div class="box-part text-center">

                        <img src="/public/images/boss.png" style="height: 80px;" class="img-fluid">

                        <div class="title">
                            <h4>Access to founders Club Community
                            </h4>
                        </div>

                        <div class="text">
                            <span>
                                All members who are welcomed into the founders club. As a founding member, you can propose changes or features that will enhance the growth of the ecosystem. Freely attend founders hangout within your location.
                            </span>
                        </div>


                    </div>


                </div>

            </div>
        </div>

        <h1 class="text-center"><a href="/premium/ethereum/gold" class="text-center btn btn-info">Power up Now <i class="fas fa-arrow-right"></i></a></h1>
        <!-- <div class="container" id="kps">
            <div class="row row-flex">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 offset-md-2">
                    <div class="price-table pt-bg-black">
                        <div>
                            <span>Kemfe Platinum</span>
                            <span>Price <?php echo niajaFormat("1,825") ?>/mo</span>
                            <span>Features included!</span>
                        </div>
                        <ul>
                            <li>Ads free experience</li>
                            <li>Access to training communities</li>
                            <li>Access to kemfe referral program (75%)
                            </li>
                            <li>Valid for one Month
                            </li>

                        </ul>
                        <a href="premium/choose/1825/premium">purchase</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 offset-md-2">
                    <div class="price-table pt-bg-green">
                        <div>
                            <span>Kemfe<br> Gold
                            </span>
                            <span>Price <?php echo niajaFormat("1,825") ?>/3 mo</span>
                            <span>Features included!</span>
                        </div>
                        <ul>
                            <li>Rewards Post and other activities</li>
                            <li>Access to training communities</li>
                            <li>Access to kemfe referral program (75%)</li>
                            <li>Valid Quarterly (3months)</li>
                        </ul>
                        <a href="premium/choose/1825/gold">purchase</a>
                    </div>
                </div>


            </div>
        </div> -->

        <!-- <div class="container">
            <h4>FAQ</h4>
            <div class="col-md-12">
                <center>
                    <div class="col-md-6">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Who is a Gold member?

                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <p> A Gold member is someone who has opted to earn from kemfe platform by upgrading his account from a membership plan to a gold membership plan. Gold members are signified by a Gold badge on their profile. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Who is a Platinum member?

                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <p>A Platinum member is someone who has opted to have an ads free experience in kemfe platform by upgrading his account from a membership plan to a platinum membership plan. Platinum members are signified by a platinum badge on their profile. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            How can I Upgrade my membership?

                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <p>To upgrade your account, Go to your profile and click the upgrade button.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            Which of the membership plan is better?


                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body">
                                        <p>There is no better membership plan. All plans are designed to suite the need of different individual.

                                        </p>
                                    </div>
                                </div>
                            </div>


                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            Is my card information save?



                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                    <div class="panel-body">
                                        <p>Yes, We use a trusted third party payment service provider used by most big corporation around the world to accept your payment.


                                        </p>
                                    </div>
                                </div>
                            </div>



                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingSix">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            How do I see my referral Earnings?




                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                    <div class="panel-body">
                                        <p>To see your referral earning please check your referral dashboard



                                        </p>
                                    </div>
                                </div>
                            </div>



                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingSeven">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                            How do I withdraw my earning?





                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                                    <div class="panel-body">
                                        <p>To withdraw your earning please click the withdrawal button, fill in your bank information and initiate the final withdrawal.




                                        </p>
                                    </div>
                                </div>
                            </div>





                        </div>
                    </div>
                </center>
            </div> -->
    </div>
    <?php require_once("public/layouts/other-footer.php") ?>
<?php } else {
    redirect_to('/');
} ?>