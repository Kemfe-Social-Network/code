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
    <h2 class="text-center text-white p-4">Content Policy</h2>
</div>

<div class="container-fluid bg-white p-4">
    <div class="row">
        <div class="col-md-8" style="margin: 0 auto;">
            <h3>Kemfe Content Policy</h3>
            <p>Kemfe is a platform designed for people to discuss and share issues that concern and affect their daily life. These discussions are centered in different communities where various interesting content are found. Users who create content in kemfe can be very funny, serious, offensive, but that is just their perspective or opinion and should not call for abuses on individuals.While
                participating we should behave and respect each other’s opinion the way you would do I real-life meeting.</p>
            <h4>Content we do not accept</h4>
            <p>The flowing contents are unacceptable on kemfe platform. These contents are deemed unacceptable because they are generally found to violet humanity and the law.</p>
            <h4>The following content listed below is found to be prohibited when it:</h4>
            <ul>
                <li>Is illegal</li>
                <li>Is involuntary pornography</li>
                <li>Is sexual or suggestive content involving minors</li>
                <li>Encourages or incites violence</li>
                <li>Threatens, harasses, or bullies or encourages others to do so</li>
                <li>Is personal and confidential information</li>
                <li>Impersonates someone in a misleading or deceptive manner</li>
                <li>Uses Kemfe to solicit or facilitate any transaction or gift involving certain goods and services</li>
                <li>Is spam</li>
            </ul>

            <h4>Prohibited behavior</h4>
            <p>In addition to not submitting unwelcome content, the following behaviors are prohibited on Kemfe</p>
            <ul>
                <li>Asking for votes or engaging in vote manipulation</li>
                <li>Breaking Kemfe or doing anything that interferes with normal use of Kemfe.</li>
                <li>Creating multiple accounts to evade punishment or avoid restrictions</li>
            </ul>

            <h4>Enforcement</h4>
            <p>We have a variety of ways of enforcing our rules, including, but not limited to</p>
            <ul>
                <li>Asking you nicely to take it off</li>
                <li>Asking you less nicely</li>
                <li>Temporary or permanent suspension of accounts</li>
                <li>Removal of privileges from, or adding restrictions to, accounts</li>
                <li>Removal of content</li>
                <li>Banning of the community involve</li>
            </ul>
            <h4>Moderation within communities</h4>
            <p>Individual communities on Kemfe may have their own rules in addition to ours and their own moderators to enforce them.
                Kemfe provides tools to aid moderators, but does not prescribe their usage.</p>
        </div>
    </div>
</div>
<?php require_once("public/layouts/other-footer.php") ?>