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


  ?>
  <link rel="stylesheet" href="/public/css/solving.css?v=<?php echo $version; ?>" />
  <div id="quick-filters">
    <div class="container">
      <input type="hidden" id="pod_id" name="" value="<?php if (isset($result[1])) {
                                                          echo $result[1];
                                                        } else {
                                                          echo null;
                                                        }  ?>">
      <div class="p-0">
        <div class="">
          <div class="col">
            <small style="font-size: 10px;">SORT </small>
            <ul>
              <li>|</li>
              <li>
                <div class="dropdown show">
                  <a class="btn btn-default btn-sm dropdown-toggle changer" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-thumbtack"></i> Posts <i class="fa fa-caret-down"></i>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#" id="<?php echo $result[1]; ?>_all_post" onclick="filter(this.id)"> <i class="fa fa-thumbtack"></i> Posts</i></a>
                    <a class="dropdown-item" href="#" id="<?php echo $result[1]; ?>_all_comment" onclick="filter(this.id)"> <i class="fa fa-comment"></i> Comments</i></a>

                  </div>
                </div>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container gedf-wrapper">

    <div class="row">
      <div class="col-md-3 mobHide mlkl">
        <div style="position: sticky; position: -webkit-sticky; top: 57px;">

          <div class="card mt-2" style="padding: 5px;">


            <h5 class="card-title  text-bold" style="padding: 10px; font-size: 12px;">POSTS</h5>

            <a class="dropdown-item text-info" href="#" id="<?php echo $result[1]; ?>_mypost_post" onclick="filter(this.id)"> <small style="font-size: 11px; font-weight: bold;"><i class="fa fa-user"></i> MY POST</small></i></a>
            <a class="dropdown-item text-info" href="#" id="<?php echo $result[1]; ?>_upvote_post" onclick="filter(this.id)"> <small style="font-size: 11px; font-weight: bold;"><i class="fa fa-arrow-up"></i> UP VOTED</small></i></a>
            <a class="dropdown-item text-info" href="#" id="<?php echo $result[1]; ?>_downvote_post" onclick="filter(this.id)"> <small style="font-size: 11px; font-weight: bold;"><i class="fa fa-arrow-down"></i> DOWN VOTED</small></i></a>

            <label for="">Filter</label>
            <select class="form-control" name="">
              <option value="<?php echo $result[1] ?>_all_post">All Date</option>
              <option value="<?php echo $result[1] ?>_yesterday_post">Yesterday</option>
              <option value="<?php echo $result[1] ?>_last7_post">Last 7 days</option>
              <option value="<?php echo $result[1] ?>_last30_post">Last 30 days</option>

            </select>
            <div class="seperator"></div>
            <h5 class="card-title  bg-bold" style="padding: 10px; font-size: 12px;">COMMENTS</h5>

            <a class="dropdown-item text-info" href="#" id="<?php echo $result[1]; ?>_new_comment" onclick="filter(this.id)"> <small style="font-size: 11px; font-weight: bold;"><i class="fa fa-sort-numeric-up-alt"></i> New</small></a>
            <a class="dropdown-item text-info" href="#" id="<?php echo $result[1]; ?>_old_comment" onclick="filter(this.id)"> <small style="font-size: 11px; font-weight: bold;"><i class="fa fa-sort-numeric-down"></i> Old</small></a>
            <label for="">Filter</label>
            <select class="form-control" name="">
              <option value="<?php echo $result[1] ?>_all_comment">All Date</option>
              <option value="<?php echo $result[1] ?>_yesterday_comment">Yesterday</option>
              <option value="<?php echo $result[1] ?>_last7_comment">Last 7 days</option>
              <option value="<?php echo $result[1] ?>_last30_comment">Last 30 days</option>

            </select>

            <br>
          </div>


        </div>
      </div>


      <div class="col-md-6 gedf-main">

        <div class="" id="post_wrapper_div">

        </div>
      </div>

      <div class="col-md-3 mobHide ">
        <div style="position: sticky; position: -webkit-sticky; top: 57px;">
          <div class="twPc-div mb-2">
            <a class="twPc-bg twPc-block" style=" background-image: url('/public/images/600x200.jpg');
"></a>

            <div>


              <a title="silver" href="#" class="twPc-avatarLink">
                <?php
                  $images_url_for_usr =  $data_user_data['user_img'];

                  if ($images_url_for_usr == "user_default") {
                    $images_url_for_usr = $data_user_data['user_img'] . ".png";
                  }
                  ?>
                <img alt="silver" class="twPc-avatarImg" src="/public/images/<?php echo $images_url_for_usr; ?>">
              </a>

              <div class="twPc-divUser">
                <div class="twPc-divName">
                  <a href="/u/silver" style="text-transform: capitalize;">silver</a>
                </div>
                <span>
                  <a href="/u/silver">@<span><?php echo $data_user_data['user_id']; ?></span></a>
                </span>
              </div>

              <div class="twPc-divStats">
                <ul class="twPc-Arrange">
                  <li class="twPc-ArrangeSizeFit">
                    <a href="/u/silver" title="<?php echo $data_user_data['posts']; ?> Posts">
                      <span class="twPc-StatLabel twPc-block">Posts</span>
                      <span class="twPc-StatValue"><?php echo $data_user_data['posts']; ?></span>
                    </a>
                  </li>
                  <li class="twPc-ArrangeSizeFit">
                    <a href="/following/silver" title="0 Following">
                      <span class="twPc-StatLabel twPc-block">Following</span>
                      <span class="twPc-StatValue">0</span>
                    </a>
                  </li>
                  <li class="twPc-ArrangeSizeFit">
                    <a href="/followers/silver" title="0 Followers">
                      <span class="twPc-StatLabel twPc-block">Followers</span>
                      <span class="twPc-StatValue">0</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <div class="card gedf-card">
            <div class="card-body">
              <h5 class="card-title tenpx">MODERATOR OF THESE COMMUNITIES
              </h5>
            </div>
          </div>
          <?php require_once 'public/layouts/footer-links.php'; ?>

        </div>
      </div>
    </div>
  </div>
  <script src="/public/js/profile.js?v=<?php echo $version; ?>" charset="utf-8"></script>
<?php

} else {

  ?>


<?php
}
require_once 'public/layouts/footer.php';
?>