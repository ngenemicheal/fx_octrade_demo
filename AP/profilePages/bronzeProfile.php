<?php
    require_once '../assetsBack/php/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bronze Profile Page | NumeroTrade</title>
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"> -->

    <link rel="icon" type="image/png" href="../../img/fav323860.png" sizes="32x32" />

</head>
<body>
    
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a href="#" class="navbar-brand">Welcome <?= $csurname; ?> <?= $cname; ?></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'bronzeProfile.php')?'active':'';?>" href="bronzeProfile.php"><i class="fas fa-user-circle"></i>&nbsp; My Profile</a>
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
                <?php if($cplan == 'Bronze'): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="#">
                            <i class="fas fa-level-up-alt"></i>&nbsp;Upgrade
                        </a>
                        <div class="dropdown-menu">
                            <a href="#" data-toggle="modal" data-target="#upSilver" class="dropdown-item">Upgrade To Silver</a>
                            <a href="#" data-toggle="modal" data-target="#upGold" class="dropdown-item">Upgrade To Gold</a>
                        </div>
                    </li>
                <?php elseif($cplan == 'Silver'): ?>
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
                        <i class="fas fa-user-cog"></i>&nbsp;Hi <?= ucfirst($csurname)?> <?= ucfirst($cname)?>
                    </a>
                    <div class="dropdown-menu">
                        <a href="../assetsBack/php/logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!--<div class="container">-->
    <!--    <div class="row">-->
    <!--        <div class="col-lg-12">-->
    <!--            <?php if($verified == 'Not Verified'): ?>-->
    <!--                <div class="alert alert-danger alert-dissmissable text-center mt-2 pb-0 mb-0">-->
    <!--                    <button class="close" type="button" data-dismiss="alert">&times;</button>-->
    <!--                    <p class="lead">Your Email is not Verified</p>-->
    <!--                    <a href="#" id="verifyEmail" class="text-center">Verify Now</a>-->
    <!--                </div>-->
    <!--            <?php endif; ?>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card rounded-0 mt-3 border-primary">
                    <div class="card-header border-primary">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a href="#profile" class="nav-link active font-weight-normal lead" data-toggle="tab">
                                    Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#editprofile" class="nav-link font-weight-normal lead" data-toggle="tab">
                                    Edit Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#messageadmin" class="nav-link font-weight-normal lead" data-toggle="tab">
                                    Message
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#overview" class="nav-link font-weight-normal lead" data-toggle="tab">
                                    Overview
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#topEarners" class="nav-link font-weight-normal lead" data-toggle="tab">
                                    Top Earners
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Profile Tab Start -->
                            <div class="tab-pane container active" id="profile">
                                <div id="verifyEmailAlert"></div>
                                <div class="card-deck">
                                    <div class="card border-primary align-self-center">
                                            <?php if(!$cpro_pic):?>
                                                <img src="../assetsBack/img/avatar7.png" class="img-thumbnail img-fluid" width="408px">
                                            <?php else:?>
                                                <img src="<?= '../assetsBack/php/'.$cpro_pic; ?>" class="img-thumbnail img-fluid" width="400px">
                                            <?php endif;?>
                                    </div>
                                    <div class="card border-primary">
                                        <div class="card-header bg-primary text-light text-center lead">
                                            Account ID: BRZ-07344<?= $cid ?>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8">
                                                <b>Email:</b> <?= $cemail ?><br>
                                            </p>
                                            <p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Dollar Balance:</b> <i class="fa fa-dollar-sign"></i> <?= $cdollar_bal ?></p>
                                            <p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Bitcoin Balance:</b> <i class="fab fa-bitcoin"></i> <?= $cbtc_bal ?></p>
                                            <p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Current Plan:</b> <?= $cplan ?></p>
                                            <p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Country:</b> <?= $ccountry ?></p>
                                            <p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Occupation:</b> <?= $coccupation ?></p>
                                            <p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8"><b>Registered On:</b><br> <?= $cjoin_date ?></p>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Profile Tab End -->
                            <!-- Edit Profile Tab Start -->
                            <div class="tab-pane container fade" id="editprofile">
                                <div class="card-deck">
                                    <div class="card border-danger align-self-center">
                                        <?php if(!$cpro_pic):?>
                                            <img src="../assetsBack/img/avatar7.png" class="img-thumbnail img-fluid" width="408px">
                                        <?php else:?>
                                            <img src="<?= '../assetsBack/php/'.$cpro_pic; ?>" class="img-thumbnail img-fluid" width="408px">
                                        <?php endif;?>
                                    </div>
                                    <div class="card border-danger">
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
                                </div>
                            </div>
                            <!-- Edit Profile Tab End -->
                            <!-- Overview Tab -->
                            <div class="tab-pane container fade" id="overview">
                                <coingecko-coin-market-ticker-list-widget  coin-id="bitcoin" currency="usd" locale="en"></coingecko-coin-market-ticker-list-widget>
                                <coingecko-coin-price-chart-widget  coin-id="bitcoin" currency="usd" height="300" locale="en"></coingecko-coin-price-chart-widget>
                                <coingecko-beam-widget  type="all" height="300" locale="en"></coingecko-beam-widget>
                            </div>
                            <!-- End Of Overview Tab -->
                            <!-- Top Earners Tab -->
                            <div class="tab-pane container fade" id="topEarners">
                                <div class="table-responsive" id="showTopEarners">

                                </div>
                            </div>
                            <!-- End Of Top Earners Tab -->
                            <!-- Message Admin Tab -->
                            <div class="tab-pane container fade" id="messageadmin">
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
                            <!-- End Of Message Admin Tab -->
                        </div>
                    </div>
                </div>
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
                    <h2 class="modal-title text-dark text-center lead getAddress" id="copyTarget"></h2>
                    <button href="#" id="copyButton" class="btn btn-dark btn-block">
                        Click To Copy Address
                    </button>

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

    <!-- UPGRADE TO SILVER MODAL -->
    <div class="modal fade" id="upSilver">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h4 class="modal-title text-light lead"><i class="fas fa-paper-plane"></i>&nbsp; UPGRADE TO SILVER</h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title text-dark text-center">Your Current Plan:</h5>
                    <h2 class="modal-title text-dark text-center lead" id="btcwallet"><?= $cplan; ?></h2>
                    <form action="" id="upSilverForm" class="mt-3">
                        <div class="form-group">
                            <label for="passport" class="col-form-label-lg mb-0 pb-0">Upload your Passport Photo</label>
                            <input type="file" class="form-control-file" name="passport" id="" required>
                        </div>
                        <div class="form-group">
                            <label for="natID" class="col-form-label-lg mb-0 pb-0">Upload a Photo of your National ID</label>
                            <input type="file" class="form-control-file" name="natID" id="" required>
                        </div>
                        <div class="form-group">
                            <label for="birth" class="col-form-label-lg mb-0 pb-0">Upload a Photo of your Birth Certificate :</label>
                            <input type="file" class="form-control-file" name="birth" id="" required>
                        </div>
                        <div class="form-group">
                            <label for="idNo" class="col-form-label-lg mb-0 pb-0">Your ID Number:</label>
                            <div class="input-group m-0 p-0">
                                <input type="text" class="form-control" placeholder="ID NUMBER" name="idNo" id="" required>
                            </div>
                        </div>
                        <input type="text" name="upgrade_to" value="SILVER" id="" hidden>
                        <div class="form-group">
                            <input type="submit" value="UPGRADE TO SILVER" name="upAccSilver" id="upSilverBtn" class="btn btn-secondary btn-block btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- UPGRADE TO GOLD MODAL -->
    <div class="modal fade" id="upGold">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4 class="modal-title text-dark lead"><i class="fas fa-paper-plane"></i>&nbsp; UPGRADE TO GOLD</h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title text-dark text-center">Your Current Plan:</h5>
                    <h2 class="modal-title text-dark text-center lead" id="btcwallet"><?= $cplan; ?></h2>
                    <form action="" id="upGoldForm" class="mt-3">
                        <div class="form-group">
                            <label for="passport" class="col-form-label-lg mb-0 pb-0">Upload your Passport Photo :</label>
                            <input type="file" class="form-control-file" name="passport" id="" required>
                        </div>
                        <div class="form-group">
                            <label for="natID" class="col-form-label-lg mb-0 pb-0">Upload a Photo of your National ID:</label>
                            <input type="file" class="form-control-file" name="natID" id="" required>
                        </div>
                        <div class="form-group">
                            <label for="birth" class="col-form-label-lg mb-0 pb-0">Upload a Photo of your Birth Certificate :</label>
                            <input type="file" class="form-control-file" name="birth" id="" required>
                        </div>
                        <div class="form-group">
                            <label for="interPassport" class="col-form-label-lg mb-0 pb-0">Upload a Photo of your International Passport :</label>
                            <input type="file" class="form-control-file" name="interPassport" id="" required>
                        </div>
                        <div class="form-group">
                            <label for="utilbill" class="col-form-label-lg mb-0 pb-0">Upload a Photo of your Utility Bill Document :</label>
                            <input type="file" class="form-control-file" name="utilbill" id="" required>
                        </div>
                        <div class="form-group">
                            <label for="idNo" class="col-form-label-lg mb-0 pb-0">Your ID Number:</label>
                            <div class="input-group m-0 p-0">
                                <input type="text" class="form-control" placeholder="ID NUMBER" name="idNo" id="" required>
                            </div>
                        </div>
                        <input type="text" name="upgrade_to" value="GOLD" id="" hidden>
                        <div class="form-group">
                            <input type="submit" value="UPGRADE TO GOLD" name="upAccGold" id="upGoldBtn" class="btn btn-warning btn-block btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Send A Transaction AJAX Request -->
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
                                icon: 'success'
                                title: 'Message Sent To Your Account Manager',
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

            $("#upSilverBtn").click(function(e){
                if($("#upSilverForm")[0].checkValidity()){
                    e.preventDefault();

                    $("#upSilverBtn").val('Please Wait...');

                    $.ajax({
                        url: '../assetsBack/php/process.php',
                        method: 'post',
                        data: $("#upSilverForm").serialize()+'&action=upToSilver',
                        success:function(response){
                            $("#upSilverBtn").val('UPGRADE TO SILVER');
                            $("#upSilverForm")[0].reset();
                            $("#upSilver").modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Request Sent Successfully'
                            });
                        }
                    });
                }
            });

            $("#upGoldBtn").click(function(e){
                if($("#upGoldForm")[0].checkValidity()){
                    e.preventDefault();

                    $("#upGoldBtn").val('Please Wait...');

                    $.ajax({
                        url: '../assetsBack/php/process.php',
                        method: 'post',
                        data: $("#upGoldForm").serialize()+'&action=upToGold',
                        success:function(response){
                            $("#upGoldBtn").val('UPGRADE TO SILVER');
                            $("#upGoldForm")[0].reset();
                            $("#upGold").modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Request Sent Successfully'
                            });
                        }
                    });
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
                    if(response === 'bye'){
                        // window.location = '../../index.html';
                        header("location:../../index.html");
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