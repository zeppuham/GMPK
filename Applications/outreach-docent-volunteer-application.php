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
		#fileUpload1{
			display: none;
		}
		#fileUpload2{
			display: none;
		}
		#fileUpload3{
			display: none;
		}
		#fileUpload4{
			display: none;
		}
		#fileUpload5{
			display: none;
		}
		#fileUpload6{
			display: none;
		}
		#fileUpload7{
			display: none;
		}
		#fileUpload8{
			display: none;
		}
    </style>
</head>
<body>
<?php if (login_check($mysqli) == true) : ?>
<div class="page">
    <div class="form">
        <center><img src="../images/text-logo-300.png"></center><br><br>
        <h1>Outreach Volunteer Application</h1>
    <form action="../includes/Outreach-Docent-Volunteer-Application.inc.php"
          method="post"
		  enctype="multipart/form-data">
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
        <input type="checkbox" name="chkAvailability[]" value="Monday">
        Monday<br>
        <input type="checkbox" name="chkAvailability[]" value="Tuesday">
        Tuesday<br>
        <input type="checkbox" name="chkAvailability[]" value="Wednesday">
        Wednesday<br>
        <input type="checkbox" name="chkAvailability[]" value="Thursday">
        Thursday<br>
        <input type="checkbox" name="chkAvailability[]" value="Friday">
        Friday<br>
        <input type="checkbox" name="chkAvailability[]" value="Saturday">
        Saturday<br>
        <input type="checkbox" name="chkAvailability[]" value="Sunday">
        Sunday<br>

        <strong>Interests and Experience</strong><br>
        <label for="txtInterest1">Why are you interested in volunteering as an outreach docent? *</label><br>
        <textarea name="txtInterest1" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
        <label for="txtInterest2">What’s an environmental or wildlife issue you feel passionately about, and why? *</label><br>
        <textarea name="txtInterest2" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
        <label for="txtInterest3">Do you have prior experience speaking to the public? Please describe.  *</label><br>
        <textarea name="txtInterest3" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
        <label for="txtInterest4">What do you think you’d bring to the outreach volunteer team?  *</label><br>
        <textarea name="txtInterest4" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br><br>

        <h4>Additional Requirements</h4>
        <h5>In order to be considered for a volunteer position, applicants must submit the following additional documents:</h5>
        <ul>
            <li>Resume or CV: This should include information about your education and relevant work history. </li>
            <li>Letter of Recommendation: The letter should be sent directly from your reference.</li>
        </ul>
        <input type="file" name="resumeFile" id="resumeFile">
        <input type="file" name="recommendFile" id="recommendFile">
		<div id="fileUpload1">
			<input type="file" name="file1" id="file1" onchange="showFile2();">
		</div>
		<div id="fileUpload2">
			<input type="file" name="file2" id="file2" onchange="showFile3();">
		</div>
		<div id="fileUpload3">
			<input type="file" name="file3" id="file3" onchange="showFile4();">
		</div>
		<div id="fileUpload4">
			<input type="file" name="file4" id="file4" onchange="showFile5();">
		</div>
		<div id ="fileUpload5">
			<input type="file" name="file5" id="file5" onchange="showFile6();">
		</div>
		<div id="fileUpload6">
			<input type="file" name="file6" id="file6" onchange="showFile7();">
		</div>
		<div id="fileUpload7">
			<input type="file" name="file7" id="file7" onchange="showFile8();">
		</div>
		<div id="fileUpload8">
			<input type="file" name="file8" id="file8">
		</div>
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
		function showFile1(){
			document.getElementById('fileUpload1').style.display = 'block';
		}
		function showFile2(){
			document.getElementById('fileUpload2').style.display = 'block';
		}
		function showFile3(){
			document.getElementById('fileUpload3').style.display = 'block';
		}
		function showFile4(){
			document.getElementById('fileUpload4').style.display = 'block';
		}
		function showFile5(){
			document.getElementById('fileUpload5').style.display = 'block';
		}
		function showFile6(){
			document.getElementById('fileUpload6').style.display = 'block';
		}
		function showFile7(){
			document.getElementById('fileUpload7').style.display = 'block';
		}
		function showFile8(){
			document.getElementById('fileUpload8').style.display = 'block';
		}
    </script>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="../index.php">login</a>.
    </p>
<?php endif; ?>
</body>
</html>