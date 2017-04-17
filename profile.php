<?php
include_once '/includes/db_connect.php';
include '/includes/functions.php';
sec_session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Volunteer Profile</title>
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
        <center><img src="../images/text-logo-300.png"></center><br><br>
        <?php if (login_check($mysqli) == true) : ?>
        <h1>Volunteer Profile</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }

        $email= $_SESSION['email'];

        if ($stmt = $mysqli->prepare("SELECT FirstName, LastName, Phone, Street, CityCounty, State, ZipCode, carpentrySkill, EmergencyContactFirstName, EmergencyContactLastName, EmergencyContactRelationship, EmergencyContactEmail, EmergencyContactPhone, Allergies, Limitations, dateofBirth, profile_picture 
				  FROM members 
                                  WHERE email = ? LIMIT 1")) {
            $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
            $stmt->execute();    // Execute the prepared query.
            $stmt->store_result();
            // get variables from result.
            $stmt->bind_result($fName, $lName, $phone, $street, $cityCounty, $state, $zip, $carp, $emFName, $emLName, $emRelation, $emEmail, $emPhone, $allergies, $limitations, $DOB, $profilePicture);
            $stmt->fetch();
			$profilePicture = substr($profilePicture, 19);
        }
        ?>
        <a href="editProf.php"><input type="button"
               value="Edit Profile"
               class="btn btn-success"
               style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;" /></a>
        <img src="<?php echo $profilePicture; ?>" alt="Profile Picture" style="width:200px;height:228px;">
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

        <center> <p class="message">Return to <a href="protected-page.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i>Volunteer Portal</a>.</p> </center>
        <center> <p class="message">Return to <a href="http://wildlifecenter.org/">The Wildlife Center</a> website.</p> </center>

    </div>
	<?php if ($_SESSION['showSuccess'] == 1){
            echo "<script type='text/javascript'>alert('Success updating your profile information!')</script>";
            $_SESSION['showSuccess'] = 0;
        }
        ?>
</div>

<?php endif; ?>
</body>
</html>

