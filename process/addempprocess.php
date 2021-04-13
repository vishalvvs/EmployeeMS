<?php

require_once ('dbh.php');
// $eid = $_POST['eid'];
$firstname = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$nid = $_POST['nid'];
$dept = $_POST['dept'];
$degree = $_POST['degree'];
$salary = $_POST['salary'];
$birthday =$_POST['birthday'];
//echo "$birthday";
$files = $_FILES['file'];
$filename = $files['name'];
$filrerror = $files['error'];
$filetemp = $files['tmp_name'];
$fileext = explode('.', $filename);
$filecheck = strtolower(end($fileext));
$fileextstored = array('png' , 'jpg' , 'jpeg');





if(in_array($filecheck, $fileextstored)){

    $destinationfile = 'images/'.$filename;
    move_uploaded_file($filetemp, $destinationfile);

    $insertemp = $db->employee->insertOne([
        // 'eid' => $eid,
        'firstName' =>$firstname,
        'lastName' =>$lastName,
        'email' =>$email,
        'password' => "welcome",
        'birthday' => $birthday,
        'gender' => $gender,
        'contact' =>$contact,
        'nid' => $nid,
        'address' => $address,
        'dept' =>$dept,
        'degree' => $degree,
        'pic' =>$destinationfile,
    
    ]);
    

   

if($insertemp){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='..//viewemp.php';
    </SCRIPT>");
    
}

else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Failed to Registere')
    window.location.href='javascript:history.go(-1)';
    </SCRIPT>");
}

}

else{

    $insertemp = $db->employee->insertOne([
        'firstName' =>$firstname,
        'lastName' =>$lastName,
        'email' =>$email,
        'password' => "welcome",
        'birthday' => $birthday,
        'gender' => $gender,
        'contact' =>$contact,
        'nid' => $nid,
        'address' => $address,
        'dept' =>$dept,
        'degree' => $degree,
       
        'pic' =>$destinationfile ,
    
    ]);



if($insertemp){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Registered')
    window.location.href='..//viewemp.php';
    </SCRIPT>");
    
}

}






?>