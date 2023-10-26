<?php
    require_once '../assetsBack/php/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewsBlog | NumeroTrade</title>
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"> -->

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assetsBack/css/newsblog.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a href="#" class="navbar-brand">NumeroTrade</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
            <?php if ($cplan == 'Bronze') : ?>
                <li class="nav-item">
                    <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'bronzeProfile.php')?'active':'';?>" href="bronzeProfile.php"><i class="fas fa-user-circle"></i>&nbsp; My Profile</a>
                </li>
            <?php elseif ($cplan == 'Silver') : ?>
                <li class="nav-item">
                    <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'silverProfile.php')?'active':'';?>" href="silverProfile.php"><i class="fas fa-user-circle"></i>&nbsp; My Profile</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'goldProfile.php')?'active':'';?>" href="goldProfile.php"><i class="fas fa-user-circle"></i>&nbsp; My Profile</a>
                </li>
            <?php endif; ?> 
                <li class="nav-item">
                    <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'newsblog.php')?'active':'';?>" href="newsblog.php"><i class="fas fa-comment-dots"></i>&nbsp;NewsBlog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (basename($_SERVER['PHP_SELF']) == 'notification.php')?'active':'';?>" href="notification.php"><i class="fas fa-bell"></i>&nbsp;Notifications&nbsp;<span id="checkNotification"></span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-cog"></i>&nbsp;Hi <?= ucfirst($csurname)?> <?= ucfirst($cname)?>
                    </a>
                    <div class="dropdown-menu">
                        <a href="" class="dropdown-item"><i class="fas fa-cog"></i>&nbsp; Settings</a>
                        <a href="../assetsBack/php/logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <?php
        $url = "http://newsapi.org/v2/everything?q=bitcoin&from=2020-08-17&sortBy=publishedAt&apiKey=692ca414f217485bb2552c0096d45f57";
        $response = file_get_contents($url);
        $NewsData = json_decode($response);
    ?>

    <div class="jumbotron">
        <h1 class="">NumeroTrade | News Blog</h1>
    </div>

    <div class="container-fluid">
        <?php
            foreach($NewsData->articles as $News)
            {
        ?>
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?php echo $News->urlToImage ?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $News->title ?></h5>
                    <p class="card-text"><?php echo $News->description ?></p>
                    <p class="card-text"><small class="text-muted"></small></p>
                    <a href="<?php echo $News->url ?>">Read More</a>
                </div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>



    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/vendor/font-awesome/js/all.min.js"></script>
    <!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> -->
	<!-- <script src="https/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script> -->

    <script type="text/javascript">
        $(document).ready(function(){

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


        });
    </script>
</body>
</html>