<?php
//including the database connection file
include("process/dbh.php");
$leaves = $db->employee_leave->find([]);
//getting id of the data from url
$nid = $_GET['nid'];
$start = $_GET['start'];
foreach($leaves as $leave){
  if(($leave['nid'] == $nid) and ($leave['start'] ==$start)){
    $db->employee_leave->updateOne(
      ['nid' => $nid],
      ['$set' =>["status"=>'Cancelled']]);
  }
}

header("Location:empleave.php");
?>

