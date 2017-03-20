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
    <link rel="stylesheet" href="styles/main.css" />
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>
</head>
<body>
<?php
if (isset($_GET['error'])) {
    echo '<p class="error">Error Logging In!</p>';
}
?>
<h1>Welcome! Please sign in</h1>
<form action="includes/process_login.php" method="post" name="login_form">
    Email: <input type="text" name="txtEmail" />
    Password: <input type="password"
                     name="txtPassword"
                     id="password"/>
    <input type="button"
           value="Login"
           onclick="formhash(this.form, this.form.password);" />
</form>
<p>Want to be a volunteer? Fill out an application today! </p>
<p><a href="AnimalCareApp.php">Animal Care Application</a></p>
</body>
</html>
