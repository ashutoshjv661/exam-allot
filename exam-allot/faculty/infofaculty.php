<?php
  session_start();
 // print_r($_SESSION);
	require_once "../pdo.php";
  $fid=$_SESSION['name'];
  $pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
  $stmt = $pdo->query("select * from faculty where fid='$fid' ");

 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Info Faculty </title>
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
	<h1 class="jumbotron">Info Faculty Details</h1>
  <p style="color:red; margin-left: 20px; ">If FID=1 Email=xyz@domain.com Pass=1xyz</p>
  <!--
	<form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="fid">FID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fid" name="fid" placeholder="" required>
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
    <label class="control-label col-sm-2" for="deptname">Department</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="deptname" name="deptname" placeholder="ex:cse">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="email" placeholder="example@domain.com" >
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="phno">Ph.no</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="phno" name="phno" placeholder="Without International Code" >
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
  <div class="panel-default panel">
    <div class="col-lg-12 table-responsive" >
  <?php 
  echo ('<table class="table table-hover table-bordered table-striped"><tbody>'); 
  echo "<tr><td>";
    echo ("FID");
    echo "</td><td>";
    echo ("Fname");
    echo "</td><td>";
    echo ("Mname");
    echo "</td><td>";
    echo ("Lname");
    echo "</td><td>";
    echo ("Dept Name");
    echo "</td><td>";
    echo ("Email");
    echo "</td><td>";
    echo ("Ph.no.");
    echo "</td></tr>";
  while($row = $stmt -> fetch(PDO::FETCH_ASSOC))
  {
    echo "<tr><td>";
    echo ($row['fid']);
    echo "</td><td>";
    echo ($row['fname']);
    echo "</td><td>";
    echo ($row['mname']);
    echo "</td><td>";
    echo ($row['lname']);
    echo "</td><td>";
    echo ($row['deptname']);
    echo "</td><td>";
    echo ($row['email']);
    echo "</td><td>";
    echo ($row['phno']);
    echo "</td></tr>";
  }
  echo "</tbody></table>\n";
  ?>
    </div>
  </div>
  
</div>
	
</body>
</html>