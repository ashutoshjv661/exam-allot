<?php 
 require_once "../pdo.php";
$stmt2 = $pdo->query("select * from sub ");
$data = $stmt2->fetchAll();
 ?>
<?php
  require_once "../pdo.php";
  try{
  if(isset($_POST['date']) && isset($_POST['time']) && isset($_POST['subcode']) && isset($_POST['sem']) && isset($_POST['scheme'])){
      $sql = "insert into examdate values (:date,:time,:subcode,:sem,:scheme)";
      $stmt=$pdo->prepare($sql);
      $stmt->execute(array(
        ':date'=>$_POST['date'],
        ':time'=>$_POST['time'],
        ':subcode'=>$_POST['subcode'],
        ':sem'=>$_POST['sem'],
          ':scheme'=>$_POST['scheme'],));
       unset($_POST);
      header("Location: addexamdate.php");
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
  <title>Add EXAM Date </title>
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
  <h1 class="jumbotron">Add New Exam Date</h1>
  <form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="date">Date :</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" required>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="time">Time</label>
    <div class="col-sm-10">
      <input type="time" class="form-control" id="time" name="time" placeholder="HH:MM:SS ">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="subcode">Subcode</label>
    <div class="col-sm-10">
     <!-- <input type="text" class="form-control" id="subcode" name="subcode" placeholder="">-->
    <select type="text" class="form-control" id="subcode" name="subcode" placeholder="ex:VTU Format SUBCODE">
<?php foreach ($data as $row): ?>
    <option><?=$row['subcode']?></option>
<?php endforeach ?>
    </select>


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
    <label class="control-label col-sm-2" for="scheme">Scheme</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="scheme" name="scheme" placeholder="">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>
  
</body>
