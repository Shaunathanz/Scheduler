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
    <div class="content-item" id="welcome-msg">
        <div>
            <p>Welcome back, <i>tutor_name</i></p>
        </div>
    </div>
    <div class="content-item">
        <div style="margin:auto">
            <img height="100%" width="100%" src="../images/Calendar.JPG" />
        </div>
    </div>

    <div class="content-flex-area">
        <div class="content-item flex-item">
            <h2>Upcoming Appointments</h2>
            <table style="width:100%">
                <tr>
                    <th>Time</th>
                    <th>Subject</th>
                    <th>Student</th>
                </tr>
                <tr>
                    <td>1:00PM - 3:30PM</td>
                    <td>Discrete Math</td>
                    <td>Kayla J.</td>
                </tr>
                <tr>
                    <td>3:30PM - 5:00PM</td>
                    <td>Discrete Math</td>
                    <td>Jen H.</td>
                </tr>
                <tr>
                    <td>5:00PM - 7:30PM</td>
                    <td>Intro to OOP</td>
                    <td>Josh R.</td>
                </tr>
            </table> 
        </div>
        <div class="content-item flex-item" id="testing-area">
            <h2>Some other useful thing to know can go here. Tomorrow's appointments maybe...? For now it's a testing area.</h2>
            <?php //Here's an example of how to query the database
                $sql = "SELECT * FROM Tutor";

                if (!$result = $db->query($sql)) {
                    die ('There was an error running query[' . $connection->error . ']');
                }
                while($row = $result->fetch_assoc()) {
                    echo "<br>id: " . $row["id"] . "<br>name: " . $row["name"] . "<br>email: " . $row["email"] . "<br>password: " . $row["password"];
                }
            ?>
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
            $firstnameErr = $lastnameErr = $emailErr = $subject= $genderErr = $websiteErr = "";
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
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                <div class="profile_pic">	
                    <div class="profile_pic_block">
                        <img height="200px" width="auto" src="../images/blankAvatar.jpg">
                        <a class="edit_icon" href="tutor-profile.php"><i class="icon-pencil"></i> </a>
                    </div>	
                </div>
            <p><span class="error">* required field</span></p>	
            First Name <input type="text" name="firstname" value="<?php echo $firstname;?>">
            <span class="error">* <?php echo $firstnameErr;?></span>
            <br><br>
            Last Name: <input type="text" name="lastname" value="<?php echo $lastname;?>">
            <span class="error">* <?php echo $lastnameErr;?></span>
            <br><br>
            Email: <input type="text" name="email" value="<?php echo $email;?>">
            <span class="error">* <?php echo $emailErr;?></span>
            <br><br>
            <label for="Subject">Subject of Knowledge:</label>
                <select id="subject" name="subject" required>  
                <option value="">Select</option>}  
                <option value="Mathematics">Mathematics</option>  
                <option value="Science">Science</option>  
                <option value="Handwriting">Handwriting</option>  
                <option value="Journalism">Journalism</option>  
                </select>   
            <br><br>
            Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
            <br><br>
            Gender:
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
            <span class="error">* <?php echo $genderErr;?></span>
            <br><br>
            About: <textarea name="about" rows="5" cols="40"><?php echo $about;?></textarea>
            <br><br>
            Degree: <input type="text" name="degree" value="<?php echo $degree;?>">
            
            <br><br>
            <input type="submit" name="submit" value="Submit">  
            </form>

            <?php
            echo "<h2>Your Input:</h2>";
            echo $firstname;
            echo "<br>";
            echo $lastname;
            echo "<br>";
            echo $email;
            echo "<br>";
            echo $subject;
            echo "<br>";
            echo $website;
            echo "<br>";
            echo $comment;
            echo "<br>";
            echo $gender;
            echo "<br>";
            echo $about;
            echo "<br>";
            echo $degree;
            ?>
        </div>
    </div>
</body>
</html>