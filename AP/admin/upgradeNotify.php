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
    <title>Upgrade Request | Admin Panel</title>

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
        <h4 class="text-light">Upgrade Request</h4>

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
        <div class="col-lg-6 mt-4" id="showUpgradeNotify">

        </div>
    </div>

    <!-- EDIT TRADER PLAN MODAL -->
    <div class="modal fade" id="editUserPlan">
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
                    <form action="#" method="post" id="updatePlanForm" class="mt-3">
                        <input class="form-control" name="id" id="id" type="text" hidden>
                        <div class="form-group">
                            <label for="upPlan">Edit Plan</label>
                            <select class="form-control" name="upPlan" id="upPlan">
                                <option value="Bronze" selected='selected'>Bronze</option>
                                <option value='Silver'>Silver</option>
                                <option value='Gold'>Gold</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="UPDATE" name="updatePlan" id="updatePlanFormBtn" class="btn btn-secondary btn-block btn-lg">
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

                // Fetch Upgradeing Notification
                fetchUpgrade();

                function fetchUpgrade(){
                    $.ajax({
                        url: 'assets/php/adminAction.php',
                        method: 'post',
                        data: { action:'fetchUpgrade' },
                        success:function(response){
                            $("#showUpgradeNotify").html(response);
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

                // Remove Upgrade Notify
                $("body").on("click", ".close", function(e){
                    e.preventDefault();

                    upgradeNotify_id = $(this).attr('id');

                    $.ajax({
                        url: 'assets/php/adminAction.php',
                        method: 'post',
                        data: { upgradeNotify_id: upgradeNotify_id },
                        success:function(response){
                            fetchUpgrade();
                            checkUpgrade();
                        }
                    });
                });

                // Display User Details
                $("body").on("click", ".updatePlan", function(e){
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
                $("#updatePlanFormBtn").click(function(e){
                    if($("#updatePlanForm")[0].checkValidity()){
                        e.preventDefault();

                        $.ajax({
                            url: 'assets/php/adminAction.php',
                            method: 'post',
                            data: $("#updatePlanForm").serialize()+"&action=updatePlan",
                            success:function(response){

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Plan Updated Successfully'
                                });
                                $("#updatePlanForm")[0].reset();
                                $("#editUserPlan").modal('hide');
                            }
                        });
                    }
                });
            });
        </script>
</body>
</html>