<?php

    require_once 'adminDB.php';
    $admin = new Admin();
    session_start();

    // Handle Admin Login Ajax Request
    if(isset($_POST['action']) && $_POST['action'] == 'adminLogin'){
        $adminusername = $admin->test_input($_POST['adminusername']);
        $adminpassword = $admin->test_input($_POST['adminpassword']);

        $hpassword = sha1($adminpassword);

        $loggedInAdmin = $admin->adminLogin($adminusername, $hpassword);

        if($loggedInAdmin != null){
            echo 'AdminLoggedIn';
            $_SESSION['adminusername'] = $adminusername;
        }
        else{
            echo $admin->showMessage('danger', 'Username Or Password Not Correct');
        }
    }

    // Handle FetchTraders
    if(isset($_POST['action']) && $_POST['action'] == 'fetchTraders'){
        $output = '';
        $data = $admin->fetchTraders(0);

        if($data){
            $output .= '<table class= "table table-striped table-bordered table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Plan</th>
                                    <th>Dollar</th>
                                    <th>Bitcoin</th>
                                    <th>Edit</th>
                                    
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>';
                foreach ($data as $row) {
                    $output .= '<tr>
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['surname'].'&nbsp;'.$row['name'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['plan'].'</td>
                                    <td>'.$row['dollar_bal'].'</td>
                                    <td>'.$row['btc_bal'].'</td>
                                    <td>
                                        <a href="#" id="'.$row['id'].'" title="Edit Trader" class="text-primary traderEditIcon" data-toggle="modal" data-target="#editUserModal"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;
                                    </td>
                                    <td>
                                        <a href="#" id="'.$row['id'].'" title="Delete Trader" class="text-danger traderDeleteIcon"><i class="fas fa-trash-alt fa-lg"></i></a>&nbsp;
                                    </td>';
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

    // Handle Display User Details
    if(isset($_POST['edit_id'])){
        $id = $_POST['edit_id'];

        $data = $admin->fetchTradersDetails($id);

        echo json_encode($data);
    }

    // Handle Delete Trader
    if(isset($_POST['delete_id'])){
        $id = $_POST['delete_id'];
        $admin->deleteTrader($id);
    }

    // Handle Fetch Fund
    if(isset($_POST['action']) && $_POST['action'] == 'fetchFund'){
        $notification = $admin->fetchFund();
        $output = '';

        if($notification){
            foreach ($notification as $row) {
                $output .= '<div class="alert alert-success " role="alert">
                                <button type="button" id="'.$row['id'].'" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="alert-heading text-dark">'.$row['surname'].'&nbsp;'.$row['name'].'</h3>
                                <p class="mb-0 lead text-dark">
                                    Fund my Account with $'.$row['amtPaid'].'
                                </p>
                                <a href="#" id="'.$row['clientid'].'" title="Edit Trader" class="btn btn-dark text-primary updateFunds" data-toggle="modal" data-target="#editUserFunds"><i class="fas fa-info-circle fa-lg"></i> Edit Funds </a>
                                <hr class="my-2">
                            </div>';
            }
            echo $output;
        }
        else{
            echo '
            <div class="alert alert-danger" role="alert">
                <h2 class="text-center text-danger mt-1 mb-1">No FUNDING REQUESTS</h2>
            </div>';
        }
    }

    // Handle Fetch Withdraw
    if(isset($_POST['action']) && $_POST['action'] == 'fetchWith'){
        $notification = $admin->fetchWith();
        $output = '';

        if($notification){
            foreach ($notification as $row) {
                $output .= '<div class="alert alert-danger " role="alert">
                                <button type="button" id="'.$row['id'].'" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="alert-heading text-dark">Withdraw Request</h3>
                                <p class="mb-0 lead text-dark">
                                    Withdraw $'.$row['withAmt'].' from my Account
                                </p>
                                <hr class="my-2">
                                <p class="mb-0 float-left text-danger">From '.$row['surname'].'&nbsp;'.$row['name'].'</p>
                                <div class="clearfix"></div>
                                <a href="#" id="'.$row['clientid'].'" title="Edit Trader" class="btn btn-primary text-dark updateFunds" data-toggle="modal" data-target="#editUserFunds">Edit Trader </a>
                            </div>';
            }
            echo $output;
        }
        else{
            echo '
            <div class="alert alert-danger" role="alert">
                <h2 class="text-center text-danger mt-1 mb-1">No WITHDRAW REQUESTS</h2>
            </div>';
        }
    }

    // Handle Fetch Upgrade
    if(isset($_POST['action']) && $_POST['action'] == 'fetchUpgrade'){
        $notification = $admin->fetchUpgrade();
        $output = '';

        if($notification){
            foreach ($notification as $row) {
                $output .= '<div class="alert alert-warning " role="alert">
                                <button type="button" id="'.$row['id'].'" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="alert-heading text-dark">Upgrade Request</h3>
                                <p class="mb-0 lead text-dark">
                                    Upgrade my account to '.$row['upgrade_to'].'
                                </p>
                                <hr class="my-2">
                                <p class="mb-0 float-left text-danger">From '.$row['surname'].'&nbsp;'.$row['name'].'</p>
                                <div class="clearfix"></div>
                                <a href="#" id="'.$row['clientid'].'" title="Edit Trader" class="btn btn-primary text-dark updatePlan" data-toggle="modal" data-target="#editUserPlan">Edit Trader</a>
                            </div>';
            }
            echo $output;
        }
        else{
            echo '
            <div class="alert alert-danger" role="alert">
                <h2 class="text-center text-danger mt-1 mb-1">No UPGRADE REQUESTS</h2>
            </div>';
        }
    }

    // Handle Display User Details
    if(isset($_POST['clientid'])){
        $id = $_POST['clientid'];

        $dataplan = $admin->fetchTradersInfo($id);

        echo json_encode($dataplan);
        
    }

    // Fetch Admin Bitcoin Address
    if(isset($_POST['action']) && $_POST['action'] == 'fetchAddress'){

        $id = 1;
        $data = $admin->fetchAdd($id);
        echo json_encode($data);
    }

    // Handle Check Fund
    if(isset($_POST['action']) && $_POST['action'] == 'checkFund'){
        if($admin->fetchFund()){
            echo '<i class="fas fa-circle text-danger fa-sm"></i>';
        }
        else{
            echo '';
        }
    }

    // Handle Check Withdraw
    if(isset($_POST['action']) && $_POST['action'] == 'checkWith'){
        if($admin->fetchWith()){
            echo '<i class="fas fa-circle text-danger fa-sm"></i>';
        }
        else{
            echo '';
        }
    }

    // Handle Check Upgrade
    if(isset($_POST['action']) && $_POST['action'] == 'checkUpgrade'){
        if($admin->fetchUpgrade()){
            echo '<i class="fas fa-circle text-danger fa-sm"></i>';
        }
        else{
            echo '';
        }
    }

    // Handle Check Message
    if(isset($_POST['action']) && $_POST['action'] == 'checkMsg'){
        if($admin->fetchMsg()){
            echo '<i class="fas fa-circle text-danger fa-sm"></i>';
        }
        else{
            echo '';
        }
    }

    // Handle Delete Fund Notify
    if(isset($_POST['fundNotify_id'])){
        $id = $_POST['fundNotify_id'];
        $admin->removeFundNotify($id);
    }

    // Handle Delete Withdraw Notify
    if(isset($_POST['withNotify_id'])){
        $id = $_POST['withNotify_id'];
        $admin->removeWithdrawNotify($id);
    }

    // Handle Delete Upgrade Notify
    if(isset($_POST['upgradeNotify_id'])){
        $id = $_POST['upgradeNotify_id'];
        $admin->removeUpgradeNotify($id);
    }

    // Handle Edit Account Funds and Plan
    if(isset($_POST['action']) && $_POST['action'] == 'upTraderAcc'){
        $id = $admin->test_input($_POST['id']);
        $dollar_bal = $admin->test_input($_POST['upDol']);
        $btc_bal = $admin->test_input($_POST['upBtc']);
        $plan = $admin->test_input($_POST['upPlan']);

        if($admin->updateTraderAcc($dollar_bal, $btc_bal, $plan, $id)){
            echo 'Updated';
        }
        else{
            echo 'Not Updated';
        };
    }

    // Handle Edit Plan
    if(isset($_POST['action']) && $_POST['action'] == 'updatePlan'){
        $id = $admin->test_input($_POST['id']);
        $plan = $admin->test_input($_POST['upPlan']);

        $admin->updateTraderPlan($plan, $id);
    }

    // Handle Edit Funds
    if(isset($_POST['action']) && $_POST['action'] == 'updateFunds'){
        $id = $admin->test_input($_POST['id']);
        $dollar_bal = $admin->test_input($_POST['upDol']);
        $btc_bal = $admin->test_input($_POST['upBtc']);

        $notify_type ="forUser";
        $notify_msg = "Your Account has been Credited. Your Account Balance is Now $$dollar_bal";

        $admin->updateTraderFunds($dollar_bal, $btc_bal, $id);
        $admin->notification($id, $notify_type, $notify_msg);
    }

    // Handle Edit Funds
    if(isset($_POST['action']) && $_POST['action'] == 'withFunds'){
        $id = $admin->test_input($_POST['id']);
        $dollar_bal = $admin->test_input($_POST['upDol']);
        $btc_bal = $admin->test_input($_POST['upBtc']);

        $notify_type ="forUser";
        $notify_msg = "Your Account has been Debited. Your Account Balance is Now $$dollar_bal";

        $admin->updateTraderFunds($dollar_bal, $btc_bal, $id);
        $admin->notification($id, $notify_type, $notify_msg);
    }

    // Handle Edit BitcoinAddress
    if(isset($_POST['action']) && $_POST['action'] == 'upAddress'){
        $id = 1;
        $wallet = $admin->test_input($_POST['upAdd']);

        $admin->updateAdminAddress($wallet, $id);
    }

    // Handle FetchTraders
    if(isset($_POST['action']) && $_POST['action'] == 'fetchMsgFromTraders'){
        $output = '';
        $Msg = $admin->fetchMsg(0);

        if($Msg){
            $output .= '<table class= "table table-striped table-bordered table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Sent On</th>
                                    <th>Reply</th>
                                </tr>
                            </thead>
                            <tbody>';
                foreach ($Msg as $row) {
                    $output .= '<tr>
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['surname'].'&nbsp;'.$row['name'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['subject'].'</td>
                                    <td>'.$row['message'].'</td>
                                    <td>'.$row['sent_at'].'</td>
                                    <td>
                                        <a href="#" mid="'.$row['id'].'" id="'.$row['clientid'].'" title="Reply" class="text-primary replyTrader" data-toggle="modal" data-target="#replyMsgModal"><i class="fas fa-reply fa-lg"></i></a>&nbsp;
                                    </td>';
                    }
                    $output .= '</tr>';
                        $output .= '</tbody>
                                </table>';
                        echo $output;
        }
        else{
            echo '<h3 class="text-center text-secondary">No Messages</h3>';
        }
    }

    // Handle Reply Message For Trader
    if(isset($_POST['message'])){
        $clientid = $_POST['clientID'];
        $message = $_POST['message'];
        $mid = $_POST['msgID'];

        $admin->replynotify($clientid, $message);
        $admin->deleteRepliedMessage($mid);
    }
    
    
    // Handle Message For Trader
    if(isset($_POST['action']) && $_POST['action'] == 'msgTrader'){
    
        $id = $_POST['traderID'];
        //$id = 104;
        $message = $_POST['message1'];

        $admin->msgtrader($id, $message);
    }

?>