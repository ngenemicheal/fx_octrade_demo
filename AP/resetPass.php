<?php

    require_once 'assetsBack/php/auth.php';

    $user = new Auth();

    $msg = '';

    if(isset($_GET['email']) && isset($_GET['token'])){
        $email = $user->test_input($_GET['email']);
        $token = $user->test_input($_GET['token']);

        $auth_user = $user->reset_password_auth($email, $token);

        if($auth_user != null){
            if(isset($_POST['submit'])){
                $newpass = $_POST['newpass'];
                $connewpass = $_POST['connewpass'];

                $hashnewpass = password_hash($newpass, PASSWORD_DEFAULT);

                if($newpass == $connewpass){
                    $user->update_password($hashnewpass, $email);
                    $typeofmsg = 'success';
                    $msg = 'Password Changed Successfully!<br><a href="login.php" class="btn btn-info">Click Here to Login</a>';
                }
                else{
                    $typeofmsg = 'danger';
                    $msg = 'Password and Confirm Password do not match';
                }
            }
        }
        else{
            header('location:index.php');
            exit();
        }
    }
    else{
        header('location:index.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | NumeroTrade</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"> -->

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assetsBack/css/style.css">


    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../img/fav323860.png" sizes="32x32" />

</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center wrapper" id="login-box">
            <div class="col-lg-10 my-auto">
                <div class="card-group myShadow">
                    <div class="card rounded-left p-4" style="flex-grow:1.4;">
                        <h1 class="text-center text-primary">Create New Password</h1>
                        <hr class="my-3">
                        <form action="#" method="post" class="" id="login-form">
                        <div class="text-center lead mb-2 text-<?= $typeofmsg ?>"><?= $msg; ?></div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" name="newpass" class="form-control rounded-0" placeholder="New Password" required minlength='8'>
                            </div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" name="connewpass" class="form-control rounded-0" placeholder="Confirm Password" required minlength='8'>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Create New Password" name="submit" id="login-btn" class="btn btn-primary btn-block myBtn">
							</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/font-awesome/js/all.min.js"></script>
    <!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> -->
	<!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script> -->
</body>
</html>