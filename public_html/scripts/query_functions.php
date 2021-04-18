<?php
require_once('initialize.php');

//CONTAINS ALL FUNCTIONS FOR MANIPULATING THE DATABASE

/**Fetch Today's Appointments or Appointments for a Specific Date */
function get_appointments($date) //remove argument requirement for final version
{
    global $db;

    if(null == $date) {
        //get today's appointments
        $date = date("Y-m-d");
    }
    $sql = "SELECT Appointment.time_start, Appointment.time_end, Appointment.subject, Student.name
        FROM Appointment
        INNER JOIN Tutor ON Tutor.id = Appointment.tutor_id AND Tutor.id = " . $_SESSION['activeUser']['id'] . " AND Appointment.date = " . $date . "
        INNER JOIN Student ON Student.id = Appointment.student_id ORDER BY Appointment.time_start ASC";
    //echo $sql;

    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["time_start"] . " - " . $row["time_end"] . "</td><td>" . $row["subject"] . "</td><td>" . $row["name"] . "</td></tr>";
    }
}

/**Fetch All Confirmed Appointments Excluding Current Date */
function get_confirmed_appointments()
{
    global $db;

    //$date = date_create(date("Y-m-d")); //use this in final version
    $date = date_create('2021-04-10'); //test
    $dateStr = $date->format('Y-m-d');

    if(null == $date) {
        //error
        echo 'error';
    }
    $sql = "SELECT Appointment.date, Appointment.time_start, Appointment.time_end, Appointment.subject, Student.name
        FROM Appointment
        INNER JOIN Tutor ON Tutor.id = Appointment.tutor_id AND Tutor.id = " . $_SESSION['activeUser']['id'] . " AND Appointment.date > DATE '" . $dateStr . "' AND Appointment.status = 'Confirmed' 
        INNER JOIN Student ON Student.id = Appointment.student_id ORDER BY Appointment.time_start ASC";
    //echo $sql;

    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["date"] . "</td><td>" . $row["time_start"] . " - " . $row["time_end"] . "</td><td>" . $row["subject"] . "</td><td>" . $row["name"] . "</td></tr>";
    }
}

/**Fetch All Unconfirmed Appointments */
function get_unconfirmed_appointments()
{
    global $db;

    //$date = date_create(date("Y-m-d")); //use this in final version
    $date = date_create('2021-04-10'); //test
    $dateStr = $date->format('Y-m-d');

    if(null == $date) {
        //error
        echo 'error';
    }
    $sql = "SELECT Appointment.date, Appointment.time_start, Appointment.time_end, Appointment.subject, Student.name
        FROM Appointment
        INNER JOIN Tutor ON Tutor.id = Appointment.tutor_id AND Tutor.id = " . $_SESSION['activeUser']['id'] . " AND Appointment.date >= DATE '" . $dateStr . "' AND Appointment.status = 'Unconfirmed' 
        INNER JOIN Student ON Student.id = Appointment.student_id ORDER BY Appointment.time_start ASC";
    //echo $sql;

    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["date"] . "</td><td>" . $row["time_start"] . " - " . $row["time_end"] . "</td><td>" . $row["subject"] . "</td><td>" . $row["name"] . "</td></tr>";
    }
}

function login_exists($email, $password) {
	global $db;

	$sql = "SELECT * FROM Tutor WHERE email='$email' AND password='$password'";

	$result = mysqli_query($db, $sql);

    if($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

  function find_all_users() {
    global $db;

    $sql = "SELECT id, name, email, img ";
    $sql .= "from Tutor ";
    //$sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_user_by_id($id) {
    global $db;

    $sql = "select id, name, email, img ";
    $sql .= "from Tutor ";
    $sql .= "where id='" . $id . "' ";
    //$sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user;

}

function insert_user($name, $email, $password, $img) {
    global $db;


    $sql = "INSERT INTO Tutor ";
    $sql .= " (name, email, password, img) ";
    $sql .= "VALUES (";
    $sql .= "'" . $name . "',";
    $sql .= "'" . $email . "',";
	$sql .= "'" . $password . "',";
	$sql .= "'" . $img;
    $sql .= "');";

	//echo $sql;

    $result = mysqli_query($db, $sql);
	//echo '$result is: ';
	//print_r($result);
    // For INSERT statements, $result is true/false
    if($result) {
        return true;
    } else {
        // INSERT failed
        echo 'Insert Error: ' . mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_user($user,$img="") {
    global $db;
	
	$error =0;	$profileImageName="";
	if(isset($img)){
		if(!empty($img['profileImage']['name'])){
			
		$profileImageName = time() . '-' . $img["profileImage"]["name"];
		$target_dir = "../images/";
		$target_file = $target_dir . basename($profileImageName);
		if($img['profileImage']['size'] > 200000) {
		  $msg = "Image size should not be greated than 200Kb";
		  $msg_class = "alert-danger";
		  $error++;
		}
		// check if file exists
		if(file_exists($target_file)) {
		  $msg = "File already exists";
		  $msg_class = "alert-danger";
		  $error++;
		}
		move_uploaded_file($img["profileImage"]["tmp_name"], $target_file);
		}
	}
	
    $sql = "UPDATE Tutor SET ";
    $sql .= "name='" . $user['name'] . "', ";
    $sql .= "email='" . $user['email'] . "', ";
    $sql .= "phone='" . $user['phone'] . "', ";
	
	if(!empty($profileImageName)){
		$sql .= "img='" . $profileImageName . "', "; //TO DO: Image upload feature
	}
	
    $sql .= "password='" . $user['password'] . "' ";
    //$sql .= "img='" . $user['img'] . "' "; //TO DO: Image upload feature
    $sql .= "WHERE id='" . $user['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
        return true;
    } else {
        // UPDATE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}

function delete_user($id) {
    global $db;

    if ($id < 0) {return true;}

    $sql = "DELETE FROM Tutor";
    $sql .= " WHERE id='" . $id . "'";
    $sql .= " LIMIT 1";

    $result = mysqli_query($db, $sql);


    // For DELETE statements, $result is true/false
    if($result) {
        mysqli_commit($db);
        return true;
    } else {
        // DELETE failed
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function insert_appointment($data){
	global $db;
	$tutorid = $data['teacher'];
	$day = date("Y-m-d",strtotime($data['day']));
	$timein = $data['timein'];
	$timeout = $data['timeout'];
	$subject = $data['subject'];
	$stid =3;
	
	$sql = "INSERT INTO appointment ";
	$sql .= " (tutor_id, date, time_start, time_end, subject, student_id) ";
	$sql .= "VALUES (";
    $sql .= "'" . $tutorid . "',";
    $sql .= "'" . $day . "',";
	$sql .= "'" . $timein . "',";
	$sql .= "'" . $timeout . "',";
	$sql .= "'" . $subject . "',";
	$sql .= "'" . $stid;
    $sql .= "');";
	$result = mysqli_query($db, $sql);
	if($result) {
        return true;
    } else {
        // INSERT failed
        echo 'Insert Error: ' . mysqli_error($db);
        db_disconnect($db);
        exit;
    }
	
}


?>
