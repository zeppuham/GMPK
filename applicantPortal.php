<?php
include_once '/includes/db_connect.php';
include '/includes/functions.php';
sec_session_start();
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
            position: absolute;
            left: -400px;
            bottom: 300px;
            width: 300px;
            height: 100px;
            text-align: center;
            line-height: 16px;
            padding:20px;
            font-size:16px;
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
        
        .speech img {
        max-width:80px;
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

    </ul>



    <br><br>

    <h2>Apply to Volunteer</h2>

    <a href="Applications/transport-and-rescue-volunteer-application.php"><button>Volunteer for Transport & Rescue</button></a><br><br>
    <a href="Applications/Animal-Care-Volunteer-Application.php"><button>Volunteer for Animal Care</button></a><br><br>
    <a href="Applications/outreach-docent-volunteer-application.php"><button>Volunteer for Outreach Docent</button></a><br><br>
    <a href="Applications/treatment-team-volunteer-application.php"><button>Volunteer for Treatment Team</button></a><br><br>
    <a href="Applications/front-desk"><button>Volunteer for Front Desk</button></a><br>
	<br>
	<center><p>Return to your <a href="../protected-page.php">Volunteer Portal</a>.</p></center>
	<center><p>Return to the <a href="../index.php">Login Page</a>.</p></center>
	

<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
    </p>

    
<p class="speech">Click on the applications you are interested in to apply to volunteer. Don't forget to complete your profile too!<br><br><img src="images/bear.png"></p>

    </div>
    </div>

<?php endif; ?>
</body>
</html>
