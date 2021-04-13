
<?php

require_once ('process/dbh.php');
$nid = (isset($_GET['nid']) ? $_GET['nid'] : '');
$pname = (isset($_GET['pname']) ? $_GET['pname'] : '');
$duedate = (isset($_GET['duedate']) ? $_GET['duedate'] : '');
$subdate = (isset($_GET['subdate']) ? $_GET['subdate'] : '');

$emps = $db->employee->find([]);
$projs = $db->project->find([]);

if(isset($_POST['update'])){
  $mark = $_POST['mark'];
foreach($projs as $proj){
  if(($proj->eid == $nid) and ($proj->pname == $pname) ){
    $db->project->updateOne(
      ['eid' => $nid],
      ['$set' => ['mark' =>$mark]]
    );
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Update Successfull');
    window.location.href='assignproject.php?nid=$nid';
    </SCRIPT>");
  }
}
}

?>




<?php


?>

<html>
<head>
  <title>Project Mark | SYP_234 Corporation</title>
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
        <li><a class="homeblack" href="aloginwel.php">HOME</a></li>
        <li><a class="homeblack" href="addemp.php">Add Employee</a></li>
        <li><a class="homeblack" href="viewemp.php">View Employee</a></li>
        <li><a class="homeblack" href="assign.php">Assign Project</a></li>
        <li><a class="homered" href="assignproject.php">Project Status</a></li>
        <li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
        <li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
        <li><a class="homeblack" href="alogin.html">Log Out</a></li>
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
                    <h2 class="title">Project Mark</h2>
                    <!-- <form id = "registration" action="mark.php" method="POST"> -->
                    <form id = "registration"  method="POST">



                        <div class="input-group">
                          <p>Project Name</p>
                            <input class="input--style-1" type="text"  name="pname" value="<?php echo $pname;?>" readonly>
                        </div>
                       
                        
                        <div class="input-group">
                          <p>Employee NID</p>
                            <input class="input--style-1" type="text" name="nid" value=" <?php echo $nid;?>" readonly>
                        </div>

                       


                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Due Date</p>
                                     <input class="input--style-1" type="text" name="duedate" value="<?php echo $duedate;?>" readonly>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                  <p>Submission Date</p>
                                    <input class="input--style-1" type="text"  name="subdate" value="<?php echo $subdate;?>" readonly>
                                </div>
                            </div>
                        </div>

<!-- 
                        <div class="input-group">
                          <p>Assign Mark</p>
                            <input class="input--style-1" type="text"  name="mark" value="<?php echo $mark;?>">
                        </div> -->

                        <div class="input-group">
                          <p>Assign Mark</p>
                            <input class="input--style-1" type="text"  name="mark" value="">
                        </div>

                       
                        <input type="hidden" name="eid" id="textField" value="<?php echo $id;?>" required="required">
                        <input type="hidden" name="pid" id="textField" value="<?php echo $pid;?>" required="required">
                         <input type="hidden" name="points" id="textField" value="<?php echo $points;?>" required="required">
                        <input type="hidden" name="base" id="textField" value="<?php echo $base;?>" required="required">
                        <input type="hidden" name="bonus" id="textField" value="<?php echo $bonus;?>" required="required">
                        <input type="hidden" name="total" id="textField" value="<?php echo $total;?>" required="required">
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Assign Mark</button>
                        </div>
                        
                    </form>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>


</body>
</html>
