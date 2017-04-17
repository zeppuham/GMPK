<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Transport and Rescue Volunteer Application</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/register.css">
    <script src="js/register.js"></script>
</head>
<body>
<div class="page">
    <div class="form">
<?php if (login_check($mysqli) == true) : ?>
    <center><img src="../images/text-logo-300.png"></center><br><br>
    <h1>Transport and Rescue Volunteer Application</h1>
  
    <?php
    if (!empty($error_msg)) {
        echo $error_msg;
    }
	
	$userEmail = $_GET['userEmail'];

	
	if ($stmt = $mysqli->prepare("SELECT availability, travel, rabies, capture, acknowledge, comments
			  FROM transport_app 
							  WHERE userEmail = ? LIMIT 1")) {
		$stmt->bind_param('s', $userEmail);  // Bind "$email" to parameter.
		$stmt->execute();    // Execute the prepared query.
		$stmt->store_result();
		// get variables from result.
		$stmt->bind_result($availability, $travel, $rabies, $capture, $acknowledge, $comments);
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
        <!--
        <label for="txtName">Name: </label><input type='text' name="txtName" id="txtName" /><br>
        <label for="txtAddress">Address: </label><input type="text" name="txtAddress" id="txtAddress" /><br>
        <label for="txtCity">City:</label><input type="text" name="txtCity" id="txtCity" /> <br>
        <label for="txtState">State: </label><input type="text" name="txtState" id="txtState" /><br>
        <label for="txtZipCode">Zip Code: </label><input type="text" name="txtZipCode" id="txtZipCode" /> <br>
        <label for="txtCountry">Country: </label><input type="text" name="txtCountry" id="txtCountry" /> <br>
        <label for="txtPhone">Phone: </label><input type="text" name="txtPhone" id="txtPhone" /><br>
        <label for="txtAltPhone">Alternative Phone: </label><input type="text" name="txtAltPhone" id="txtAltPhone" /><br>
        <label for="txtEmail">Email: </label><input type="text" name="txtEmail" id="txtEmail" /><br>
        -->
		<img src="<?php echo $profilePicture; ?>" alt="Profile Picture" style="width:200px;height:228px;">
		<h2>Basic Information</h2>

        <label for="profFName">First Name: </label>
        <input type="text" name="profFName" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" value="<?php echo $fName; ?>" readonly /> <br>

        <label for="profLName">Last Name: </label>
        <input type="text" name="profLName" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" value="<?php echo $lName; ?>" readonly /> <br>

        <label for="profPhone">Phone Number: </label>
        <input type="text" name="profPhone" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" value="<?php echo $phone; ?>" readonly /> <br>

        <label for="profStreet">Street: </label>
        <input type="text" name="profStreet" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" value="<?php echo $street; ?>" readonly /> <br>

        <label for="profCity">City: </label>
        <input type="text" name="profCity" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" value="<?php echo $cityCounty; ?>" readonly /> <br>

        <label for="profState">State: </label>
        <input type="text" name="profState" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" value="<?php echo $state; ?>" readonly /> <br>

        <label for="profZip">Zip Code: </label>
        <input type="text" name="profZip" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" value="<?php echo $zip; ?>" readonly /> <br>

        <label for="profDOB">Date of Birth: </label>
        <input type="text" name="profDOB" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" value="<?php echo $DOB; ?>" readonly /> <br>
		
		<label for="profCarpentry">Carpentry Skill: </label>
		<input type="text" name="profCarpentry" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" value="<?php echo $carp; ?>" readonly /> <br>
		

        <h2>Emergency Contact Information</h2>
        <label for="profEmFName">Contact's First Name: </label>
        <input type="text" name="profEmFName"  value="<?php echo $emFName; ?>" readonly /> <br>

        <label for="profEmLName">Contact's Last Name: </label>
        <input type="text" name="profEmLName" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" value="<?php echo $emLName; ?>" readonly /> <br>

        <label for="profEmRelation">Contact's Relationship: </label>
        <input type="text" name="profEmRelation" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" value="<?php echo $emRelation; ?>" readonly /> <br>

        <label for="profEmEmail">Contact's Email: </label>
        <input type="text" name="profEmEmail"  style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" value="<?php echo $emEmail; ?>" readonly /> <br>

        <label for="profEmPhone">Contact's Phone: </label>
        <input type="text" name="profEmPhone" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;"  value="<?php echo $emPhone; ?>" readonly /> <br>

        <h2>Medical Information</h2>
        <label for="profAllergies">Allergies: </label>
        <input type="text" name="profAllergies"  style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" value="<?php echo $allergies; ?>" readonly /> <br>

        <label for="profLimitations">Limitations: </label>
        <input type="text" name="profLimitations"  style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" value="<?php echo $limitations; ?>" readonly /> <br>

        <label for="txtTravelDistance">How far are you willing to travel for transport (i.e., 30-45 miles from your location, to a specific location, etc)? *</label><br>
        <textarea name="txtAvailability" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" readonly><?php echo $travel ?></textarea><br>
        When are you able to transport animals? * <br>
        <textarea name="txtTravel" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" readonly><?php echo $availability ?></textarea><br><br>

        Have you had the pre-exposure rabies vaccination? * <br>
        <textarea name="txtRabies" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" readonly><?php echo $rabies ?></textarea><br><br>

   
        With that in mind, would you be willing to assist with capturing animals, if needed? * <br>
        <textarea name="txtCapture" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;" readonly><?php echo $capture ?></textarea><br><br>
    
		<form action="includes/processTransportApp.php?userEmail=<?php echo $userEmail?>" method="POST">
		<h4>Comments:</h4>
		<textarea name="txtComments" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;"><?php echo $comments ?></textarea><br><br>
	
        
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

	</form>		
	
    </div>
</div>

<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="../index.php">login</a>.
    </p>
<?php endif; ?>
</body>
</html>