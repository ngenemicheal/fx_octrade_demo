<?php
    require_once '../assetsBack/php/session.php';
?>

<html>
    <head>
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
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '92dfa9a07f79e1e6cc21811132196339a83aa112';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
    </head>
    
    <body class="loginarea">
    <div class="wrapper-account">
      <div class="headerContainer">
        <div class="headerInner">
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
        <li><a href="dashboard.php">My Account</a></li><li><a href="deposit.php">Deposit</a></li><li><a href="deposit_history.php">Deposits History</a></li><li><a href="withdraw.php">Withdraw</a></li><li></li><li><a href="referals.php">Referrals</a></li><li><a href="../assetsBack/php/logout.php">Logout</a></li>
    </ul>
    </div>
    <div class="member-container">
    <div class="account_top">
      <div class="user_left">
        <h2>Welcome, <span><?= $cname; ?></span></h2>
      </div>
      <div class="affiliate_top">Affiliate Link:<a href="#" class="ref-link">http://fx-octrade.com/?ref=</a></div>
      <div class="get_banners"><a href="referals.php">Get Banners</a></div>
    </div>
    <div class="member_right">
    
    
    <center>
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
      <div id="tradingview_f933e"></div>
      <div class="tradingview-widget-copyright"><a href="#" rel="noopener" target="_blank"><span class="blue-text"></span> <span class="blue-text">Personal trading chart</span></a></div>
      <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
      <script type="text/javascript">
      new TradingView.widget(
      {
      "width": 1050,
      "height": 500,
      "symbol": "BITFINEX:BTCUSD",
      "interval": "1",
      "timezone": "Etc/UTC",
      "theme": "Dark",
      "style": "9",
      "locale": "en",
      "toolbar_bg": "#f1f3f6",
      "enable_publishing": false,
      "hide_side_toolbar": false,
      "allow_symbol_change": true,
      "calendar": true,
      "studies": [
        "BB@tv-basicstudies"
      ],
      "container_id": "tradingview_f933e"
    }
      );
      </script>
    </div>
    <!-- TradingView Widget END -->
    
    
    
    <h3 class="account_main">Account Overview</h3>
    
    <div class="account_overview_wrap">
       <div class="user-info">
            <div class="ctn-invesment-part ctn-invesment-part1">
              <p>Name:</p>
              <h4><?= $csurname; ?> <?= $cname; ?></h4>
            </div>
            <div class="ctn-invesment-part ctn-invesment-part2">
              <p>Registration Date:</p>
              <h4><?= $cjoin_date ?></h4>
            </div>
            <div class="ctn-invesment-part ctn-invesment-part3">
                <p>.00</p>
                <h4>Withdrawal</h4>
            </div>
          </div>
    </div>  
    <div class="account_overview_wrap">
      <div class="ctn-invesment-part ctn-invesment-part1"> <span class="imageblock"></span>
        <h4>$<?= $cbtc_bal ?></h4>
        <p>BITCOIN BALANCE</p>
        <div class="links"><a href="deposit.php">Make A Deposit</a></div>
      </div>
      <div class="ctn-invesment-part ctn-invesment-part2"> <span class="imageblock"></span>
        <h4>$<?= $cdollar_bal ?></h4>
        <p>DOLLAR BALANCE</p>
        <div class="links"><a href="withdraw.php">Withdraw Funds</a></div>
      </div>
      <div class="ctn-invesment-part ctn-invesment-part3"> <span class="imageblock"></span>
        <h4>$0.00</h4>
        <p>ADDED BONUS</p>
        <div class="links"><a href="deposit.php">My Deposits</a></div>
      </div>
    </div>
    <br />
    <h3 class="account_main">Your Deposits/Withdrawals</h3>
    <div class="account_stat">
      <div class="contentLeft">
        <div class="ctn-inves-row invers-part5">
          <p>$0.00</p>
          <h1>Deposit</h1>
        </div>
    
        <div class="ctn-inves-row invers-part8">
          <p>.00</p>
          <h1>Withdrawal</h1>
        </div>
      </div>
    </div>
    
    </div><!--end column-70-->
    </div>
    </div>
    </div>
    
    </div><div class="contentBotContainer">
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
            <p>&copy; 2021 FX-OCTrade.com All Rights Reserved.</p>
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

   </body>
    </html>
    