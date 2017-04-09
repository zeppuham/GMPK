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
    <title>Hours Logged Page</title>
</head>
<body>
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


</body>