<?php
include_once '/includes/db_connect.php';
include '/includes/functions.php';
sec_session_start();
$user_id = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hours Logged</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/register.css">
    <script src="js/register.js"></script>
</head>
<body>
<div class="page">
    <div class="form">
<?php
$selectStmt = "SELECT start_time as start, end_time as stop, volunteer_date as dayy from volunteer_time  WHERE volunteer_time.id = " . $user_id;
$result = mysqli_query($mysqli,$selectStmt);

if (!$result) {
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
}
echo "<table border='1'>
<tr>
<th>Date</th>
<th>Start Time</th>
<th>End Time</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . date('m/d/Y',strtotime($row['dayy'])) . "</td>";
    echo "<td>" . date('h:i a',strtotime($row['start'])) . "</td>";
    echo "<td>" . date('h:i a',strtotime($row['stop'])) . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

<?php
	$email = $_SESSION['email'];
	if ($stmt = $mysqli->prepare("SELECT teamLead
		FROM members 
			  WHERE email = ? LIMIT 1")) {
	$stmt->bind_param('s', $email);  // Bind "$email" to parameter.
	$stmt->execute();    // Execute the prepared query.
	$stmt->store_result();
	// get variables from result.
	$stmt->bind_result($teamLead);
	$stmt->fetch();
	
	if($teamLead == 1){
		echo '<center><p class="message">Return to your <a href="../leadPortal.php">Team Lead Portal</a>.</p></center>';
	} else {
		echo '<center><p class="message">Return to your <a href="../protected-page.php">Volunteer Portal</a>.</p></center>';
	}
}
?>
<center> <p class="message">Return to <a href="http://wildlifecenter.org/">The Wildlife Center</a> website.</p> </center> <br>
		</div>
	</div>
</body>