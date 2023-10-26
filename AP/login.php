<?php

    session_start();
    if(isset($_SESSION['user'])){
        if ($cplan == 'Bronze') {
            header('location:profilePages/dashboard.php');
        } else if ($cplan == 'Silver'){
            header('location:profilePages/dashboard.php');
        } else{
            header('location:profilePages/dashboard.php');
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 style="font-size: smaller;"><a href="../index.html">FX-OCTrade</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a  href="../index.html">Home</a></li>
          <li><a  href="../about.html">About</a></li>
          <li class="dropdown"><a href="#"><span>Trading</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Accounts</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Standard Accounts</a></li>
                  <li><a href="#">Professional Accounts</a></li>
                  <li><a href="#">Portfolio Management Accounts</a></li>
                  <li><a href="#">Social Trading Accounts</a></li>
                  <li><a href="#">Deposits and Withdrawals</a></li>
                  <li><a href="#">Fees</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>Instruments</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="../forex.html">Forex</a></li>
                  <li><a href="../commodities.html">Commodities</a></li>
                  <li><a href="../stocks.html">Stocks</a></li>
                  <li><a href="../indices.html">Indices</a></li>
                  <li><a href="../crypto.html">Crypto</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>Solution</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Portfolio Management</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="../pricing.html">Trading Packages</a></li>
          <li><a href="../faq.html">FAQs</a></li>
          <li><a href="../contact.html">Contact Us</a></li>
          <li class="dropdown active"><a href="#"><span>Account</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="login.php"><span>Login</span></i></a>
              </li>
              <li><a href="signup.php"><span>Register</span></i></a>
              </li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title mt-4">
            <h2>Login</h2>
        </div>

        <div class="row">

          <div class="col-lg-12 align-self-center">
            <form method="post" role="form" class="php-email-form" action="#"  id="login-form">
            <div id="loginError"></div>
              <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
              </div>
              <div class="text-center"><button type="submit" id="login-btn">Login</button></div>
              <br>
              <p class="center">Dont Have an Account? <a style="color: #c7d923;" href="signup.php">Sign Up</a></p>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="../index.html">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../about.html">About Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../contact.html">Contact Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../AP/login.php">Login</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../AP/signup.php">Sign Up</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Instruments</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="../forex.html">Forex</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../commodities.html">Commodities</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../stocks.html">Stocks</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../indices.html">Indices</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../crypto.html">Crypto</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +49 17275 11811<br>
              <strong>Email:</strong> info@fx-octrade.com<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>About FX-OCTrade</h3>
            <p>FX-OCTrade (SC) Ltd ​is a Securities Dealer registered in Seychelles with registration number 8423606-1 and
              authorised by the Financial Services Authority (FSA) with licence number SD025. The registered office of
              FX-OCTrade (SC) Ltd is at 9A CT House, 2nd floor, Providence, Mahe, Seychelles.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; 2023 <strong><span>FX-OCTrade</span></strong>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



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
                                window.location = 'profilePages/dashboard.php';
                            }
                            else if(response === 'loginSilver'){
                                window.location = 'profilePages/dashboard.php';
                            }
                            else if(response === 'loginGold'){
                                window.location = 'profilePages/dashboard.php';
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