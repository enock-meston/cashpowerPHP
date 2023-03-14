<?php
session_start();
include 'includes/conn.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $query = mysqli_query($con,"SELECT * FROM usertbl WHERE username='$username' AND password='$password' AND usercategory='admin'");
    $queryengineer = mysqli_query($con, "SELECT * FROM usertbl WHERE username='$username' AND password='$password' AND usercategory='engineer'");
        $num = mysqli_fetch_array($query);
        $numengineer = mysqli_fetch_array($queryengineer);

        if ($num > 0) {
            $_SESSION['id'] = $num['id'];
            $_SESSION['names'] = $num['names'];
            $_SESSION['username'] = $num['username'];
            echo "<script type='text/javascript'> document.location = 'admin/index.php'; </script>";
        }else if ($numengineer>0) {
            $_SESSION['sec_id'] = $numengineer['id'];
            $_SESSION['sec_names'] = $numengineer['names'];
            $_SESSION['sec_username'] = $numengineer['username'];
            $_SESSION['sec_sector'] = $numengineer['sector'];
            echo "<script type='text/javascript'> document.location = 'enginner/dashboard.php'; </script>";
        }
         else {
            echo "<script>alert('User not registered with us');</script>"; 
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login to MBCRS App</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="boot4/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="boot4/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="boot4/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="boot4/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="boot4/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="boot4/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="boot4/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="boot4/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="boot4/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="boot4/css/util.css">
    <link rel="stylesheet" type="text/css" href="boot4/css/main.css">
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100" style="background-color: #F44336;">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                   MBCRS App<br> Login
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5" method="POST">

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
                        <input class="input100" type="text" name="username" placeholder="User name">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>
                    

                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn" name="login">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="boot4/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="boot4/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="boot4/vendor/bootstrap/js/popper.js"></script>
    <script src="boot4/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="boot4/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="boot4/vendor/daterangepicker/moment.min.js"></script>
    <script src="boot4/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="boot4/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="boot4/js/main.js"></script>

</body>
</html>