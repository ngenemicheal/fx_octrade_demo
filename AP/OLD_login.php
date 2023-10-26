<?php

    session_start();
    if(isset($_SESSION['user'])){
        if ($cplan == 'Bronze') {
            header('location:profilePages/bronzeProfile.php');
        } else if ($cplan == 'Silver'){
            header('location:profilePages/silverProfile.php');
        } else{
            header('location:profilePages/goldProfile.php');
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | NumeroTrade</title>

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
        <!-- Login Section Starts -->
        <div class="row justify-content-center wrapper" id="login-box">
            <div class="col-lg-10 my-auto">
                <div class="card-group myShadow">
                    <div class="card rounded-left p-4" style="flex-grow:1.4;">
                        <h1 class="text-center text-primary">Sign In To Your Account</h1>
                        <hr class="my-3">
                        <form action="#" method="post" class="" id="login-form">
                        <div id="loginError"></div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="far fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="email" class="form-control rounded-0" placeholder="Your Email" required value="<?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email']; }?>">
                            </div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control rounded-0" placeholder="Your Password" required value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password']; }?>">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox text-center">
                                <input type="checkbox" name="Rem" class="custom-control-input" id="customCheck" <?php if(isset($_COOKIE['email'])) { ?> checked <?php } ?>>
                                    <label for="customCheck" class="custom-control-label">Remember Me</label>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Sign In" id="login-btn" class="btn btn-primary btn-block myBtn">
							</div>
							<div class="forgot text-center">
                                    <a href="#" id="forgot-link" class="btn btn-danger">Forgot Password?</a>
                                </div>
						</form>
                        <hr>
						<p class="text-center mt-4 text-dark lead">Don't Have An Account</p>
                        <a href="register.php" class="btn btn-dark align-self-center mt-0">Click Here</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Section Ends -->

        <!-- Forgot Password Section Starts -->
        <div class="row justify-content-center wrapper" id="forgot-box" style="display:none;">
            <div class="col-lg-10 my-auto">
                <div class="card-group myShadow">
                    <div class="card rounded-left p-4" style="flex-grow:1.4;">
                        <h1 class="text-center text-primary">Forgot Your Password</h1>
                        <hr class="my-3">
                        <p class="lead text-center text-secondary">To reset your password, enter the registered Email address, and we will send you instruction on how to create new password</p>
                        <form action="#" method="post" class="" id="forgot-form">
                        <div id="forgotAlert"></div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="far fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="forgotemail" class="form-control rounded-0" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Reset Password" id="forgot-btn" class="btn btn-primary btn-block myBtn">
                            </div>
						</form>
						<hr class="my-3 bg-light myHr">
                        <button class="btn btn-dark btn-lg align-self-center font-weight-bold mt-4 myLinkBtn" id="back-link">Back</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Forgot Passsword Section Ends -->
    </div>









    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/font-awesome/js/all.min.js"></script>
    <!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> -->
	<!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script> -->
	
	<script>
		$(document).ready(function(){
			$("#forgot-link").click(function(){
				$("#login-box").hide();
				$("#forgot-box").show();
			});
			$("#back-link").click(function(){
				$("#login-box").show();
				$("#forgot-box").hide();
			});

            // AJAX Login Request
            $("#login-btn").click(function(e){
                if($("#login-form")[0].checkValidity()){
                    e.preventDefault();
                    $("#login-btn").val('Please Wait...');
                    $.ajax({
                        url: 'assetsBack/php/action.php',
                        method: 'post',
                        data: $("#login-form").serialize()+'&action=login',
                        success:function(response){
                            $("#login-btn").val('Sign In');
                            if(response === 'loginBronze'){
                                window.location = 'profilePages/bronzeProfile.php';
                            }
                            else if(response === 'loginSilver'){
                                window.location = 'profilePages/silverProfile.php';
                            }
                            else if(response === 'loginGold'){
                                window.location = 'profilePages/goldProfile.php';
                            }
                            else{
                                $("#loginError").html(response);
                            }
                        }
                    });
                }
            });

            //AJAX Forgot Password Request
            $("#forgot-btn").click(function(e){
                if($("#forgot-form")[0].checkValidity()){
                    e.preventDefault();
                    $("#forgot-btn").val('Please Wait...');

                    $.ajax({
                        url: 'assetsBack/php/action.php',
                        method: 'post',
                        data: $("#forgot-form").serialize()+'&action=forgot',
                        success:function(response){
                            $("#forgot-btn").val('Reset Password');
                            $("#forgot-form")[0].reset();
                            $('#forgotAlert').html(response);
                        }
                    })
                }
            });
		});
	</script>
</body>
</html>