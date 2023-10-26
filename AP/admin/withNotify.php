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
    <title>Withdraw Request | Admin Panel</title>

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
        <h4 class="text-light">Withdraw Request</h4>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-Dashboard.php') ?"nav-active":""; ?>" href="admin-Dashboard.php"><i class="fas fa-chart-pie"></i>&nbsp;Dashboard&nbsp;<span id="dashboard"></span></a>
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
                    <a href="assets/php/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row justify-content-center my-2">
        <div class="col-lg-6 mt-4" id="showWithdrawNotify">

        </div>
    </div>

    <!-- EDIT TRADER FUNDS -->
    <div class="modal fade" id="editUserFunds">
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
                    <form action="#" method="post" id="updateFundsForm" class="mt-3">
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
                            <input type="submit" value="UPDATE" name="updateTrader" id="updateFundsFormBtn" class="btn btn-secondary btn-block btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


        <!-- jQuery -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
        <script src="../../assets/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <!-- Font Awesome Javascript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>

        <!-- Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

        <script>
            $(document).ready(function(){

                // Fetch Withdraw Notification
                fetchWith();

                function fetchWith(){
                    $.ajax({
                        url: 'assets/php/adminAction.php',
                        method: 'post',
                        data: { action:'fetchWith' },
                        success:function(response){
                            $("#showWithdrawNotify").html(response);
                        }
                    });
                }

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

                // Remove Withdraw Notify
                $("body").on("click", ".close", function(e){
                    e.preventDefault();

                    withNotify_id = $(this).attr('id');

                    $.ajax({
                        url: 'assets/php/adminAction.php',
                        method: 'post',
                        data: { withNotify_id: withNotify_id },
                        success:function(response){
                            fetchWith();
                            checkWith();
                        }
                    });
                });

                // Display User Details
                $("body").on("click", ".updateFunds", function(e){
                    e.preventDefault();

                    clientid = $(this).attr('id');
                    $.ajax({
                        url: 'assets/php/adminAction.php',
                        type: 'post',
                        data: { clientid: clientid },
                        success:function(response){
                            data = JSON.parse(response);
                            $("#getName").text('EDIT '+data.surname+' '+data.name);
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

                // Edit Trader Plan 
                $("#updateFundsFormBtn").click(function(e){
                    if($("#updateFundsForm")[0].checkValidity()){
                        e.preventDefault();

                        $.ajax({
                            url: 'assets/php/adminAction.php',
                            method: 'post',
                            data: $("#updateFundsForm").serialize()+"&action=withFunds",
                            success:function(response){

                                Swal.fire({
                                    type: 'success',
                                    title: 'Plan Updated Successfully'
                                });
                                $("#updateFundsForm")[0].reset();
                                $("#editUserFunds").modal('hide');
                            }
                        });
                    }
                });
            });
        </script>
</body>
</html>