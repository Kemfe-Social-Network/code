<?php
if (isset($_COOKIE['auth'])) {
    $loggedIn =  true;
} else {
    $loggedIn =  false;
}
require_once 'public/layouts/head.php';
?>
<link rel="stylesheet" href="/public/css/cus.css">

<section class="cocky">
    <div style="background-color: rgba(0,0,0, 0.8); text-align:center; padding: 20px; color: white; ">

        <div class="jumbotron" style="background-color: transparent;">
            <h3>Kemfe: Get Rewarded For Your Social Activities</h3>

        </div>

    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-xl-6 mx-auto text-center">
            <div class="section-title mb-100">

                <h4>Our Mission </h4>
                <p>Our core mission is to foster an engaging community that promote interesting and valuable contents(updating feed of breaking news, fun stories, pics, memes, and videos) and discussion</p>
            </div>
        </div>
    </div>

</div>

<div class="container">
    <div class="section-title" style="text-align: center;">

        <h4>Our Promise </h4>
    </div>
    <div class="row">


        <div class="col-lg-4 col-md-6">
            <!-- Single Service -->
            <div class="single-service">
                <i><img src="/public/images/clock.png" style="height: 80px" class="img-fluid"></i>
                <h4>Value for Your Time </h4>
                <p>We strongly believe that your time is the most valuable asset we can ever get. We promise to reward you for the value which you bring to our platform<br><br></p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <!-- Single Service -->
            <div class="single-service">
                <i><img src="/public/images/transparency.png" style="height: 80px" class="img-fluid"></i>
                <h4>Transparency/Accountability</h4>
                <p> We leverage on blockchain technology to bring about transparency in all we do. We hope to further improve on that by launching a full blockchain ecosystem in the nearest future. <br> <br></p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <!-- Single Service -->
            <div class="single-service">
                <i><img src="/public/images/innovation.png" style="height: 80px" class="img-fluid"></i>

                <h4>Abuse of Power</h4>
                <p> Like so many other social networks, we do not censor or sell users data.
                    We do not determine what you see on your news feeds. It is the members of the community that does though their votes.
                </p>
            </div>
        </div>



    </div>
    <div style="margin:  0 auto; text-align: center;" class="col-md-4">
        <h4 class="text-center mb-4">Our Community Values</h4>





        <div class="single-service" style="padding: 0 ; margin: 0;">

            <p> Be Real</p>

        </div>
        <div class="single-service" style="padding: 0 ;  margin: 0;">

            <p> Respect Other People Opinion</p>

        </div>
        <div class="single-service" style="padding: 0 ;  margin: 0;">

            <p>Encourage Freedom Of Speech</p>

        </div>

        <div class="single-service" style="padding: 0 ;  margin: 0;">

            <p>Reward Every Good Contribution</p>

        </div>

        <div class="single-service" style="padding: 0 ;  margin: 0;">

            <p>Do Not Promote Evil</p>

        </div>
    </div>
</div>

<?php require_once("public/layouts/other-footer.php") ?>