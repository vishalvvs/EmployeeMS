<?php

require_once ('process/dbh.php');
$sals = $db->salary->find([]);
?>



<html>
<head>
	<title>Salary Table | AVN Corporation</title>
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
				<li><a class="homered" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<!-- <li><a class="homeblack" href="attendance\attendance.php">Attendance</a></li> -->
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">
		
	</div>
	
	<table>
			<tr>
				<th align = "center">Emp. ID</th>
				<th align = "center">Name</th>
				
				
				<th align = "center">Gross Salary</th>
				<th align = "center">Incentives</th>
				<th align = "center">Total Salary</th>
				
				
			</tr>
			
			<?php

				foreach($sals as $sal) {
					echo "<tr>";
					echo "<td>$sal->nid</td>";
					echo "<td>$sal->name</td>";
					echo "<td>".$sal->base."</td>";
					echo "<td>".$sal->bonus."</td>";
					echo "<td>".$sal->total."</td>";
	
					echo "</tr>";
			 };


			?>
			
			</table>
</body>
</html>