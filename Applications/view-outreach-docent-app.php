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

        if ($stmt = $mysqli->prepare("SELECT availability, interest1, interest2, interest3, interest4
				  FROM outreach_app 
                                  WHERE userEmail = ? LIMIT 1")) {
            $stmt->bind_param('s', $userEmail);  // Bind "$email" to parameter.
            $stmt->execute();    // Execute the prepared query.
            $stmt->store_result();
            // get variables from result.
            $stmt->bind_result($availability, $interest1, $interest2, $interest3, $interest4);
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
       <label for="txtAllergies">Please list any allergies and/or special needs *</label><br>
        <textarea name="txtAllergies" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
        -->
		Availability * <br>
		<textarea name="txtAvailability" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $availability ?></textarea><br>

        <strong>Interests and Experience</strong><br>
        <label for="txtInterest1">Why are you interested in volunteering as an outreach docent? *</label><br>
        <textarea name="txtInterest1" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $interest1 ?></textarea><br>
        <label for="txtInterest2">What’s an environmental or wildlife issue you feel passionately about, and why? *</label><br>
        <textarea name="txtInterest2" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $interest2 ?></textarea><br>
        <label for="txtInterest3">Do you have prior experience speaking to the public? Please describe.  *</label><br>
        <textarea name="txtInterest3" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $interest3 ?></textarea><br>
        <label for="txtInterest4">What do you think you’d bring to the outreach volunteer team?  *</label><br>
        <textarea name="txtInterest4" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;" readonly><?php echo $interest4 ?></textarea><br><br>

        <h4>Additional Requirements</h4>
     
        <br>
		
        <form action="includes/processOutreachApp.php?userEmail=<?php echo $userEmail?>" method="POST">
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
	
	<?php 
		if ($_SESSION['showSuccess'] == 1){
            echo "<script type='text/javascript'>alert('Success submitting your Outreach Docent Volunteer Application!')</script>";
            $_SESSION['showSuccess'] = 0;
        }
		if ($_SESSION['showFailure'] == 1){
            echo "<script type='text/javascript'>alert('Failure submitting your Outreach Docent Volunteer Application.')</script>";
            $_SESSION['showFailure'] = 0;
        }
    ?>
    </div>
</div>
  
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="../index.php">login</a>.
    </p>
<?php endif; ?>
</body>
</html>
