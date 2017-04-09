<?php 
	include_once '../../includes/db_connect.php';
	include '../../includes/functions.php';
	error_reporting(-1);
	sec_session_start(); // Our custom secure way of starting a PHP session.
	if(isset($_POST['btnApprove'])){
		$userEmail = $_GET['userEmail'];
		
		if ($stmt2 = $mysqli->prepare("UPDATE outreach_app SET accepted=1 
                                  WHERE userEmail = ? LIMIT 1")) {
			$stmt2->bind_param('s', $userEmail);
			$stmt2->execute();

			if (!$stmt2->execute()) {
				//header('Location: ../error.php?err=Registration failure: UPDATE');
				echo "there was an error!" . mysqli_error($mysqli);
				exit();
			}
			
			
			$subject = "Your Volunteer Application has been Accepted!";
			
			$message="Congratulations! We received your application and would love to have you as a volunteer at the Virginia Wildlife Center.  One of our team leads will be in touch soon.";
			$message.="Have a wonderful day!";
			$message.="~The Wildlife Team";
			
			sendEmail($userEmail, $subject, $message);
			
			header("Location: ../../leadPortal.php");
		}
		
		if ($stmt = $mysqli->prepare("UPDATE members SET volunteer=1 
                                  WHERE email = ? LIMIT 1")) {
			$stmt->bind_param('s', $userEmail);
			$stmt->execute();

			if (!$stmt->execute()) {
				//header('Location: ../error.php?err=Registration failure: UPDATE');
				echo "there was an error!" . mysqli_error($mysqli);
				exit();
			}
	    }
		
	}
	
	if(isset($_POST['btnReject'])){
		$userEmail = $_GET['userEmail'];
		if ($stmt2 = $mysqli->prepare("UPDATE outreach_app SET accepted=2 
                                  WHERE userEmail = ? LIMIT 1")) {
			$stmt2->bind_param('s', $userEmail);
			$stmt2->execute();

			if (!$stmt2->execute()) {
				//header('Location: ../error.php?err=Registration failure: UPDATE');
				echo "there was an error!" . mysqli_error($mysqli);
				exit();
			}
			
			$subject = "Virginia Wildlife Center Volunteer Application";
			
			$message="Thank you for applying to volunteer at the Virginia Wildlife Center.  Unfortunately, at this time we are not looking for any more volunteers. We will keep you application in the system and contact you if this changes.";
			$message.="Have a wonderful day!";
			$message.="~The Wildlife Team";
			
			sendEmail($userEmail, $subject, $message);
			
			header("Location: ../../leadPortal.php");
		}
		
	}
?>