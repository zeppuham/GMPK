<?php
include_once '/includes/db_connect.php';
include '/includes/functions.php';
sec_session_start();

//move this block of code to a .inc page for easier viewing? had errors so placed the code here for now
//set times
if (isset($_POST['btnSubmitTime'])){
    $date = date('Y-m-d');
    //takes in time selected by user. auto converts from 12 to 24 hour times
    $start = $_POST['txtStartTime'];
    $end = $_POST['txtEndTime'];
    $user_id = $_SESSION['user_id'];
    if ($insertStmt = $mysqli->prepare("INSERT INTO volunteer_time (start_time, end_time, volunteer_date, id) VALUES (?, ?, ?, ?)")) {
        $insertStmt->bind_param('ssss', $start, $end, $date, $user_id);

        // Execute the prepared query.
        if (!$insertStmt->execute()) {
            //header('Location: ../error.php?err=Registration failure: INSERT');
            echo "there was an error!" . mysqli_error($mysqli);
            exit();
        }
    }
    $_POST = array();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Volunteer Portal</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/register.css">
    <script src="js/register.js"></script>
    <meta content='width=device-width, initial-scale=1' name='viewport'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #b8c076;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #a5ac6a;
        }

        li a, .dropbtn {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover, .dropdown:hover .dropbtn {
            background-color: #a5ac6a;
        }

        li.dropdown {
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #b8c076;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {background-color: #a5ac6a}

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
<?php if (login_check($mysqli) == true) : ?>
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1565719.3322222768!2d-
        79.3646783831562!3d37.915171311515124!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x884cd670bdbcb2cd%3A0xc04e4149b746a695!
        2sVirginia!5e0!3m2!1sen!2sus!4v1489789361122"
        width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> --> <br>
    <div class="page">
    <div class="form">
    <center><img src="images/text-logo-300.png"></center><br><br>
    <ul>
        <li><a href="profile.php">Profile </a></li>
        <li><a href="hours-page.php">Hours Logged</a></li>
        <li><a href="/supercali-1.0.8/supercali-1.0.8/index.php">Calendar</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Applications</a>
            <div class="dropdown-content">
                <a href="Applications/transport-and-rescue-volunteer-application.php">Transport & Rescue</a>
                <a href="Applications/animalCareApps.php">Animal Care</a>
                <a href="Applications/outreach-docent-volunteer-application.php">Outreach Docent</a>
                <a href="Applications/treatment-team-volunteer-application.php">Treatment Team</a>
            </div>
        </li>
    </ul>

    <br><br>

    <center><h3>Applications</h3></center>
    <div class="container">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Treatment & Rescue</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">


                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Animal Care</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
						<?php 
							$leadQuery=mysqli_query($mysqli, "SELECT userEmail, accepted FROM animal_care_app");

							if (!$leadQuery) {
								printf("Error: %s\n", mysqli_error($mysqli));
								exit();
							}
							echo "<table border='1'>
							<tr>
							<th>Email</th>
							<th>Application Status</th>
							</tr>";
							while($row=mysqli_fetch_array($leadQuery)) {
								$status = $row['accepted'];
								if ($status == 2){
									$option = 'Rejected';
								} elseif ($status == 1){
									$option = 'Accepted';
								} else {
									$option = 'Pending';
								}
								echo "<tr>";
								echo "<td><a href='Applications/view-animal-care-app.php?userEmail=" . $row['userEmail'] .  "'>" . $row['userEmail'] . "</a></td>";
								echo "<td>" . $option . "</td>";
								echo "</tr>";
							}
							echo "</table>";
						
						?>
					</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Outreach Docent</a>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
						<?php 
							$leadQuery1=mysqli_query($mysqli, "SELECT userEmail, accepted FROM outreach_app");

							if (!$leadQuery1) {
								printf("Error: %s\n", mysqli_error($mysqli));
								exit();
							}
							echo "<table border='1'>
							<tr>
							<th>Email</th>
							<th>Application Status</th>
							</tr>";
							while($row1=mysqli_fetch_array($leadQuery1)) {
								$status1 = $row1['accepted'];
								if ($status1 == 2){
									$option1 = 'Rejected';
								} elseif ($status1 == 1){
									$option1 = 'Accepted';
								} else {
									$option1 = 'Pending';
								}
								echo "<tr>";
								echo "<td><a href='Applications/view-outreach-docent-app.php?userEmail=" . $row1['userEmail'] .  "'>" . $row1['userEmail'] . "</a></td>";
								echo "<td>" . $option1 . "</td>";
								echo "</tr>";
							}
							echo "</table>";
						
						?>
					</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Treatment Team</a>
                    </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                </div>
            </div>
        </div>
    </div>



    <center><p>Return to <a href="index.php">Login Page</a></p></center>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
    </p>
    </div>
    </div>

<?php endif; ?>
</body>
</html>