<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Front Desk Application</title>
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
        <h1>Front Desk Application</h1>
    <form action="../includes/Front-Desk-Volunteer-Application.inc.php"
          method="post"
		  enctype="multipart/form-data">
        <center>FRONT DESK APPLICATION FIELDS WILL GO HERE</center>

        <h4>Additional Requirements</h4>
        <h5>In order to be considered for a volunteer position, applicants must submit the following additional documents:</h5>
        <ul>
            <li>Resume or CV: This should include information about your education and relevant work history. </li>
            <li>Letter of Recommendation: The letter should be sent directly from your reference.</li>
        </ul>
        <input type="file" name="resumeFile" id="resumeFile">
        <input type="file" name="recommendFile" id="recommendFile">
        <br>
        <input type="submit"
               value="Send Application"
               name="btnSend"
			   class="btn btn-success"
               style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;"
               onclick="" />
		</form>
		<form action="../includes/download.php?type=resume" method="post">
          <input type="submit" name="btnGetResume" value="Download Resume" style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;"/>
        </form>
		<form action="../includes/download.php?type=recommendation" method="post">
          <input type="submit" name="butGetRecommendation" value="Download Recommendation" style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;"/>
        </form>
		
    
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
	<?php
	if (isset($_SESSION['showSuccess']) || isset($_SESSION['showSuccess'])){
		if ($_SESSION['showSuccess'] == 1){
            echo "<script type='text/javascript'>alert('Success submitting your Outreach Docent Volunteer Application!')</script>";
            $_SESSION['showSuccess'] = 0;
        }
		if ($_SESSION['showFailure'] == 1){
            echo "<script type='text/javascript'>alert('Failure submitting your Outreach Docent Volunteer Application.')</script>";
            $_SESSION['showFailure'] = 0;
        }
	}
    ?>
    </div>
</div>
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