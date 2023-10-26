<?php
    require_once '../assetsBack/php/session.php';
?>

<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- font-family: 'Open Sans', sans-serif; -->
    <link href='style/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="" />
    <link href='style/custom.css' rel='stylesheet' type='text/css'>
    <link href='style/default.css' rel='stylesheet' type='text/css'>
    <link href='style/tab.css' rel='stylesheet' type='text/css'>
    <link rel="icon" href="../styles/images/favicon.png">
    <script src='style/jquery.js' type='text/javascript'></script>
    <script src='style/setting2.js' type='text/javascript'></script>
    <script src='style/tab.js' type='text/javascript'></script>
    <script src='style/bootstrap.min.js' type='text/javascript'></script>
    </head>
    
    <body class="loginarea" style="zoom: 1;">
    <div class="wrapper-account">
      <div class="headerContainer">
        <div class="headerInner"><a href="dashboard.php" id="logo"></a>
          <div class="hdRight">
            <div class="mainNavRight">
              <div class="navbar">
                <div class="navbar-inner">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    
    <div class="inside_inner_account">
    <div class="member_wrap">
    <div class="membersidebar">
       <ul>
        <li><a href="dashboard.php">My Account</a></li>
        <li><a href="deposit.php">Deposit</a></li>
        <li><a href="deposit_history.php">Deposits History</a></li>
        <li><a href="withdraw.php">Withdraw</a></li>
        <li></li>
        <li><a href="referals.php">Referrals</a></li>
        <li><a href="../assetsBack/php/logout.php">Logout</a></li>
    </ul>
    </div>
    <div class="member-container">
    <div class="account_top">
      <div class="user_left">
        <h2>Welcome, <span><?= $cname; ?></span></h2>
      </div>
      <div class="affiliate_top">Affiliate Link:<a href="#" class="ref-link">http://fx-octrade.com/?ref=</a></div>      <div class="get_banners"><a href="referals.php">Get Banners</a></div>
    </div>
    <div class="member_right">
    
      <section class = "trading_history table-responsive">  
        <table class="table ">
            <thead>
            <tr>
                <th class = "no-border">Transaction Id </th>
                <th class = "no-border">Transaction Date </th>
                <th class = "no-border">M.O.T </th>
                <th class = "no-border">Amount </th>
                <th class = "no-border">Reciever's Wallet </th>
                <th class = "no-border">Status  </th>
            </tr>
            </thead>

            <!-- getting all the avaliable history of the withdrawal -->
            <tbody>
                    </tbody>
        </table>

</section>
    
    </div><!--end column-70-->
    </div>
    </div>
    </div>
    
    <div class="contentBotContainer">
      <div class="contentBotInner">
        <div class="ctn-top-solid">
          <h1>btc network </h1>
          <h2> wallets: </h2>
          <div class="solid-top">
              <a href="https://www.coinbase.com/" class="solidTop1"></a> 
              <a href="https://blockchain.info/" class="solidTop2"></a>
              <a href="https://xapo.com/" class="solidTop3"></a>
              <a href="https://airbitz.co/" class="solidTop4"></a>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="ctn-bot-solid">
          <p>Market Cap: <span>$77829716960.00</span></p>
          <p>Hashrate: <span>7108353254.76</span></p>
          <p>Difficulty: <span>888171856257</span></p>
          <p>Total Blocks: <span>482882</span> </p>
          <p>Network Speed: <span>108.5 PH/s</span></p>
        </div>
      </div>
    </div>
    
    
    <div class="footerContainer">
        <div class="footerInner">
            <div class="ctn-footer-top">
                <div class="ctn-ft-left">
                    <p>© 2021 FX-OCTrade.com All Rights Reserved.</p>
                </div>
                <div class="ctn-ft-mid">
                    <a href=""><img src="styles/images/ft-top-ic1.png"></a>
                </div>
                <div class="ft-solid">
                    <a href="https://www.facebook.com/VisualHyipcom/" target="_blank" class="per"></a>
                    <a href="https://twitter.com/" target="_blank" class="bit"></a>
                    
                </div>
                
            </div>
        </div>
    </div> <!-- end bot footer -->
        
        <script type="text/javascript">
    $(document).ready(function() {
    
            $('.accordion>dl>dt>a').click(function() 
            {
                $(this).toggleClass("rotate0");
            });
                /*------- parse price --------*/
                function parsePriceCrypto()
                {
                    returnString = "";
                    
                    $.post( "https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,LTC,ETH,BCH,XRP&tsyms=USD", function( data )
                    {
                        $('#price_btc').text('$'+data['BTC']['USD']);
                        $('#price_ltc').text('$'+data['LTC']['USD']);
                        $('#price_eth').text('$'+data['ETH']['USD']);
                        $('#price_bch').text('$'+data['BCH']['USD']);
                        $('#price_xrp').text('$'+data['XRP']['USD']);
                    });
                }
                parsePriceCrypto();
                
                setInterval(function()
                {
                    parsePriceCrypto();
                }
                , 5000);
            });
            
            $('.language').click(function() {
                $(this).toggleClass('active');
            });
            
            $('.mobileMenu').click(function() {
                $('.menu').toggleClass('mobile');
                $(this).toggleClass('rotate');
            });
    </script>

        
        
        
        </body></html>  