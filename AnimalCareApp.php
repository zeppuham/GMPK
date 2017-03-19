<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Animal Care Application</title>
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>
    <link rel="stylesheet" href="styles/main.css" />
    <style>
        #vacCost {
            visibility: hidden;
        }
        #lblVacCost {
            visibility: hidden;
        }
    </style>
</head>
<body>
<!-- Registration form to be output if the POST variables are not
set or if the registration script caused an error. -->
<h1>Animal Care Volunteer Application</h1>
<?php
if (!empty($error_msg)) {
    echo $error_msg;
}
?>
<form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>"
      method="post"
      name="registration_form">
    <label for="name">Name: </label><input type='text' name="name" id="name" /><br>
    <label for="address">Address: </label><input type="text" name="address" id="address" /><br>
    <label for="address2">Address Cont: </label><input type="text" name="address2" id="address2" /><br>
    <label for="city">City:</label><input type="text" name="city" id="city" /> <br>
    <label for="state">State: </label><input type="text" name="state" id="state" /><br>
    <label for="zipCode">Zip Code: </label><input type="text" name="zipCode" id="zipCode" /> <br>
    <label for="phone">Phone: </label><input type="text" name="phone" id="phone" /><br>
    <label for="dob">Date of Birth: </label><input type="date" name="dob" id="dob" /><br>



    <h4>Experience and Requirements</h4>
    <label for="animalExp">Please briefly describe your relevant hands-on experience with animals, if any. What did you enjoy about the experience? What did you dislike? *</label><br>
    <textarea name="animalExp" class="expReq"></textarea><br>
    <label for="comfortFood">Carnivorous patients are sometimes unable to eat food items whole due to their injuries; you may be required to cut and divide dead rodents, chicks, and fishes into smaller portions. Are you comfortable handling dead animals for this purpose? *</label><br>
    <textarea name="comfortFood" class="expReq"></textarea><br>
    <label for="livePrey">Prior to release from the Wildlife Center, many predatory birds are presented with live mice in order to evaluate their ability to capture prey in a controlled and measurable environment. What is your opinion on using live-prey for this purpose? *</label><br>
    <textarea name="livePrey" class="expReq"></textarea><br>
    <label for="outside">Wildlife rehabilitation requires daily outdoor work -- year-round and regardless of weather conditions. Are you able to work outside during all seasons? If not, what are your limitations? *</label><br>
    <textarea name="outside" class="expReq"></textarea><br>
    <label for="lift">Are you able to lift 40 pounds on potentially uneven surfaces with minimal assistance? *</label><br>
    <select name="lift">
        <option>-Select-</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select><br>
    <label for="rabies">Are you vaccinated for Rabies? *</label><br>
    <select name="rabies" onchange="showQ()">
        <option>-Select-</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select><br>
    <label for="vacCost" name="lblVacCost" id="lblVacCost">Are you willing to become vaccinated at your own cost? *</label><br>
    <select name="vacCost" id="vacCost">
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select><br>
    <label for="allergies">Please list all food and animal allergies, if any:*</label><br>
    <textarea name="allergies" class="expReq"></textarea><br>
    <label for="available">What days of the week are you available, and at what times?*</label><br>
    <textarea name="available" class="expReq"></textarea><br>
    <label for="commit">Will you be able to commit to either a six-month or one-year schedule, with at least one shift (four hours) per week? *</label><br>
    <select name="commit">
        <option>-Select-</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select><br>
    <label for="rights">Do you belong to any animal rights groups (PETA, The Humane Society, etc.)? If so, which ones? *</label><br>
    <input type="text" name="rights" id="rights" /><br>
    <label for="learn">What do you hope to learn or accomplish by volunteering at the Wildlife Center of Virginia? *</label><br>
    <textarea name="learn"></textarea><br>
    <label for="passion">Please describe an environmental or wildlife-based issue you feel passionately about, and why: *</label><br>
    <textarea name="passion"></textarea><br>
    <label for="else">Is there anything else that you’d like us to know about yourself or your experience?	*</label><br>
    <textarea name="else"></textarea><br>

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
<p>Return to the <a href="index.php">login page</a>.</p>
<script>
    function showQ() {
        if (document.getElementByName('rabies').value = 'no') {
            document.getElementByName('vacCost').style.visibility = 'visible';
            document.getElementByName('lblVacCost').style.visibility = 'visible';
        }
    }
</script>
</body>
</html>