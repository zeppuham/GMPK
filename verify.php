<?php
include_once 'includes/db_connect.php';
include_once 'includes/psl-config.php';
error_reporting(-1);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/thankyou.css">
    <script src="js/thankyou.js"></script>
</head>
<body>
<div class="page">
    <div class="form">
        <img src="images/text-logo-300.png"><br><br>
        <h1>Account Activation</h1>



        <!-- start wrap div -->
        <div id="wrap">
            <?php

            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
                /// Verify data
                $email = $_GET['email']; // Set email variable
                $hash = $_GET['hash']; // Set hash variable

                $search = "SELECT email, hash FROM members WHERE email='" . $email . "' AND hash='" . $hash . "' AND active='0'";
                $stmt = mysqli_query($mysqli, $search);
                $match = $stmt->num_rows;

                if ($match > 0) {
                    // We have a match, activate the account
                    mysqli_query($mysqli, "UPDATE members SET active='1' WHERE email='" . $email . "' AND hash='" . $hash . "' AND active='0'") or die(mysqli_error());
                    echo '<div class="statusmsg">Your account has been activated, you can now <a href="index.php">login</a></div>';
                } else {
                    // No match -> invalid url or account has already been activated.
                    echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
                }
            }else{
                // Invalid approach
                echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';

                //TEST
                $search = "select email from members";
                $stmt = mysqli_query($mysqli, $search);
                while($row=mysqli_fetch_array($stmt))
                {
                    echo $row["email"];
                }

            }
            ?>


        </div>
    </div>
</div>
<!-- end wrap div -->
</body>
</html>