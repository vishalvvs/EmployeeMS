<?php

require_once ('process/dbh.php');


?>



<html>
<head>
	<title>View Employee |  Admin Panel | AVN Corporation</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	<header>
		<nav>
			<h1>AVN Corp.</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homered" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<!-- <li><a class="homeblack" href="attendance\attendance.php">Attendance</a></li> -->
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>

		<table>
			<tr>

				<!-- <th align = "center">Emp. ID</th> -->
				<th align = "center">Picture</th>
				<th align = "center">Name</th>
				<th align = "center">Email</th>
				<th align = "center">Birthday</th>
				<th align = "center">Gender</th>
				<th align = "center">Contact</th>
				<!-- <th align = "center">NID</th> -->
				<th align = "center">Address</th>
				<th align = "center">Department</th>
				<th align = "center">Degree</th>
				<!-- <th align = "center">Point</th> -->
				
				
				<th align = "center">Options</th>
			</tr>

			<?php
			 $emps = $db->employee->find([]);
			 

			 foreach($emps as $emp){
				 echo "<tr>";
				//  echo "<td>".$emp->_id."</td>";
				 echo "<td><img src='process/".$emp->pic."' height = 60px width = 60px></td>";
				 echo "<td>".$emp->firstName." ".$emp->lastName."</td>";
				 echo "<td>".$emp->email."</td>";
				 echo "<td>".$emp->birthday."</td>";
				 echo "<td>".$emp->gender."</td>";
				 echo "<td>".$emp->contact."</td>";
				//  echo "<td>".$emp->nid."</td>";
				 echo "<td>".$emp->address."</td>";
				 echo "<td>".$emp->dept."</td>";
				 echo "<td>".$emp->degree."</td>";
				//  echo "<td>".$emp->nid."</td>";
				 echo "<td><a href=\"edit.php?id=$emp->_id\">Edit</a> | <a href=\"delete.php?id=$emp->_id\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
				 echo "</tr>";
			 }

				


			?>

		</table>
		
	
</body>
</html>