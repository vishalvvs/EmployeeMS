<?php

require_once ('dbh.php');

if (isset($_POST["mailuid"]) && isset($_POST["pwd"])){
    $email = $_POST['mailuid'];
    $password = $_POST['pwd'];
    $result = $db->alogin->findOne(array('email'=>$email,'password'=>$password));

    if (!$result){
        echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
    }
    else{
        //echo ("logged in");
	header("Location: ..//aloginwel.php");
    }
}


else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Invalid Email or Password')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}
?>