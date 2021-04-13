<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$emps = $db->employee->find([]);

  $projs = $db->project->find([]);
?>



<html>
<head>
	<title>Employee Panel | AVN Corporation</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>AVN Corp.</h1>
			<ul id="navli">
				<!-- <li><a class="homeblack" href="eloginwel.php?id=<//?php echo $id?>"">HOME</a></li> -->
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a class="homered" href="empproject.php?id=<?php echo $id?>"">My Projects</a></li>
				<li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
				<li><a class="homeblack" href="elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">


		<table>
			<tr>

				<!-- <th align = "center">Project ID</th> -->
				<th align = "center">Project Name</th>
				<th align = "center">Due Date</th>
				<th align = "center">Sub Date</th>
				<th align = "center">Mark</th>
				<th align = "center">Status</th>
				<th align = "center">Option</th>
			</tr>

			<?php
				foreach ($emps as $emp){
					if($emp->_id == $id){

						foreach ($projs as $pro){
							if($pro->eid == $emp->nid){
								echo "<tr>";
								// echo "<td>".$pro['pid']."</td>";
								echo "<td>".$pro->pname."</td>";
								echo "<td>".$pro->duedate."</td>";
								echo "<td>".$pro->subdate."</td>";
								echo "<td>".$pro->mark."</td>";
								echo "<td>".$pro->status."</td>";
								// echo "<td><a href=\"psubmit.php?pid=$pro[eid]&id=$emp[_id]\">Submit</a>";
								echo "<td><a href=\"psubmit.php?pname=$pro[pname]&id=$emp[_id]\">Submit</a>";
							}
					
						}
	
					}
				
				}


			?>

		</table>

		</body>
</html>