<?php

    require_once 'assetsBack/php/session.php';

    if(isset($_GET['email'])){
        $email = $_GET['email'];
        $plan = $_GET['plan'];

        $cuser->verifyTraderEmail($email);

        if($plan == "Bronze"){
            header('location:profilePages/bronzeProfile.php');
            exit();
        }
        else if($plan == "Silver"){
            header('location:profilePages/silverProfile.php');
            exit();
        }
        else{
            header('location:profilePages/goldProfile.php');
            exit();
        }
    }
    else{
        header('location:../index.html');
        exit();
    }

?>