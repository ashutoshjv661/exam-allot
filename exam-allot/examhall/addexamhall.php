<?php 
 require_once "../pdo.php";
$stmt2 = $pdo->query("select * from department ");
$data = $stmt2->fetchAll();
 ?>
<?php
	require_once "../pdo.php";
  try{
  if(isset($_POST['hallno']) && isset($_POST['block']) && isset($_POST['noofseats'])){

      $sql = "insert into examhall values (:hallno,:block,:noofseats)";
      $stmt=$pdo->prepare($sql);
      $stmt->execute(array(
        ':hallno'=>$_POST['hallno'],
        ':block'=>$_POST['block'],
        ':noofseats'=>$_POST['noofseats'],));
       unset($_POST);
      header("Location: addexamhall.php");
      return;
      
    }
  }catch(Exception $e)
  {
      echo "Internal Error Contact Admin";
      error_log("addexamhall.php,SQL error=".$e->getMessage());
  }


 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add EXAM HALL </title>
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
	<h1 class="jumbotron">Add New HALL</h1>
	<form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="hallno">HALL NO :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="hallno" name="hallno" placeholder="ex:MB001" required>
    </div>
  </div>
	 <div class="form-group">
    <label class="control-label col-sm-2" for="block">Block NAME</label>
    <div class="col-sm-10">
    <!--  <input type="text" class="form-control" id="block" name="block" placeholder="ex:cse"> -->


        <select type="text" class="form-control" id="block" name="block" placeholder="ex:cse,mech,enc">
<?php foreach ($data as $row): ?>
    <option><?=$row['deptname']?></option>
<?php endforeach ?>
    </select>


    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="noofseats">Number Of Seats</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="noofseats" name="noofseats" placeholder="">
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