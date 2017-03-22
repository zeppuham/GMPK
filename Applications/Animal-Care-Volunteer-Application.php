<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Animal-Care-Volunteer-Application</title>
    <link rel="stylesheet" href="styles/main.css" />
</head>
<body>
<?php if (login_check($mysqli) == true) : ?>
    <h1>Animal Care Volunteer Application</h1>
<?php
if (!empty($error_msg)) {
    echo $error_msg;
}
?>
    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>"
          method="post"
          name="formAnimalCare">
        <!--
        <label for="txtName">Name: </label><input type='text' name="txtName" id="txtName" /><br>
        <label for="txtAddress">Address: </label><input type="text" name="txtAddress" id="txtAddress" /><br>
        <label for="txtAddress2">Address Cont: </label><input type="text" name="txtAddress2" id="txtAddress2" /><br>
        <label for="txtCity">City:</label><input type="text" name="txtCity" id="txtCity" /> <br>
        <label for="txtState">State: </label><input type="text" name="txtState" id="txtState" /><br>
        <label for="txtZipCode">Zip Code: </label><input type="text" name="txtZipCode" id="txtZipCode" /> <br>
        <label for="txtPhone">Phone: </label><input type="text" name="txtPhone" id="txtPhone" /><br>
        <label for="txtDob">Date of Birth: </label><input type="date" name="txtDob" id="txtDob" /><br>
        -->


        <h4>Experience and Requirements</h4>
        <label for="txtAnimalExp">Please briefly describe your relevant hands-on experience with animals, if any. What did you enjoy about the experience? What did you dislike? *</label><br>
        <textarea name="txtAnimalExp" class="expReq"></textarea><br>
        <label for="txtComfortFood">Carnivorous patients are sometimes unable to eat food items whole due to their injuries; you may be required to cut and divide dead rodents, chicks, and fishes into smaller portions. Are you comfortable handling dead animals for this purpose? *</label><br>
        <textarea name="txtComfortFood" class="expReq"></textarea><br>
        <label for="txtLivePrey">Prior to release from the Wildlife Center, many predatory birds are presented with live mice in order to evaluate their ability to capture prey in a controlled and measurable environment. What is your opinion on using live-prey for this purpose? *</label><br>
        <textarea name="txtLivePrey" class="expReq"></textarea><br>
        <label for="txtOutside">Wildlife rehabilitation requires daily outdoor work -- year-round and regardless of weather conditions. Are you able to work outside during all seasons? If not, what are your limitations? *</label><br>
        <textarea name="txtOutside" class="expReq"></textarea><br>
        <label for="txtLift">Are you able to lift 40 pounds on potentially uneven surfaces with minimal assistance? *</label><br>
        <select name="txtLift">
            <option>-Select-</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>
        <label for="ddlRabies">Are you vaccinated for Rabies? *</label><br>
        <select name="ddlRabies" id="ddlRabies" onchange="showQ()">
            <option>-Select-</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>
        <div id="vacCost">
            <label for="ddlVacCost" name="lblVacCost" id="lblVacCost">Are you willing to become vaccinated at your own cost? *</label><br>
            <select name="ddlVacCost" id="ddlVacCost">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select><br>
        </div>
        <label for="txtAllergies">Please list all food and animal allergies, if any:*</label><br>
        <textarea name="txtAllergies" class="expReq"></textarea><br>
        <label for="txtAvailable">What days of the week are you available, and at what times?*</label><br>
        <textarea name="available" class="expReq"></textarea><br>
        <label for="ddlCommit">Will you be able to commit to either a six-month or one-year schedule, with at least one shift (four hours) per week? *</label><br>
        <select name="ddlCommit">
            <option>-Select-</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>
        <label for="txtRights">Do you belong to any animal rights groups (PETA, The Humane Society, etc.)? If so, which ones? *</label><br>
        <input type="text" name="txtRights" id="txtRights" /><br>
        <label for="txtLearn">What do you hope to learn or accomplish by volunteering at the Wildlife Center of Virginia? *</label><br>
        <textarea name="txtLearn"></textarea><br>
        <label for="txtPassion">Please describe an environmental or wildlife-based issue you feel passionately about, and why: *</label><br>
        <textarea name="txtPassion"></textarea><br>
        <label for="txtElse">Is there anything else that you’d like us to know about yourself or your experience?	*</label><br>
        <textarea name="txtElse"></textarea><br>

        <h4>Additional Requirements</h4>
        <h5>In order to be considered for a volunteer position, applicants must submit the following additional documents:</h5>
        <ul>
            <li>Resume or CV: This should include information about your education and relevant work history. </li>
            <li>Letter of Recommendation: The letter should be sent directly from your reference.</li>
        </ul>
        <input type="file" id="myFile">
        <input type="file" id="myFile">


        <ul>
            <li>Usernames may contain only numbers, upper and lowercase letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>

        <label for="email">Email: </label><input type="text" name="email" id="email" /><br>
        <label for="password">Password: </label><input type="password"
                                                       name="password"
                                                       id="password"/><br>
        <label for="confirmpwd">Confirm password: </label><input type="password"
                                                                 name="confirmpwd"
                                                                 id="confirmpwd" /><br>

        <input type="button"
               value="Register"
               onclick="return regformhash(this.form,
                                   this.form.name,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" />
    </form>
    <p>Return to the <a href="../index.php">login page</a>.</p>
    <script>
        function showQ() {
            if (document.getElementById('ddlRabies').value = 'no') {
                document.getElementById('vacCost').style.display = 'block';
            }
        }
    </script>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="../index.php">login</a>.
    </p>
<?php endif; ?>
</body>
</html>