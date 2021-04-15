<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../styles/style.css?<?php echo time();?>" media="screen" />
    <script src="../scripts/script.js"></script>
    <meta charset="utf-8"/>
    <title id="tab_name">Profile Registration</title>
</head>

<body>
    <!--Logo-->
    <?php require '../shared/logo.php' ; ?>
    <?php //require '../shared/tutor-nav.php' ; ?>

    <!--Page Contents-->
    <div class="content-item">
        <?php
// define variables and set to empty values
$FullnameErr = $lastnameErr = $password = $emailErr = $subject= $genderErr = $websiteErr = "";
$Fullname = $lastname = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Fullname"])) {
    $nameErr = "Name is required";
  } else {
      $firstname = test_input($_POST["Fullname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$Fullname)) {
        $FullnameErr = "Only letters and white space allowed";
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
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
        ?>

<h2>Tutor Registration</h2>
<p><span class="error">* required field</span></p>
<form action="../scripts/insert.php" method="POST">
  Full Name <input type="text" name="Fullname" value="<?php echo $Fullname;?>">
  <span class="error">* <?php echo $FullnameErr;?></span>
  <br><br>
  Email: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
    Password: <input type="text" name="password" value="<?php echo $password;?>">
  <br><br>
  <label for="Subject">Subject(s) of Knowledge:</label>
	<select id="subject" name="subject" required>  
	  <option value="">Select</option>}  
	  <option value="Mathematics">Mathematics</option>  
	  <option value="Science">Science</option>  
	  <option value="Handwriting">Handwriting</option>  
	  <option value="Journalism">Journalism</option>  
	</select>   
  <br><br>
  <input type="submit" name="submit" value="Register">  
</form>


    </div>
</body>
</html>