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
<?php if (login_check($mysqli) == true) : ?>
    <center><img src="images/text-logo-300.png"></center><br><br>
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
        No, I'd prefer to strickly transport<br>
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
			   
        <center><p>Return to your <a href="../protected-page.php">Home Page</a>.</p></center>
        <center><p>Return to the <a href="../index.php">Login Page</a>.</p></center>
	</form>
		
		<?php 
		//show result after user submits application (success // failure)
		if ($_SESSION['showSuccess'] == 1){
            echo "<script type='text/javascript'>alert('Success submitting your Outreach Docent Volunteer Application!')</script>";
            $_SESSION['showSuccess'] = 0;
        }
		if ($_SESSION['showFailure'] == 1){
            echo "<script type='text/javascript'>alert('Failure submitting your Outreach Docent Volunteer Application. ')</script>";
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
