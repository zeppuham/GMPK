<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Volunteer Log In</title>
    <link rel="stylesheet" type="text/css" href="styles/login.css" />
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>
    <script src="js/login.js"></script>
</head>
<body>
<?php
if (isset($_GET['error'])) {
    echo '<p class="error">Error Logging In!</p>';
}
?>
<div class="page">
    <div class="form">
        <img src="images/text-logo-300.png"><br><br>
        <form action="includes/process_login.php" method="post" name="login_form" class="login-form">

            <input type="text" name="txtEmail" placeholder="Email" />
            <input type="password"
                             name="txtPassword"
                             id="password"
                              placeholder="Password"/>
            <input type="button"
                   value="Login"
                   id="profile-form-link"
                   onclick="formhash(this.form, this.form.password);" /> <br> <br>
            <input type="button"
                   value="Register"
                   id="register-form-link"
                   onclick="register.php" /> <br> <br>
            <p class="message">Return to <a href="http://www.wildlifecenter.org">The Wildlife Center</a> website.</p>
        </form>
    </div>
</div>

</body>
</html>