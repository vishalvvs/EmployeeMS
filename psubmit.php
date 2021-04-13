<?php

require_once ('process/dbh.php');
//$id = (isset($_GET['id']) ? $_GET['id'] : '');
$pname = $_GET['pname'];
$id = $_GET['id'];
$date = date('Y-m-d');
//echo "$date";

$db->project->updateOne(
  // ['eid' => $pid],
  ['pname' => $pname],
  ['$set' => ['subdate' => $date, 'status' => 'Submitted']]
);

header("Location: empproject.php?id=$id");
?>