<?php

    session_start();

    if(!isset($_SESSION['adminusername'])){
        header('location:adminLogin.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $title = basename($_SERVER['PHP_SELF'], '.php');
        $title = explode('-', $title);
        $title = ucfirst($title[1]);
    ?>
    <title><?= $title; ?> | Admin Panel</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

        <!-- Custom CSS -->
        <style>
            .admin-link{
                background-color: #343a40;
            }
            .admin-link:hover, .nav-active{
                background-color: #212529;
                text-decoration: none;
            }
        </style>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <h4 class="text-light">Admin <?= $title; ?></h4>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-Dashboard.php') ?"nav-active":""; ?>" href="admin-Dashboard.php"><i class="fas fa-chart-pie"></i>&nbsp;<?= $title; ?>&nbsp;<span id="dashboard"></span></a>
                </li>
            <!-- <li class="nav-item">
                    <a class="nav-link admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-Dashboard.php') ?"nav-active":""; ?>" href="admin-Dashboard.php"><i class="fas fa-chart-pie"></i>&nbsp;<?= $title; ?>&nbsp;<span id="dashboard"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link admin-link <?= (basename($_SERVER['PHP_SELF']) == 'fundNotify.php') ?"nav-active":""; ?>" href="fundNotify.php"><i class="fas fa-sticky-note"></i>&nbsp;Funding Requests&nbsp;<span id="fundNoti"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link admin-link <?= (basename($_SERVER['PHP_SELF']) == 'withNotify.php') ?"nav-active":""; ?>" href="withNotify.php"><i class="fas fa-bell"></i>&nbsp;Withdraw Requests&nbsp;<span id="withNoti"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link admin-link <?= (basename($_SERVER['PHP_SELF']) == 'upgradeNotify.php') ?"nav-active":""; ?>" href="upgradeNotify.php"><i class="fas fa-bell"></i>&nbsp;Upgrade Requests&nbsp;<span id="upNoti"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link admin-link <?= (basename($_SERVER['PHP_SELF']) == 'msgFromTraders.php') ?"nav-active":""; ?>" href="msgFromTraders.php"><i class="fas fa-envelope"></i>&nbsp;Messages&nbsp;<span id="msgNoti"></span></a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link admin-link fetchAdd" href="#" data-toggle="modal" data-target="#editAddress"><i class="fas fa-wallet"></i>&nbsp;Wallet Address&nbsp;<span></span></a>
                </li>
                <li class="nav-item">
                    <a href="assets/php/adminLogout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card my-2 border-success">
                    <div class="card-header bg-primary text-white">
                        <h4 class="m-0">Total Traders</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" id="showTraders">
                            <div class="text-center align-self-center lead">Please Wait...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- EDIT TRADER MODAL -->
    <div class="modal fade" id="editUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-light lead" id="getName"></h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="bg-warning text-center pt-2 rounded">
                        <div>
                            <h5>Current Plan</h5>
                            <p id="getPlan"></p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <h5>Dollar Balance</h5>
                                <p class="text-center text-danger" id="getDollar"></p>
                            </div>
                            <div class="col-6">
                                <h5>Bitcoin Balance</h5>
                                <p class="text-center text-danger" id="getBtc"></p>
                            </div>
                        </div>
                    </div>
                    <form action="#" method="post" id="upTraderForm" class="mt-3">
                        <div class="form-group">
                            <label for="upDol" class="col-form-label-lg mb-0 pb-0">Edit Dollar Balance</label>
                            <input class="form-control" name="upDol" id="upDol" type="text" placeholder="Dollar">
                            <input class="form-control" name="id" id="id" type="text" hidden>
                        </div>
                        <div class="form-group">
                            <label for="upBtc" class="col-form-label-lg mb-0 pb-0">Edit Bitcoin Balance</label>
                            <input class="form-control" name="upBtc" id="upBtc" type="text" placeholder="Bitcoin">
                        </div>
                        <div class="form-group">
                            <label for="upPlan">Edit Plan</label>
                            <select class="form-control" name="upPlan" id="upPlan">
                                <option value="Bronze" selected='selected'>Bronze</option>
                                <option value='Silver'>Silver</option>
                                <option value='Gold'>Gold</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="UPDATE" name="updateTrader" id="upTraderFormBtn" class="btn btn-secondary btn-block btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- EDIT ADDRESS -->
    <div class="modal fade" id="editAddress">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-light lead" id="getName">Change Address</h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="bg-warning text-center pt-2 rounded">
                        <div>
                            <h5>Current Address</h5>
                            <p id="getAdd"></p>
                        </div>
                    </div>
                    <form action="#" method="post" id="upAddressForm" class="mt-3">
                        <div class="form-group">
                            <label for="upAdd" class="col-form-label-lg mb-0 pb-0">Edit Address</label>
                            <input class="form-control" name="upAdd" id="upAdd" type="text" placeholder="Bitcoin Addres">
                            <input class="form-control" name="id" id="id" type="text" hidden>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="UPDATE" name="updateAddress" id="upAddressFormBtn" class="btn btn-secondary btn-block btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- MESSAGE TRADER -->
    <div class="modal fade" id="MsgTraderModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="getName1"></h4>
                    
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="msgForm">
                        <div class="form-group">
                            <input type="number" name="traderID" id="traderID" placeholder="User ID" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message1" id="message1" rows="6" placeholder="Write Your Message" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Send Message" class="btn btn-secondary btn-block btn-lg" id="msgBtn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- <script src="../../assets/vendor/jquery/jquery.min.js"></script> -->

        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <!-- Font Awesome Javascript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>

        <!-- Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

        <script>
            $(document).ready(function(){

                // calling the function
                fetchTraders();

                // Fetch All Traders
                function fetchTraders(){
                    $.ajax({
                        url: 'assets/php/adminAction.php',
                        method: 'post',
                        data: { action: 'fetchTraders' },
                        success:function(response){
                            $("#showTraders").html(response);
                            // console.log(response);
                        }
                    });
                }

                // Display User Details
                $("body").on("click", ".traderEditIcon", function(e){
                    e.preventDefault();

                    edit_id = $(this).attr('id');
                    $.ajax({
                        url: 'assets/php/adminAction.php',
                        type: 'post',
                        data: { edit_id: edit_id },
                        success:function(response){
                            data = JSON.parse(response);
                            $("#getName").text('EDIT '+ data.surname+' '+ data.name);
                            $("#getPlan").text(data.plan);
                            $("#getDollar").text(data.dollar_bal);
                            $("#getBtc").text(data.btc_bal);
                            $("#upDol").val(data.dollar_bal);
                            $("#upBtc").val(data.btc_bal);
                            $("#upPlan").val(data.plan);
                            $("#id").val(data.id);
                        }
                    });
                });
                
                // Display User Details for Messaging
                $("body").on("click", ".traderMessageIcon", function(e){
                    e.preventDefault();

                    message_id = $(this).attr('id');
                    $.ajax({
                        url: 'assets/php/adminAction.php',
                        type: 'post',
                        data: { edit_id: message_id },
                        success:function(response){
                            data = JSON.parse(response);
                            $("#getName1").text('Message '+ data.surname+' '+ data.name+' '+data.id);
                            $("#id1").val(data.id);
                        }
                    });
                });

                // Delete User 
                $("body").on("click", ".traderDeleteIcon", function(e){
                    e.preventDefault();
                    delete_id = $(this).attr('id');

                    Swal.fire({
                        title: 'Are you Sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: 'assets/php/adminAction.php',
                                type: 'post',
                                data: { delete_id: delete_id },
                                success: function(response){
                                    Swal.fire(
                                        'Deleted',
                                        'Trader Deleted Successfully',
                                        'success'
                                    )
                                    fetchTraders();
                                }
                            });
                        }
                        })
                    });


                // Check Fund Notification

                checkFund();

                function checkFund(){
                    $.ajax({
                        url: 'assets/php/adminAction.php',
                        method: 'post',
                        data: { action:'checkFund' },
                        success:function(response){
                            $("#fundNoti").html(response);
                        }
                    });
                }

                // Check With Notification
                checkWith();

                function checkWith(){
                    $.ajax({
                        url: 'assets/php/adminAction.php',
                        method: 'post',
                        data: { action:'checkWith' },
                        success:function(response){
                            $("#withNoti").html(response);
                        }
                    });
                }

                // Check Message
                checkMsg();

                function checkMsg(){
                    $.ajax({
                        url: 'assets/php/adminAction.php',
                        method: 'post',
                        data: { action:'checkMsg' },
                        success:function(response){
                            $("#msgNoti").html(response);
                        }
                    });
                }

                // Check Upgrade Notification
                checkUpgrade();

                function checkUpgrade(){
                    $.ajax({
                        url: 'assets/php/adminAction.php',
                        method: 'post',
                        data: { action:'checkUpgrade' },
                        success:function(response){
                            $("#upNoti").html(response);
                        }
                    });
                }



                // Edit User Accounts 
                $("#upTraderFormBtn").click(function(e){
                    if($("#upTraderForm")[0].checkValidity()){
                        e.preventDefault();

                        $.ajax({
                            url: 'assets/php/adminAction.php',
                            method: 'post',
                            data: $("#upTraderForm").serialize()+"&action=upTraderAcc",
                            success:function(response){
                                $("#upTraderForm")[0].reset();
                                $("#editUserModal").modal('hide');
                                fetchTraders();
                            }
                        });
                    }
                });
                
                
                $("#msgBtn").click(function(e){
                    if($("#msgForm")[0].checkValidity()){
                        e.preventDefault();
                        $("#msgBtn").val('Sending...');

                        $.ajax({
                            url: 'assets/php/adminAction.php',
                            method: 'post',
                            data: $("#msgForm").serialize()+"&action=msgTrader",
                            success:function(response){
                                $("#msgBtn").val('Send Message');
                                $("#replyMsgModal").modal('hide');
                                $("#msgForm")[0].reset();
                                Swal.fire({
                                    type: 'success',
                                    title: 'Message Sent'
                                });
                            }
                        });
                    }
                });

                // Display Admin Bitcoin Address
                $("body").on("click", ".fetchAdd", function(e){
                    e.preventDefault();

                    // edit_id = $(this).attr('id');
                    $.ajax({
                        url: 'assets/php/adminAction.php',
                        type: 'post',
                        data: { action: 'fetchAddress' },
                        success:function(response){
                            data = JSON.parse(response);
                            $("#getAdd").text(data.wallet);
                            $("#upAdd").val(data.wallet);
                        }
                    });
                });

                // Edit Admin Address 
                $("#upAddressFormBtn").click(function(e){
                    if($("#upAddressForm")[0].checkValidity()){
                        e.preventDefault();

                        $.ajax({
                            url: 'assets/php/adminAction.php',
                            method: 'post',
                            data: $("#upAddressForm").serialize()+"&action=upAddress",
                            success:function(response){
                                $("#upAddressForm")[0].reset();
                                $("#editAddress").modal('hide');
                            }
                        });
                    }
                });
            });
        </script>
</body>
</html>