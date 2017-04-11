<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
sec_session_start();
$error_msg = "";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Animal-Care-Volunteer-Application-View</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/register.css">
    <script src="js/register.js"></script>
    
      <style>
        
/* fonts */
@import url('https://fonts.googleapis.com/css?family=Bitter|Lato');

/* body */

body {
	background-image: url("images/website-background.png");
	no-repeat center center fixed; 
  		-webkit-background-size: cover;
 		-moz-background-size: cover;
  		-o-background-size: cover;
 	background-repeat: no repeat;
 	background-size: cover;
 	font-family: 'Lato', sans-serif;
 	font-size: 14px;
 	color: #3c323a;
}

.page {
  width: 600px;
  padding: 8% 0 0;
  margin: auto;
}

.image {
  position: absolute;
  max-width: 600px;
  margin: 0 auto 0px;
  padding: 45px;
  text-align: center;
}
.form {
  position: absolute;
  z-index: 1;
  background: #FFFFFF;
  background-image: url("images/bg.jpg");
  max-width: 600px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: left;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Lato", sans-serif;
  outline: 0;
  background: #ffffff;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Bitter", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #b8c076;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button a {
  font-family: "Bitter", sans-serif;
  text-transform: uppercase;
  outline: 0;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  text-decoration: none;
}

.form button:hover,.form button:active,.form button:focus {
  background: #d3d7ae;
}


.form .message {
  margin: 15px 0 0;
  color: #3c323a;
  font-size: 12px;
}
.form .message a {
  color: #35b6be;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #3c323a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #B8C172;
}

</style>       
    
    
</head>
<body>
<div class="page">
    <div class="form">
        <center><img src="../images/text-logo-300.png"></center><br><br>
		<?php if (login_check($mysqli) == true) : ?>
		<h1>Animal Care Volunteer Application</h1>
		<?php
		if (!empty($error_msg)) {
			echo $error_msg;
		}
		?>
		
		<?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }

        $userEmail= $_GET['userEmail'];

        if ($stmt = $mysqli->prepare("SELECT animalExp, comfortFood, livePrey, outside, lift, rabies, vac, available, commitment, rights, learn, passion, other 
				  FROM animal_care_app 
                                  WHERE userEmail = ? LIMIT 1")) {
            $stmt->bind_param('s', $userEmail);  // Bind "$email" to parameter.
            $stmt->execute();    // Execute the prepared query.
            $stmt->store_result();
            // get variables from result.
            $stmt->bind_result($animalExp, $comfortFood, $livePrey, $outside, $lift, $rabies, $vac, $available, $commitment, $rights, $learn, $passion, $other);
            $stmt->fetch();
        }
        ?>
		
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
        <textarea name="txtAnimalExp" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $animalExp ?></textarea><br>
        <label for="txtComfortFood">Carnivorous patients are sometimes unable to eat food items whole due to their injuries; you may be required to cut and divide dead rodents, chicks, and fishes into smaller portions. Are you comfortable handling dead animals for this purpose? *</label><br>
        <textarea name="txtComfortFood" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $comfortFood; ?></textarea><br>
        <label for="txtLivePrey">Prior to release from the Wildlife Center, many predatory birds are presented with live mice in order to evaluate their ability to capture prey in a controlled and measurable environment. What is your opinion on using live-prey for this purpose? *</label><br>
        <textarea name="txtLivePrey" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $livePrey; ?></textarea><br>
        <label for="txtOutside">Wildlife rehabilitation requires daily outdoor work -- year-round and regardless of weather conditions. Are you able to work outside during all seasons? If not, what are your limitations? *</label><br>
        <textarea name="txtOutside" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $outside; ?></textarea><br>
        <label for="txtLift">Are you able to lift 40 pounds on potentially uneven surfaces with minimal assistance? *</label><br>
        <textarea name="txtLift" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $lift; ?></textarea><br><br>
        <label for="ddlRabies">Are you vaccinated for Rabies? *</label><br>
        <textarea name="ddlRabies" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $rabies; ?></textarea><br>
		<label for="ddlVacCost" name="lblVacCost" id="lblVacCost">Are you willing to become vaccinated at your own cost? *</label><br>
		<textarea name="ddlVacCost" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $vac; ?></textarea><br><br>
        
        <!-- <label for="txtAllergies">Please list all food and animal allergies, if any:*</label><br>
        <textarea name="txtAllergies" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>  THIS IS IN GENERAL APPLICATION-->
        <label for="txtAvailable">What days of the week are you available, and at what times?*</label><br>
        <textarea name="available" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $available; ?></textarea><br>
        <label for="ddlCommit">Will you be able to commit to either a six-month or one-year schedule, with at least one shift (four hours) per week? *</label><br>
        <textarea name="ddlCommit" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $commitment; ?></textarea><br>
        <label for="txtRights">Do you belong to any animal rights groups (PETA, The Humane Society, etc.)? If so, which ones? *</label><br>
        <input type="text" name="txtRights" id="txtRights" value="<?php echo $rights; ?>" readonly /><br>
        <label for="txtLearn">What do you hope to learn or accomplish by volunteering at the Wildlife Center of Virginia? *</label><br>
        <textarea name="txtLearn" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $learn; ?></textarea><br>
        <label for="txtPassion">Please describe an environmental or wildlife-based issue you feel passionately about, and why: *</label><br>
        <textarea name="txtPassion" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $passion; ?></textarea><br>
        <label for="txtElse">Is there anything else that you’d like us to know about yourself or your experience?	*</label><br>
        <textarea name="txtElse" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $other; ?></textarea><br>

        <h4>Additional Requirements</h4>
      
   
		<form action="includes/processAnimalCareApp.php?userEmail=<?php echo $userEmail?>" method="POST">
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
