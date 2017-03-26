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
                                                            <!-- post using PHP_SELF to prevent  -->
        <form method="post" name="registration_form" class="page-form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">

            <!-- Form Name -->
            <center><h1>Volunteer Registration</h1></center>


            <h2>Basic Information</h2>

            <!-- Text input-->
            <div class="control-group">
                <label for="txtEmail" class="control-label">Email: </label><input type="text" name="txtEmail" id="txtEmail" value="" required="required"/><br>
            </div>
            <label for="txtPassword">Password: <input type="password"
                             name="txtPassword"
                             id="txtPassword" required="required"/><br>
            <label for="txtConfirmPassword">Confirm password: <input type="password"
                             name="txtConfirmPassword"
                             id="txtConfirmPassword" required="required" /><br>
            <label for="txtFirstName">First Name: </label><input type='text' name="txtFirstName" id="txtFirstName" required="required"/><br>
            <label for="txtLastName">Last Name: </label><input type='text' name="txtLastName" id="txtLastName" required="required"/><br>
            <label for="txtPhone">Phone Number:</label><input type='text' name="txtPhone" id="txtPhone" /><br>
            <label for="txtStreet">Street Address: </label><input type="text" name="txtStreet" id="txtStreet" required="required"/><br>
            <label for="txtCity">City:</label><input type="text" name="txtCity" id="txtCity" required="required"/> <br>
            <label for="ddlState">State: </label>
            <select name="ddlState" id="ddlState">
                <option style="color:gray" value="NULL"></option>
                <!-- populate values using php -->
                <?php
                $stateQuery=mysqli_query($mysqli, "SELECT state_abb, state_name FROM home_state"); //or die(mysql_error());
                while($row=mysqli_fetch_array($stateQuery))
                {
                    ?>
                    <option style="color:black" value="<?php echo $row["state_abb"]; ?>"><?php echo $row["state_name"]; ?></option>
                    <?php
                }
                ?>
            </select>
                <br>
                <label for="txtZipCode">Zip Code: </label><input type="text" name="txtZipCode" id="txtZipCode" required="required"/> <br>
            <label for="txtDob">Date of Birth: </label><input type="date" name="txtDob" id="txtDob" value="01/01/1999" required="required"/><br>
            <label for="txtAllergies">Allergies: </label><input type="text" name="txtAllergies" id="txtAllergies" required="required"/><br>
            <label for="txtLimitations">Physical Limitations: </label><input type="text" name="txtLimitations" id="txtLimitations" required="required"/><br>
                <label for="radRabies">Rabies vaccinated within past two years?: </label> <br>
                <input type="radio" name="radRabies" value="1"/> Yes<br>
                <input type="radio" name="radRabies" value="0"/> No<br>
            <label for="radPermit">Do you hold a valid permit to rehabilitate wildlife in the state of Virginia?: </label> <br>
                <input type="radio" name="radPermit" onclick="showQ();" id="Y" value="1"/> Yes<br>
                <input type="radio" name="radPermit" onclick="showQ();" id="N" value="0"/> No<br>
            <div id="permitTypeHide">
                <label for="radPermitType">If yes, then select Cat 1, 2, or 4: </label> <br>
                    <input type="radio" name="radPermitType" value="1"/> Cat 1<br>
                    <input type="radio" name="radPermitType" value="2"/> Cat 2<br>
                    <input type="radio" name="radPermitType" value="4"/> Cat 4<br>
            </div>

            <h4>Emergency Contact Information: </h4>
            <label for="txtEnergConFirstName">First Name: </label><input type="text" name="txtEnergConFirstName" id="txtEnergConFirstName" required="required"/><br>
            <label for="txtEnergConLastName">Last Name: </label><input type="text" name="txtEnergConLastName" id="txtEnergConLastName" required="required"/><br>
            <label for="txtEnergConNumber">Phone Number: </label><input type="text" name="txtEnergConNumber" id="txtEnergConNumber" required="required"/><br>
            <label for="txtEnergConEmail">Email: </label><input type="text" name="txtEnergConEmail" id="txtEnergConEmail" required="required"/><br>
            <label for="txtEnergConRelationship">Relationship: </label><input type="text" name="txtEnergConRelationship" id="txtEnergConRelationship" required="required"/><br><br>




            <input type="button"
               value="Register"
               onclick="return regformhash(this.form,
                                       this.form.txtEmail,
                                       this.form.txtPassword,
                                       this.form.txtConfirmPassword);" />
        </form>
        <p>Return to the <a href="index.php">login page</a>.</p>
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