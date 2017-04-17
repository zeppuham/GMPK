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
        <center><h1>Find Volunteers</h1></center>
		
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }

        $email= $_SESSION['email'];
		?>
		<form action="" method="post" name="findVolunteers-form" id="findVolunteers-form" enctype="multipart/form-data">
			Select Field(s) to filter by: 
			<br>
			Filter 1:
			<select name="ddlFilter1">
			  <option value="">---</option>
			  <option value="firstName">First Name</option>
			  <option value="lastName">Last Name</option>
			  <option value="cityCounty">City / County</option>
			  <option value="State">Home State</option>
			  <option value="zipCode">ZIP Code</option>
			  <option value="allergies">Allergies</option>
			  <option value="limitations">Limitations</option>
			  <option value="rabies">Rabies Vaccinated</option>
			  <option value="permit">Animal Rehab Permit</option>
			  <option value="dateOfBirth">Date of Birth</option>
			</select>
			
			<input type="text" name="txtFilter1" /input>
			Filter 2:
			<select name="ddlFilter2">
			  <option value="">---</option>
			  <option value="firstName">First Name</option>
			  <option value="lastName">Last Name</option>
			  <option value="cityCounty">City / County</option>
			  <option value="State">Home State</option>
			  <option value="zipCode">ZIP Code</option>
			  <option value="allergies">Allergies</option>
			  <option value="limitations">Limitations</option>
			  <option value="rabies">Rabies Vaccinated</option>
			  <option value="permit">Animal Rehab Permit</option>
			  <option value="dateOfBirth">Date of Birth</option>
			</select>
			
			<input type="text" name="txtFilter2" /input>
			
			Filter 3:
			<select name="ddlFilter3">
			  <option value="">---</option>
			  <option value="firstName">First Name</option>
			  <option value="lastName">Last Name</option>
			  <option value="cityCounty">City / County</option>
			  <option value="State">Home State</option>
			  <option value="zipCode">ZIP Code</option>
			  <option value="allergies">Allergies</option>
			  <option value="limitations">Limitations</option>
			  <option value="rabies">Rabies Vaccinated</option>
			  <option value="permit">Animal Rehab Permit</option>
			  <option value="dateOfBirth">Date of Birth</option>
			</select>
			
			<input type="text" name="txtFilter3" /input>
			
			
        <input type="submit"
               value="Show Volunteers"
               name="showVolunteers"
               class="btn btn-success"
               style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;" />
			   
		<?php
		if (isset($_POST['showVolunteers'])){
			//set default query string with no conditions
			$selectStmt = "SELECT email, firstName, lastName FROM members WHERE volunteer = 1";
			
			//set variables for conditions
			$filter1 = "";
			$filter2 = "";
			$filter3 = "";
			
			//check if filter1 is set
			if ($_POST["ddlFilter1"] !== "" && !empty($_POST['txtFilter1'])) {
				$filter1 = " AND " . $_POST["ddlFilter1"] . "='" . filter_input(INPUT_POST, 'txtFilter1', FILTER_SANITIZE_STRING) . "'";
				$selectStmt .= $filter1;
			} 
			
			//check if filter2 is set
			if ($_POST["ddlFilter2"] !== "" && !empty($_POST['txtFilter2'])) {
				$filter2 = " AND " . $_POST["ddlFilter2"] . "='" . filter_input(INPUT_POST, 'txtFilter2', FILTER_SANITIZE_STRING) . "'";
				$selectStmt .= $filter2;
			} 
			
			//check if filter3 is set
			if ($_POST["ddlFilter3"] !== "" && !empty($_POST['txtFilter3'])) {
				$filter3 = " AND " . $_POST["ddlFilter3"] . "=" . filter_input(INPUT_POST, 'txtFilter3', FILTER_SANITIZE_STRING) . "";
				$selectStmt .= $filter3;
			} 
			
			$result = mysqli_query($mysqli,$selectStmt);

			if (!$result) {
				printf("Error: %s\n", mysqli_error($mysqli));
				exit();
			}
			
			echo "<table border='1'>
			<tr>
			<th>email</th>
			<th>First Name</th>
			<th>Last Name</th>
			</tr>";

			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['firstName'] . "</td>";
				echo "<td>" . $row['lastName'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		?>

        <center> <p class="message">Return to <a href="leadPortal.php"> <i class="fa fa-arrow-left" aria-hidden="true"></i>Team Lead Portal</a>.</p> </center>
        <center> <p class="message">Return to <a href="http://wildlifecenter.org/">The Wildlife Center</a> website.</p> </center>

        </form>
    </div>
</div>
<?php endif; ?>
</body>
</html>

