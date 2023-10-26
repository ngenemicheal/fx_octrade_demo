<?php

    include('assetsBack/php/Mconfig.php');
    include('assetsBack/php/signup.php');

    $passError = "";
    $agreeError = "";
    $emailError = "";
    $regSuccess = "";

    $surname = "";
    $name = "";
    $email = "";
    $password = "";
    $conpassword = "";
    $phone_number = "";
    $occupation = "";
    $country = "";

    if(isset($_POST['submit'])){
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conpassword = $_POST['conpassword'];
        $phone_number = $_POST['phone_number'];
        $occupation = $_POST['occupation'];
        $country = $_POST['country'];
        $hashpassword = md5($password);
        $agreeTerm = isset($_POST['AgreeTerm']);

        if ($password !== $conpassword) {
            $passError = "<div class='lead error'>* Passwords do not Match</div>";
        }
        // else if ((empty($_POST['AgreeTerm']))) {
        //     $agreeError = "<div class='lead error'>* Agree with Our Terms and Conditions</div>";
        // }
        else if (email_exists($email, $connection)){
            $emailError = "<div class='lead error'>* Email Already Exist</div>";
        }
        else {
            $sql = "INSERT INTO traders (surname, name, email, password, phone_number, occupation, country) VALUES ('$surname', '$name', '$email', '$hashpassword', '$phone_number', '$occupation', '$country')";

            mysqli_query($connection, $sql);

            $regSuccess = "<div class='lead success'>Registration Successful<br><a href='login.php' class='btn btn-success align-self-center mt-0'>Click Here To Login</a></div>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | NumeroTrade</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"> -->

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assetsBack/css/style.css">


    <!-- Favicon -->
    <link rel="icon" type="image/png" href="../img/fav323860.png" sizes="32x32" />

    <style>
        .error{
            color: red;
        }
        .success{
            color: green;
        }
    </style>

</head>

<body>

    <div class="container">
        <!-- Register Section Starts -->
        <div class="row justify-content-center wrapper" id="register-box">
            <div class="col-lg-10 my-auto">
                <div class="card-group myShadow">
                    <div class="card rounded-left p-2" style="flex-grow:1.4;">
                        <div class="text-center"><?php echo $regSuccess; ?></div>
                        <h1 class="text-center text-primary">Create An Account</h1>
                        <!-- <hr class="my-3"> -->
                        <form action="# " method="POST" class="" id="register-form">
                            <div id="regError"></div>
                            <!-- Surname -->
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="far fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" name="surname" id="surname" class="form-control rounded-0" placeholder="Surname" value="<?php echo $surname; ?>" required>
                            </div>
                            <!-- Name -->
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input type="text" name="name" id="name" class="form-control rounded-0" placeholder="Name" value="<?php echo $name; ?>" required>
                            </div>
                            <!-- Email -->
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="far fa-envelope"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" id="regemail" class="form-control rounded-0" placeholder="Email" value="<?php echo $email; ?>" required>
                            </div>
                            <?php echo $emailError; ?>
                            <!-- Password and Confirm Password -->
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" id="regpassword" class="form-control rounded-0" placeholder="Password" value="<?php echo $password; ?>" required minlength="8">
                            </div>
                            <?php echo $passError; ?><br>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="fas fa-key"></i>
                                    </span>
                                </div>
                                <input type="password" name="conpassword" id="conpassword" class="form-control rounded-0" placeholder="Confirm Password" value="<?php echo $conpassword; ?>" required minlength="8">
                            </div>
                            <?php echo $passError; ?>
                            <div class="form-group">
                                <div id="passwordError" class="text-danger font-weight-bold"></div>
                            </div>
                            <!-- Phone Number -->
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                </div>
                                <input type="number" name="phone_number" id="phone_number" class="form-control rounded-0" value="<?php echo $phone_number; ?>" placeholder="Phone Number" required>
                            </div>
                            <!-- Occupation -->
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="fas fa-toolbox"></i>
                                    </span>
                                </div>
                                <input type="text" name="occupation" id="occupation" class="form-control rounded-0" placeholder="Occupation" value="<?php echo $occupation; ?>" required>
                            </div>
                            <!-- Country Of Residence -->
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0">
                                        <i class="fa fa-map-marker"></i>
                                    </span>
                                </div>
                                <input type="text" name="country" id="country" class="form-control rounded-0" placeholder="Country" value="<?php echo $country; ?>" required>
                            </div>
                            <!-- Terms And Condition -->
                            <div class="form-group">
                                <div class="custom-control custom-checkbox float-left">
                                    <input type="checkbox" name="AgreeTerm" class="custom-control-input" id="agreeCheck">
                                    <label for="agreeCheck" class="custom-control-label">I agree with Terms and Conditions</label>
                                </div>
                                <div class="clearfix"></div>
                                <?php echo $agreeError; ?>
                            </div>
                            <div class="form-group">
                                <div class="text-center align-self-center" id="agreeError"></div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Create Account" id="register-btn" class="btn btn-primary btn-block myBtn" name="submit">
                            </div>
                        </form>
                        <hr>
                        <p class="text-center mt-4 text-dark lead">Already Have An Account</p>
                        <a href="login.php" class="btn btn-dark align-self-center mt-0">Click Here</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Register Section Ends -->
    </div>

    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/font-awesome/js/all.min.js"></script>

</body>

</html>