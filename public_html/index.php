<!DOCTYPE html>
<html>
<head>
    <!--CSS caching disabled with ?stuff-->
    <link rel="stylesheet" type="text/css" href="styles/style.css?zAzzAzffaaz" media="screen" />
    <script src="scripts/script.js"></script>
    <meta charset="utf-8"/>
    <title id="tab_name">Splash</title>
</head>

<body>
    <!--Logo-->
    <?php require 'shared/logo.php' ; ?>

    <!--All page contents should be a div within one of the defined "content" CSS classes-->
    <div id="welcome-msg" class="content-item">
        <div>
            <h1>Placeholder Welcome Message</h1>
        </div>
    </div>
    <div id="splash-btn-area" class="content-flex-area">
        <div id="splash-btn-tutor" class="content-item flex-item" onclick="goToPage('tutor-home');">
            <h2>Tutor Portal</h2>
            <p>---> CLICK HERE <---</p>
        </div>
        <div id="splash-btn-student" class="content-item flex-item" onclick="goToPage('student-home');">
            <h2>Student Portal</h2>
            <p>---> CLICK HERE <---</p>
        </div>
    </div>
</body>
</html>

