<?php
    require_once '../assetsBack/php/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gold Profile Page | NumeroTrade</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"> -->

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assetsBack/css/goldProfile.css">

    <link rel="icon" type="image/png" href="../../img/fav323860.png" sizes="32x32" />

</head>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a href="#" class="navbar-brand"><?= ucfirst($csurname)?> <?= ucfirst($cname)?></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'goldProfile.php') ? 'active' : ''; ?>" href="goldProfile.php"><i class="fas fa-user-circle"></i>&nbsp; My Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'notification.php')?'active':'';?>" href="notification.php"><i class="fas fa-bell"></i>&nbsp;Notifications&nbsp;<span id="checkNotification"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="#">
                        <i class="fa fa-university"></i>&nbsp;Transactions
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" data-toggle="modal" data-target="#fundAcc" class="dropdown-item"><i class="fa fa-paper-plane"></i>&nbsp; Fund My Account</a>
                        <a href="#" data-toggle="modal" data-target="#withdraw" class="dropdown-item"><i class="fas fa-credit-card"></i>&nbsp; Withdraw</a>
                    </div>
                </li>
                <?php if ($cplan == 'Bronze') : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="#">
                            <i class="fa fa-university"></i>&nbsp;Upgrade
                        </a>
                        <div class="dropdown-menu">
                            <a href="#" data-toggle="modal" data-target="#upSilver" class="dropdown-item"><i class="fa fa-paper-plane"></i>&nbsp; Upgrade To Silver</a>
                            <a href="#" data-toggle="modal" data-target="#upGold" class="dropdown-item"><i class="fas fa-credit-card"></i>&nbsp; Upgrade To Gold</a>
                        </div>
                    </li>
                <?php elseif ($cplan == 'Silver') : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="#">
                            <i class="fa fa-university"></i>&nbsp;Upgrade
                        </a>
                        <div class="dropdown-menu">
                            <a href="#" data-toggle="modal" data-target="#upGold" class="dropdown-item"><i class="fa fa-paper-plane"></i>&nbsp; Upgrade To Gold</a>
                        </div>
                    </li>
                <?php endif; ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-cog"></i>&nbsp;Hi <?= ucfirst($csurname) ?> <?= ucfirst($cname) ?>
                    </a>
                    <div class="dropdown-menu">
                        <a href="../assetsBack/php/logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if($verified == 'Not Verified'): ?>
                    <div class="alert alert-danger alert-dissmissable text-center mt-2 pb-0 mb-0">
                        <button class="close" type="button" data-dismiss="alert">&times;</button>
                        <p class="lead">Your Email is not Verified</p>
                        <a href="#" id="verifyEmail" class="text-center">Verify Now</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <!-- DEPOSIT MODAL -->
        <div class="modal fade" id="fundAcc">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-light lead"><i class="fas fa-paper-plane"></i>&nbsp; FUND MY ACCOUNT</h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title text-dark text-center">
                        NumeroTrade Bitcoin Wallet:
                    </h5>
                    <h4 style="font-size:16px;" class="modal-title text-dark text-center getAddress" id="copyTarget">38pqSLHFRDtVyoQfokGXm8xxU9hQeWy7iL</h4>

                    <form action="" id="fundForm" class="mt-3">

                        <div class="form-group">
                            <label for="amtPaid" class="col-form-label-lg mb-0 pb-0">Amount Deposited:</label>
                            <div class="input-group m-0 p-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Amount Deposited" name="amtPaid" id="" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="screenshotAmt" class="col-form-label-lg mb-0 pb-0">Upload a Screenshot of Payment:</label>
                            <input type="file" class="form-control-file" name="screenshotAmt" id="" required>
                        </div>
                        <input type="text" name="transaction_type" value="FUND MY ACCOUNT" id="" hidden>
                        <div class="form-group">
                            <input type="submit" value="FUND" name="fundMyAcc" id="fundBtn" class="btn btn-info btn-block btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- WITHDRAW MODAL -->
    <div class="modal fade" id="withdraw">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-light lead"><i class="fas fa-credit-card"></i>&nbsp; WITHDRAW</h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title text-dark text-center">Avaliable Balance:</h5>
                    <div class="row">
                        <div class="col text-center">
                            <h5 class="lead">Dollar Balance:</h5>
                            <p><i class="fa fa-dollar-sign"></i> <?= $cdollar_bal ?></p>
                        </div>
                        <div class="col text-center">
                            <h5 class="lead">Bitcoin Balance:</h5>
                            <p><i class="fab fa-bitcoin"></i> <?= $cbtc_bal ?></p>
                        </div>
                    </div>
                    <form action="" id="withForm" class="mt-3">
                        <div class="form-group">
                            <label for="withAmt" class="col-form-label-lg mb-0 pb-0">Amount To Be Withdrawn:</label>
                            <div class="input-group m-0 p-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control" placeholder="Amount in Dollars" name="withAmt" id="withdrawCheck" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="alert alert-danger lead" id="InsuffBal" style="display:none;">Insuffient Funds</div>
                        </div>
                        <div class="form-group">
                            <label for="tradewal" class="col-form-label-lg mb-0 pb-0">Your Wallet Address:</label>
                            <div class="input-group m-0 p-0">
                                <input type="text" class="form-control" placeholder="Your Wallet Address" name="tradewal" id="" required>
                            </div>
                        </div>
                        <input type="text" name="transaction_type" value="WITHDRAW" id="" hidden>
                        <div class="form-group">
                            <input type="submit" value="WITHDRAW" name="withAcc" id="withBtn" class="btn btn-success btn-block btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!-- BODY -->
    <div class="container">
        <div class="row" style=" margin-top: 10px;">
            <div class="col-lg-4" style=" margin-top: 10px;">
                <div class="profile-card-4 z-depth-3">
                    <div class="card">
                        <div class="card-body text-center bg-dark rounded-top">
                            <div class="user-box">
                            <?php if(!$cpro_pic):?>
                                <img src="../assetsBack/img/avatar7.png" class="img-thumbnail img-fluid" width="408px">
                            <?php else:?>
                                <img src="<?= '../assetsBack/php/'.$cpro_pic; ?>" class="img-thumbnail img-fluid" width="408px">
                            <?php endif;?>
                            </div>
                            <h5 class="mb-1 text-white"><?= ucfirst($csurname)?> <?= ucfirst($cname)?></h5>
                            <h6 class="text-light"><?= ucfirst($coccupation)?></h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-group shadow-none">
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class="fa fa-phone-square"></i>
                                    </div>
                                    <div class="list-details">
                                        <span><?= ucfirst($cphone_number)?></span>
                                        <small>Mobile Number</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="list-details">
                                        <span><?= ucfirst($cemail)?></span>
                                        <small>Email Address</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="list-details">
                                        <span><?= ucfirst($cplan)?></span>
                                        <small>Account Type</small>
                                    </div>
                                </li> 
                            </ul>
                            <div class="row text-center mt-4">
                                <div class="col p-3">
                                    <h4 class="mb-1 line-height-5">$<?= ucfirst($cdollar_bal)?></h4>
                                    <small class="mb-0 font-weight-bold">Dollar Balance</small>
                                </div>
                                <div class="col p-3">
                                    <h4 class="mb-1 line-height-5"><i class="fab fa-bitcoin"></i> <?= ucfirst($cbtc_bal)?></h4>
                                    <small class="mb-0 font-weight-bold">Bitcoin Balance</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8" style=" margin-top: 10px;">
                <div class="card z-depth-3">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-primary nav-justified">
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active show"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link"><i class="icon-envelope-open"></i> <span class="hidden-xs">Messages</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void();" data-target="#overview" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Overview</span></a>
                            </li>
                        </ul>
                        <div class="tab-content p-3">
                            <div class="tab-pane active show" id="profile">
                                <h5 class="mb-1">User Profile</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Country</h6>
                                        <p>
                                            <?= $ccountry ?>
                                        </p>
                                        <h6>Joined Since</h6>
                                        <p>
                                        <?= $cjoin_date ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Account ID</h6>
                                        <p>
                                        GLD-08736<?= $cid ?>
                                        </p>
                                        <span class="badge badge-success"><i class="fa fa-plus"></i> 30% Monthly Bonus</span><br>
                                        <span class="badge badge-primary"><i class="fa fa-cog"></i> Access to Personal Manager</span>
                                        <!-- <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
                                        <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span> -->
                                    </div>
                                    <div class="col-md-12">
                                        <h5 class="mt-2 mb-3">Bitcoin Price Chart</h5>
                                        <coingecko-coin-price-chart-widget  coin-id="bitcoin" currency="usd" height="300" locale="en"></coingecko-coin-price-chart-widget>
                                    </div>
                                    <div class="col-md-12">
                                        <h5 class="mt-2 mb-3">Bitcoin News</h5>
                                        <coingecko-beam-widget  type="all" height="300" locale="en"></coingecko-beam-widget>
                                    </div>
                                    <div class="col-md-12">
                                        <h5 class="mt-2 mb-3">Top Earners</h5>
                                            <div class="table-responsive" id="showTopEarners">

                                            </div>
                                    </div>
                                </div>
                                <!--/row-->
                            </div>
                            <div class="tab-pane" id="messages">
                                <div class="card border-primary">
                                    <div class="card-header lead text-center bg-primary text-white">Talk to your Account Manager</div>
                                    <div class="card-body">
                                        <form action="#" method="post" class="px-0" id="msgForm">
                                            <div class="form-group">
                                                <input type="text" name="subject" placeholder="Write Your Subject" class="form-control-lg form-control" id="" required>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="message" class="form-control-lg form-control" placeholder="Write Your Message Here" id="" cols="30" rows="10"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="messageBtn" id="messageBtn" class="btn btn-primary btn-lg btn-block" value="Send Message">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="edit">
                                <form action="" method="post" id="proUpdateForm" class="px-2 mt-2" enctype="multipart/form-data">
                                    <input type="hidden" name="oldImage" value="<?= $cpro_pic;?>">
                                    <div class="form-group m-0">
                                        <label for="pro_pic" class="m-1">Upload a Profile Photo</label>
                                        <input type="file" name="image" id="pro_pic">
                                    </div>

                                    <div class="form-group m-0">
                                        <label for="surname" class="m-1">Surname</label>
                                        <input type="text" name="surname" id="surname" class="form-control" value="<?= $csurname; ?>">
                                    </div>

                                    <div class="form-group m-0">
                                        <label for="name" class="m-1">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="<?= $cname; ?>">
                                    </div>

                                    <div class="form-group m-0">
                                        <label for="phone_number" class="m-1">Phone Number</label>
                                        <input type="number" name="phone_number" id="phone_number" class="form-control" value="<?= $cphone_number; ?>">
                                    </div>

                                    <div class="form-group mt-2">
                                        <input type="submit" name="profileUpdate" id="proUpdateBtn" class="btn btn-info btn-block" value="UPDATE PROFILE">
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="overview">
                                <coingecko-coin-market-ticker-list-widget  coin-id="bitcoin" currency="usd" locale="en"></coingecko-coin-market-ticker-list-widget>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <div class="modal fade" id="msgModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h4 class="modal-title text-light lead"><i class="fas fa-paper-plane"></i>&nbsp; Message My Manager</h4>
                        <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post" class="px-0" id="msgForm">
                            <div class="form-group">
                                <input type="text" name="subject" placeholder="Write Your Subject" class="form-control-lg form-control" id="" required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control-lg form-control" placeholder="Write Your Message Here" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="messageBtn" id="messageBtn" class="btn btn-primary btn-lg btn-block" value="Send Message">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END OF BODY -->

    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/vendor/font-awesome/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <script src="https://widgets.coingecko.com/coingecko-coin-market-ticker-list-widget.js"></script>
    <script src="https://widgets.coingecko.com/coingecko-coin-price-chart-widget.js"></script>
    <script src="https://widgets.coingecko.com/coingecko-beam-widget.js"></script>
    <!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script> -->

    <script type="text/javascript">
        $(document).ready(function(){

            // Send Message to Admin
            $("#messageBtn").click(function(e){
                if($("#msgForm")[0].checkValidity()){
                    e.preventDefault();

                    $(this).val('Please Wait...');

                    $.ajax({
                        url: '../assetsBack/php/process.php',
                        method: 'post',
                        data: $("#msgForm").serialize()+'&action=msgAdmin',
                        success:function(response){
                            $("#msgForm")[0].reset();
                            $("#messageBtn").val('Send Message');
                            Swal.fire({
                                title: 'Message Sent To Your Account Manager',
                                icon: 'success'
                            });
                        }
                    });
                }
            });

            // Check Notification
            checkNotification();
            function checkNotification(){
                $.ajax({
                    url: "../assetsBack/php/process.php",
                    method: 'post',
                    data: { action: 'checkNotification'},
                    success:function(response){
                        $("#checkNotification").html(response);
                    }
                });
            }
            
            // Display Admin Bitcoin Address
            fetchWalletAddress();

            function fetchWalletAddress(){
                $.ajax({
                    url: '../assetsBack/php/process.php',
                    type: 'post',
                    data: { action: 'fetchAddress' },
                    success:function(response){
                        data = JSON.parse(response);
                        $(".getAddress").text(data.wallet);
                    }
                });
            }

            $("#fundBtn").click(function(e){
                if($("#fundForm")[0].checkValidity()){
                    e.preventDefault();

                    $("#fundBtn").val('Please Wait...');

                    $.ajax({
                        url: '../assetsBack/php/process.php',
                        method: 'post',
                        data: $("#fundForm").serialize()+'&action=fundAccount',
                        success:function(response){
                            $("#fundBtn").val('FUND');
                            $("#fundForm")[0].reset();
                            $("#fundAcc").modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Request Sent Successfully'
                            });
                        }
                    });
                }
            });

            $("#withBtn").click(function(e){
                if($("#withForm")[0].checkValidity()){
                    e.preventDefault();

                    $("#withBtn").val('Please Wait...');

                    if($("#withdrawCheck").val() > <?= $cdollar_bal; ?> ){
                        $("#InsuffBal").show();
                        $("#withBtn").val('WITHDRAW');
                        $("#withForm")[0].reset();
                    }
                    else{
                        $.ajax({
                            url: '../assetsBack/php/process.php',
                            method: 'post',
                            data: $("#withForm").serialize()+'&action=withAccount',
                            success:function(response){
                                $("#withBtn").val('FUND');
                                $("#withForm")[0].reset();
                                $("#withdraw").modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Request Sent Successfully'
                                });
                            }
                        });
                    }
                }
            });

            $("#proUpdateForm").submit(function(e){
                e.preventDefault();

                $.ajax({
                    url: '../assetsBack/php/process.php',
                    method: 'post',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: new FormData(this),
                    success:function(response){
                        Swal.fire({
                            icon: 'success',
                            title: 'Profile Updated Successfully'
                        });
                        location.reload();
                    }
                })
            });

            $("#verifyEmail").click(function(e){
                e.preventDefault();
                $(this).text('Please Wait...');

                $.ajax({
                    url: '../assetsBack/php/process.php',
                    method: 'post',
                    data: {action: 'verify_email'},
                    success:function(response){
                        $("#verifyEmailAlert").html(response);
                        $("#verifyEmail").text("Verify Now");
                    }
                });
            });

            // Check if user is Logged In or Not
            $.ajax({
                url: '../assetsBack/php/action.php',
                method: 'post',
                data: {action: 'checkTrader'},       
                success:function(response){
                    if(response === 'bye' && $cplan != 'Gold'){
                        window.location = '../../index.html';
                    }
                }
            });

            // Display Admin Bitcoin Address
            fetchWalletAddress();

            function fetchWalletAddress(){
                $.ajax({
                    url: '../assetsBack/php/process.php',
                    type: 'post',
                    data: { action: 'fetchAddress' },
                    success:function(response){
                        data = JSON.parse(response);
                        $(".getAddress").text(data.wallet);
                    }
                });
            }

            // Check Message Notification
            checkMsgNotification();
            function checkMsgNotification(){
                $.ajax({
                    url: "../assetsBack/php/process.php",
                    method: 'post',
                    data: { action: 'checkMsgNotification'},
                    success:function(response){
                        $("#checkNotification").html(response);
                    }
                });
            }

            fetchTopEarners();

            // Fetch Top Earners
            function fetchTopEarners(){
                $.ajax({
                    url: "../assetsBack/php/process.php",
                    method: 'post',
                    data: { action: 'fetchTopEarners' },
                    success:function(response){
                        $("#showTopEarners").html(response);
                        // console.log(response);
                    }
                });
            }
        });

        document.getElementById("copyButton").addEventListener("click", function() {
            copyToClipboard(document.getElementById("copyTarget"));
        });

        function copyToClipboard(elem) {
            // create hidden text element, if it doesn't already exist
            var targetId = "_hiddenCopyText_";
            var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
            var origSelectionStart, origSelectionEnd;
            if (isInput) {
                // can just use the original source element for the selection and copy
                target = elem;
                origSelectionStart = elem.selectionStart;
                origSelectionEnd = elem.selectionEnd;
            } else {
                // must use a temporary form element for the selection and copy
                target = document.getElementById(targetId);
                if (!target) {
                    var target = document.createElement("textarea");
                    target.style.position = "absolute";
                    target.style.left = "-9999px";
                    target.style.top = "0";
                    target.id = targetId;
                    document.body.appendChild(target);
                }
                target.textContent = elem.textContent;
            }

            // select the content
            var currentFocus = document.activeElement;
            target.focus();
            target.setSelectionRange(0, target.value.length);
            
            // copy the selection
            var succeed;
            try {
                succeed = document.execCommand("copy");
            } catch(e) {
                succeed = false;
            }
            // restore original focus
            if (currentFocus && typeof currentFocus.focus === "function") {
                currentFocus.focus();
            }
            
            if (isInput) {
                // restore prior selection
                elem.setSelectionRange(origSelectionStart, origSelectionEnd);
            } else {
                // clear temporary content
                target.textContent = "";
            }
            return succeed;
        }
    </script>
</body>

</html>