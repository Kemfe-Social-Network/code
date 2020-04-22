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
    <h2 class="text-center text-white p-4">How It Works</h2>
</div>

<div class="container-fluid bg-white p-4">
    <div class="row">
        <div class="col-md-8" style="margin: 0 auto;">

            <h4>Kemfe – Get rewarded for your social activities</h4>
            <p>
                kemfe operate with a new business model that fairly rewards users for their contributions to the network with revenue and expanded
                reach. Kemfe also allows users to independently reward their favorite auto in the platform.
            </p>
            <h6>1. Register / Signup</h6>
            <p>To start using kemfe, you will have to sign up a free membership account with just an email address and your password. Click here to sign up for free.</p>
            <h6>2. Join a Community of Interest</h6>
            <p>Once you register your free account, search and join any community of your interest. There are thousands of various communities that hold various interesting discussions. If you can’t find any community of your interest, you can create a community, invites your friends to join and start up a discussion.</p>
            <h6>3. Post or Share Contents</h6>
            <p>Post and share engaging contents that is relevant to the community. Make sure to read the community rules before joining a conversation to avoid being restricted or banned. </p>

            <h6>4. Earn Rewards </h6>
            <p>Your content is rewarded as you and other users start interacting with the content through upvotes, comments, and shares amongst others. These interactions generated form the basis through which the content receives block reward at the end of 24hrs.</p>
            <h6>5. Claim Rewards</h6>
            <p>All rewards earned by user are locked in the user escrow wallets and can be claimed at the end of 7days</p>
            <h6>6. Power Up or Withdraw</h6>
            <p>Claimed rewards are directly deposited into the users Main Wallet and can be used to increase earning power, Purchase services or exchanged to any currency.</p>
            <h4>WALLETS</h4>
            <p>Every registered user on kemfe network has three different wallets. Each of these wallets plays a role on the value of rewards a user can claim at any point in time.
                These wallets are;
            </p>

            <ul>
                <li><b>Main Wallet</b></li>

            </ul>
            <p>This wallet allows user to perform withdrawal, deposit, make transfers, pay for adverts, or boasted post or banner ads and other activities such activities such as gifting a user in the form of tipping.</p>

            <ul>
                <li><b>Power Wallet</b></li>

            </ul>
            <p>This is the wallet that determines the amount of reward you can earn when users interact with your post. It also determines the percentage of daily block reward grant you can earn based on your content engagement.</p>
            <p>Every token deposited in this wallet is locked permanently and cannot be used to perform any transaction within the network. The more token a user lock in this wallet the more he increases his earning power.</p>
            <ul>
                <li><b>Escrow wallets</b></li>

            </ul>
            <p>This is the wallets that temporally hold all tokens earned from the system by a user. The escrow wallet plays an important role in content curation. Every earnings is held in the escrow wallet for 7days before the system approves it for withdrawals if within these periods the content is not deleted or flagged. Once your content is flagged and found to violet our content policy all earning awarded to that content will be withdrawn from the escrow to the reward pool and the content deleted.</p>


            <h4>REWARDS & INCENTIVES</h4>
            <p>The user rewards are categories in two factions; Passive Rewards and Active Reward</p>
            <h6>1. Passive Rewards</h6>
            <p>This is the rewards a user is awarded instantly as other users interact with his contents through upvotes and comments. It is a continuous reward for those who creates valuable contents that continuously generate interactions. </p>

            <h6>2. Post Rewards</h6>
            <p>This is the reward you get instantly when you post or share content to the platform.
                Mathematically it is calculated to be: PR = (EP/TNEP) * PC
            </p>

            <p>Here;</p>

            <p>PR= Post Reward</p>
            <p>EP= Earning Power (Note: EP= Total KFC in You Power Wallet)</p>
            <p>TNEP= Total Network Earning Power</p>
            <p>PC = Posting Constant</p>
            <p>Posting constant is a number multiplier that changes every day by calculating the Total Network activities and number of active users. </p>
            <h6>3. Comment Rewards</h6>
            <p>This is the reward you get instantly when users comment on your post or shared content.
                Mathematically it is calculated to be: CR = (EP/TNEP) * CC
            </p>



            <p>
                <p>Here;</p>
                <p>EP= Earning Power (Note: EP= Total KFC in You Power Wallet)</p>
                <p>TNEP= Total Network Earning Power</p>
                <p>CC = Comment Constant</p>
                <p>Comment constant is a number multiplier that changes every day by calculating the Total Comment activities and number of active users.
                    Note: When a user makes a comment on a post, another user can reply the comment and earn passive income as a result. </p>


                <h6>4. Upvote Rewards</h6>

                <p>This is the reward you get instantly when you post or share content to the platform.
                    Mathematically it is calculated to be: PR=(EP/TNEP) * PC</p>
                <p>Here;</p>
                <p>PR= Post Reward</p>
                <p>EP= Earning Power (Note: EP= Total KFC in You Power Wallet)</p>
                <p>TNEP= Total Network Earning Power</p>
                <p>PC = Posting Constant</p>
                <p>Posting constant is a number multiplier that changes every day by calculating the Total Network activities and number of active users.</p>





                <h6>5. Active Rewards (Block Rewards)</h6>
                <p><b>Post daily grant</b></p>

                <p> Rewards =(Your Post ER x EP)/(Total Network ER) x Daily reward pool</p>

                <p>Where ER= Engagement rate.</p>
                <p>EP=Earning Power = total amount of KFC permanently locked by the individual in his power wallets</p>

                <p>Your Post engagement rate (ER) =(Interaction Rate)/(Total Views) :- ER =(I R)/(T V)</p>
                <p>IR= Total votes x Comments x Share x Time spent</p>
                <p>TV= Total Post views</p>

                <p><b> Comments daily grants</b></p>
                <p>Rewards =(Your comment ER x EP)/(Total Network ER) x Daily reward pool </p>
                Your comment ER = Total votes + Replies x Time spent
                <p>EP=Earning Power = total amount of KFC permanently locked by the individual in his power wallet.
                    Where Total Network ER = Total Number of Daily Active Users x Total Time Spent by the users</p>

                <p>Notes: Block rewards are granted on a daily bases and cannot be granted twice.</p>

                <p><b>• TIPPING</b></p>
                <p>Users in the network can freely reward their favourite author using kemfe tipping tool.
                    This is a form of donation to the user in order to encourage him good writers & bloggers.</p>
                <p><b> • Referrals</b></p>
                <p>Referring friends and family members to the network also attract rewards.</p>
                <p><b>• Contest</b></p>
                <p>Monthly and weekly contest hosted within the network is a great avenue for user to compete and earn fabulous prices.</p>

                <h6> Withdrawals & Deposits</h6>

                <p><b>• Withdrawals</b></p>
                All Rewards claimed can be withdrawn immediately. First you must click on the withdraw tab inside your wallet. Then, you simply enter the amount you wish to withdraw and press submits. This action attracts withdrawal fees based on the gas price.
                There is no minimum or maximum limit required to withdraw KFC to OnChain wallets or to any exchange KFC is being traded but there is a limit of one withdrawal per day.
                <p><b>• Deposits</b></p>
                <p> Users can deposit KFC or any other Ethereum based token to their wallet. Depositing Kemfe Credit into your wallet is instant. To deposit, Open your wallet and click the deposit button.
                    You can either scan the barcode or copy the address and directly deposit into it. After depositing, Copy your transaction hash and past on the verify transaction Hash.</p>


                <h4>WHERE DO THE TOKEN COME FROM?</h4>
                <p>Kemfe network continually mints new digital tokens
                    to reward content creators and curators. Some of the newly-created
                    tokens are transferred to users who add value to kemfe network by posting,
                    commenting, and voting on other people's posts.
                    A large portion of the remaining token is held in kemfe reserve
                    while a little portion of it is distributed to the founding team.
                    Read more here. (Add White Paper Link)
                    <p>

                        <h4>WHERE DOES THE VALUE COME FROM?</h4>
                        <p> Kemfe credits get it value from the utility of the token on the network. All services such as boast, banner Ads, and subscription that require financial transaction revolve around the token.
                            E.g. when advertisers want to advertise on the network they
                            will have to buy kemfe credit in order to get access to our
                            advertisment.100% of all advertisement yields are destroyed or
                            burnt until kemfe reaches it minting cap.<p>


                                <p>Have any question, please visit our <a href="/regulations/faq" class="btn btn-link">FAQ</a></p>


                                <p></p>














        </div>
    </div>
</div>
<?php require_once("public/layouts/other-footer.php") ?>