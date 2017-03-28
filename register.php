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

            <!--Text input-->
            <div class="control-group">
                <label for="txtPhone" class="control-label">Phone Number:</label>
                <div class="controls">
                    <input type='text' name="txtPhone" id="volunteer-phone" placeholder="888-888-8888" class="input-xlarge" />
                </div>
            </div>

            <!--Tet input-->
            <div class="control-group">
                <label for="txtStreet" class="control-label">Street Address: </label>
                <div class="controls">
                    <input type="text" name="txtStreet" id="txtStreet" required="required" placeholder="123 Virginia Ave" class="input-xlarge" />
                </div>
            </div>

            <div class="control-group">
                <label for="txtCity" class="control-label">City:</label>
                <div class="control">
                    <input type="text" name="txtCity" id="txtCity" placeholder="Waynesboro" class="input-xlarge" required="required"/>
                </div>
            </div>

            <div class="control-group">
                <label for="ddlState" class="control-label">State: </label>
                <div class="controls">
                    <select name="ddlState" id="ddlState" class="input-xlarge">
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
                </div>
            </div>
            <br>

            <!--Text input-->
            <div class="control-group">
                <label for="txtZipCode" class="control-label">Zip Code: </label>
                <div class="controls">
                    <input type="text" name="txtZipCode" id="txtZipCode"  placeholder="22980" class="input-xlarge" required="required"/>
                </div>
            </div>

            <div class="control-group">
                <label for="txtDob" class="control-label">Date of Birth: </label>
                <div class="controls">
                    <input type="date" name="txtDob" id="txtDob" value="01/01/1999" required="required"/>
                </div>
            </div>

            <h2>Emergency Contact Information: </h2>
            <!--Text input-->
            <div class="control-group">
                <label for="txtEnergConFirstName" class="control-label">Contact's First Name: </label>
                <div class="controls">
                    <input type="text" name="txtEnergConFirstName" id="emergency-contact" placeholder="Buttercup the Black Vulture" class="input-xlarge" required="required"/>
                </div>
            </div>

            <div class="control-group">
                <label for="txtEnergConLastName" class="control-label">Contact's Last Name: </label>
                <div class="controls">
                    <input type="text" name="txtEnergConLastName" id="txtEnergConLastName" placeholder="Smith" class="input-xlarge" required="required"/>
                </div>
            </div>

            <div class="control-group">
                <label for="txtEnergConNumber" class="control-label">Phone Number: </label>
                <div class="controls">
                    <input type="text" name="txtEnergConNumber" id="emergency-phone" placeholder="555-555-5555" class="input-xlarge" required="required"/>
                </div>
            </div>

            <div class="control-group">
                <label for="txtEnergConEmail" class="control-label">Email: </label>
                <div class="controls">
                    <input type="text" name="txtEnergConEmail" id="txtEnergConEmail" placeholder="buttercup@wildlifecenter.org" required="required"/>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="control-group">
                <label class="control-label" for="txtEnergConRelationship">Relationship:</label>
                <div class="controls">
                    <select id="contact-relation"  name="txtEnergConRelationship" class="input-xlarge" required="required" style="background-color:#ffffff;width:500px;height:35px;font-size:12px;border:0px;">
                        <option value="Parent/Guardian">Parent/Guardian</option>
                        <option value="Spouse">Spouse</option>
                        <option value="Sibling">Sibling</option>
                        <option value="Family/Relative">Family/Relative</option>
                        <option value="Friend">Friend</option>
                        <option value="Co-Worker">Co-Worker</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <h2>Medical Information</h2>
            <!-- text input-->
            <div class="control-group">
                <label for="txtAllergies" class="control-label">Allergies: </label>
                <div class="control">
                    <textarea id="allergies" name="txtAllergies" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" required="required">Please list any allergies you may have.</textarea>
                </div>
            </div>

            <br>

            <div class="control-group">
                <label for="txtLimitations" class="control-label">Limitations: </label>
                <div class="controls">
                    <textarea id="accommodations" name="txtLimitations"  required="required" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;">Please list any limitations (e.g. heavy lifting) you may have and/or any accommodations you would need.</textarea>
                </div>
            </div>

            <br>

            <div class="control-group">
                <label for="radRabies" class="control-label">Rabies vaccinated within past two years?: </label>
                <div class="controls">
                    <input type="radio" name="radRabies" value="1"/> Yes<br>
                    <input type="radio" name="radRabies" value="0"/> No
                </div>
            </div>

            <br>

            <div class="control-group">
            <label for="radPermit" class="control-label">Do you hold a valid permit to rehabilitate wildlife in the state of Virginia?: </label>
                <div class="controls">
                    <input type="radio" name="radPermit" onclick="showQ();" id="Y" value="1"/> Yes<br>
                    <input type="radio" name="radPermit" onclick="showQ();" id="N" value="0"/>
                </div>
            </div>

            <div id="permitTypeHide" class="control-group">
                <label for="radPermitType" class="control-label">If yes, then select Cat 1, 2, or 4: </label>
                    <div class="controls">
                        <input type="radio" name="radPermitType" value="1"/> Cat 1<br>
                        <input type="radio" name="radPermitType" value="2"/> Cat 2<br>
                        <input type="radio" name="radPermitType" value="4"/> Cat 4
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