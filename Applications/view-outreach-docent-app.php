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
    <script type="text/JavaScript" src="js/sha512.js"></script>
    <script type="text/JavaScript" src="js/forms.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/register.css">
    <script src="js/register.js"></script>
    <style>
        #vacCost {
            display:none;
        }
    </style>
</head>
<body>
<?php if (login_check($mysqli) == true) : ?>
<div class="page">
    <div class="form">
        <center><img src="../images/text-logo-300.png"></center><br><br>
        <h1>Outreach Volunteer Application</h1>
		
		<?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }

        $userEmail= $_GET['userEmail'];

        if ($stmt = $mysqli->prepare("SELECT availability, interest1, interest2, interest3, interest4, comments
				  FROM outreach_app 
                                  WHERE userEmail = ? LIMIT 1")) {
            $stmt->bind_param('s', $userEmail);  // Bind "$email" to parameter.
            $stmt->execute();    // Execute the prepared query.
            $stmt->store_result();
            // get variables from result.
            $stmt->bind_result($availability, $interest1, $interest2, $interest3, $interest4, $comments);
            $stmt->fetch();
        }
		
	

        if ($stmt = $mysqli->prepare("SELECT FirstName, LastName, Phone, Street, CityCounty, State, ZipCode, carpentrySkill, EmergencyContactFirstName, EmergencyContactLastName, EmergencyContactRelationship, EmergencyContactEmail, EmergencyContactPhone, Allergies, Limitations, dateofBirth, profile_picture 
				  FROM members 
                                  WHERE email = ? LIMIT 1")) {
            $stmt->bind_param('s', $userEmail);  // Bind "$email" to parameter.
            $stmt->execute();    // Execute the prepared query.
            $stmt->store_result();
            // get variables from result.
            $stmt->bind_result($fName, $lName, $phone, $street, $cityCounty, $state, $zip, $carp, $emFName, $emLName, $emRelation, $emEmail, $emPhone, $allergies, $limitations, $DOB, $profilePicture);
            $stmt->fetch();
			$profilePicture = substr($profilePicture, 19);
        }
        ?>
       
        <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" style="width:304px;height:228px;">
		<h2>Basic Information</h2>

        <label for="profFName">First Name: </label>
        <input type="text" name="profFName"  value="<?php echo $fName; ?>" readonly /> <br>

        <label for="profLName">Last Name: </label>
        <input type="text" name="profLName"  value="<?php echo $lName; ?>" readonly /> <br>

        <label for="profPhone">Phone Number: </label>
        <input type="text" name="profPhone"  value="<?php echo $phone; ?>" readonly /> <br>

        <label for="profStreet">Street: </label>
        <input type="text" name="profStreet"  value="<?php echo $street; ?>" readonly /> <br>

        <label for="profCity">City: </label>
        <input type="text" name="profCity"  value="<?php echo $cityCounty; ?>" readonly /> <br>

        <label for="profState">State: </label>
        <input type="text" name="profState"  value="<?php echo $state; ?>" readonly /> <br>

        <label for="profZip">Zip Code: </label>
        <input type="text" name="profZip"  value="<?php echo $zip; ?>" readonly /> <br>

        <label for="profDOB">Date of Birth: </label>
        <input type="text" name="profDOB"  value="<?php echo $DOB; ?>" readonly /> <br>
		
		<label for="profCarpentry">Carpentry Skill: </label>
		<input type="text" name="profCarpentry"  value="<?php echo $carp; ?>" readonly /> <br>
		

        <h2>Emergency Contact Information</h2>
        <label for="profEmFName">Contact's First Name: </label>
        <input type="text" name="profEmFName"  value="<?php echo $emFName; ?>" readonly /> <br>

        <label for="profEmLName">Contact's Last Name: </label>
        <input type="text" name="profEmLName"  value="<?php echo $emLName; ?>" readonly /> <br>

        <label for="profEmRelation">Contact's Relationship: </label>
        <input type="text" name="profEmRelation"  value="<?php echo $emRelation; ?>" readonly /> <br>

        <label for="profEmEmail">Contact's Email: </label>
        <input type="text" name="profEmEmail"  value="<?php echo $emEmail; ?>" readonly /> <br>

        <label for="profEmPhone">Contact's Phone: </label>
        <input type="text" name="profEmPhone"  value="<?php echo $emPhone; ?>" readonly /> <br>

        <h2>Medical Information</h2>
        <label for="profAllergies">Allergies: </label>
        <input type="text" name="profAllergies"  value="<?php echo $allergies; ?>" readonly /> <br>

        <label for="profLimitations">Limitations: </label>
        <input type="text" name="profLimitations"  value="<?php echo $limitations; ?>" readonly /> <br>

        <!--
        <label for="txtName">Name: </label><input type='text' name="txtName" id="txtName" /><br>
        <label for="txtAddress">Address: </label><input type="text" name="txtAddress" id="txtAddress" /><br>
        <label for="txtAddress2">Address Cont: </label><input type="text" name="txtAddress2" id="txtAddress2" /><br>
        <label for="txtCity">City:</label><input type="text" name="txtCity" id="txtCity" /> <br>
        <label for="txtState">State: </label><input type="text" name="txtState" id="txtState" /><br>
        <label for="txtZipCode">Zip Code: </label><input type="text" name="txtZipCode" id="txtZipCode" /> <br>
        <label for="txtPhone">Phone: </label><input type="text" name="txtPhone" id="txtPhone" /><br>
        <label for="txtDob">Date of Birth: </label><input type="date" name="txtDob" id="txtDob" /><br>
       <label for="txtAllergies">Please list any allergies and/or special needs *</label><br>
        <textarea name="txtAllergies" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
        -->
		<h2>Availability * </h2>
		<textarea name="txtAvailability" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $availability ?></textarea><br>

        <h2>Interests and Experience</h2>
        <label for="txtInterest1">Why are you interested in volunteering as an outreach docent? *</label><br>
        <textarea name="txtInterest1" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $interest1 ?></textarea><br>
        <label for="txtInterest2">What’s an environmental or wildlife issue you feel passionately about, and why? *</label><br>
        <textarea name="txtInterest2" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $interest2 ?></textarea><br>
        <label for="txtInterest3">Do you have prior experience speaking to the public? Please describe.  *</label><br>
        <textarea name="txtInterest3" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $interest3 ?></textarea><br>
        <label for="txtInterest4">What do you think you’d bring to the outreach volunteer team?  *</label><br>
        <textarea name="txtInterest4" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $interest4 ?></textarea><br><br>

        <h4>Additional Requirements</h4>
     
		<form action="includes/processOutreachApp.php?userEmail=<?php echo $userEmail?>" method="POST">
		<h4>Comments:</h4>
		<textarea name="txtComments" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"><?php echo $comments ?></textarea><br><br>
	
        
			<input type="submit"
				   value="Approve"
				   name="btnApprove"
				   class="btn btn-success"
				   style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;" />
				   
		   <input type="submit"
				   value="Reject"
				   name="btnReject"
				   class="btn btn-success"
				   style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;" />
				   
	    </form>
		
		<center><p>Return to your <a href="../leadPortal.php">Team Lead Portal</a>.</p></center>
        <center><p>Return to the <a href="../index.php">Login Page</a>.</p></center>
	

    </div>
</div>
  
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="../index.php">login</a>.
    </p>
<?php endif; ?>
</body>
</html>