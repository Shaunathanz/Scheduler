<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../styles/style.css?<?php echo time();?>" media="screen" />
  <script src="../scripts/script.js"></script>
  <meta charset="utf-8"/>
  <title id="tab_name">Student</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
  <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

  <script>
    $( function() {
      $( "#datepicker" ).datepicker();
      $('.timepicker').timepicker({
        timeFormat: 'HH:mm',
        interval: 60,
        minTime: '7',
        maxTime: '18',
        defaultTime: '7',
        startTime: '07:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
      });
    });
  </script>
</head>

<body>
  <!--Nav Bar + Logo-->
  <?php require_once '../scripts/initialize.php'; ?>
  <?php require '../shared/logo.php' ; ?>


  <!--Page Contents-->
  <div class="content-item">
    <?php
      // define variables and set to empty values
      $firstnameErr = $lastnameErr = $emailErr = $subject= $genderErr = $websiteErr = "";
      $firstname = $lastname = $email = $gender = $comment = $website = $major =  "";
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") { //after choosing subject
        echo 
          "
          <h2>Student Portal</h2>
          <p>Welcome to the student page. We are here to help. Please make your selections below. <br>You will receive a confirmation email once your session has been confirmed or cancelled </p>
          <p><span class='error'>* required field</span></p>
          <form method='post' action=\"../scripts/validate_appointment.php\" id='student-appt-form'>"; //TO DO: MAKE THE ACTION CALL A SCRIPT PAGE THAT DOES THE insert_appointment() CALL

        echo 
          "Select subject *<br>
          <select name='subject' required class='form-select form-control' id='subject' disabled>";
        session_start();
        $_SESSION["selectedSubj"] = $_POST["subject"];
        $sql = "SELECT DISTINCT subject FROM Subject";
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()) {
          $subject = $row['subject'];
          if($subject == $_SESSION["selectedSubj"]) {
            echo "<option value=\"" . $subject . "\" selected>" . $subject . "</option>";
          } else {
            echo "<option value=\"" . $subject . "\">" . $subject . "</option>";
          }
        }

        echo
          "
            </select>
            <span class='error'> " . $firstnameErr . "</span>
            <br><button class='input' type=\"button\" style=\"margin-top:10px;\" onclick=\"goToPage('student-home');\">Change subject</button><br><br>
      
            Select day *<br>
            <input class='input' type='date' name='day' min='" . date('Y-m-d') . "' value='' id='dateSelector'>
            <script> //Credit to https://stackoverflow.com/questions/49863189/disable-weekends-on-html-5-input-type-date
              const picker = document.getElementById('dateSelector');
              picker.addEventListener('input', function(e){
                var day = new Date(this.value).getUTCDay();
                if([6,0].includes(day)){
                  e.preventDefault();
                  this.value = '';
                  alert('Weekends not allowed');
                }
              });
            </script>
            <span class='error'> " . $lastnameErr . "</span>
            <br><br>
    
            Select time in *<br> 
            <input type='text' class='timepicker' name='timein' value='' id='timeIn'>
            <span class='error'> " . $emailErr . "</span>
            <br><br>
    
            Select time out *<br> 
            <input type='text' class='timepicker' name='timeout' value='' id='timeOut'>
            <span class='error'> " . $emailErr . "</span>
            <br><br>
            
            Select tutor *<br>
            <select name='teacher' required class='form-select form-control'>";

        $sql = "SELECT Tutor.id, Tutor.name FROM Tutor INNER JOIN Subject ON Tutor.id = Subject.tutor_id AND Subject.subject = \"" . $_POST['subject'] . "\";";
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()) {
          //print_r($row);
          $id = $row['id'];
          $name = $row['name'];
          echo '<option value=' . $id . '>' . $name . '</option>';
        }
        
        echo 
          "
            </select>
            <br><br>
    
            Tell us about the assignment<br>
            <textarea class='input' id='about-assignment' name='assignment' form='student-appt-form' value=''></textarea>
            <br><br>
    
            Enter name *<br>
            <input class='input' type='text' name='name' value=''>
            <br><br>
    
            Enter email *<br>
            <input class='input' type='text' name='email' value=''>
            <br><br>
      
            <input class='input' type='submit' name='submit' value='Submit'>  
          </form>";
        //insert_appointment($_POST);
      } else { //before choosing subject
        echo 
          "
          <h2>Student Portal</h2>
          <p>Welcome to the student page. We are here to help. Please make your selections below. <br>You will receive a confirmation email once your session has been confirmed or cancelled </p>
          <p><span class='error'>* required field</span></p>
          <form method='post' action=\"" . htmlspecialchars($_SERVER['PHP_SELF']) . "\" id='student-appt-form'>";

        echo 
          "Select subject * 
          <select name='subject' required class='form-select form-control' id='subject'?>'>";
        $sql = "SELECT DISTINCT subject FROM Subject";
        $result = $db->query($sql);
        while($row = $result->fetch_assoc()) {
          $subject = $row['subject'];
          echo "<option value=\"" . $subject . "\">" . $subject . "</option>";
        }

        echo
          "
            </select>
            <span class='error'> " . $firstnameErr . "</span>
            <br><br>
            <input class='input' type='submit' name='submit' value='Submit'>  
            </form>";
      }
      echo "<br><br>SQL=" . $sql;
    ?>
  </div>
</body>
</html>

