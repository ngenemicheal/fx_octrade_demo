<?php
    require_once '../assetsBack/php/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications | NumeroTrade</title>
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"> -->

    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="../assetsBack/css/style.css"> -->
    <link rel="icon" type="image/png" href="../../img/fav323860.png" sizes="32x32" />
</head>
<body>
    
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a href="#" class="navbar-brand">NumeroTrade</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php if($cplan == 'Bronze'): ?>
                        <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'bronzeProfile.php')?'active':'';?>" href="bronzeProfile.php"><i class="fas fa-user-circle"></i>&nbsp; My Profile</a>
                    <?php elseif($cplan == 'Silver'): ?>
                        <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'silverProfile.php')?'active':'';?>" href="silverProfile.php"><i class="fas fa-user-circle"></i>&nbsp; My Profile</a>
                    <?php else: ?>
                        <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'goldProfile.php')?'active':'';?>" href="goldProfile.php"><i class="fas fa-user-circle"></i>&nbsp; My Profile</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'notification.php')?'active':'';?>" href="notification.php"><i class="fas fa-bell"></i>&nbsp;Notifications&nbsp;<span id="checkNotification"></span></a>
                </li>
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

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if($verified == 'Not Verified'): ?>
                    <div class="alert alert-danger alert-dissmissable text-center mt-2 pb-0 mb-0">
                        <button class="close" type="button" data-dismiss="alert">&times;</button>
                        <p  class="lead">Your Email is not Verified</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 mt-4" id="showAllNotification">
                
            </div>
            <div class="col-lg-6 mt-4" id="showAdminNotification">
                
            </div>
        </div>
    </div>

    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/vendor/font-awesome/js/all.min.js"></script>

    <script src="../assetsBack/sweetalert-master/src/sweetalert.js"></script>
    <!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function(){

            // Fetch Notification for User
            fetchNotification();
            function fetchNotification(){
                $.ajax({
                    url: "../assetsBack/php/process.php",
                    method: 'post',
                    data: { action: 'fetchNotification'},
                    success:function(response){
                        $("#showAllNotification").html(response);
                    }
                });
            }

            // Fetch Notification for User
            fetchAdminNotification();
            function fetchAdminNotification(){
                $.ajax({
                    url: "../assetsBack/php/process.php",
                    method: 'post',
                    data: { action: 'fetchAdminNotification'},
                    success:function(response){
                        $("#showAdminNotification").html(response);
                    }
                });
            }

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

            // Remove Notification
            $("body").on("click", ".close", function(e){
                e.preventDefault();

                notification_id = $(this).attr('id');

                $.ajax({
                    url: "../assetsBack/php/process.php",
                    method: 'post',
                    data: {notification_id: notification_id},
                    success:function(response){
                        checkNotification();
                        fetchNotification();
                    }
                });
            })
        });
    </script>

</body>
</html>