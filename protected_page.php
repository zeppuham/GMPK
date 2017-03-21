<?php
include_once '/includes/db_connect.php';
include_once '/includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Volunteer Portal</title>
    <link rel="stylesheet" href="styles/main.css" />
</head>
<body>
<?php if (login_check($mysqli) == true) : ?>
    <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1565719.3322222768!2d-
        79.3646783831562!3d37.915171311515124!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x884cd670bdbcb2cd%3A0xc04e4149b746a695!
        2sVirginia!5e0!3m2!1sen!2sus!4v1489789361122"
        width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    Volunteer opporunities <br>
    <ul>
        <li>
            <a href="Applications/transport-and-rescue-volunteer-application.php">Transport & Rescue</a>
        </li>
        <li>
            <a href="Applications/Animal-Care-Volunteer-Application.php">Animal Care</a>
        </li>
        <li>
            <a href="Applications/outreach-docent-volunteer-application.php">Outreach Docent</a>
        </li>
        <li>
            <a href="Applications/treatment-team-volunteer-application.php">Treatment Team</a>
        </li>
    </ul>
    <p>Return to <a href="index.php">login page</a></p>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
    </p>
<?php endif; ?>
</body>
</html>