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
        <li><a href="">Hours Logged</a></li>
        <li><a href="/supercali-1.0.8/supercali-1.0.8/index.php">Calendar</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Applications</a>
            <div class="dropdown-content">

            </div>
        </li>
    </ul>

    <br><br>

    <center><h3>Team Leads</h3></center>

    <?php
    $leadQuery=mysqli_query($mysqli, "SELECT FirstName, LastName, email FROM members WHERE teamLead = 1");

    if (!$leadQuery) {
        printf("Error: %s\n", mysqli_error($mysqli));
        exit();
    }
    echo "<table border='1'>
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    </tr>";
    while($row=mysqli_fetch_array($leadQuery)) {
        echo "<tr>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <form action="includes/newLead.php" method="post">
    <center><h4>Designate New Team Lead</h4></center>
    <label for="leadEmail">Email: </label>
        <input type="text" name="leadEmail" />

    <input type="submit"
           value="Add"
           id="profile-form-link"
           name="addLead"
           style="background-color:#b8c076;font-family: Bitter, sans-serif;text-transform: uppercase;color: #FFFFFF;cursor:pointer;" />

    </form>

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