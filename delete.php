<?php
//including the database connection file
include("process/dbh.php");


$db->employee->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

header("Location:viewemp.php");
?>

