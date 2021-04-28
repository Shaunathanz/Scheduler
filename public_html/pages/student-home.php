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
  } );
  </script>
</head>

<body>
    <!--Nav Bar + Logo-->
    <?php require_once '../scripts/initialize.php'; ?>
    <?php require '../shared/logo.php' ; ?>
    <?php //require '../shared/student-nav.php' ; ?>
	

    <!--Page Contents-->
    <div class="content-item">
        <?php
// define variables and set to empty values
$firstnameErr = $lastnameErr = $emailErr = $subject= $genderErr = $websiteErr = "";
$firstname = $lastname = $email = $gender = $comment = $website = $major =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	insert_appointment($_POST,$_FILES);
}
$sql = "SELECT DISTINCT subject FROM Subject";
$result = $db->query($sql);

?>

<h2>Student Portal</h2>
<p>Welcome to the student page. We are here to help. Please make your selections below. <br>You will receive a confirmation email once your session has been confirmed or cancelled </p>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" id="student-appt-form">  
  Select subjects 
  <select name="subject" required class="form-select form-control" id="subject"?>">
		<?php
		while($row = $result->fetch_assoc()) {
			//print_r($row);
			$subject = $row['subject'];
			echo "<option value='".$subject."'>".$subject."</option>";
    }
		?>
  </select>
  <span class="error">* <?php echo $firstnameErr;?></span>
  <br><br>
  Select day: <input type="date" name="day" min="<?php echo date('Y-m-d');?>" value="" id="dateSelector">
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
  <span class="error">* <?php echo $lastnameErr;?></span>
  <br><br>
  Select time in: <input type="text" class="timepicker" name="timein" value="">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Select time out: <input type="text" class="timepicker" name="timeout" value="">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  
  Select tutor 
  <select name="teacher" required class="form-select form-control">
		<?php
    if(isset($_POST['subject'])){
      $sql = "SELECT * FROM Tutor INNER JOIN Subject ON Tutor.id = Subject.tutor_id AND Subject.subject = ".$_POST['subject'].";";
      //echo $sql;
      $result = $db->query($sql);
      while($row = $result->fetch_assoc()) {
        //print_r($row);
        $id = $row['id'];
        $name = $row['name'];
        echo "<option value='".$id."'>".$name."</option>";
      }
    }
		?>
  </select>
  <br><br>
  Tell us about the assignment
  <input type="text" name="assignment" value="">
  <br><br>
  File
  <input type="file" name="myfile" value="">
  <br><br>
  Enter name
  <input type="text" name="name" value="">
  <br><br>
  Enter email
  <input type="text" name="email" value="">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</div>
</body>
</html>

