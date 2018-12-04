<?php
	require_once "../pdo.php";
  if(isset($_POST['subcode']) && isset($_POST['hallno']) && isset($_POST['block']) && isset($_POST['usnfrom']) && isset($_POST['usnto']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['fid'])){

      $sql = "insert into studenthallallot values (:subcode,:hallno,:block,:usnfrom,:usnto,:date,:time,:fid)";
      $stmt=$pdo->prepare($sql);
      $stmt->execute(array(
        ':subcode'=>$_POST['subcode'],
        ':hallno'=>$_POST['hallno'],
        ':block'=>$_POST['block'],
        ':usnfrom'=>$_POST['usnfrom'],
        ':usnto'=>$_POST['usnto'],
        ':date'=>$_POST['date'],
        ':time'=>$_POST['time'],
        ':fid'=>$_POST['fid'],
                            ));
       unset($_POST);
      header("Location: addstudenthall.php");
      return;

  }

 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Student Hall </title>
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
	<h1 class="jumbotron">Add HALL Student </h1>
	<form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="subcode">Subcode</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="subcode" name="subcode" placeholder="" required autofocus>
    </div>
  </div>
	 <div class="form-group">
    <label class="control-label col-sm-2" for="hallno">Hall No</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="hallno" name="hallno" placeholder="" required autofocus >
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="block">Block</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="block" name="block" placeholder="" required autofocus>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="usnfrom">USN From</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usnfrom" name="usnfrom" placeholder="" >
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="usnto">USN TO</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usnto" name="usnto" placeholder="">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="date">Date</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" required>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="time">Time</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="time" name="time" placeholder="HH-MM-SS" required>
    </div>
  </div>
  
   <div class="form-group">
    <label class="control-label col-sm-2" for="fid">FID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fid" name="fid" placeholder=""  required autofocus > 
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
	
</body>
</html>