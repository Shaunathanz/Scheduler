<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../styles/style.css?<?php echo time();?>" media="screen" />
    <script src="../scripts/script.js"></script>
    <meta charset="utf-8"/>
    <title id="tab_name">Tutor</title>
</head>

<body>
    <!--Nav Bar + Logo-->
    <?php require '../shared/logo.php' ; ?>
    <?php require '../shared/tutor-nav.php' ; ?>

    <!--Page Contents-->
    <div class="content-item">
        <div>
            <h1>Welcome back, <i>tutor_name</i></h1>
        </div>
    </div>
    <div class="content-flex-area">
        <div class="content-item flex-item">
            <h2>Calendar Widget Goes Here</h2>
        </div>
        <div class="content-item flex-item">
            <h2>Upcoming Appointments</h2>
            <ul style="text-align: left;">
                <li>1:00PM - 3:30PM Discrete Math w/ Josh R.</li>
                <li>3:30PM - 5:00PM Discrete Math w/ Kayla J.</li>
                <li>5:00PM - 7:30PM Intro to OOP w/ Jen H.</li>
            </ul>
        </div>
    </div>
</body>
</html>

