<?php 
 require_once "../pdo.php";
$stmt2 = $pdo->query("select * from sub ");
$data = $stmt2->fetchAll();
 ?>
<?php
  require_once "../pdo.php";
  try{
  if(isset($_POST['usn']) && isset($_POST['subcode'])){

      $sql = "insert into enrolled values (:usn,:subcode)";
      $stmt=$pdo->prepare($sql);
      $stmt->execute(array(
        ':usn'=>$_POST['usn'],
        ':subcode'=>$_POST['subcode'],));
       unset($_POST);
      header("Location: studentenrolled.php");
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
  <title>Add Student Enrolled List</title>
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
  <h1 class="jumbotron">ADD a Student and Enrolled Subject</h1>
  <form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="usn">USN</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usn" name="usn" placeholder="ex: 2kl16cs001" required>
    </div>
  </div>
 <!--  <div class="form-group">
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
  </div>    -->
   <div class="form-group">
    <label class="control-label col-sm-2" for="subcode">Subject Code</label>
    <div class="col-sm-10">
  <!--    <input type="text" class="form-control" id="subcode" name="subcode" placeholder="ex:VTU Format SUBCODE"> -->
<select type="text" class="form-control" id="subcode" name="subcode" placeholder="ex:VTU Format SUBCODE">
<?php foreach ($data as $row): ?>
    <option><?=$row['subcode']?></option>
<?php endforeach ?>
    </select>


    </div>
  </div>
  <!-- <div class="form-group">
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
-->
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
  
</body>
</html>