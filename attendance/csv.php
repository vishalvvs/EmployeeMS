
<?php
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

/* $date = $_GET['dt']; */
$day1 = date_create($_REQUEST['date1']);
$day2 = date_create($_REQUEST['date2']);
$date1 = $day1->format('Y-m-d');
$date2 = $day2->format('Y-m-d');

/* $date1= date("Y-m-d", strtotime($date1));
$date2= date("Y-m-d", strtotime($date2)); */

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Sr_No','ID', 'First Name', 'Last Name', 'Attendance', 'Date'));

// fetch the data
$link = mysqli_connect('localhost', 'root', "");
mysqli_select_db($link, '370project');
	$rows = mysqli_query($link, "SELECT employee_attendance.ID, employee.nid, employee.firstName, employee.lastName, 
				employee_attendance.attend, employee_attendance.date
				FROM employee
				INNER JOIN employee_attendance
				ON employee.nid = employee_attendance.nid
				WHERE date BETWEEN '$date1' and '$date2' ORDER by ID");


// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);
?>