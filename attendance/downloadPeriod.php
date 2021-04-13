<?php 
	include "inc/header.php"; 
?>
<html>
<head>
	<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="main.css" rel="stylesheet" media="all">
</head>
<body>
<h2>
	<a class="btn btn--radius btn--green float-right" href="date_view.php">Back</a>
</h2>
<form method="POST" action="csv.php" onsubmit="return validateSearch();">
<h1>Download</h1>
<h3>Start Date</h3>
<input type="date" name="date1" value=""  placeholder="YY/MM/DD" id="startDate">
<h3>End Date</h3>
<input type="date" name="date2" value=""  placeholder="YY/MM/DD" id="endDate">
<input type="submit" value="Download" name="sub2" class='btn btn--radius btn--green'>
</body> 
</html>