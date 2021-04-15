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
    <?php session_start();?>
    <?php if($_SESSION["activeUser"] == array()) {echo "You do not have permission to access this page!";header("Refresh: 2; URL=../index.php");exit;}?>
    <?php require '../shared/logo.php' ; ?>
    <?php require '../shared/tutor-nav.php' ; ?>

    <!--Page Contents-->
    <div class="content-item" id="welcome-msg">
        <div>
            <p>Welcome back, <i><?php echo $_SESSION["activeUser"]["name"];?></i></p>
        </div>
    </div>

    <div class="content-item">
        <h2>Today's Appointments</h2>
        <table id="appt-table">
            <tr>
                <th>Time</th>
                <th>Subject</th>
                <th>Student</th>
            </tr>
            <?php 
                //echo get_appointments(); //use this in actual completed version
                get_appointments('\'2021-04-10\''); //display test data
            ?>
        </table>
    </div>

    <div class="content-flex-area">
        <div class="content-item flex-item">
            <h2>Confirmed Appointments</h2>
            <table id="appt-table">
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Subject</th>
                    <th>Student</th>
                </tr>
                <?php
                    get_confirmed_appointments();
                ?>
            </table>
        </div>
        <div class="content-item flex-item">
            <h2>Unconfirmed Appointments</h2>
            <table id="appt-table">
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Subject</th>
                    <th>Student</th>
                </tr>
                <?php
                    get_unconfirmed_appointments();
                ?>
            </table>
        </div>
    </div>

    <!--All popups go in this div-->
    <div id="popupBG">
        <!--Each popup is of class "popup" and needs a unique id to provide as an argument to the showPopup() function-->
        <div class="popup" id="calendar">
            <h1>Current Tutor Calendar</h1>
            <p>
			    <input type="button" value="Schedule A Time" class="homebutton" id="btnHome" onClick="window.location = ''" />
            </p>
            <div style="margin:auto">
                <img height="100%" width="100%" src="../images/Calendar.JPG" />
            </div>
        </div>
        <div class="popup" id="appointment">
            <h1>Your Appointment</h1>
			<div class="appointment-section">
				<div class="row">
					<div class="col-md-6 midwidth text_right"><b>Student Name: </b></div>
					<div class="col-md-6 midwidth text_left"> <span>John Doe</span></div>
				</div>
				<div class="row">
					<div class="col-md-6 midwidth text_right"><b>Date and Time: </b></div>
					<div class="col-md-6 midwidth text_left"> <span>03/02/2019 - from 1pm to 2pm</span></div>
				</div>
				<div class="row">
					<div class="col-md-6 midwidth text_right"><b>Class: </b></div>
					<div class="col-md-6 midwidth text_left"> <span>CSI; 360</span></div>
				</div>
				<div class="row">
					<div class="col-md-6 midwidth text_right"><b>Assignment: </b></div>
					<div class="col-md-6 midwidth text_left"> <span>Lab 3</span></div>
				</div>
				<div class="row">
					<div class="col-md-6 midwidth text_right"><b>Files: </b></div>
					<div class="col-md-6 midwidth text_left"><span><a target="_blank" href="Scheduling Calendar.docx"><i class="fa icon-file-alt" aria-hidden="true"></i></a></span></div>
				</div>
				<div class="row">
					<div class="submit_area">
						<div class="sub_group">
							<a href="tutor-home.php"><span class="success"><i class="icon-ok"></i></span><span class="acpt_sucess">Accept</span></a>
						</div>
						<div class="sub_group">
							<a href="tutor-home.php"><span class="decline"><i class="icon-remove"></i></span><span class="dec_sucess">Decline</span></a>
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="popup" id="profile">
            <?php
            // define variables and set to empty values
            $firstnameErr = $lastnameErr = $emailErr = $array = $name = $subject= $genderErr = $websiteErr = "";
            $firstname = $lastname = $email = $gender = $comment = $website = "";$about = ""; $degree = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["firstname"])) {
                    $nameErr = "Name is required";
                } else {
                    $firstname = test_input($_POST["firstname"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
                        $firstnameErr = "Only letters and white space allowed";
                    }
                    
                }
                
                if (empty($_POST["lastname"])) {
                    $nameErr = "Last Name is required";
                } else {
                    $lastname = test_input($_POST["lastname"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
                        $lastnameErr = "Only letters and white space allowed";
                    }
                    
                }
                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } else {
                    $email = test_input($_POST["email"]);
                    // check if e-mail address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                    }
                }
                if (empty($_POST["subject"])) {
                    $subject = "";
                } else {
                    $subject = test_input($_POST["subject"]);
                }
                
                if (empty($_POST["website"])) {
                    $website = "";
                } else {
                    $website = test_input($_POST["website"]);
                    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
                    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                        $websiteErr = "Invalid URL";
                    }
                }

                if (empty($_POST["comment"])) {
                    $comment = "";
                } else {
                    $comment = test_input($_POST["comment"]);
                }

                if (empty($_POST["gender"])) {
                    $genderErr = "Gender is required";
                } else {
                    $gender = test_input($_POST["gender"]);
                }
                
                if (empty($_POST["about"])) {
                    $about = "";
                } else {
                    $about = test_input($_POST["about"]);
                }
                
                if (empty($_POST["degree"])) {
                    $degree = "";
                } else {
                    $degree = test_input($_POST["degree"]);
                }
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
            <h2>View / Edit Info</h2>
            <form action="../scripts/update_profile.php" method="POST">
                <div class="profile_pic">	
                    <div class="profile_pic_block">
                        <img height="200px" width="auto" src="../images/blankAvatar.jpg">
                        <a class="edit_icon" href="tutor-profile.php"><i class="icon-pencil"></i> </a>
                    </div>	
                </div>
                <p><span class="error">* required field</span></p>	
                First Name <input type="text" name="FullName" value="<?php echo $_SESSION["activeUser"]["name"];?>">
                <span class="error">* <?php echo $firstnameErr;?></span>
                <br><br>
                Email: <input type="text" name="email" value="<?php echo $_SESSION["activeUser"]["email"];?>">
                <span class="error">* <?php echo $emailErr;?></span>
                <!--Need password field-->
                
                <br><br>
                <!--<input type="submit" name="submit" value="Submit"> -->
                <button type="button" onClick="hidePopup();">Cancel</button>
                <input type="submit" value="Update & Logout" id="updateBtn"> 
            </form> 
        </div>
    </div>
</body>
</html>