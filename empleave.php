<?php

require_once ('process/dbh.php');
$leaves = $db->employee_leave->find([]);
$emps = $db->employee->find([]);



?>



<html>
<head>
	<title>Employee Leave | Admin Panel | SYP_234 Corporation</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>AVN Corp.</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>
				
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homered" href="empleave.php">Employee Leave</a></li>
				<!-- <li><a class="homeblack" href="attendance\attendance.php">Attendance</a></li> -->
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">
		<table>
			<tr>
				<th>Emp. ID</th>
				<!-- <th>Token</th> -->
				<th>Name</th>
				<th>Leave Type</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Total Days</th>
				<th>Reason</th>
				<th>Status</th>
				<th>Options</th>
			</tr>

			<?php

			foreach($leaves as $leave){
				$emp = $db->employee->findOne(["nid" => $leave['nid']]);
				// echo $emp["firstName"];
				$date1 = new DateTime($leave['start']);
				$date2 = new DateTime($leave['end']);
				$interval = $date2->diff($date1);

				echo "<tr>";
					echo "<td>".$leave['nid']."</td>";
					// echo "<td>".$employee['token']."</td>";
					echo "<td>".$emp['firstName']." ".$emp['lastName']."</td>";
					echo "<td>".$leave['LeaveType']."</td>";
					echo "<td>".$leave['start']."</td>";
					echo "<td>".$leave['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$leave['reason']."</td>";
					echo "<td>".$leave['status']."</td>";
					echo "<td><a href=\"approve.php?nid=$leave[nid]&start=$leave[start]\"  onClick=\"return confirm('Are you sure you want to Approve the request?')\">Approve</a> | <a href=\"cancel.php?nid=$leave[nid]&start=$leave[start]\" onClick=\"return confirm('Are you sure you want to Cancel the request?')\">Cancel</a></td>";
			}
			// echo "<td><a href=\"approve.php?id=$employee[id]&token=$employee[token]\"  onClick=\"return confirm('Are you sure you want to Approve the request?')\">Approve</a> | <a href=\"cancel.php?id=$employee[id]&token=$employee[token]\" onClick=\"return confirm('Are you sure you want to Canel the request?')\">Cancel</a></td>";


			?>

		</table>
		
	</div>
</body>
</html>