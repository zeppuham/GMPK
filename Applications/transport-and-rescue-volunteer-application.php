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
    <p>
        Volunteer transporters provide a vital service to both the Wildlife Center of Virginia and the
        community by facilitating the rescue of wild animals. We appreciate that our volunteer
        transporters share the use of their vehicles, cost of gasoline, and valuable time to assist wildlife.
        Volunteer transporters provide a life-saving service.
    </p>
    <p>
        If you’d like to join this pool of volunteers, please fill out this form. After we receive your
        application, we will send you an email additional information. Unless you otherwise specify, we
        will add you to our active referral list immediately and you may be start receiving calls from the
        public for transport help right away, or you may not get any calls for six months or more.
    </p>
    Please review and abide by our <a href="http://wildlifecenter.org/sites/default/files/PDFs/Transporter%20guidelines.pdf" target="_blank"> transporter guidelines</a> to be the best transporter you can be!
    <br>
    <br>
    <?php
    if (!empty($error_msg)) {
        echo $error_msg;
    }
    ?>
    <form action="../includes/transport-and-rescue-volunteer-application.inc.php"
          method="post"
          name="formTransport"
		  enctype="multipart/form-data">
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

        <label for="txtTravelDistance">How far are you willing to travel for transport (i.e., 30-45 miles from your location, to a specific location, etc)? *</label><br>
        <textarea name="txtTravelDistance" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
        When are you able to transport animals? * <br>
        <input type="checkbox" name="chkTransportAvail" value="weekdays">
        Weekdays<br>
        <input type="checkbox" name="chkTransportAvail" value="weekends">
        Weekends<br>
        <input type="checkbox" name="chkTransportAvail" value="anytime">
        Anytime<br>

        Have you had the pre-exposure rabies vaccination? * <br>
        <input type="radio" name="radRabiesVacc" value="yes">
        Yes<br>
        <input type="radio" name="radRabiesVacc" value="no">
        No<br>
        This is a series of three vaccinations given over the course of a month and is not a routine vaccination. It is not needed to be a
        transporter, but if you have had them it is helpful for us to know. <br> <br>

        <strong>Capturing Wildlife</strong>
        <p>
            Sometimes rescuers need assistance with capturing and containing a wild animal in need. For
            those who are interested in capturing injured animals:
        </p>
        <ul>
            <li>
                Know that we do not ask transporters to attempt risky captures of dangerous animals. Also,
                as a volunteer, you can always say “no” if you are uncomfortable with a situation.
            </li>
            <li>

                If you are considering attempting a capture/rescue, we are available by phone to give advice
                on the best way to go about attempting a rescue safely.
            </li>
            <li>

                We can advise you on any particularly helpful items or equipment to take with you.
            </li>
            <li>
                We have humane live traps available to assist you, if needed.</li>
            </li>
        </ul>
        <p>
            Several times throughout the year, we offer a wildlife rehabilitation training class called Wildlife
            Capture, Restraint, Handling, and Transport. This class is taught both online and in-person at
            locations throughout Virginia. This class is free to our registered volunteer transporters and is
            an excellent way to build skills and confidence for capturing animals. We will email you when this
            class is available.
        </p>
        With that in mind, would you be willing to assist with capturing animals, if needed? * <br>
        <input type="radio" name="radCapture" value="yes">
        Yes, I am willing to help capture animals<br>
        <input type="radio" name="radCapture" value="no">
        No, I'd prefer to strictly transport<br>
        Transport Guidelines *<br>
        <input type="checkbox" name="chkAcknowledge" value="1">
        I am acknowledging that I have read the transporter guidelines and I promise to abide by
        these guidelines when I transport for the Wildlife Center of Virginia.<br>

        Phone: (540)942-9453	Fax: (540)943-9453	Email: wildlife@wildlifecenter.org
        <br>
        <input type="submit"
               value="Send Application"
               name="btnSend"
			   class="btn btn-success"
               style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;"
               onclick="" />
			   
        <?php
			$email = $_SESSION['email'];
				if ($stmt = $mysqli->prepare("SELECT volunteer
					FROM members 
						  WHERE email = ? LIMIT 1")) {
				$stmt->bind_param('s', $email);  // Bind "$email" to parameter.
				$stmt->execute();    // Execute the prepared query.
				$stmt->store_result();
				// get variables from result.
				$stmt->bind_result($volunteer);
				$stmt->fetch();
				
				if($volunteer == 1){
					echo '<center><p>Return to your <a href="../protected-page.php">Volunteer Portal</a>.</p></center>';
				} else {
					echo '<center><p>Return to your <a href="../applicantPortal.php">Applicant Portal</a>.</p></center>';
				}
		    }
			?>
        <center><p>Return to the <a href="../index.php">Login Page</a>.</p></center>
	</form>
		
		
		<?php 
		//show result after user submits application (success // failure)
		if (isset($_SESSION['showSuccess']) || isset($_SESSION['showSuccess'])){
			if ($_SESSION['showSuccess'] == 1){
				echo "<script type='text/javascript'>alert('Success submitting your Outreach Docent Volunteer Application!')</script>";
				$_SESSION['showSuccess'] = 0;
			}
			if ($_SESSION['showFailure'] == 1){
				echo "<script type='text/javascript'>alert('Failure submitting your Outreach Docent Volunteer Application. ')</script>";
				$_SESSION['showFailure'] = 0;
			}
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