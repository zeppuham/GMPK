<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Outreach Docent Application</title>
    <script type="text/JavaScript" src="../js/sha512.js"></script>
    <script type="text/JavaScript" src="../js/forms.js"></script>
    <link rel="stylesheet" href="styles/main.css" />
    <style>
        #vacCost {
            display:none;
        }
    </style>
</head>
<body>
<?php if (login_check($mysqli) == true) : ?>
    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>"
          method="post"
          name="registration_form">
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

        <label for="txtAllergies">Please list any allergies and/or special needs *</label><br>
        <textarea name="txtAllergies" class="expReq"></textarea><br>
        Availability * <br>
        <input type="checkbox" name="Availability" value="Monday">
        Monday<br>
        <input type="checkbox" name="Availability" value="Tuesday">
        Tuesday<br>
        <input type="checkbox" name="Availability" value="Wednesday">
        Wednesday<br>
        <input type="checkbox" name="Availability" value="Thursday">
        Thursday<br>
        <input type="checkbox" name="Availability" value="Friday">
        Friday<br>
        <input type="checkbox" name="Availability" value="Saturday">
        Saturday<br>
        <input type="checkbox" name="Availability" value="Sunday">
        Sunday<br>


        <strong>Interests and Experience</strong><br>
        <label for="txtInterest">Why are you interested in volunteering as an outreach docent? *</label><br>
        <textarea name="txtInterest" class="expReq"></textarea><br>
        <label for="txtInterest">Why are you interested in volunteering as an outreach docent? *</label><br>
        <textarea name="txtInterest" class="expReq"></textarea><br>
        <label for="txtInterest">Why are you interested in volunteering as an outreach docent? *</label><br>
        <textarea name="txtInterest" class="expReq"></textarea><br>
        <label for="txtInterest">Why are you interested in volunteering as an outreach docent? *</label><br>
        <textarea name="txtInterest" class="expReq"></textarea><br><br>


        <h4>Additional Requirements</h4>
        <h5>In order to be considered for a volunteer position, applicants must submit the following additional documents:</h5>
        <ul>
            <li>Resume or CV: This should include information about your education and relevant work history. </li>
            <li>Letter of Recommendation: The letter should be sent directly from your reference.</li>
        </ul>
        <input type="file" id="myFile">
        <input type="file" id="myFile">
        <br>
        <input type="button"
               value="Send Application"
               onclick="" />
    </form>
    <p>Return to the <a href="../protected_page.php">Volunteer Opportunities Page</a>.</p>
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