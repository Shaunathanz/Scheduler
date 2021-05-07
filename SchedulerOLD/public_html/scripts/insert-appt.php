<?php
    require_once("initialize.php");
    $date = $_SESSION['date'];
    $timein = intval(substr($_POST['timein'], 0, 2))*100;
    $timeout = intval(substr($_POST['timeout'], 0, 2))*100;
    $tutor_id = $_SESSION['teacher'];
    $subject = $_SESSION['subject'];
    $about = $_SESSION['about'];
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    echo $tutor_id;

    $data = array(
        "teacher" => $tutor_id,
        "timein" => $timein,
        "timeout" => $timeout,
        "subject" => $subject,
        "student" => 3, //stid
        "date" => $date
    );

    if(insert_appointment($data)) {
        echo "Appointment scheduled successfully!";
    } else {
        exit();
    }
    header("Refresh: 2; URL=../pages/student-home.php"); //done
?>