<?php 
 require_once "../pdo.php";
$stmt2 = $pdo->query("select * from sub ");
$stmt3 = $pdo->query("select * from examhall ");
$stmt4 =$pdo->query("select * from noof");
$stmt5 =$pdo->query("select distinct date,time from examdate");
$data = $stmt2->fetchAll();
$data1= $stmt3->fetchAll();
$data2=$stmt5->fetchAll();
 ?>
<?php 
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bh07' );
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
  $stmt = $pdo->query("select * from studenthallallot order by date");
?>
<?php
  require_once "../pdo.php";
  try{
  if(isset($_POST['subcode']) && isset($_POST['hallno'])&& isset($_POST['block'])&& isset($_POST['usnfrom']) && isset($_POST['usnto']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['fid'])){

      $sql = "insert into studenthallallot values (:subcode,:hallno,:block,:usnfrom,:usnto,:date,:time,:fid)";
      $stmt1=$pdo->prepare($sql);
      $stmt1->execute(array(
        ':subcode'=>$_POST['subcode'],
        ':hallno'=>$_POST['hallno'],
        ':usnfrom'=>$_POST['usnfrom'],
        ':block'=>$_POST['block'],
        ':usnto'=>$_POST['usnto'],
        ':date'=>$_POST['date'],
        ':time'=>$_POST['time'],
        ':fid'=>$_POST['fid'],
                            ));
       unset($_POST);
      header("Location: studentallotindex.php");
      return;

  }
  }catch(Exception $e)
  {
      echo "Internal Error Contact Admin";
      error_log("studentallotindex.php,SQL error=".$e->getMessage());
  }

 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Allotment Panel</title>
</head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../images/logo0.png" type="image/x-icon" >
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
<style type="text/css">
form {
    margin: 2px;
    margin-top:30px; 
    padding: 20px;
    border-color: red;
    border: 2px; 
    border-style: groove; 
  }
</style>
<body>
  <h1 class="jumbotron">Student Allotment Panel</h1>
 
  <div style="background-color: lightgreen;" class="container">
    <div class="row">
      <div class="col-md-6">
<div>
  <?php 
   while($row = $stmt4 -> fetch(PDO::FETCH_ASSOC)){
      if($row['name']=="student"){
        echo "<p>";
        echo "No of students : ".$row['no'] ;
        echo "</p>";
      }
   }
  ?>
</div>
          <form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label " for="subcode">Subcode</label>
     <!-- <input type="text" class="form-control" id="subcode" name="subcode" placeholder="" required autofocus> -->

      <select type="text" class="form-control" id="subcode" name="subcode" placeholder="ex:VTU Format SUBCODE">
<?php foreach ($data as $row): ?>
    <option><?=$row['subcode']?></option>
<?php endforeach ?>
    </select>
  </div>

   <div class="form-group">
    <label class="control-label" for="hallno">Hall No</label>
   
    <!--  <input type="text" class="form-control" id="hallno" name="hallno" placeholder="" required autofocus > -->
  <select type="text" class="form-control" id="hallno" name="hallno" placeholder="" required autofocus>
<?php foreach ($data1 as $row): ?>
    <option><?=$row['hallno']?></option>
<?php endforeach ?>
    </select>
  </div>
   <!--   <form  method="post" >
    <label class="control-label " for="date">Date:</label>
    <div>
      <input type="text" class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" required>
    </div>
    <label class="control-label" for="sem">Sem</label>
    <div >
      <input type="text" class="form-control" id="sem" name="sem" placeholder="">
  </div>
</form> -->
<div style="margin-top: 20px" align="center">
  <p><a target="_blank" href="../faculty/facultylist.php">Faculty List</a></p>
  <p><a target="_blank" href="../examhall/listexamhall.php">Exam Hall List</a></p>
   <p><a target="_blank" href="../examdate/listexamdate.php">Exam Dates</a></p> 
   <p><a target="_blank" href="../enrolled/liststudentenrolled.php">Student Enrolled List</a></p>
   <p><a target="_blank" href="../student/liststudent.php">Student List</a></p>
</div>
</div>
<div class="col-md-6">
 <form class="form-horizontal" method="post" >
 <!-- <div class="form-group">
    <label class="control-label " for="hallno">Hall no:</label>
    <div >
      <input type="text" class="form-control" id="hallno" name="hallno" placeholder="ex:MB001" required>
    </div>
  </div> 
 <form class="form-horizontal" method="post" >
 <div class="form-group">
    <label class="control-label " for="date">Date :</label>
    <div >
      <input type="text" class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" required>
    </div> 
  </div> 
   <div class="form-group">
    <label class="control-label " for="time">Time</label>
    <div class="">
      <input type="text" class="form-control" id="time" name="time" placeholder="HH:MM:SS ">
    </div>
  </div>
  <form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label " for="fid">FID :</label>
    <div >
      <input type="text" class="form-control" id="fid" name="fid" placeholder="FID" required>
    </div>
  </div>
  <form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label " for="fname">Fname :</label>
    <div >
      <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label" for="subcode">Subcode</label>
    <div >
      <input type="text" class="form-control" id="subcode" name="subcode" placeholder="">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 ">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form> -->
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
     <!-- <input type="date" class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" required> -->
      <select type="date" class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" required>
<?php foreach ($data2 as $row): ?>
    <option><?=$row['date']?></option>
<?php endforeach ?>
    </select>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="time">Time</label>
    <div class="col-sm-10">
     <!-- <input type="time" class="form-control" id="time" name="time" placeholder="HH-MM-SS" required> -->

        <select type="time" class="form-control" id="time" name="time" placeholder="HH:MM:SS ">
<?php foreach ($data2 as $row): ?>
    <option><?=$row['time']?></option>
<?php endforeach ?>
    </select>
    </div>
  </div>
  
   <div class="form-group">
    <label class="control-label col-sm-2" for="fid">FID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fid" name="fid" placeholder=""  required autofocus > 
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 ">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form>

</div>
</div>
</div>

<div style="height:5px; margin-bottom:30px;  background-color:black;"></div>
  <div  class="container-fluid">
  <div class="panel-default panel">
    <div class="table table-responsive" >
 
  <?php 
  echo ('<table class="table table-hover table-bordered table-striped"><tbody>');  
   echo "<tr><td>";
    echo ("subcode");
    echo "</td><td>";
    echo ("hallno");
    echo "</td><td>";
    echo ("block");
    echo "</td><td>";
    echo ("usnfrom");
    echo "</td><td>";
    echo ("usnto");
    echo "</td><td>";
    echo ("date");
    echo "</td><td>";
    echo ("time");
    echo "</td><td>";
    echo ("fid");
    echo "</td></tr>";
  while($row = $stmt -> fetch(PDO::FETCH_ASSOC))
  {
    echo "<tr><td>";
    echo ($row['subcode']);
    echo "</td><td>";
    echo ($row['hallno']);
    echo "</td><td>";
    echo ($row['block']);
    echo "</td><td>";
    echo ($row['usnfrom']);
    echo "</td><td>";
    echo ($row['usnto']);
    echo "</td><td>";
    echo ($row['date']);
    echo "</td><td>";
    echo ($row['time']);
    echo "</td><td>";
    echo ($row['fid']);
    echo "</td></tr>";
  }
  echo "</tbody></table>\n";
  ?>
</div>
</div>
</div>
</body>
