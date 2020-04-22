<?php
if (isset($_COOKIE['auth'])) {
  $loggedIn =  true;
} else {
  $loggedIn =  false;
}
require_once 'public/layouts/head.php';

?>
<link rel="stylesheet" href="/public/css/solving.css?v=<?php echo $version; ?>" />
<div id="quick-filters">

  <?php
  $actual_link = "{$_SERVER['REQUEST_URI']}";

  // Implementaion of preg_split() function
  $result = preg_split('/[\/,]+/', $actual_link, -1, PREG_SPLIT_NO_EMPTY);

  // Display result

  ?>
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
    <?php

    $banner_url_full = "";
    if ($data_user_data['banner'] == "") {
      $banner_url_full = "/public/images/600x200.jpg";
    } else {
      $banner_url_full = "/public/images/user-images/" . $data_user_data['banner'];
    }

    ?>
    <div class="col-md-3 mobHide ">
      <div style="position: sticky; position: -webkit-sticky; top: 57px;">
        <div class="twPc-div mb-2">
          <a class="twPc-bg twPc-block" style=" background-image: url(<?php echo $banner_url_full; ?>);
  "></a>

          <div>
            <div class="twPc-button">
              <!-- Twitter Button | you can get from: https://about.twitter.com/tr/resources/buttons#follow -->
              <?php
              if ($data['isFollowing'] > 0) {
                ?>
                <button class="btn btn-warning btn-sm" id="follow-<?php echo $data['id']; ?>" onclick="unfolow(this.id)">Following <?php echo $data['user_id']; ?></button>

              <?php
              } else {
                ?>
                <button class="btn btn-primary btn-sm" id="follow-<?php echo $data['id']; ?>" onclick="follow_user(this.id)">Follow <?php echo $data['user_id']; ?></button>

              <?php
              }
              ?>


              <!-- Twitter Button -->
            </div>

            <a title="<?php echo $data['user_id']; ?>" href="#" class="twPc-avatarLink">
              <?php

              $img_url_full = "";
              if ($data_user_data['user_img'] == "user_default") {
                $img_url_full = "/public/images/user_default.png";
              } else {
                $img_url_full = "/public/images/user-images/" . $data_user_data['user_img'];
              }
              ?>
              <img alt="<?php echo $data['user_id']; ?>" class="twPc-avatarImg" src="<?php echo $img_url_full; ?>">
            </a>

            <div class="twPc-divUser">
              <div class="twPc-divName">
                <a href="/u/<?php echo $data['user_id']; ?>" style="text-transform: capitalize;"><?php echo $data['user_id']; ?></a>
              </div>
              <span>
                <a href="/u/<?php echo $data['user_id']; ?>">@<span><?php echo $data['user_id']; ?></span></a>
              </span>
            </div>

            <div class="twPc-divStats">
              <ul class="twPc-Arrange">
                <li class="twPc-ArrangeSizeFit">
                  <a href="/u/<?php echo $data['user_id']; ?>" title="<?php echo $data['posts']; ?> Posts">
                    <span class="twPc-StatLabel twPc-block">Posts</span>
                    <span class="twPc-StatValue"><?php echo $data['posts']; ?></span>
                  </a>
                </li>
                <li class="twPc-ArrangeSizeFit">
                  <a href="/following/<?php echo $data['user_id']; ?>" title="0 Following">
                    <span class="twPc-StatLabel twPc-block">Following</span>
                    <span class="twPc-StatValue"><?php echo $data['following'] ?></span>
                  </a>
                </li>
                <li class="twPc-ArrangeSizeFit">
                  <a href="/followers/<?php echo $data['user_id']; ?>" title="0 Followers">
                    <span class="twPc-StatLabel twPc-block">Followers</span>
                    <span class="twPc-StatValue"><?php echo $data['followers'] ?></span>
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
<script type="text/javascript" src="/public/js/func.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/js/u.js?v=<?php echo $version; ?>"></script>
<?php
require_once 'public/layouts/footer.php';
?>