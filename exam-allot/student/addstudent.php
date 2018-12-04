<?php 
 require_once "../pdo.php";
$stmt2 = $pdo->query("select * from department ");
$data = $stmt2->fetchAll();
 ?>
<?php
	try{
  if(isset($_POST['usn']) && isset($_POST['fname']) && isset($_POST['mname']) && isset($_POST['lname']) && isset($_POST['sem']) && isset($_POST['email']) && isset($_POST['phno']) && isset($_POST['pass']) && isset($_POST['dept'])){

      $sql = "call stuadd(:usn,:fname,:mname,:lname,:sem,:dept,:email,:phno,:pass)";
      $stmt=$pdo->prepare($sql);
      $stmt->execute(array(
        ':usn'=>$_POST['usn'],
        ':fname'=>$_POST['fname'],
        ':mname'=>$_POST['mname'],
        ':lname'=>$_POST['lname'],
        ':sem'=>$_POST['sem'],
        ':email'=>$_POST['email'],
        ':phno'=>$_POST['phno'],
        ':pass'=>$_POST['pass'],
        ':dept'=>$_POST['dept'],
                            ));
       unset($_POST);
      header("Location: addstudent.php");
      return;

  }
   }catch(Exception $e)
  {
      echo "Internal Error Contact Admin";
      error_log("addstudent.php,SQL error=".$e->getMessage());
  }


 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Student </title>
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
	<h1 class="jumbotron">Add New Student</h1>
	<form style="margin: 40px;" class="form-horizontal" method="post" >
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
      


   <!--   <input type="text" class="form-control" id="sem" name="sem" placeholder="ex: 1(for 1st sem)"> -->
   <select type="text" class="form-control" id="sem" name="sem" placeholder="ex: 1(for 1st sem)" >
  <option value="1">1st</option>
  <option value="2">2nd</option>
  <option value="3">3rd</option>
  <option value="4">4th</option>
   <option value="5">5th</option>
  <option value="6">6th</option>
  <option value="7">7th</option>
  <option value="8">8th</option>
</select>


    </div>
  </div>


<div class="form-group">
    <label class="control-label col-sm-2" for="dept">Department</label>
    <div class="col-sm-10">
    


    <!--  <input type="text" class="form-control" id="dept" name="dept" placeholder="ex:cse,mech,enc"> -->
    <select type="text" class="form-control" id="dept" name="dept" placeholder="ex:cse,mech,enc">
<?php foreach ($data as $row): ?>
    <option><?=$row['deptname']?></option>
<?php endforeach ?>
    </select>

    </div>
  </div>


   <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="email" placeholder="example@domain.com" required autofocus>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="phno">Ph.no</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="phno" name="phno" placeholder="Without International Code" required>
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-sm-2" for="pass">Password</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pass" name="pass" placeholder="ex. if name=xyz Usn=2kl16cs016 Then Password= x16cs016" required>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" value="submit"></input>
    </div>
  </div>
</form>
	
</body>
</html>