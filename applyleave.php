<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');

?>

<html>
<head>
	<title>Apply Leave | Employee Panel | AVN Corporation</title>
	<link rel="stylesheet" type="text/css" href="styleapply.css">
</head>
<body bgcolor="#5D6D7E">
	
	<header>
		<nav>
			<h1>AVN Corp.</h1>
			<ul id="navli">
				<!-- <li><a class="homeblack" href="eloginwel.php?id=<//?php echo $id?>"">HOME</a></li> -->
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a class="homeblack" href="empproject.php?id=<?php echo $id?>"">My Projects</a></li>
				<li><a class="homered" href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
				<li><a class="homeblack" href="elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Apply Leave Form</h2>
                    <form action="process/applyleaveprocess.php?id=<?php echo $id?>" method="POST">
										
												<div class="row">
													
												
												<select name="LeaveType">
													<option value="No Options Selected">Leave Category</option>
													<option value="Sick">Sick</option>
													<option value="Outstation">Outstation</option>
													<option value="Casual">Casual</option>
													<option value="Other">Other</option>
													</select><br>
												</div>
												<br>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Reason" name="reason">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                            	<p>Start Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="start" name="start">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                            	<p>End Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="end" name="end">
                                   
                                </div>
                            </div>
                        </div>
                        



                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
		
















	<table>
			<tr>
				<!-- <th align = "center">Emp. ID</th> -->
				<th align = "center">Name</th>
				<th align = "center">Leave Type</th>
				<th align = "center">Start Date</th>
				<th align = "center">End Date</th>
				<th align = "center">Total Days</th>
				<th align = "center">Reason</th>
				<th align = "center">Status</th>
			</tr>


			<?php
			$emps = $db->employee->find([]);
			$leaves = $db->employee_leave->find([]);

			foreach($emps as $emp){
				if ($emp->_id== $id){
					foreach($leaves as $leave){
						if ($emp->nid == $leave->nid){
							$date1 = new DateTime($leave->start);
							$date2 = new DateTime($leave->end);
							$interval = $date2->diff($date1);

							echo "<tr>";
					// echo "<td>".$employee['id']."</td>";
					echo "<td>".$emp['firstName']." ".$emp['lastName']."</td>";
					echo "<td>".$leave['LeaveType']."</td>";
					echo "<td>".$leave['start']."</td>";
					echo "<td>".$leave['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$leave['reason']."</td>";
					echo "<td>".$leave['status']."</td>";
					

						}
					}
				}
			}

			?>


		</table>







</body>
</html>