<?php
  //require_once "../pdo.php";


 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Faculty Allotment </title>
</head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../images/logo0.png" type="image/x-icon" >
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
<style type="text/css">
form {
    margin: 220px;
    margin-top:30px; 
    padding: 20px;
    border-color: red;
    border: 2px; 
    border-style: groove; 
  }
</style>
<body>
  <h1 class="jumbotron">Add Faculty Allotment</h1>
   <form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="hallno">Hall no:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="hallno" name="hallno" placeholder="ex:MB001" required>
    </div>
  </div>
  <form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="date">Date :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" required>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="time">Time</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="time" name="time" placeholder="HH:MM:SS ">
    </div>
  </div>
  <form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="fid">FID :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fid" name="fid" placeholder="FID" required>
    </div>
  </div>
  <form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="fname">Fname :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="date" name="date" placeholder="First Name" required>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="subcode">Subcode</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="subcode" name="subcode" placeholder="">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
  
</body>
