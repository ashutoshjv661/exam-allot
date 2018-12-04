<?php 
 require_once "../pdo.php";
$stmt2 = $pdo->query("select * from department ");
$data = $stmt2->fetchAll();
 ?>

<?php

	require_once "../pdo.php";
  try{
  if(isset($_POST['fid']) && isset($_POST['fname']) && isset($_POST['mname']) && isset($_POST['lname']) && isset($_POST['deptname']) && isset($_POST['email']) && isset($_POST['phno']) && isset($_POST['pass'])){

      $sql = "insert into faculty values (:fid,:fname,:mname,:lname,:deptname,:email,:phno,:pass)";
      $stmt=$pdo->prepare($sql);
      $stmt->execute(array(
        ':fid'=>$_POST['fid'],
        ':fname'=>$_POST['fname'],
        ':mname'=>$_POST['mname'],
        ':lname'=>$_POST['lname'],
        ':deptname'=>$_POST['deptname'],
        ':email'=>$_POST['email'],
        ':phno'=>$_POST['phno'],
        ':pass'=>$_POST['pass'],
                            ));
       unset($_POST);
      header("Location: addfaculty.php");
      return;
}
 }catch(Exception $e)
  {
      echo "Internal Error Contact Admin";
      error_log("addfaculty.php,SQL error=".$e->getMessage());
  }


 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Faculty </title>
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
	<h1 class="jumbotron">Add New Faculty</h1>
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
     <!-- <input type="text" class="form-control" id="deptname" name="deptname" placeholder="ex:cse"> -->
     <select type="text" class="form-control" id="deptname" name="deptname" placeholder="ex:cse,mech,enc">
<?php foreach ($data as $row): ?>
    <option><?=$row['deptname']?></option>
<?php endforeach ?>
    </select>
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
    <label class="control-label col-sm-2" for="pass">PassWord</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pass" name="pass" placeholder="If FID=1 Email=xyz@domain.com Pass=1xyz" required>
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