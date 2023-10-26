<?php 

    session_start();
    if(isset($_SESSION['adminusername'])){
        header('location:admin-Dashboard.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | Admin</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

        <!-- Custom CSS -->
        <style type="text/css">
            html,body{
                height: 100%;
            }
        </style>
    </head>
    <body class="bg-dark">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-lg-6">
                    <div class="card border-danger shadow-lg">
                        <div class="card-header bg-danger">
                            <h3 class="m-0 text-white"><i class="fas fa-user-cog"></i>&nbsp;Admin Login</h3>
                        </div>
                        <div class="card-body">
                            <form action="" class="px-3" id="adminLoginForm" method="post">
                                <div class="lead" id="adminLoginAlert"></div>
                                <div class="form-group">
                                    <input id="adminusername" class="form-control form-control-lg" placeholder="Username" type="text" name="adminusername" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input id="adminpassword" class="form-control form-control-lg" placeholder="Password" type="password" name="adminpassword" required>
                                </div>
                                <div class="form-group">
                                    <input id="adminLoginBtn" class="btn btn-danger btn-block btn-lg" value="Login" type="submit" name="adminLoginBtn">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <!-- Font Awesome Javascript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>

        <!-- Sweet Alert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

        <script>
            $(document).ready(function(){

                $("#adminLoginBtn").click(function(e){
                    if($("#adminLoginForm")[0].checkValidity()){
                        e.preventDefault();

                        $("#adminLoginBtn").val('Please Wait...');
                        $.ajax({
                            url: 'assets/php/adminAction.php',
                            method: 'post',
                            data: $("#adminLoginForm").serialize()+'&action=adminLogin',
                            success:function(response){
                                if(response === 'AdminLoggedIn'){
                                    window.location = 'admin-Dashboard.php';
                                }
                                else{
                                    $("#adminLoginAlert").html(response);
                                }
                                $("#adminLoginBtn").val('Login');
                            }
                        });
                    }
                });
            });
        </script>
    </body>
</html>
