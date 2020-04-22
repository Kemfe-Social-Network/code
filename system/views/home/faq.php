<?php
if (isset($_COOKIE['auth'])) {
    $loggedIn =  true;
} else {
    $loggedIn =  false;
}
require_once 'public/layouts/head.php';
?>
<link rel="stylesheet" href="/public/css/cus.css">
<div class="container-fluid bg-info p-4">
    <h2 class="text-center text-white p-4">Faq</h2>
</div>

<div class="bs-example">
    <div class="accordion" id="accordionExample">
        <h2 class="p-4">GENERAL</h2>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">What Is Kemfe?</button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <p>Kemfe is a reward based community social news aggregator designed to host different discussions on the internet that mirror our day to day experience and things happening around us.</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo">How does Kemfe works?</button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <p>Kemfe rewards users for creating and curating content on the internet. The rewards come in the form of Kemfe Credits (KFC) which can be used to purchase service on the platform or exchange to your local currency.</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree">How do I create an account?</button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <p>Visit www.kemfe.com and click on the "Sign Up Tab”. You will be asked to enter your email address, password you can remember and then create you account. A Verification email will be sent to you in which you are required to open so as to verify your account.</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="heading4">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4">How does kemfe differ from other online discussion Board?</button>
                </h2>
            </div>
            <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
                <div class="card-body">
                    <p>Kemfe foster an engaging community that reward and promote valuable content (updating feed of breaking news, fun stories, pics, memes, and videos) and discussion.</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="heading5">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5">
                        Does it cost anything to post, comment, or vote?
                    </button>
                </h2>
            </div>
            <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        No. It is free to post, comment and vote contents on kemfe.com. You might even get rewarded for doing so.
                    </p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="heading7">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse7">
                        Where do the rewards kemfe award users come from?
                    </button>
                </h2>
            </div>
            <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        The rewards kemfe award users for their contribution come from advertisement revenue generated from the platform.
                    </p>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="heading6">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse6">
                        Can I earn rewards on kemfe? How?
                    </button>
                </h2>
            </div>
            <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        Yes, you can earn from kemfe platform if you are an active member. Active members earn in the following ways:



                    </p>
                    <p>
                        Publishing Content; by publishing content on the platform you get rewarded.
                    </p>
                    <p>
                        Curating contents; when you upvotes and comments on any post in the system you also get rewarded.
                    </p>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="heading8">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse8">
                        Can I use Kemfe official logo?
                    </button>
                </h2>
            </div>
            <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        Yes, as long as it is not in an attempt to impersonate or suggest any direct affiliation to Kemfe.
                    </p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="heading9">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse9">
                        What are the Kemfe Terms of Service?
                    </button>
                </h2>
            </div>
            <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        All content that is legal in Nigeria is permitted on the site. Certain malicious behavior on the site such as harassment, bullying, spam, threatening violence and copyright infringement may result in user/community ban. Kemfe full Terms of Service can be found <a href="/regulations/terms-of-service">here</a> .
                    </p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="heading11">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse11">
                        What is the Kemfe Privacy Policy?
                    </button>
                </h2>
            </div>
            <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        You can read the full Kemfe privacy policy <a href="/regulations/privacy-policy">here</a>
                    </p>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="heading12">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse12">
                        I lost my password, what should I do?
                    </button>
                </h2>
            </div>
            <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        If you lost use password, please click the password reset button or go to your profile user setting and reset your password.
                    </p>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="heading13">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse13">
                        I don’t have access to my email, what should I do?
                    </button>
                </h2>
            </div>
            <div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        If you don’t have access to your Email address but still have access to your account please go to profile setting and change your email address. If you don’t have access to your account please contact support.
                    </p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="heading14">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse14">
                        Can I change my username?
                    </button>
                </h2>
            </div>
            <div id="collapse14" class="collapse" aria-labelledby="heading14" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        Yes, you can change your username. Just go to your profile user setting and effect the changes
                    </p>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="heading15">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse15">
                        Can I change my password?
                    </button>
                </h2>
            </div>
            <div id="collapse15" class="collapse" aria-labelledby="heading15" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        Yes, you can change your username. Just go to your profile user setting and effect the changes
                    </p>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="heading16">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse16">
                        How do I contact Kemfe?
                    </button>
                </h2>
            </div>
            <div id="collapse16" class="collapse" aria-labelledby="heading16" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        You can contact kemfe by emailing info@kemfe.com.
                    </p>
                </div>
            </div>
        </div>
        <h2 class="p-4">COMMUNITY</h2>

        <div class="card">
            <div class="card-header" id="heading17">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse17">
                        Can I create a community?
                    </button>
                </h2>
            </div>
            <div id="collapse17" class="collapse" aria-labelledby="heading17" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        Yes, you can create community if you have the minimum requirement amount of kemfe Credits to do so.
                    </p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="heading18">
                <h2 class="mb-0">
                    <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse18">
                        What should I do when I join a community?
                    </button>
                </h2>
            </div>
            <div id="collapse18" class="collapse" aria-labelledby="heading18" data-parent="#accordionExample">
                <div class="card-body">
                    <p>
                        When you join a community please first read the rules guiding the community before contributing to any discussion to avoid being banned or restricted.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>