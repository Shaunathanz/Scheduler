<?php  require_once '../scripts/initialize.php';
	$_id = $_GET['id'];
	//$sql = "SELECT * FROM appointment LEFT JOIN student ON appointment.student_id = student.id WHERE appointment.id=$_id";
	$sql = "SELECT * FROM appointment WHERE id=$_id";
				
                if (!$result = $db->query($sql)) {
                    die ('There was an error running query[' . $connection->error . ']');
                }
				//print_r($result->fetch_row());
				
                while($row = $result->fetch_assoc()) {
					//print_r($row);	
				?>
				<div class="appointment-section">
				<div class="row">
					<div class="col-md-6 midwidth text_right"><b>Student Name: </b></div>
					<div class="col-md-6 midwidth text_left"> <span><?php echo $row['student_name']; ?></span></div>
				</div>
				<div class="row">
					<div class="col-md-6 midwidth text_right"><b>Date and Time: </b></div>
					<div class="col-md-6 midwidth text_left"> <span><?php echo $row['date']; ?> - from <?php echo date("h:i a",strtotime($row['time_start'])); ?> to <?php echo date("h:i a",strtotime($row['time_end'])); ?></span></div>
				</div>
				<div class="row">
					<div class="col-md-6 midwidth text_right"><b>Class: </b></div>
					<div class="col-md-6 midwidth text_left"> <span><?php echo $row['subject']; ?></span></div>
				</div>
				<div class="row">
					<div class="col-md-6 midwidth text_right"><b>Assignment: </b></div>
					<div class="col-md-6 midwidth text_left"> <span><?php echo $row['assignment']; ?></span></div>
				
				<div class="row">
					<div class="col-md-6 midwidth text_right"><b>Files: </b></div>
					<div class="col-md-6 midwidth text_left">
					<?php if(!empty($row['file'])) { ?>
					<span>
						<a target="_blank" href="../files/<?php echo $row['file']; ?>">
							<i class="fa icon-file-alt" aria-hidden="true"></i>
						</a></span>
					<?php } ?>	
					</div>

				</div>
				<div class="row">
					<div class="col-md-6 midwidth text_right"><b>Email: </b></div>
					<div class="col-md-6 midwidth text_left"> <span><?php echo $row['student_email']; ?></span></div>
				</div>
				<div class="row">
					<?php if($row['status'] == "Unconfirmed"){ ?>
					<div class="submit_area">
						<div class="sub_group col-md-6" data-value="Confirmed" data-id="<?php echo $_id; ?>">
							<a href="../create-meeting.php?topic=<?php echo $row['subject']; ?>&email=<?php echo $row['student_email']; ?>&start_time=<?php echo $row['date']; ?>&duration="30"" target="_blank" class="success"><i class="icon-ok"></i></span><span class="acpt_sucess">Accept</span></a>
						</div>
						<div class="sub_group col-md-6" data-value="Rejected" data-id="<?php echo $_id; ?>">
							<a href="mailto:<?php echo $row['student_email'];?>"><span class="decline"><i class="icon-remove"></i></span><span class="dec_sucess">Decline</span></a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			
			
					
				<?php	
				}
				
?>

