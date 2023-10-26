<?php

    function email_exists($email, $connection) {
        $row = mysqli_query($connection, "SELECT id FROM traders WHERE email = '$email'");
        {
            if (mysqli_num_rows($row) == 1) {
                return true;
            }
            else{
                return false;
            }
        }
    }

?>