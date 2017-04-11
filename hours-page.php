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
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
  margin-top: -100px;
}

.image {
  position: absolute;
  max-width: 360px;
  margin: 0 auto 0px;
  padding: 45px;
  text-align: center;
}
.form {
  position: absolute;
  z-index: 1;
  background: #FFFFFF;
  background-image: url("images/bg.jpg");
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
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
    
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #b8c076;
        }


</style>    
    
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
