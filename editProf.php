<?php
include_once '/includes/db_connect.php';
include '/includes/functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

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

        if ($stmt = $mysqli->prepare("SELECT FirstName, LastName, Phone, Street, CityCounty, state, ZipCode, carpentrySkill, EmergencyContactFirstName, EmergencyContactLastName, EmergencyContactRelationship, EmergencyContactEmail, EmergencyContactPhone, Allergies, Limitations, dateofBirth, profile_picture 
				  FROM members 
                                  WHERE email = ? LIMIT 1")) {
            $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
            $stmt->execute();    // Execute the prepared query.
            $stmt->store_result();
            // get variables from result.
            $stmt->bind_result($fName, $lName, $phone, $street, $cityCounty, $state, $zip, $carp, $emFName, $emLName, $emRelation, $emEmail, $emPhone, $allergies, $limitations, $DOB, $profilePicture);
            $stmt->fetch();

            $_SESSION['fName'] = $fName;
            $_SESSION['lName'] = $lName;
            $_SESSION['phone'] = $phone;
            $_SESSION['street'] = $street;
            $_SESSION['cityCounty'] = $cityCounty;
            $_SESSION['state'] = $state;
            $_SESSION['zip'] = $zip;
            $_SESSION['emFName'] = $emFName;
            $_SESSION['emLName'] = $emLName;
            $_SESSION['emRelation'] = $emRelation;
            $_SESSION['emEmail'] = $emEmail;
            $_SESSION['emPhone'] = $emPhone;
            $_SESSION['allergies'] = $allergies;
            $_SESSION['limitations'] = $limitations;
            $_SESSION['DOB'] = $DOB;
			$_SESSION['carp'] = $carp;
			$profilePicture = substr($profilePicture, 19);
			$_SESSION['profile_picture'] = $profilePicture;
			
        }
        ?>
        <form action="/includes/process-editProf.php" method="post" name="editProf-form" id="editProf-form" enctype="multipart/form-data">

        <input type="submit"
              value="Save"
              name="saveProf"
              class="btn btn-success"
              style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;" />
		<img src="<?php echo $profilePicture; ?>" alt="Profile Picture" style="width:304px;height:228px;">
		<input type="file" name="profPicture" id="profPicture">
        <h2>Basic Information</h2>

        <label for="profFName">First Name: </label>
        <input type="text" name="profFName"  value="<?php echo $fName; ?>" /> <br>

        <label for="profLName">Last Name: </label>
        <input type="text" name="profLName"  value="<?php echo $lName; ?>" /> <br>

        <label for="profPhone">Phone Number: </label>
        <input type="text" name="profPhone"  value="<?php echo $phone; ?>" /> <br>

        <label for="profStreet">Street: </label>
        <input type="text" name="profStreet"  value="<?php echo $street; ?>" /> <br>

        <label for="profCity">City: </label>
        <input type="text" name="profCity"  value="<?php echo $cityCounty; ?>" /> <br> 

        <label for="profState">State: </label>
        <select name="profState" id="profState">
                        <option style="color:gray" value="<?php echo $state; ?>"><?php echo $state; ?></option>
                        <!-- populate values using php -->
                        <?php
                        $stateQuery=mysqli_query($mysqli, "SELECT state_name FROM home_state"); //or die(mysql_error());
                        while($row=mysqli_fetch_array($stateQuery))
                        {
                            ?>
                            <option style="color:black" value="<?php echo $row["state_name"]; ?>"><?php echo $row["state_name"]; ?></option>
                            <?php
                        }
                        ?>
                    </select> <br><br>

        <label for="profZip">Zip Code: </label>
        <input type="text" name="profZip"  value="<?php echo $zip; ?>" /> <br>

        <label for="profDOB">Date of Birth: </label>
        <input type="date" name="profDOB"  value="<?php echo $DOB; ?>" /> <br>
		
		<label for="profCarpentry">Carpentry Skill: </label>
		<input type="text" name="profCarpentry"  value="<?php echo $carp; ?>" /> <br>

        <h2>Emergency Contact Information</h2>
        <label for="profEmFName">Contact's First Name: </label>
        <input type="text" name="profEmFName"  value="<?php echo $emFName; ?>" /> <br>

        <label for="profEmLName">Contact's Last Name: </label>
        <input type="text" name="profEmLName"  value="<?php echo $emLName; ?>" /> <br>

        <label for="profEmRelation">Contact's Relationship: </label>
        <input type="text" name="profEmRelation"  value="<?php echo $emRelation; ?>" /> <br>

        <label for="profEmEmail">Contact's Email: </label>
        <input type="text" name="profEmEmail"  value="<?php echo $emEmail; ?>" /> <br>

        <label for="profEmPhone">Contact's Phone: </label>
        <input type="text" name="profEmPhone"  value="<?php echo $emPhone; ?>" /> <br>

        <h2>Medical Information</h2>
        <label for="profAllergies">Allergies: </label>
        <input type="text" name="profAllergies"  value="<?php echo $allergies; ?>" /> <br>

        <label for="profLimitations">Limitations: </label>
        <input type="text" name="profLimitations"  value="<?php echo $limitations; ?>" /> <br>

        <input type="submit"
               value="Save"
               name="saveProf"
               class="btn btn-success"
               style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;" />

        <center> <p class="message">Return to <a href="protected-page.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i>Volunteer Portal</a>.</p> </center>
        <center> <p class="message">Return to <a href="http://wildlifecenter.org/">The Wildlife Center</a> website.</p> </center>

        </form>
    </div>
</div>
<?php endif; ?>
</body>
</html>

