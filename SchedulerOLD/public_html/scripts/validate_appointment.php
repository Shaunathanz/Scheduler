<?php
    session_start();
    $date = date_create($_POST['day'])->format('Y-m-d');
    $timein = intval(substr($_POST['timein'], 0, 2))*100;
    $timeout = intval(substr($_POST['timeout'], 0, 2))*100;
    $tutor_id = $_POST['teacher'];
    $subject = $_SESSION['selectedSubj'];
    $about = $_POST['about-assignment'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $_SESSION["date"] = $date;
    $_SESSION["timein"] = $timein;
    $_SESSION["timeout"] = $timeout;
    $_SESSION["teacher"] = $tutor_id;
    $_SESSION["subject"] = $subject;
    $_SESSION["about-assignment"] = $about;
    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;

    echo "Date: ".$date."<br>Time in: ".$timein."<br>Time out: ".$timeout."<br>Tutor id: ".$tutor_id."<br>Subject: ".$subject."<br>";

    require_once "initialize.php";

    /* if(!isset($_SESSION["valid_info"])) {
        $_SESSION["valid_info"] = false;
    } */ //might use if I need a form that inserts data to this page

    //CHECK FOR TIME CONFLICTS
    $conflict = "false";
    $unavailableTimes = getUnavailableTimes($tutor_id, $date);
    echo "tutor_id arg = ".$tutor_id."<br>date arg = ".$date."<br>isset = ".(isset($unavailableTimes) ? "T":"F")."<br>";

    if(isset($unavailableTimes)) { //there are times that aren't available
        //CHECK FOR TIME CONFLICTS
        $conflict = "false";
        foreach($unavailableTimes as $start => $end) {
            echo "Existing appt start time: " . $start . "<br>Existing appt end time: " . $end . "<br>";
            echo "Appt start time compared: " . $start . "<br>Appt end time compared: " . $end . "<br>";

            if(($timein >= $start) && ($timein <= $end)) { //unavailable time
                echo "\$conflict = true (if case)";
                $conflict = "true";
                break;
            } else if($timeout >= $start && $timeout <= $end) {
                echo "\$conflict = true (else if case)";
                $conflict = "true";
                break;
            }
        }
        echo "<br>Conflict = " . $conflict . "<br>";
        //exit("<br>Done with test run");
    } //else there are no unavailable times

    //VALIDATE TIMES
    echo "timein = " .$timein ."<br>";
    echo "timeout = " .$timeout ."<br>";
    echo "date = " .$date ."<br>";
    echo "conflict = " .($conflict ? "T":"F") ."<br>";
    if($timein == $timeout || $timein > $timeout || $conflict == "true") {
        //invalid times, provide start timefields to correct
        echo "Time conflict = true<br>";
        //DISPLAY SPECIFIC ERROR MESSAGE
        if($timein == $timeout) {
            echo "Appointment start and end times cannot match!<br><br>";
        } else if($timein > $timeout) {
            echo "Appointment start time cannot be earlier than end time!<br><br>";
        } else {
            echo "There is a scheduling conflict with your desired appointment time<br><br>";
        }

        echo 
            "<form method='post' action=\"insert-appt.php\">
            Available start times
            <select name='timein'>\n";
        
        //CALCULATE AVAILABLE START TIMES
        $hour = 700; //earliest possible appt start time
        while($hour < 1800) {
            $unavailable = "false";
            echo "entered while loop<br>";
            foreach($unavailableTimes as $start => $end) {
                echo "entered foreach loop<br>";
                echo "\$hour = " . $hour . "<br>\$start = " . $start . "<br>\$end = " . $end . "<br>";
                if($hour >= $start && $hour < $end) { //output unavailable time
                    $unavailable = "true";
                    echo "unavailable was true<br>";
                    break;
                }
            }
            if($unavailable == "true") { //current hour not available
                echo "<option value=\"" . $hour . "\" disabled>" . formatTimeStr($hour) . "</option>\n";
            } else { //current hour available
                echo "<option value=\"" . $hour . "\">" . formatTimeStr($hour) . "</option>\n";
            }
            $hour += 100;
        }
        echo "</select>\n<br>";

        //CALCULATE AVAILABLE END TIMES
        echo 
            "Available end times
            <select name='timeout'>\n";
        $hour = 800; //earliest possible appt end time
        while($hour <= 1800) {
            $unavailable = "false";
            echo "entered while loop<br>";
            foreach($unavailableTimes as $start => $end) {
                echo "entered foreach loop<br>";
                echo "\$hour = " . $hour . "<br>\$start = " . $start . "<br>\$end = " . $end . "<br>";
                if($hour > $start && $hour <= $end) { //output unavailable time
                    $unavailable = "true";
                    echo "unavailable was true<br>";
                    break;
                }
            }
            if($unavailable == "true") { //current hour not available
                echo "<option value=\"" . $hour . "\" disabled>" . formatTimeStr($hour) . "</option>\n";
            } else { //current hour available
                echo "<option value=\"" . $hour . "\">" . formatTimeStr($hour) . "</option>\n";
            }
            $hour += 100;
        }
        echo 
            "</select><br>\n
            <button>Submit</button>\n
            </form>";


    } else { //NO TIME CONFLICT
        //CHECK FOR DUPLICATE APPOINTMENT


        //perform scheduling

        //create student before creating appointment

        $data = array(
            "teacher" => $tutor_id,
            "timein" => $_POST['timein'],
            "timeout" => $_POST['timeout'],
            "subject" => $subject,
            "student" => $student,
            "date" => $date
        );

        if(insert_appointment($data)) {
            echo "Yay appt scheduled successfully!";
        }
        header("Refresh: 2; URL=../pages/student-home.php"); //done
    }
?>