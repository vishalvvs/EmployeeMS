<?php

require_once ('dbh.php');

$pname = $_POST['pname'];
$eid = $_POST['eid'];
$subdate = $_POST['duedate'];

$insertOneResult = $db->project->insertOne([
    'eid' => $eid,
    'pname' => $pname,
    'duedate' => $subdate,
    'status' => 'Due',
    'mark' => "-",
    'subdate' => "-",
]);


if($insertOneResult){
    
    
    header("Location: ..//assignproject.php");
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Assign')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}




?>