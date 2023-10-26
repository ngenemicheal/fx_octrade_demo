<?php

    session_start();
    unset($_SESSION['adminusername']);
    header('location:../../adminLogin.php');

?>