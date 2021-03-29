<!DOCTYPE html>
<html>
<head>
    <!--CSS caching disabled with php echo time()-->
    <link rel="stylesheet" type="text/css" href="styles/style.css?<?php echo time();?>" media="screen" />
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
            <h1>Welcome to the Tutoring Appointment Scheduling System!</h1>
        </div>
    </div>
    <div id="splash-btn-area" class="content-flex-area">
        <div id="splash-btn-tutor" class="content-item flex-item" onclick="btnSelected('tutor')">
            <h2>Tutor Portal</h2>
        </div>
        <div id="splash-btn-student" class="content-item flex-item" onclick="btnSelected('student');">
            <h2>Student Portal</h2>
        </div>
    </div>
    <div id="login" class="content-item">
        <div>
            <form action="pages/login.php" method="post">
                <label for="username-login">Username</label><br>
                <input type="text" id="username-login" name="username"
                    pattern=".{1,20}"
                    maxlength = 20
                    title="Required, any character string, max length 20"
                    autocomplete="off"
                    required><br><br>
                <label for="password-login">Password</label><br>
                <input type="password" id="password-login" name="password"
                    pattern=".{1,20}"
                    maxlength="20"
                    title="Required, any character string, max length 20"
                    autocomplete="off"
                    required><br><br>
                <br><input type="submit" value="Login" id="loginBtn" onclick="goToPage('tutor-home');">
            </form>
        </div>
    </div>
</body>
</html>

