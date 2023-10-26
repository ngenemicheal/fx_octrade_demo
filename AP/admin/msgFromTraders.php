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
    <title>Messages | Admin Panel</title>

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
        <h4 class="text-light">Messages</h4>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-Dashboard.php') ?"nav-active":""; ?>" href="admin-Dashboard.php"><i class="fas fa-chart-pie"></i>&nbsp;Dashboard&nbsp;<span id="dashboard"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link admin-link <?= (basename($_SERVER['PHP_SELF']) == 'msgFromTraders.php') ?"nav-active":""; ?>" href="msgFromTraders.php"><i class="fas fa-envelope"></i>&nbsp;Messages&nbsp;<span id="msgNoti"></span></a>
                </li>
                <li class="nav-item">
                    <a href="assets/php/logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
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
                        <div class="table-responsive" id="showMsgs">
                            <div class="text-center align-self-center lead">Please Wait...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="replyMsgModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reply This Trader</h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="replyForm">
                        <div class="form-group">
                            <textarea name="replyMsg" id="replyMsg" rows="6" placeholder="Write Your Reply" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Send Reply" class="btn btn-secondary btn-block btn-lg" id="replyBtn">
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

                // calling the function
                fetchMsgFromTraders();

                // Fetch Messages From Traders
                function fetchMsgFromTraders(){
                    $.ajax({
                        url: 'assets/php/adminAction.php',
                        method: 'post',
                        data: { action: 'fetchMsgFromTraders' },
                        success:function(response){
                            $("#showMsgs").html(response);
                        }
                    });
                }

                // Get the Trader ID and Message ID
                var clientID;
                var msgID;
                $("body").on("click", ".replyTrader", function(e){
                    clientID = $(this).attr('id');
                    msgID = $(this).attr('mid');
                });

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

                $("#replyBtn").click(function(e){
                    if($("#replyForm")[0].checkValidity()){
                        let message = $("#replyMsg").val();
                        e.preventDefault();
                        $("#replyBtn").val('Please Wait...');

                        $.ajax({
                            url: 'assets/php/adminAction.php',
                            method: 'post',
                            data: { clientID: clientID, msgID: msgID, message: message},
                            success:function(response){
                                $("#replyBtn").val('Please Wait...');
                                $("#replyMsgModal").modal('hide');
                                $("#replyForm")[0].reset();
                                Swal.fire({
                                    type: 'success',
                                    title: 'Reply Sent Successfully'
                                });
                                fetchMsgFromTraders();
                            }
                        });
                    }
                });

            });
        </script>
</body>
</html>