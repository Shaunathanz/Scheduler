<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../styles/style.css?stuff" media="screen" />
    <script src="../scripts/script.js"></script>
    <meta charset="utf-8"/>
    <title id="tab_name">Tutor Home</title>
</head>

<body>
    <!--Nav Bar + Logo-->
    <?php require '../shared/logo.php' ; ?>
    <?php require '../shared/tutor-nav.php' ; ?>

    <!--Page Contents-->
    <div class="content-item">
        <div>
            <h1>GREETING MESSAGE</h1>
        </div>
    </div>
    <div class="content-flex-area">
        <div class="content-item flex-item">
            <h2>CALENDAR WIDGET GOES HERE</h2>
        </div>
        <div class="content-item flex-item">
            <h2>UPCOMING APPOINTMENTS</h2>
            <ul>
                <li>1:00PM - 3:30PM Discrete Math w/ Josh R.</li>
                <li>3:30PM - 5:00PM Discrete Math w/ Kayla J.</li>
                <li>5:00PM - 7:30PM Intro to OOP w/ Jen H.</li>
            </ul>
        </div>
    </div>
</body>
</html>

