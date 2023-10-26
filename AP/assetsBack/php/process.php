<?php

    require_once 'session.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);


    // Handle Funding Request
    if(isset($_POST['action']) && $_POST['action'] == "fundAccount"){
        $amtPaid = $cuser->test_input($_POST['amtPaid']);
        $transaction_type = $cuser->test_input($_POST['transaction_type']);

        $cuser->fundReq($cid, $amtPaid, $transaction_type);
    }

    // Handle Withdraw Request
    if(isset($_POST['action']) && $_POST['action'] == "withAccount"){
        $withAmt = $cuser->test_input($_POST['withAmt']);
        $transaction_type = $cuser->test_input($_POST['transaction_type']);

        $cuser->withdrawReq($cid, $withAmt, $transaction_type);
    }

    // Handle UpgradeToSilver Request
    if(isset($_POST['action']) && $_POST['action'] == "upToSilver"){
        $upgrade_to = $cuser->test_input($_POST['upgrade_to']);
    
        $cuser->upSilverReq($cid, $upgrade_to);
    }

    // Handle UpgradeToGold Request
    if(isset($_POST['action']) && $_POST['action'] == "upToGold"){
        $upgrade_to = $cuser->test_input($_POST['upgrade_to']);
    
        $cuser->upGoldReq($cid, $upgrade_to);
    }

    // Handle Profile Update Request
    if(isset($_FILES['image'])){
        $surname = $cuser->test_input($_POST['surname']);
        $name = $cuser->test_input($_POST['name']);
        $phone_number = $cuser->test_input($_POST['phone_number']);

        $oldImage = $_POST['oldImage'];
        $folder = 'uploads/';

        if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")){
            $newImage = $folder.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $newImage);

            if($oldImage != null){
                unlink($oldImage);
            }
        }
        else{
            $newImage = $oldImage;
        }
        $cuser->profileUpdate($newImage, $surname, $name, $phone_number, $cid);
    }

    // Handle Verify Email Request
    if(isset($_POST['action']) && $_POST['action'] == "verify_email"){
        try {
            // $mail->isSMTP();
            // $mail->Host = 'mail.numerotrades.com';
            // $mail->SMTPAuth = true;
            // $mail->Username = 'contact@numerotrades.com';
            // $mail->Password =  'BIGboy4real';
            // $mail->SMTPSecure = 'tls';
            // $mail->Port = 587;

            // $mail->setFrom('contact@numerotrades.com','NumeroTrade');
            // $mail->addAddress($cemail);

            // $mail->isHTML(true);
            // $mail->Subject = 'Email Verification';
            // $mail->Body = '<h3>Click the link below to Verify your Email.<br><a href="http://localhost/NumeroTrade/Updated_Backend/verifyEmail.php?email='.$cemail.'&plan='.$cplan.'" class="btn btn-info">Click Here to Verify Email</a><br>NumeroTrade</h3>';

            // $mail->send();
            // echo $cuser->showMessage('success', 'We have sent the Verification link to your Email Address');
            $to = "$cemail";
            $subject = "WELCOME TO NUMEROTRADE";

            $message = '
            <html>
                <head>
                    <title>WELCOME TO NUMEROTRADE</title>
                </head>
                <body>
                <h3>Click the link below to Verify your Email.<br><a href="http://localhost/NumeroTrade/Updated_Backend/verifyEmail.php?email='.$cemail.'&plan='.$cplan.'" class="btn btn-info">Click Here to Verify Email</a><br>NumeroTrade</h3>
                </body>
            </html>';

            // Always set content-type when sending HTML email
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: contact@numerotrades.com';

            mail($to,$subject,$message,$headers);

            echo $cuser->showMessage('success', 'We have sent the Verification link to your Email Address');

        } catch (Exception $e) {
            echo $cuser->showMessage('danger', 'Something went wrong! Please Try again later!');
        }
    }

    // Handle FetchNotification
    if(isset($_POST['action']) && $_POST['action'] == 'fetchNotification'){
        $notification = $cuser->fetchNotification($cid);
        $output = '';

        if($notification){
            foreach ($notification as $row) {
                $output .= '<div class="alert alert-warning " role="alert">
                                <button type="button" id="'.$row['id'].'" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="alert-heading text-dark">New Notification</h3>
                                <p class="mb-0 lead text-dark">
                                    '.$row['notify_msg'].'
                                </p>
                                <hr class="my-2">
                                <p class="mb-0 float-left text-danger">From NumeroTrade</p>
                                <p class="mb-0 float-right text-secondary">'.$cuser->timeInAgo($row['notify_time']).'</p>
                                <div class="clearfix"></div>
                            </div>';
            }
            echo $output;
        }
        else{
            echo '
            <div class="alert alert-danger" role="alert">
                <h2 class="text-center text-danger mt-1 mb-1">No Notification For Now</h2>
            </div>';
        }
    }

    // Handle FetchAdminNotification
    if(isset($_POST['action']) && $_POST['action'] == 'fetchAdminNotification'){
        $adminNotify = $cuser->fetchAdminNotification($cid);
        $output = '';

        if($adminNotify){
            foreach ($adminNotify as $row) {
                $output .= '<div class="alert alert-warning " role="alert">
                                <button type="button" id="'.$row['id'].'" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="alert-heading text-dark">Message From Your Account Manager</h3>
                                <p class="mb-0 lead text-dark">
                                    '.$row['notify_msg'].'
                                </p>
                                <hr class="my-2">
                                <p class="mb-0 float-left text-secondary">'.$cuser->timeInAgo($row['notify_time']).'</p>
                                <div class="clearfix"></div>
                            </div>';
            }
            echo $output;
        }
        else{
            echo '
            <div class="alert alert-danger" role="alert">
                <h2 class="text-center text-danger mt-1 mb-1">No Message From Your Account Manager</h2>
            </div>';
        }
    }

    // Check Notification
    if(isset($_POST['action']) && $_POST['action'] == 'checkNotification'){
        if($cuser->fetchNotification($cid)){
            echo '<i class="fas fa-circle fa-sm text-danger"></i>';
        }
        else{
            echo '';
        }
    }

        // Check Message Notification
        if(isset($_POST['action']) && $_POST['action'] == 'checkMsgNotification'){
            if($cuser->fetchAdminNotification($cid)){
                echo '<i class="fas fa-circle fa-sm text-danger"></i>';
            }
            else{
                echo '';
            }
        }

    // Remove Notification
    if(isset($_POST['notification_id'])){
        $id = $_POST['notification_id'];
        $cuser->removeNotification($id);
    }

    // Fetch Admin Bitcoin Address
    if(isset($_POST['action']) && $_POST['action'] == 'fetchAddress'){

        $id = 1;
        $data = $cuser->fetchAdd($id);
        echo json_encode($data);
    }

    // Handle FetchTopEarners
    if(isset($_POST['action']) && $_POST['action'] == 'fetchTopEarners'){
        $output = '';
        $data = $cuser->fetchTopEarners(0);
        $no = 0;

        if($data){
            $output .= '<table class= "table table-striped table-bordered table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Plan</th>
                                    <th>Earnings</th>
                                    <th>Date Joined</th>
                                </tr>
                            </thead>
                            <tbody>';
                foreach ($data as $row) {
                    $row['join_date'] = date('d M Y', strtotime($row['join_date']));
                    $no += 1;
                    $output .= '<tr>
                                    <td>'.$no.'</td>
                                    <td>'.$row['surname'].'&nbsp;'.$row['name'].'</td>
                                    <td>'.$row['plan'].'</td>
                                    <td>'.$row['dollar_bal'].'</td>
                                    <td>'.$row['join_date'].'</td>';
                    }
                    $output .= '</tr>';
                        $output .= '</tbody>
                                </table>';
                        echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">No Traders</h3>';
        }
    }

    // Handle Message Admin
    if(isset($_POST['action']) && $_POST['action'] == 'msgAdmin'){
        $subject = $cuser->test_input($_POST['subject']);
        $message = $cuser->test_input($_POST['message']);

        $cuser->sendAdminMsg($subject, $message, $cid);
    }
?>