<?php

require_once ('process/dbh.php');

?>



<html>
<head>
	<title>Project Status |  Admin Panel | AVN Corporation</title>
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
				<li><a class="homered" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
			
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>

		<table>
			<tr>

				<!-- <th align = "center">Project ID</th> -->
				<th align = "center">NID</th>
				<th align = "center">Project Name</th>
				<th align = "center">Due Date</th>
				<th align = "center">Submission Date</th>
				<th align = "center">Mark</th>
				<th align = "center">Status</th>
				<th align = "center">Option</th>
				
			</tr>

			<?php
			$projs= $db->project->find([]);
			$emps = $db->employee->find([]);

				foreach($projs as $proj) {
					echo "<tr>";
					echo "<td>".$proj->eid."</td>";
					echo "<td>".$proj->pname."</td>";
					echo "<td>".$proj->duedate."</td>";
					echo "<td>".$proj->subdate."</td>";
					echo "<td>".$proj->mark."</td>";
					echo "<td>".$proj->status."</td>";
					echo "<td><a href=\"mark.php?nid=$proj[eid]&pname=$proj[pname]&duedate=$proj[duedate]&subdate=$proj[subdate]\">Mark</a>"; 
				
					echo "</tr>";
				};


			?>

		</table>
		
	
</body>
</html>