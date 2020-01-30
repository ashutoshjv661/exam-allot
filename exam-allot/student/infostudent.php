<?php
session_start();
  $pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bh07' );
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
  $usn=$_SESSION['name'];
  $stmt = $pdo->query("select * from exam_allot.student where usn='$usn'");

 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Info Student </title>
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
  <h1 class="jumbotron">Get Student Info</h1>
  <p style="color:red; margin-left: 10px;">ex. if name=xyz Usn=2kl16cs016 Then Password= x16cs016</p>
 <!-- <form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="usn">USN</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usn" name="usn" placeholder="" required>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="fname">First NAME</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fname" name="fname" placeholder="">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="mname">Middle Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="mname" name="mname" placeholder="">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="lname">Last Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lname" name="lname" placeholder="">
    </div>
  </div>    
   <div class="form-group">
    <label class="control-label col-sm-2" for="sem">Semester</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="sem" name="sem" placeholder="ex: 1(for 1st sem)">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="email" placeholder="example@domain.com" required>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="phno">Ph.no</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="phno" name="phno" placeholder="Without International Code" required>
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
-->
<div class="container-fluid">
  <div class="panel panel-default">
    <div class="table-responsive" >
  <?php 
  echo ('<table class="table table-hover table-bordered table-striped"><tbody>'); 
    echo "<tr><td>";
    echo ("USN");
    echo "</td><td>";
    echo ("Fname");
    echo "</td><td>";
    echo ("Mname");
    echo "</td><td>";
    echo ("Lname");
    echo "</td><td>";
    echo ("Sem");
    echo "</td><td>";
    echo ("Email");
    echo "</td><td>";
    echo ("Phno");
    echo "</td></tr>";

  while($row = $stmt -> fetch(PDO::FETCH_ASSOC))
  {
    echo "<tr><td>";
    echo ($row['usn']);
    echo "</td><td>";
    echo ($row['fname']);
    echo "</td><td>";
    echo ($row['mname']);
    echo "</td><td>";
    echo ($row['lname']);
    echo "</td><td>";
    echo ($row['sem']);
    echo "</td><td>";
    echo ($row['email']);
    echo "</td><td>";
    echo ($row['phno']);
    echo "</td></tr>";
  }
  echo "<tbody></table>\n";
  ?>
    </div>
  </div>
  
</div>
  
</body>
</html>