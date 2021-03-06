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
    <title>Animal-Care-Volunteer-Application</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/register.css">
    <script src="js/register.js"></script>
	
	<style>
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
		
		<form action="../includes/Animal-Care-Volunteer-Application.inc.php"
          method="post"
          name="animal_care_form"
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
        -->

        <h4>Experience and Requirements</h4>
        <label for="txtAnimalExp">Please briefly describe your relevant hands-on experience with animals, if any. What did you enjoy about the experience? What did you dislike? *</label><br>
        <textarea name="txtAnimalExp" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
        <label for="txtComfortFood">Carnivorous patients are sometimes unable to eat food items whole due to their injuries; you may be required to cut and divide dead rodents, chicks, and fishes into smaller portions. Are you comfortable handling dead animals for this purpose? *</label><br>
        <textarea name="txtComfortFood" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
        <label for="txtLivePrey">Prior to release from the Wildlife Center, many predatory birds are presented with live mice in order to evaluate their ability to capture prey in a controlled and measurable environment. What is your opinion on using live-prey for this purpose? *</label><br>
        <textarea name="txtLivePrey" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
        <label for="txtOutside">Wildlife rehabilitation requires daily outdoor work -- year-round and regardless of weather conditions. Are you able to work outside during all seasons? If not, what are your limitations? *</label><br>
        <textarea name="txtOutside" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
        <label for="txtLift">Are you able to lift 40 pounds on potentially uneven surfaces with minimal assistance? *</label><br>
        <select name="txtLift">
            <option value="null">-Select-</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>
        <label for="ddlRabies">Are you vaccinated for Rabies? *</label><br>
        <select name="ddlRabies" id="ddlRabies" >
            <option value="null">-Select-</option>
            <option value="yes">Yes</option>
            <option value="no" onchange="showQ()">No</option>
        </select><br>
        <div id="vacCost">
            <label for="ddlVacCost" name="lblVacCost" id="lblVacCost">Are you willing to become vaccinated at your own cost? *</label><br>
            <select name="ddlVacCost" id="ddlVacCost">
				<option value="null">-Select-</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select><br>
        </div>
        <!-- <label for="txtAllergies">Please list all food and animal allergies, if any:*</label><br>
        <textarea name="txtAllergies" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>  THIS IS IN GENERAL APPLICATION-->
        <label for="txtAvailable">What days of the week are you available, and at what times?*</label><br>
        <textarea name="txtAvailable" class="expReq" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
        <label for="ddlCommit">Will you be able to commit to either a six-month or one-year schedule, with at least one shift (four hours) per week? *</label><br>
        <select name="ddlCommit">
            <option value="null">-Select-</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>
        <label for="txtRights">Do you belong to any animal rights groups (PETA, The Humane Society, etc.)? If so, which ones? *</label><br>
        <input type="text" name="txtRights" id="txtRights" /><br>
        <label for="txtLearn">What do you hope to learn or accomplish by volunteering at the Wildlife Center of Virginia? *</label><br>
        <textarea name="txtLearn" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
        <label for="txtPassion">Please describe an environmental or wildlife-based issue you feel passionately about, and why: *</label><br>
        <textarea name="txtPassion" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
        <label for="txtElse">Is there anything else that you’d like us to know about yourself or your experience?	*</label><br>
        <textarea name="txtElse" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>

        <h4>Additional Requirements</h4>
        <h5>In order to be considered for a volunteer position, applicants must submit the following additional documents:</h5>
        <ul>
            <li>Resume or CV: This should include information about your education and relevant work history. </li>
            <li>Letter of Recommendation: The letter should be sent directly from your reference.</li>
        </ul>
        <input type="file" name="resumeFile" id="resumeFile">
        <input type="file" name="recommendFile" id="recommendFile" onchange="showFile1();">
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
		

        <input type="submit"
               value="Send Application"
               name="btnSend"
			   class="btn btn-success"
               style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;">
		</input>
		
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
	if (isset($_SESSION['showSuccess']) || isset($_SESSION['showSuccess'])){
		if ($_SESSION['showSuccess'] == 1){
            echo "<script type='text/javascript'>alert('Success submitting your Animal Care Volunteer Application!')</script>";
            $_SESSION['showSuccess'] = 0;
        }
		if ($_SESSION['showFailure'] == 1){
            echo "<script type='text/javascript'>alert('Failure submitting your Animal Care Volunteer Application.')</script>";
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