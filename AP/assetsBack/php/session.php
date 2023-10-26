<?php

    session_start();
    require_once 'auth.php';
    $cuser = new Auth();

    if(!isset($_SESSION['user'])){
        header('location:../login.php');
    }

    $cemail = $_SESSION['user'];

    $data = $cuser->currentUser($cemail);

    $cid = $data['id'];
    $csurname = $data['surname'];
    $cname = $data['name'];
    $cemail = $data['email'];
    $cpassword = $data['password'];
    $cphone_number = $data['phone_number'];
    $cplan = $data['plan'];
    $cbtc_bal = $data['btc_bal'];
    $cdollar_bal = $data['dollar_bal'];
    $coccupation = $data['occupation'];
    $ccountry = $data['country'];
    $cjoin_date = $data['created_at'];
    $cpro_pic = $data['photo'];
    $verified = $data['verified'];

    $cjoin_date = date('d M Y', strtotime($cjoin_date));

    if($verified == 0){
        $verified = 'Not Verified';
    }
    else{
        $verified = 'Verified';
    }

?>