<?php require_once '../scripts/initialize.php'; ?>
<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

<div id="nav">
    <ul id="tutor-nav">
        <!--<li onclick="showPopup('calendar');">[TEMP] Calendar</li> <!-- -->
		<li ><a href="tutor-calender.php">[TEMP] Calendar</a></li>
        <!--<li onclick="showPopup('appointment');">[TEMP] Appointments</li> <!--These will be useless soon -->
		<li ><a href="tutor-home.php">[TEMP] Appointments</a></li>
        <li onclick="showPopup('availability');">[To Do] Availability</li>        
        <li onclick="showPopup('profile');">Profile</li>
        <li onclick="goToPage('logout');">Logout</li>
    </ul>
</div>