<div class="container gedf-wrapper">
  <?php require 'public/layouts/wysiwygrawdev.php'; ?>
  <div class="row">
    <div class="col-md-3 mobHide mlkl">
      <div style="position: sticky; position: -webkit-sticky; top: 57px;">
        <div class="twPc-div">
          <?php

          $banner_url_full = "";
          if ($data_user_data['banner'] == "") {
            $banner_url_full = "/public/images/600x200.jpg";
          } else {
            $banner_url_full = "/public/images/user-images/" . $data_user_data['banner'];
          }

          ?>
          <a class="twPc-bg twPc-block" style=" background-image: url(<?php echo $banner_url_full; ?>);"></a>

          <div>
            <div class="twPc-button">
              <!-- Twitter Button | you can get from: https://about.twitter.com/tr/resources/buttons#follow -->
              <button class="btn btn-primary btn-sm">Follow <?php echo $data_user_data['user_id']; ?></button>

              <!-- Twitter Button -->
            </div>


            <?php

            $img_url_full = "";
            if ($data_user_data['user_img'] == "user_default") {
              $img_url_full = "/public/images/user_default.png";
            } else {
              $img_url_full = "/public/images/user-images/" . $data_user_data['user_img'];
            }
            ?>
            <a title="<?php echo $data_user_data['user_id']; ?>" href="/u/<?php echo $data_user_data['user_id']; ?>" class="twPc-avatarLink">
              <img alt="" src="<?php echo $img_url_full; ?>" class="twPc-avatarImg">
            </a>

            <div class="twPc-divUser">
              <div class="twPc-divName">
                <a href="/u/<?php echo $data_user_data['user_id']; ?>" style="text-transform: capitalize;"><?php echo $data_user_data['user_id']; ?></a>
              </div>
              <span>
                <a href="/u/<?php echo $data_user_data['user_id']; ?>">@<span><?php echo $data_user_data['user_id']; ?></span></a>
              </span>
            </div>

            <div class="twPc-divStats">
              <ul class="twPc-Arrange">
                <li class="twPc-ArrangeSizeFit">
                  <a href="/u/<?php echo $data_user_data['user_id']; ?>" title="<?php echo $data_user_data['posts']; ?> Posts">
                    <span class="twPc-StatLabel twPc-block">Posts</span>
                    <span class="twPc-StatValue"><?php echo $data_user_data['posts']; ?></span>
                  </a>
                </li>
                <li class="twPc-ArrangeSizeFit">
                  <a href="following/index/<?php echo $data_user_data['user_id']; ?>" title="0 Following">
                    <span class="twPc-StatLabel twPc-block">Following</span>
                    <span class="twPc-StatValue"><?php echo $data_user_data['following']; ?></span>
                  </a>
                </li>
                <li class="twPc-ArrangeSizeFit">
                  <a href="followers/index/<?php echo $data_user_data['user_id']; ?>" title="0 Followers">
                    <span class="twPc-StatLabel twPc-block">Followers</span>
                    <span class="twPc-StatValue"><?php echo $data_user_data['followers']; ?></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card mt-2" style="padding: 5px;">
          <h4 class="text-uppercase tenpx">Advertisement</h4>
          <img src="/public/images/kemfe-300-250.png" class="card-img-top img-fluid" alt="...">

        </div>

        <div class="card mt-2" style="padding: 5px;">
          <h4 class="text-uppercase tenpx">Advertisement</h4>
          <img src="/public/images/instafinex-300x250.jpg" class="card-img-top img-fluid" alt="...">

        </div>
        <div class="card mt-2">
          <div class="card-body">
            <h5 class="card-title tenpx">MY COMMUNITIES</h5>
            <div id="myAvartaCommunity"></div>








          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 gedf-main">

      <?php require_once 'public/layouts/postDiv.php'; ?>

      <div id="post_wrapper_div">


      </div>
      <div id="loading" style="text-align:center;"><img src="/public/images/spinner.svg" class="img-fluid" style="height: 80px;" /></div>
    </div>

    <div class="col-md-3 mobHide ">
      <div style="position: sticky; position: -webkit-sticky; top: 57px;">
        <div class="card gedf-card" style="">
          <img src="/public/images/home-banner@2x.png" class="card-img-top" alt="...">
          <div class="card-body " style="padding: 10px;">

            <p class="card-text fourteenpx">Create your personal community with just oneclick. Creating a community allow you to manage and discuss specific topic of interest.
            </p>
            <button class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#communityModal">Create Community</button>
          </div>
        </div>

        <div class="card gedf-card">
          <div class="card-body">
            <h5 class="card-title tenpx">TRENDING COMMUNITIES</h5>

            <div id="avartaCommunity"></div>









          </div>
        </div>
        <!-- print footer here -->
        <?php require_once 'public/layouts/footer-links.php'; ?>
      </div>
    </div>


  </div>
</div>
<?php
?>