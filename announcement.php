<?php
include_once '/includes/db_connect.php';
include '/includes/functions.php';
sec_session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Announcements</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/register.css">
    <script src="js/register.js"></script>
    <meta content='width=device-width, initial-scale=1' name='viewport'/>

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

        .speech {
            position: relative;
            right: 350px;
            top: 50px;
            width: 300px;
            height: 100px;
            text-align: center;
            line-height: 30px;
            background-color: #fff;
            border: 8px solid #666;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            border-radius: 30px;
            -webkit-box-shadow: 2px 2px 4px #888;
            -moz-box-shadow: 2px 2px 4px #888;
            box-shadow: 2px 2px 4px #888;
            display: inline-block;
        }

        p.speech:before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            right: 110px;
            top: 100px;
            border: 25px solid;
            border-color: #666 transparent transparent #666;
        }

        p.speech:after {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            left: 150px;
            top: 100px;
            border: 15px solid;
            border-color: #fff transparent transparent #fff;
        }

        #helpBear{
            width: 150px;
            height: 200px;
            position: relative;
            right: 650px;
            top: 300px;
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
        <li><a href="leadProfile.php">Profile </a></li>
        <li><a href="hours-page.php">Hours Logged</a></li>
        <li><a href="/supercali-1.0.8/supercali-1.0.8/index.php">Calendar</a></li>
		<li><a href="announcement.php">Send Announcement</a></li>
    </ul>
	
    <br><br>
	
	<form action="/includes/processAnnounce.php" method="POST">
		
		<h2>Send Announcement</h2>
		
		<select>
			<option>Animal Care</option>
			<option>Treatment Team</option>
			<option>Outreach</option>
			<option>Front Desk</option>
		</select><br><br>
		
		<textarea name="txtAnnounce" class="expReq" style="background-color:#ffffff;width:500px;height:200px;font-size:12px;border:0px;padding:5px;color:#aea9a9;"></textarea><br><br>
		<input type="submit"
		   value="Send"
		   name="sendAnnounce"
		   class="btn btn-success"
		   style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;" />

		<center><p>Return to <a href="leadPortal.php">Lead Portal</a>.</p></center>
		<center><p>Return to the <a href="index.php">Login Page</a>.</p></center>
	
	</form>


<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
    </p>
    </div>
    </div>

<?php endif; ?>
</body>
</html>