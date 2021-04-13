<?php 
	include "inc/header.php"; 
	include "classes/Employee.php"; 
	$stu = new Employee();
?>

	<div class="container">
<?php 
	if (isset($insertattend)) {
		echo $insertattend;
	}
?>
		<div class="card">
			<div class="card-header">
				<h2>
					<a class="btn btn-info float-right" href="attendance.php">Take Attendance</a>
					
				</h2>	
			</div>
		<div class="card">
			<div class="card-header">
				<h2>
					<a class="btn btn-info float-right" href="downloadPeriod.php">Download</a>
					
				</h2>	
			</div>

			<div class="card-body">
				<form action="" method="post">
					<table class="table table-striped">
						<tr>
							<th width="30%">S/L</th>
							<th width="50%">Attendance Date</th>
							<th width="30%">View</th>
						</tr>
<?php 
	$getdate = $stu->getDateList();
	if ($getdate) {
		$i = 0;
		while ($value = $getdate->fetch_assoc()) {
			$i++;
?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $value['date']; ?></td>
							<td>
							<a class="btn btn-primary" href="employee_view.php?dt=<?php echo $value['date']; ?>">View</a>
							</td
						</tr>
<?php } } ?>
					</table>
				</form>
			</div>
		</div>
	</div>
<?php?>