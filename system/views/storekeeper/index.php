<?php

if (isset($_COOKIE['auth'])) {
    $loggedIn =  true;
} else {
    $loggedIn =  false;
}

if ($loggedIn == true) {
    require_once 'public/layouts/head.php';
    ?>
    <style>
        .tab-content {
            background: white;
            border: 1px solid #dee2e6;
            border-top: none;
            padding: 20px;
        }
    </style>
    <?php
        $post_reward = 0;
        $post_comment = 0;
        $post_upvote = 0;
        $comment_upvote = 0;

        for ($i = 0; $i < sizeof($data); $i++) {
            if ($data[$i]['type'] == "post") {
                $post_reward = $data[$i]['point'];
            } else if ($data[$i]['type'] == "comment") {
                $post_comment = $data[$i]['point'];
            } else if ($data[$i]['type'] == "upvote") {
                $post_upvote = $data[$i]['point'];
            } else if ($data[$i]['type'] == "ethereum") {
                $ethereum_reward = $data[$i]['point'];
            } else if ($data[$i]['type'] == "cupvote") {
                $comment_upvote = $data[$i]['point'];
            }
        }
        ?>
    <link rel="stylesheet" href="/public/css/solving.css?v=<?php echo $version; ?>" />
    <style>
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
    <section id="tabs" class="project-tab">

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <div class="nav nav-tabs " id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-account-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-account" aria-selected="true">Site Configuration</a>
                            <a class="nav-item nav-link" id="nav-withdrawal-tab" data-toggle="tab" href="#nav-withdrawal" role="tab" aria-controls="nav-withdrawal" aria-selected="false">Withdrawals</a>


                            <!-- <a class="nav-item nav-link" id="nav-privacy_security-tab" data-toggle="tab" href="#nav-privacy_security" role="tab" aria-controls="nav-privacy_security" aria-selected="false">Privacy & Security</a>
                                <a class="nav-item nav-link" id="nav-notifications-tab" data-toggle="tab" href="#nav-notifications" role="tab" aria-controls="nav-notifications" aria-selected="false">Notifications</a> -->

                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                            <!-- Tab 1-->
                            <div class="">
                                <h5>Ethereum Price
                                    </br>
                                    <!-- <small style="font-size: 12px;">Change your username/display name.

</small></h5> -->



                                    <form id="post_form">
                                        <div class=""><input class="form-control col-md-6" id="ethereum_point" type="text" value="<?php echo (float) $ethereum_reward; ?>">
                                            <input type="hidden" value="ethereum" id="ethereum_type">
                                            <br>
                                            <button class="btn btn-sm btn-info" id="ethereum" type="button" onclick="change_reward_point_value(this.id)"><i class="fas fa-save"></i> Save</button>
                                        </div>
                                    </form>
                            </div>


                            <div class="">
                                <h5>Post Point
                                    </br>
                                    <!-- <small style="font-size: 12px;">Change your username/display name.

</small></h5> -->



                                    <form id="post_form">
                                        <div class=""><input class="form-control col-md-6" id="post_point" type="text" value="<?php echo (float) $post_reward; ?>">
                                            <input type="hidden" value="post" id="post_type">
                                            <br>
                                            <button class="btn btn-sm btn-outline-info" id="post" type="button" onclick="change_reward_point_value(this.id)"><i class="fas fa-save"></i> Save</button>
                                        </div>
                                    </form>
                            </div>

                            <div class="mt-5">
                                <h5>Upvote Point
                                    </br>
                                    <!-- <small style="font-size: 12px;">Change your username/display name.

</small></h5> -->



                                    <form id="upvote_form">
                                        <div class=""><input class="form-control col-md-6" id="upvote_point" type="type" value="<?php echo (float) $post_upvote; ?>">
                                            <input type="hidden" value="upvote" id="upvote_type">
                                            <br>
                                            <button class="btn btn-sm btn-warning" type="button" id="upvote" onclick="change_reward_point_value(this.id)"><i class="fas fa-save"></i> Save</button>
                                        </div>
                                    </form>
                            </div>

                            <div class="mt-5">
                                <h5>Comment Upvote Point
                                    </br>
                                    <!-- <small style="font-size: 12px;">Change your username/display name.

</small></h5> -->



                                    <form id="cupvote_form">
                                        <div class=""><input class="form-control col-md-6" id="cupvote_point" type="type" value="<?php echo (float) $comment_upvote; ?>">
                                            <input type="hidden" value="cupvote" id="cupvote_type">
                                            <br>
                                            <button class="btn btn-sm btn-info" type="button" id="cupvote" onclick="change_reward_point_value(this.id)"><i class="fas fa-save"></i> Save</button>
                                        </div>
                                    </form>
                            </div>

                            <div class="mt-5">
                                <h5>Comment Point
                                    </br>
                                    <!-- <small style="font-size: 12px;">Change your username/display name.

</small></h5> -->



                                    <form id="comment_form">
                                        <div class=""><input class="form-control col-md-6" id="comment_point" type="type" value="<?php echo (float) $post_comment; ?>">
                                            <input type="hidden" value="comment" id="comment_type">
                                            <br>
                                            <button class="btn btn-sm btn-success" type="button" id="comment" onclick="change_reward_point_value(this.id)"><i class="fas fa-save"></i> Save</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-withdrawal" role="tabpanel" aria-labelledby="nav-withdrawal-tab">
                            <!-- Tab 2-->
                            <!-- Tab 1-->
                            <br>
                            <h5>Withdrawals</h5>

                            <table id="cart" class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th style="width:30%">Wallet Address</th>
                                        <th style="width:15%"> Amount</th>
                                        <th style="width:10%">Fee</th>
                                        <th style="width:10%">Final Amount</th>
                                        <th style="width:15%" class="text-center">Date</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>
                                <tbody id="withdrawal_table_data">

                                </tbody>

                            </table>


                        </div>
                        <div class="tab-pane fade" id="nav-privacy_security" role="tabpanel" aria-labelledby="nav-privacy_security-tab">
                            <!-- Tab 2-->


                            <!-- Tab 1-->
                            <br>
                            <h5>Privacy & security settings
                            </h5>
                            <br>

                            <div class="col-md-6" style="border-bottom: 1px solid #eee; padding-left: 0">
                                <!-- <h6 style="font-size: 10px">ADVANCED SECURITY

</h6> -->
                                <h6 style="font-size: 10px">BLOCKED USERS

                                </h6>

                            </div>


                            <br>
                            <div class="col-md-6" style=" padding-left:0px !important">
                                <div class="row">






                                    <div id="div_for_blocked_user">

                                    </div>
                                    <!-- <div class="col-md-6"><h5><a href="#" class="btn-link" style="font-size: 16px;">Two-factor authentication <i class="fas fa-external-link-alt"></i> </a></br>
<small style="font-size: 12px;">Increase your account's security by requiring a one-time use code along with your username and password

</small></h5> </div><div class="col-md-6"><a href="#"  style="float: right;"><i class="fas fa-arrow-right"></i> </a></div> -->

                                </div>
                            </div>
                            <br><br>

                            <div class="col-md-6" style="border-bottom: 1px solid #eee; padding-left: 0">
                                <h6 style="font-size: 10px">MESSAGING PRIVACY

                                </h6>


                            </div>
                            <br>
                            <div class="">
                                <h5>Blocked users list

                                    </br>
                                    <small style="font-size: 12px;">

                                    </small></h5>
                                <div class=""><input class="form-control col-md-6" id="user_to_block" placeholder="ADD USER TO BLOCKED LIST" maxlength="20" type="text" value="">
                                    <div class=""></div>
                                    <button class="btn btn-sm btn-outline-info mt-2" id="block_user_btn" onclick="block_user()"><i class="fas fa-save"></i> Save</button>
                                </div>
                            </div>


                        </div>





                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <script src="/public/js/admin-fun.js"></script>  -->
    <script src="/public/js/site-configuration.js?v=<?php echo $version; ?>"></script>
<?php
} else {
    redirect_to("/");
}
