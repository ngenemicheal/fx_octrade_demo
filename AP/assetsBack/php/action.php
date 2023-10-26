<?php

    session_start();

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    require 'vendor/autoload.php';
    require_once 'auth.php';

    $user = new Auth();

    // Registration AJAX Handling
    // if(isset($_POST['action']) && $_POST['action'] == 'register'){
    //     $surname = $user->test_input($_POST['surname']);
    //     $name = $user->test_input($_POST['name']);
    //     $email = $user->test_input($_POST['email']);
    //     $password = $user->test_input($_POST['password']);
    //     $phone_number = $user->test_input($_POST['phone_number']);
    //     $occupation = $user->test_input($_POST['occupation']);
    //     $country = $user->test_input($_POST['country']);

    //     $hashpassword = md5($password);

    //     if ($user->user_exist($email)){
    //         echo $user->showMessage('warning', 'The Email is already Registered');
    //     }
    //     else if(empty($_POST['AgreeTerm'])){
    //         echo $user->showError('warning', 'Agree With Our Terms and Condition!');
    //     }
    //     else{
    //         $sql = "INSERT INTO traders (surname, name, email, password, phone_number, occupation, country) VALUES ('$surname', '$name', '$email', '$hashpassword', '$phone_number', '$occupation', '$country')";

    //         $result = mysqli_query($conn, $sql);

    //         if($result){
    //             echo 'registered';
    //             $_SESSION['user'] = $email;
    //         }
    //         else {
    //             $user->showMessage('danger', 'Something Went Wrong! Try Again Later!');
    //         }
    //     }
    // }

    // Login AJAX Handling
    if(isset($_POST['action']) && $_POST['action'] == 'login'){
        $email = $user->test_input($_POST['email']);
        $password = $user->test_input($_POST['password']);
        // $plan = $user->test_input($_POST['plan']);

        $loggedInUser = $user->login($email);
        $passwordhash = md5($password);

        if($loggedInUser != null){
            if($passwordhash === $loggedInUser['password']){
                if(!empty($_POST['Rem'])){
                    setcookie("email", $email, time()+(30*24*60*60), '/');
                    setcookie("password", $password, time()+(30*24*60*60), '/');
                    if($loggedInUser['plan'] === "Bronze"){
                        echo 'loginBronze';
                    }
                    else if($loggedInUser['plan'] === "Silver"){
                        echo 'loginSilver';
                    }
                    else{
                        echo 'loginGold';
                    }
                }
                else{
                    setcookie("email","",1, '/');
                    setcookie("password","",1, '/');
                    if($loggedInUser['plan'] === "Bronze"){
                        echo 'loginBronze';
                    }
                    else if($loggedInUser['plan'] === "Silver"){
                        echo 'loginSilver';
                    }
                    else{
                        echo 'loginGold';
                    }
                }
                $_SESSION['user'] = $email;
            }
            else{
                echo $user->showMessage('danger', 'Password is Not Correct!');
            }
        }
        else{
            echo $user->showMessage('danger', 'User Not Found!');
        }
    }

    // Forgot AJAX Handling
    if(isset($_POST['action']) && $_POST['action'] == 'forgot'){
        $email = $user->test_input($_POST['email']);
        $user_found = $user->currentUser($email);

        if($user_found != null){
            $token = uniqid();
            $token = str_shuffle($token);

            $user->forgot_password($token,$email);

            try {
                // $mail->isSMTP();
                // $mail->Host = 'mail.numerotrades.com';
                // $mail->SMTPAuth = true;
                // $mail->Username = 'contact@numerotrades.com';
                // $mail->Password =  'BIGboy4real';
                // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                // $mail->Port = 465;

                // $mail->setFrom('contact@numerotrades.com','NumeroTrade');
                // $mail->addAddress($email);

                // $mail->isHTML(true);
                // $mail->Subject = 'Reset Password';
                // $mail->Body = '<h3>Click the link below to reset your password.<br><a href="http://localhost/NumeroTrade/Updated_Backend/resetPass.php?email='.$email.'&token='.$token.'" class="btn btn-info">Click Here to Reset Password</a><br>NumeroTrade</h3>';

                // $mail->send();

                // $to = "$email";
                // $subject = "WELCOME TO NUMEROTRADE";
    
                // $message = '
                // <html>
                //     <head>
                //         <title>WELCOME TO NUMEROTRADE</title>
                //     </head>
                //     <body>
                //         <h3>Click the link below to reset your password.<br><a href="http://localhost/NumeroTrade/Updated_Backend/resetPass.php?email='.$email.'&token='.$token.'" class="btn btn-info">Click Here to Reset Password</a><br>NumeroTrade</h3>
                //     </body>
                // </html>';
    
                // // Always set content-type when sending HTML email
                // // $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
                // $headers = 'From: contact@numerotrades.com';
    
                // mail($to,$subject,$message,$headers);
                echo $user->showMessage('success', 'We have sent the rest link to your Email Address');

            } catch (Exception $e) {
                echo $user->showMessage('danger', 'Something went wrong! Please Try again later!');
            }
        } 
        else{
            echo $user->showMessage('warning', 'This Email Address is not registered with us!');
        }
    }

    // Checking if Trader is Logged IN
    if(isset($_POST['action']) && $_POST['action'] == 'checkTrader'){
        if(!$user->currentUser($_SESSION['user'])){
            echo 'bye';
            unset($_SESSION['user']);
        }
    }
?>