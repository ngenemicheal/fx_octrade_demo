<?php

    require_once 'config.php';

    class Auth extends Database{
        // Registering a New User
        public function register($surname, $name, $email, $password, $phone_number, $occupation, $country){
            $sql = "INSERT INTO traders (surname, name, email, password, phone_number, occupation, country) VALUES (:surname, :name, :email, :password, :phone_number, :occupation, :country)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['surname'=>$surname, 'name'=>$name, 'email'=>$email, 'password'=>$password, 'phone_number'=>$phone_number, 'occupation'=>$occupation, 'country'=>$country]);
            return true;
        }

        // Check if Email already exists
        public function user_exist($email){
            $sql = "SELECT email FROM traders WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        // Login Existing Users
        public function login($email){
            $sql = "SELECT email, password, plan FROM traders WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        //Current User In Session
        public function currentUser($email){
            $sql = "SELECT * FROM traders WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        //Forgot Password
        public function forgot_password($token,$email){
            $sql = "UPDATE traders SET token = :token, token_expire = DATE_ADD(NOW(), INTERVAL 10 MINUTE) WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['token'=>$token, 'email'=>$email]);
            return true;
        }

        //User Auth for reseting Password
        public function reset_password_auth($email, $token){
            $sql = "SELECT id FROM traders WHERE email = :email AND token = :token AND token != '' AND token_expire > NOW()";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email, 'token'=>$token]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        // Update User Password
        public function update_password($newpass, $email){
            $sql = "UPDATE traders SET token = '', password = :newpass WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['newpass'=>$newpass, 'email'=>$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        // Insert Funding Request
        public function fundReq($clientid, $amtPaid, $transaction_type){
            $sql = "INSERT INTO transactions (clientid, amtPaid, transaction_type) VALUES (:clientid, :amtPaid, :transaction_type)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['clientid'=>$clientid, 'amtPaid'=>$amtPaid, 'transaction_type'=>$transaction_type]);
            return true;
        }

        // Insert Withdraw Request
        public function withdrawReq($clientid, $withAmt, $transaction_type){
            $sql = "INSERT INTO transactions (clientid, withAmt, transaction_type) VALUES (:clientid, :withAmt, :transaction_type)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['clientid'=>$clientid, 'withAmt'=>$withAmt, 'transaction_type'=>$transaction_type]);
            return true;
        }

        // Insert UpgradeToSilver Request
        public function upSilverReq($clientid, $upgrade_to){
            $sql = "INSERT INTO upgrade_request (clientid, upgrade_to) VALUES (:clientid, :upgrade_to)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['clientid'=>$clientid, 'upgrade_to'=>$upgrade_to]);
            return true;
        }

        // Insert UpgradeToGold Request
        public function upGoldReq($clientid, $upgrade_to){
            $sql = "INSERT INTO upgrade_request (clientid, upgrade_to) VALUES (:clientid, :upgrade_to)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['clientid'=>$clientid, 'upgrade_to'=>$upgrade_to]);
            return true;
        }

        // Update User Profile
        public function profileUpdate($pro_pic, $surname, $name, $phone_number, $id){
            $sql = "UPDATE traders SET  pro_pic = :pro_pic, surname = :surname, name = :name, phone_number = :phone_number WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['pro_pic'=>$pro_pic, 'surname'=>$surname, 'name'=>$name, 'phone_number'=>$phone_number, 'id'=>$id]);
            return true;
        }

        // Verify Email of Traders
        public function verifyTraderEmail($email){
            $sql = "UPDATE traders SET verified = 1 WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            return true;
        }

        // Insert Notification
        public function notification($clientid, $notify_type, $notify_msg){
            $sql = "INSERT INTO notifications (clientid, notify_type, notify_msg) VALUES (:clientid, :notify_type, :notify_msg)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(["clientid"=>$clientid, "notify_type"=>$notify_type, "notify_msg"=>$notify_msg]);
            return true;
        }

        // FetchNotification
        public function fetchNotification($clientid){
            $sql = "SELECT * FROM notifications WHERE clientid = :clientid AND notify_type = 'forUser'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(["clientid"=>$clientid]);

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        // FetchMsgFromNotification
        public function fetchAdminNotification($clientid){
            $sql = "SELECT * FROM notifications WHERE clientid = :clientid";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(["clientid"=>$clientid]);

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        // RemoveNotification
        public function removeNotification($id){
            $sql = "DELETE FROM notifications WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
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

        // Fetch Top Earners
        public function fetchTopEarners(){
            $sql = "SELECT * FROM traders ORDER BY dollar_bal DESC LIMIT 5";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        // Send Message to Admin
        public function sendAdminMsg($subject, $message, $clientid){
            $sql = "INSERT INTO msgadmin (clientid, subject, message) VALUES (:clientid, :subject, :message)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['clientid'=>$clientid, 'subject'=>$subject, 'message'=>$message]);
            return true;
        }
    }

?>