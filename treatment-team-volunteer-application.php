<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
sec_session_start();
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Treatment Team Volunteer Application</title>
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
    <?php if (login_check($mysqli) == true) : ?>
                Treatment Team

                Treatment team volunteers will have the opportunity to work hands-on with the patients at the Wildlife Center by assisting the veterinary staff with daily medical and diagnostic procedures. Tasks may include patient capture and restraint, weighing, administering medications, positioning patients for radiographs, and some laboratory work. No prior veterinary or animal handling experience is needed; the veterinary staff will provide all the necessary training and supervision. The first day will be spent in an orientation and observing patient care. Pre-exposure rabies vaccination is required to work with all juvenile and adult mammals. Responsibilities increase with experience and demonstrated commitment.

                Requirements: Treatment team volunteers must be must be at least 18 years of age and able to commit to a minimum of one three-hour shift per month for one year. The morning treatment team shift is from 9 am-12 pm, the afternoon shift is from 3 pm-6 pm. Afternoon shifts are not available during the winter months. Space is limited to two volunteers per shift.

                Availability and application: There are no treatment team positions available at this time.

                <p>Return to your <a href="../protected-page.php">Volunteer Portal</a>.</p>
                <p>Return to the <a href="../index.php">login page</a>.</p>
            </div>
        </div>
    <?php else : ?>
        <p>
            <span class="error">You are not authorized to access this page.</span> Please <a href="../index.php">login</a>.
        </p>
    <?php endif; ?>
    </body>
    </html>