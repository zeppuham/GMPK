<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
error_reporting(-1);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Volunteer Profile Registration</title>
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/register.css">
    <script src="js/register.js"></script>

</head>
<body>
<?php
if (!empty($error_msg)) {
    echo $error_msg;
}
?>
<div class="page">
    <div class="form">
        <center><img src="images/text-logo-300.png"></center><br><br>

                                                            <!-- post using PHP_SELF to prevent  -->
        <form method="post" name="registration_form" class="page-form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">

            <!-- Form Name -->
            <center><h1>Volunteer Registration</h1></center>
            <h4>Please create an account to apply for a volunteer position.</h4>


            <ul>
                <li>Emails must have a valid email format</li>
                <li>Passwords must be at least 6 characters long</li>
                <li>Passwords must contain
                    <ul>
                        <li>At least one upper case letter (A..Z)</li>
                        <li>At least one lower case letter (a..z)</li>
                        <li>At least one number (0..9)</li>
                    </ul>
                </li>
                <li>Your password and confirmation must match exactly</li>
            </ul>


            <!-- Text input-->
            <div class="control-group">
                <label for="txtEmail" class="control-label">Email: </label>
                <div class="controls">
                    <input type="text" name="txtEmail" id="email" placeholder="quinn@thewildlifecenter.org" class="input-xlarge" required="required"/>
                </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
                <label for="txtPassword" class="control-label">Password: </label>
                <div class="controls">
                <input type="password"
                             name="txtPassword"
                             id="txtPassword" class="input-xlarge" required="required"/>
                </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
                <label class="control-label" for="txtConfirmPassword">Confirm password: </label>
                <div class="controls">
                <input type="password"
                             name="txtConfirmPassword"
                             id="txtConfirmPassword" class="input-xlarge" required="required" />
                </div>
            </div>

            <!--Text input-->
            <div class="control-group">
                <label class="control-label" for="txtFirstName">First Name: </label>
                <div class="controls">
                    <input type='text' name="txtFirstName" id="txtFirstName" placeholder="Quinn the Owl" class="input-xlarge" required="required"/>
                </div>
            </div>

            <!-- Text input -->
            <div class="control-group">
                <label for="txtLastName" class="control-label">Last Name: </label>
                <div class="controls">
                    <input type='text' name="txtLastName" id="txtLastName" placeholder="Hoo" required"/>
                </div>
            </div>


            <!-- Button -->
            <div class="control-group">
                <label class="control-label" for="submit"></label>
                <div class="controls">
            <input type="button"
               value="Register"
               class="btn btn-success"
               style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;"
               onclick="return regformhash(this.form,
                                       this.form.txtEmail,
                                       this.form.txtPassword,
                                       this.form.txtConfirmPassword);" />
                </div>
            </div>

            <center> <p class="message">Return to <a href="index.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i>Login</a>.</p> </center>
            <center> <p class="message">Return to <a href="http://wildlifecenter.org/">The Wildlife Center</a> website.</p> </center>

        </form>
    </div>
</div>

<script>
    function showQ() {
        if (document.getElementById('Y').checked) {
            document.getElementById('permitTypeHide').style.display = 'block';
        }
        else {
            document.getElementById('permitTypeHide').style.display = 'none';
        }
    }
</script>
</body>
</html>