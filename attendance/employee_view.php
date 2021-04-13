<?php 
	include "inc/header.php"; 
	include "classes/Employee.php"; 
	$stu = new Employee();
?>
<?php 
	// error_reporting(0);
	$dt = $_GET['dt'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		 $attend = $_POST['attend'];
		 $attattend = $stu->updateAttendance($dt, $attend);
	}
?>
	<div class="container">
<?php 
	if (isset($attattend)) {
		echo $attattend;
	}
?>
<div class='alert alert-danger' style="display: none;"><strong>Error !</strong> Employee ID Missing !</div>
		<div class="card">
			<div class="card-header">
				<h2>
					<a class="btn btn-info float-right" href="date_view.php">Back</a>
				</h2>
			</div>

			<div class="card-body">
				<div class="card bg-light text-center mb-3">
					<h4 class="m-0 py-3"><strong>Date</strong>: <?php echo $dt; ?></h4>
				</div>
				<form action="" method="post">
					<table class="table table-striped">
						<tr>
							<th width="25%">S/L</th>
							<th width="25%">First Name</th>
							<th width="25%">Last Name</th>
							<th width="25%">Employee ID</th>
							<th width="25%">Attendance</th>
						</tr>
<?php 

	$getemployee = $stu->getAllData($dt);
	if ($getemployee) {
		$i = 0;
		while ($value = $getemployee->fetch_assoc()) {
			$i++;
?>
<tr>
	<td><?php echo $i; ?></td>
	<td><?php echo $value['firstName']; ?></td>
	<td><?php echo $value['lastName']; ?></td>
	<td><?php echo $value['nid']; ?></td>
	<td>
		<input type="radio" name="attend[<?php echo $value['nid']; ?>]" value="P" <?php if($value['attend'] == "P") {echo "checked";} ?>>P
		<input type="radio" name="attend[<?php echo $value['nid']; ?>]" value="A" <?php if($value['attend'] == "A") {echo "checked";} ?>>A
	</td>
</tr>
<?php } } ?>

						<tr>
							<td colspan="4" class="text-center">
								<input type="submit" name="submit" class="btn btn-primary px-5" value="Update">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
<?php?>