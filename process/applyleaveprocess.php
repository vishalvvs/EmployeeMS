<?php
//including the database connection file
require_once ('dbh.php');
$emps = $db->employee->find([]);


//getting id of the data from url
$id = $_GET['id'];
//echo $id;
$type = $_POST['LeaveType'];
$reason = $_POST['reason'];

$start = $_POST['start'];
//echo "$reason";
$end = $_POST['end'];
foreach ($emps as $emp){
  if ($emp->_id == $id){
    $db->employee_leave->insertOne([
      'nid' => $emp->nid,
      'LeaveType' =>$type,
      'start' => $start,
      'end' =>$end,
      'reason' => $reason,
      'status' => "Pending"
    ]);
  }
}

header("Location:..//myprofile.php?id=$id");
?>

