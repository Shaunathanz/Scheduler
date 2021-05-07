<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../styles/style.css?<?php echo time();?>" media="screen" />
    <link rel="stylesheet" type="text/css" href="../assets/fullcalendar/main.css?<?php echo time();?>" media="screen" />
    <script src="../scripts/script.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="../assets/fullcalendar/main.js"></script>
	
	
	<!--<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>-->
	
	
    <meta charset="utf-8"/>
    <title id="tab_name">Tutor</title>
</head>

<body>
    <!--Nav Bar + Logo-->
    <?php session_start();?>
    <?php if($_SESSION["activeUser"] == array()) {echo "You do not have permission to access this page!";header("Refresh: 1.5; URL=../index.php");exit;}?>
    <?php require '../shared/logo.php' ; ?>
    <?php require '../shared/tutor-nav.php' ; ?>

    <!--Page Contents-->

    <div class="content-item">
		<div class="disble_date_blk">	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Disable Dates</button></div>
		<!-- Modal -->
		<?php
		$_id = (isset($_SESSION['activeUser']['id'])) ? $_SESSION['activeUser']['id'] : "";
			$sql = "SELECT * FROM Tutor WHERE id=$_id";
				
                if (!$result = $db->query($sql)) {
                    die ('There was an error running query[' . $connection->error . ']');
                }
				//print_r($result->fetch_row());
                while($row = $result->fetch_assoc()) {
					$disableDates = $row['disable_dates'];
				}
		?>				
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Disable dates</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<div class="form-group">
					<label for="email">Disable specific dates:</label>
					<input type="hidden" id="tutorid" name="tutorid" value="<?= $_id ?>" />
					<textarea class="form-control" name="disable_dates" id="disable_dates"><?= $disableDates ?></textarea>
					<small>Enter days in following format YYYY-MM-DD e.g. 2020-03-15. Separate multiple dates with comma.</small>
				  </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary disable_savedate">Save changes</button>
			  </div>
			</div>
		  </div>
		</div>
        <div id="mYcalendar"></div>
        
    </div>

    

    <!--All popups go in this div-->
    <div id="popupBG">
        <!--Each popup is of class "popup" and needs a unique id to provide as an argument to the showPopup() function-->
        <div class="popup" id="calendar">
            <!--<h1>Current Tutor Calendar</h1>
            <div>
			    <input type="button" value="Block Calendar" class="homebutton" id="btnHome" onClick="window.location = ''" />
            </div>
			<br></br>-->
			<div class="clearfix"></div>
            <div style="margin:auto">
				<div id="mYcalendar"></div>
            </div>
            <button class="popupBtn" type="button" onClick="hidePopup();">Close</button>
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
							<a  href="mailto:"><span class="success"><i class="icon-ok"></i></span><span class="acpt_sucess">Accept</span></a>
						</div>
						<div class="sub_group">
							<a href="mailto:"><span class="decline"><i class="icon-remove"></i></span><span class="dec_sucess">Decline</span></a>
						</div>
					</div>
				</div>
			</div>
            <button class="popupBtn" type="button" onClick="hidePopup();">Close</button>
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
			$_id = (isset($_SESSION['activeUser']['id'])) ? $_SESSION['activeUser']['id'] : "";
			$sql = "SELECT * FROM Tutor WHERE id=$_id";
				
                if (!$result = $db->query($sql)) {
                    die ('There was an error running query[' . $connection->error . ']');
                }
				//print_r($result->fetch_row());
                while($row = $result->fetch_assoc()) {
					/*$firstname = (isset($row['fname'])) ? $row['fname'] : "";
					$lastname = (isset($row['lname'])) ? $row['lname'] : "";
					$email = (isset($row['email'])) ? $row['email'] : "";
					$comment = (isset($row['comment'])) ? $row['comment'] : "";
					$gender = (isset($row['gender'])) ? $row['gender'] : "";
					$sub_knowledge = (isset($row['sub_knowledge'])) ? $row['sub_knowledge'] : "";
					$degree = (isset($row['degree'])) ? $row['degree'] : "";
					$about = (isset($row['about'])) ? $row['about'] : "";*/
					$phone = (isset($row['phone'])) ? $row['phone'] : "";
					$img = (isset($row['img'])) ? $row['img'] : "";
					$disable_dates = (isset($row['disable_dates'])) ? $row['disable_dates'] : "";
					if(!empty($img)){
						$_imgurl="../images/".$img;
					}else{
						$_imgurl="../images/blankAvatar.jpg";
					}
                }
				
				echo "<script> var evt = [] ;";
				$sql = "SELECT * FROM Appointment WHERE tutor_id=$_id";
				
                if (!$result = $db->query($sql)) {
                    die ('There was an error running query[' . $connection->error . ']');
                }
				//print_r($result->fetch_row());
				
                while($row = $result->fetch_assoc()) {
					echo 'var obj = {};';
					$subject = $row['subject'];
					$date = $row['date'];
					$startTime = $row['time_start'];
					 $endTime = $row['time_end'];
					 $id = $row['id'];
					 $status = $row['status'];
					 /*$startTime = "09:00:00";
					 $endTime = "12:00:00";
					 $date = "2021-04-01";*/
					 if($status == "Confirmed"){
						 echo 'obj["color"]="green";';
					 }else if($status == "Unconfirmed"){
						  echo 'obj["color"]="yellow";';
					 }else{
						 echo 'obj["color"]="red";';
					 }
					 $endRecur = date('Y-m-d', strtotime($date . ' +1 day'));
					/*echo 'obj["title"]="'.$subject.'";obj["data_id"]="3";obj["data_location"]="Online";obj["data_description"]="Sample Only";obj["daysOfWeek"]="1,4";obj["startRecur"]="2021-04-01";
		 							obj["endRecur"]="2021-04-30";obj["startTime"]="09:00:00";obj["endTime"]="12:00:00";evt.push(obj);';*/
					/*echo 'obj["title"]="'.$subject.'";obj["startRecur"]="2021-04-01";
		 							obj["endRecur"]="2021-04-31";obj["startTime"]="09:00:00";obj["endTime"]="12:00:00";evt.push(obj);';	*/	
											
					echo 'obj["title"]="'.$subject.'";obj["startRecur"]="'.$date.'";
		 							obj["endRecur"]="'.$endRecur.'";obj["startTime"]="'.$startTime.'";obj["endTime"]="'.$endTime.'";obj["data_id"]="'.$id.'";evt.push(obj);';				
                }
				$disableDatesArrays = explode(",",$disable_dates);
				foreach($disableDatesArrays as $disableDatesArray){
					echo 'var obj = {};';
					$mydate = $disableDatesArray;
					echo 'obj["title"]="";obj["start"]="'.$mydate.'";obj["end"]="'.$mydate.'";obj["class"]="blockClass";evt.push(obj);';
				}
				
				echo "</script>";
				/*$sql = "SELECT * FROM appointment";
				$result = $db->query($sql);
				while($row = $result->fetch_assoc()) {
					print_r($row);				
                }*/
				
            ?>
            <h2>View / Edit Info</h2>
            <form action="../scripts/update_profile.php" method="POST" enctype="multipart/form-data">
                <div class="profile_pic">	
                    <div class="profile_pic_block">
                        <img height="200px" style="max-width:237px" width="auto" src="<?php echo $_imgurl; ?>">                        
                        <!--<a class="edit_icon" href="tutor-profile.php"><i class="icon-pencil"></i> </a>-->
						<input class="" name="profileImage" type="file"/>
                    </div>	
                </div>
                <p><span class="error">* required field</span></p>	
                First Name <input type="text" name="FullName" value="<?php echo $_SESSION["activeUser"]["name"];?>">
                <span class="error">* <?php echo $firstnameErr;?></span>
                <br><br>
                Email: <input type="text" name="email" value="<?php echo $_SESSION["activeUser"]["email"];?>">
                <span class="error">* <?php echo $emailErr;?></span>
                <!--Need password field-->
                
                <!--<br><br>
				Phone: <input type="text" name="phone" value="<?php echo $phone;?>">-->
                
                <br><br>
				Subjects :
				<select id="subject" name="subject" multiple >  
	   
				  <option value="Mathematics">Mathematics</option>  
				  <option value="Science">Science</option>  
				  <option value="Handwriting">Handwriting</option>  
				  <option value="Journalism">Journalism</option>  
				</select>
				<br><br>
                <!--<input type="submit" name="submit" value="Submit"> -->
                <button type="button" onClick="hidePopup();">Close</button>
                <input type="submit" value="Update" id="updateBtn"> 
            </form> 
        </div>
    </div>
	<div class="modal fade" id="uni_modal" role="dialog">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-primary" id="submit" onclick="$('#uni_modal form').submit()">Save</button>-->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
<style>
/*.fc-view-harness.fc-view-harness-active{
	height: 683.704px !important;
}

.fc-col-header{
	width: 921px !important;
}
.fc-daygrid-body.fc-daygrid-body-balanced{
	width: 921px !important;
}
.fc-scrollgrid-sync-table{
width: 921px !important; 
height: 658px !important;
}*/
.fc-daygrid.fc-dayGridMonth-view.fc-view {
    z-index: 0;
}

.fc-header-toolbar.fc-toolbar.fc-toolbar-ltr {
    z-index: 0;
}
.popup{
	text-align:center;
}
</style>	
<script>
/*var evt = [] ;
var obj = {};*/


		 							/*obj['title']="Class 101 (M & Th)";
		 							obj['data_id']="3";
		 							obj['data_location']="Online";
		 							obj['data_description']="Sample Only";
		 							if(1 == 1){
		 							obj['daysOfWeek']="1,4";
		 							obj['startRecur']="2021-04-01";
		 							obj['endRecur']="2021-04-30";
									obj['startTime']="09:00:00";
		 							obj['endTime']="12:00:00";
		 							}else{

		 							obj['start']="0000-00-00"+"T"+"09:00:00";
		 							obj['end']="0000-00-00"+"T"+"12:00:00";
		 							}
		 							
		 							evt.push(obj)
									console.log(evt);*/
									
									
var calendarEl = document.getElementById('mYcalendar');
    var calendar;
	document.addEventListener('DOMContentLoaded', function() {

        calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
          },
          initialDate: '<?php echo date('Y-m-d') ?>',
          weekNumbers: true,
          navLinks: true, // can click day/week names to navigate views
          editable: false,
          selectable: true,
          nowIndicator: true,
          dayMaxEvents: true, // allow "more" link when too many events
          // showNonCurrentDates: false,
          //events: [],
		  events: evt,
		  eventRender: function(event, eventElement) {
			  var mydata =  event.event.extendedProps;
			  alert("jjj");
			  if(mydata.data_id){
					alert("jjj");
					//uni_modal('Your Appointment','view_schedule.php?id='+data.data_id,'mid-large');
				}
			 /*if (event.title == "b") {
				  console.log("abc");
				  eventElement.find("a.fc-content").css('background-color', 'green');
				  eventElement.find("a.fc-daygrid-day-number").addClass('disabled');
				}*/
		  },
		  eventClick: function(e,el) {
				var data =  e.event.extendedProps;		
				if(data.data_id){
					uni_modal('Your Appointment','view_schedule.php?id='+data.data_id,'mid-large');
				}	

			}
        });
        calendar.render();
  });
  
  
  
   window.uni_modal = function($title = '' , $url='',$size=""){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                if($size != ''){
                    $('#uni_modal .modal-dialog').addClass($size)
                }else{
                    $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                }
                $('#uni_modal').modal({
                  show:true,
                  backdrop:'static',
                  keyboard:false,
                  focus:true
                })
                end_load()
            }
        }
    })
}


window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
}
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }
$(document).on("click",".sub_group",function() {
		var value = $(this).attr("data-value");
		var id = $(this).attr("data-id");
		$url = 'schedule-update.php?id='+id+'&status='+value;
       $.ajax({
		   url:$url,
			error:err=>{
            console.log()
            //alert("An error occured")
			},success:function(resp){
				window.location.reload();
			}
		})   
		   
}); 
$(document).on("click",".disable_savedate",function() {
		var disable_dates = $("#disable_dates").val();
		var tutorid = $("#tutorid").val();
		var myKeyVals = { tutorid : tutorid, disable_dates : disable_dates };
		$url = 'disable-dates.php';
		$.ajax({
			  type: 'POST',
			  url: $url,
			  data: myKeyVals,
			  dataType: "text",
			  success: function(resultData) { 
				alert("Save Complete"); 
				window.location.reload();
			  }
		});
         
		   
});

</script>	
</body>
</html>