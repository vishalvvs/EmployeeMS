<?php

require_once ('process/dbh.php');
$emps = $db->employee->find([]);


if(isset($_POST['update'])){

  $id = $_POST['id'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];

  foreach($emps as $emp){
    if($emp["_id"] == $id){
      $res = $emp;
      $db->employee->updateOne(
        ['_id' => $res['_id']],
        ['$set' => ['firstName' => $_POST['firstname'],
        'lastName' => $_POST['lastname'],
        'email' => $_POST['email'], 
        'contact' => $_POST['contact'],
        'address'=> $_POST['address']]]
      );
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Update Successfull');
        window.location.href='myprofile.php?id=$id  ';
        </SCRIPT>");
      
      
    }
  }
}


?>




 <?php

$id = (isset($_GET['id']) ? $_GET['id'] : '');
$emps = $db->employee->find([]);
foreach($emps as $res){
if ($id == $res["_id"]){
  // echo "Found";
  $firstname = $res['firstName'];
  $lastname = $res['lastName'];
  $email = $res['email'];
  $contact = $res['contact'];
  $address = $res['address'];
  $gender = $res['gender'];
  $birthday = $res['birthday'];
  $nid = $res['nid'];
  $dept = $res['dept'];
  $degree = $res['degree'];
  $pic = $res['pic'];
}
}


?>

<html>
<head>
  <title>Update Profile | AVN Corporation</title>
  <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>
<body>
  <header>
    <nav>
      <h1>AVN Corp.</h1>
      <ul id="navli">
        <!-- <li><a class="homeblack" href="eloginwel.php?id=<//?php echo $id?>"">HOME</a></li> -->
        <li><a class="homered" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
        <li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
        <li><a class="homeblack" href="elogin.html">Log Out</a></li>
      </ul>
    </nav>
  </header>
  
  <div class="divider"></div>
  

    <!-- <form id = "registration" action="edit.php" method="POST"> -->
  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Update Employee Info</h2>
                    <form id = "registration" action="myprofileup.php" method="POST">


                    <div class="input-group">
                          <p>First Name</p>
                            <input class="input--style-1" type="text"  name="firstname" value="<?php echo $firstname;?>">
                        </div>

                        <div class="input-group">
                          <p>Last Name</p>
                            <input class="input--style-1" type="text"  name="lastname" value="<?php echo $lastname;?>">
                        </div>

                        <div class="input-group">
                          <p>Email</p>
                            <input class="input--style-1" type="email"  name="email" value="<?php echo $email;?>">
                        </div>
                       
                        
                        <div class="input-group">
                          <p>Contact</p>
                            <input class="input--style-1" type="number" name="contact" value="<?php echo $contact;?>">
                        </div>

                       

                        
                         <div class="input-group">
                          <p>Address</p>
                            <input class="input--style-1" type="text"  name="address" value="<?php echo $address;?>">
                        </div>

                       
                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
                        </div>
                        
                    </form>
                    <br>
                    <button class="btn btn--radius btn--green" onclick="window.location.href = 'changepassemp.php?id=<?php echo $id?>';">Change Password</button>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
