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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
    
    <body class="loginarea" style="zoom: 1;">
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
     
     
     
     
     
    
    
     
     
     
     
    
    <html><head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Withdrawal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <style>
    body {
      font-family: Arial;
      font-size: 17px;
      padding: 8px;
    }
    
    * {
      box-sizing: border-box;
    }
    
    .row {
      display: -ms-flexbox; /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap; /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
    }
    
    .col-25 {
      -ms-flex: 25%; /* IE10 */
      flex: 25%;
    }
    
    .col-50 {
      -ms-flex: 50%; /* IE10 */
      flex: 50%;
    }
    
    .col-75 {
      -ms-flex: 75%; /* IE10 */
      flex: 75%;
    }
    
    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }
    
    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }
    
    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    input[type=number] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
    
    label {
      margin-bottom: 10px;
      display: block;
    }
    
    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }
    
    .btn {
      background-color: #4CAF50;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }
    
    .btn:hover {
      background-color: #45a049;
    }
    
    a {
      color: #2196F3;
    }
    
    hr {
      border: 1px solid lightgrey;
    }
    
    span.price {
      float: right;
      color: grey;
    }
    
    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }
      .col-25 {
        margin-bottom: 20px;
      }
    }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    
    
    
    
    
    
    
    
    
    
    
    
    
    <body>
        
    
          
    
    
    
    <h2 align="center" style="color:white;"><b>Make a Withdrawal Request.</b></h2>
    <h6 align="center" style="color:white;">Available Balance: <b>$<?= $cdollar_bal ?></b></h6>
    <h6 align="center" style="color:white;">Withdrawal: <b>$<?= $cbtc_bal ?> </b></h6>
    <br>
    <p align="center" style="color:white;">Withdrawal/<a href="dashboard.php"style="color:yellow;">Home</a></p><br>
        
         <h4 style="color: red;">    </h4>
    
    <div class="row">
      <div class="col-75">
        <div class="container">
          
            <div class="row">
             
    
              <div class="col-50">
                 
                <h3>Select your preferred withdrawal payment option :</h3>
     <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo"><img src="b.png" width="50px"> Bitcoin (recommended)</button>
      <div id="demo" class="collapse"><br>
      <br>
      
      
         <form name="myForm" action="with.php"   method="POST" ]>
             
             
            
            <input type="hidden" name="mot" value="Bitcoin Withdrawal">
              
             <input name="email" type="hidden" value="email@gmail.com"> 
             
            <div class="row">
              <div class="col-50">
                <label for="fname"><i class="fa fa-amount"></i> Input Amount</label>
                <input type="number" id="fname" name="amount" placeholder="Amount" required="">
    <label for="fname"><i class="fa fa-wallet"></i> Wallet Address</label>
                <input type="text" id="fname" name="wallet" placeholder="Wallet Address" required="">
              </div>
              
            </div>
          
            <input type="submit" value="Proceed" class="btn" name="submit">
          </form>
      </div>
      <hr>
       <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2"><img src="trans.png" width="60px">  Transfer</button>
      <div id="demo2" class="collapse"><br>
      <br>
         <form action="with.php" method="POST" name="frank" >
                
                <input type="hidden" name="mot" value="Bank Transfer">
              
             <input name="email" type="hidden" value="email@gmail.com"> 
             
            <div class="row">
              <div class="col-50">
                  
                <label for="cname">Name</label>
                <input type="text" id="cname" name="name" placeholder="Name" required="">
                <label for="ccnum">Account number</label>
                <input type="number" id="ccnum" name="wallet" placeholder="Account Number" required="">
                <label for="ccnum">Bank</label>
                <input type="text" id="ccnum" name="bank" placeholder="Bank" required="">
                <label for="ccnum">Amount</label>
                <input type="text" id="ccnum" name="amount" placeholder="Input Amount" required="">
              </div>
              
            </div>
          
            <input type="submit" value="Proceed" class="btn" name="submit">
          </form>
      </div>
      
       <hr>
       <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3"><img src="cash.png" width="60px">Cashapp</button>
      <div id="demo3" class="collapse"><br>
      <br>
         <form action="with.php" method="POST" name="franks" >
        
        <input type="hidden" name="mot" value="Cashapp">
              
             <input name="email" type="hidden" value="email@gmail.com"> 
             
            <div class="row">
              <div class="col-50">
                
                <label for="cname">Amount</label>
                <input type="text" id="cname" name="amount" placeholder="Amount" required="">
                <label for="ccnum">Cashapp Tag</label>
                <input type="text" id="ccnum" name="wallet" placeholder="Cashapp Tag" required="">
               
                
              </div>
              
            </div>
          
            <input type="submit" value="Proceed" class="btn" name="submit">
          </form>
      </div>
      <form action="with.php" method="POST" name="franks" >
      <hr>
       <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo4"><img src="s.png" width="50px"> Skrill</button>
      <div id="demo4" class="collapse"><br>
      <br>
        
              
              <input type="hidden" name="mot" value="Skrill ">
              
             <input name="email" type="hidden" value="email@gmail.com"> 
             
            <div class="row">
              <div class="col-50">
                <label for="fname"><i class="fa fa-amount"></i> Input Amount</label>
                <input type="number" id="fname" name="amount" placeholder="Amount" required="">
    
              </div>
              
            </div>
          
            <input type="submit" value="Proceed" class="btn" name="submit">
          </form>
      </div>
       <hr>
       <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo5"><img src="west.png" width="50px"> Western Union</button>
      <div id="demo5" class="collapse"><br>
      <br>
         <form action="with.php" method="POST" name="myForm" >
          
          
          <input type="hidden" name="mot" value="Western Union Withdrawal">
              
             <input name="email" type="hidden" value="email@gmail.com"> 
             
            <div class="row">
              <div class="col-50">
                <label for="fname"><i class="fa fa-amount"></i> Input Amount</label>
                <input type="number" id="fname" name="amount" placeholder="Amount" required="">
    
              </div>
              
            </div>
          
            <input type="submit" value="Proceed" class="btn" name="submit">
          </form>
      </div>
      <hr>
       <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo6"><img src="p.png" width="50px"> Paypal</button>
      <div id="demo6" class="collapse"><br>
      <br>
         <form action="with.php" method="POST" name="myForm" >
        
           
           <input type="hidden" name="mot" value="Paypal">
              
             <input name="email" type="hidden" value="email@gmail.com"> 
             
            <div class="row">
              <div class="col-50">
                <label for="fname"><i class="fa fa-amount"></i> Input Amount</label>
                <input type="number" id="fname" name="amount" placeholder="Amount" required="">
    
              </div>
              <div class="col-50">
                <label for="fname"><i class="fa fa-amount"></i> Paypal Id</label>
                <input type="number" id="fname" name="wallet" placeholder="Amount" required="">
    
              </div>
              
            </div>
          
            <input type="submit" value="Proceed" class="btn" name="submit">
          </form>
      </div>
      
      
      
     
              </div>
              
            </div>
    
        </div>
      </div>
      
    </div>
    <hr>
    <br>
    <p align="center" style="color:white;">
    "If you are interested in learning more about the withdrawal process or have an issue please contact support; info@expertfxcrypttramot.com to get a detailed motcription of the process."</p><br>
    
       </html>  