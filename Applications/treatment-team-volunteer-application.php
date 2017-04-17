<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
sec_session_start();
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Treatment Team Volunteer Application</title>
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
    <?php if (login_check($mysqli) == true) : ?>
		<center><img src="../images/text-logo-300.png"></center><br><br>
        <h1>Treatment Team</h1>
		<form action="../includes/Treatment-Team-Volunteer-Application.inc.php"
			method="post"
			enctype="multipart/form-data">
				<label for="txtInterest1">Please describe any previous medical or veterinary training you have completed. *</label><br>
				<textarea name="txtInterest1" class="interest" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
				<label for="txtInterest1">The case load at the Center can be unpredictable and vary greatly depending on the time of year.  Please describe the work environment that you work best in including how you best retain information that is taught to you.
 *</label><br>
				<textarea name="txtInterest2" class="interest" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
				<label for="txtInterest1">The Center admits many trauma cases from all over the state.  In order for a patient to be released back into the wild it must be able to successfully survive on its own in the wild free of chronic pain or debilitation.  Due to this fact, the Center does humanely euthanize patients that do not meet this standard.  Do you have personal experience with euthanasia and how does it affect you? *</label><br>
				<textarea name="txtInterest3" class="interest" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br>
				<label for="txtInterest4">Taking care of animals is a messy job that requires all team members to clean out dirty crates, chop rats or mice for feeding to patients, and collect fecal samples for analysis for example.  Is this something that you foresee struggling with?
				<textarea name="txtInterest4" class="interest" style="background-color:#ffffff;width:500px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br></label><br>
				<br>
				
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
		if (isset($_SESSION['showSuccess']) || isset($_SESSION['showSuccess'])){
			if ($_SESSION['showSuccess'] == 1){
				echo "<script type='text/javascript'>alert('Success submitting your Treatment Team Volunteer Application!')</script>";
				$_SESSION['showSuccess'] = 0;
			}
			if ($_SESSION['showFailure'] == 1){
				echo "<script type='text/javascript'>alert('Failure submitting your Treatment Team Volunteer Application.')</script>";
				$_SESSION['showFailure'] = 0;
			}
		}
    ?>
            </div>
        </div>
		
		<script>		
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