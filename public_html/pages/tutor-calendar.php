<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../styles/style.css?<?php echo time();?>" media="screen" />
    <script src="../scripts/script.js"></script>
    <meta charset="utf-8"/>
    <title id="tab_name">Calendar</title>
</head>

<body>
    <!--Logo-->
    <?php require '../shared/logo.php' ; ?>
    <?php require '../shared/tutor-nav.php' ; ?>

    <!--Page Contents-->
    <div class="content-item">
        <div>
            <h1>Current Tutor Calendar</h1>
            <p>
			    <input type="button" value="Schedule A Time" class="homebutton" id="btnHome" onClick="window.location = ''" />
            </p>
            <div style="margin:auto">
                <img height="100%" width="100%" src="../images/Calendar.JPG" /></div>
        </div>
    </div>
</body>
</html>

