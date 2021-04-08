<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../styles/style.css?<?php echo time();?>" media="screen" />
    <script src="../scripts/script.js"></script>
    <meta charset="utf-8"/>
    <title id="tab_name">Appointments</title>
</head>
<style>
	.content-item
	{
			overflow: auto;
			padding-bottom: 20px;
	}
</style>

<body>
    <!--Nav Bar + Logo-->
    <?php require '../shared/logo.php' ; ?>
    <?php require '../shared/tutor-nav.php' ; ?>

    <!--Page Contents-->
    <div class="content-item">
        <div class="content-area">
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
    </div>
</body>
</html>

