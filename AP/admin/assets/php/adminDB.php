<?php

    require_once 'config.php';

    class Admin extends Database{

        // Admin Login
        public function adminLogin($adminusername, $adminpassword){
            $sql = "SELECT adminusername, adminpassword FROM admins WHERE adminusername = :adminusername AND adminpassword = :adminpassword";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['adminusername'=>$adminusername, 'adminpassword'=>$adminpassword]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        // Fetch All Traders
        public function fetchTraders(){
            $sql = "SELECT * FROM traders";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        // Fetch Trader Details For Editing
        public function fetchTradersDetails($id){
            $sql = "SELECT * FROM traders WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        // Fetch Trader Details For Editing
        public function fetchTradersInfo ($id){
            $sql = "SELECT * FROM traders WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        // Delete A Trader
        public function deleteTrader($id){
            $sql = "DELETE FROM traders  WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);

            return true;
        }

        // Fetch Fund Notification
        public function fetchFund(){
            $sql = "SELECT transactions.id, transactions.amtPaid, traders.surname, traders.name, traders.email, traders.dollar_bal, traders.btc_bal, transactions.clientid FROM transactions INNER JOIN traders ON transactions.clientid = traders.id WHERE transaction_type = 'FUND MY ACCOUNT' ORDER BY transactions.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        // Fetch Withdraw Notification
        public function fetchWith(){
            $sql = "SELECT transactions.id, transactions.withAmt, traders.surname, traders.name, traders.email, traders.dollar_bal, traders.btc_bal, transactions.clientid FROM transactions INNER JOIN traders ON transactions.clientid = traders.id WHERE transaction_type = 'WITHDRAW' ORDER BY transactions.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        // Fetch Upgrade Notification
        public function fetchUpgrade(){
            $sql = "SELECT upgrade_request.id, upgrade_request.upgrade_to, upgrade_request.clientid, traders.surname, traders.name, traders.email, traders.plan FROM upgrade_request INNER JOIN traders ON upgrade_request.clientid = traders.id ORDER BY upgrade_request.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        // Delete Fund Notification
        public function removeFundNotify($id){
            $sql = "DELETE FROM transactions WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            
            return true;
        }

        // Delete WITHDRAW Notification
        public function removeWithdrawNotify($id){
            $sql = "DELETE FROM transactions WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            
            return true;
        }

        // Delete Upgrade Notification
        public function removeUpgradeNotify($id){
            $sql = "DELETE FROM upgrade_request WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            
            return true;
        }

        // Update User Funds
        public function updateTraderFunds($dollar_bal, $btc_bal, $id){
            $sql = "UPDATE traders SET dollar_bal = :dollar_bal, btc_bal = :btc_bal WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['dollar_bal'=>$dollar_bal, 'btc_bal'=>$btc_bal, 'id'=>$id]);
            return true;
        }

        // Update User Plan
        public function updateTraderPlan($plan, $id){
            $sql = "UPDATE traders SET plan = :plan WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['plan'=>$plan, 'id'=>$id]);
            return true;
        }

        // Update User Plan and Funds
        public function updateTraderAcc($dollar_bal, $btc_bal, $plan, $id){
            $sql = "UPDATE traders SET dollar_bal = :dollar_bal, btc_bal = :btc_bal, plan = :plan WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['dollar_bal'=>$dollar_bal, 'btc_bal'=>$btc_bal, 'plan'=>$plan, 'id'=>$id]);
            return true;
        }

        // Fetch Admin Wallet
        public function fetchAdd($id){
            $sql = "SELECT * FROM admins WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        // Edit Admin Wallet
        public function updateAdminAddress($wallet, $id){
            $sql = "UPDATE admins SET wallet = :wallet WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['wallet'=>$wallet, 'id'=>$id]);
            return true;
        }

        // Insert Notification
        public function notification($clientid, $notify_type, $notify_msg){
            $sql = "INSERT INTO notifications (clientid, notify_type, notify_msg) VALUES (:clientid, :notify_type, :notify_msg)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(["clientid"=>$clientid, "notify_type"=>$notify_type, "notify_msg"=>$notify_msg]);
            return true;
        }

        // Fetch Messages From Traders
        public function fetchMsg(){
            $sql = "SELECT msgadmin.id, msgadmin.subject, msgadmin.message, msgadmin.clientid, msgadmin.sent_at, traders.surname, traders.name, traders.email FROM msgadmin INNER JOIN traders ON msgadmin.clientid = traders.id WHERE replied != 1 ORDER BY msgadmin.id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        // Insert Notification
        public function replynotify($clientid, $message){
            $sql = "INSERT INTO notifications (clientid, notify_type, notify_msg) VALUES (:clientid, 'fromAdmin', :notify_msg)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(["clientid"=>$clientid, "notify_msg"=>$message]);
            return true;
        }
        
        // Insert Notification
        public function msgtrader($id, $message){
            $sql = "INSERT INTO notifications (clientid, notify_type, notify_msg) VALUES (:id, 'fromAdmin', :notify_msg)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(["id"=>$id, "notify_msg"=>$message]);
            return true;
        }

        // Message Reply Delete
        public function deleteRepliedMessage($mid){
            $sql = "DELETE FROM msgadmin WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$mid]);
            
            return true;
        }
    }

?>