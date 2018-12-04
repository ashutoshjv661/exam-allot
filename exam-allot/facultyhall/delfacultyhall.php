<?php 
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bhalujadhav007' );
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
  $stmt = $pdo->query("select * from facultyhallallot ");
  if(isset($_POST['hallno']) && isset($_POST['date']) && isset($_POST['fid']) ){
$sqldel=("delete from facultyhallallot where date=:date and hallno=:hallno and fid=:fid");
  if(isset($_POST['del'])){
    $stmt=$pdo->prepare($sqldel);
    $stmt->execute(array(
      ':date'=>$_POST['date'],
      ':hallno'=>$_POST['hallno'],
      ':fid'=>$_POST['fid'],
    )
    );
     unset($_POST);
      header("Location: delfacultyhall.php");
      return;
  }
}
?>




 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Remove Faculty Allotment </title>
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
  <h1 class="jumbotron">Remove Faculty Allotment</h1>
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

  <form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="fid">FID :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fid" name="fid" placeholder="FID" required>
    </div>
  </div>
<!--
   <div class="form-group">
    <label class="control-label col-sm-2" for="subcode">Subcode</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="subcode" name="subcode" placeholder="">
    </div>
  </div>
-->  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="del">Submit</button>
    </div>
  </div>
</form>

<div style="height:5px; margin-bottom:30px;  background-color:black;"></div>
  <div class="container-fluid">
  <div class="panel-default panel">
    <div class=" table-responsive table" >

  <?php 
  echo ('<table class="table table-hover table-bordered table-striped"><tbody>');  
  echo "<tr><td>";
    echo ("Hall NO.");
    echo "</td><td>";
    echo ("Date");
    echo "</td><td>";
    echo ("Time");
    echo "</td><td>";
    echo ("FID");
    echo "</td><td>";
    echo ("First Name ");
    echo "</td><td>";
    echo ("SubCode ");
    echo "</td></tr>";
  while($row = $stmt -> fetch(PDO::FETCH_ASSOC))
  {
    echo "<tr><td>";
    echo ($row['hallno']);
    echo "</td><td>";
    echo ($row['date']);
    echo "</td><td>";
    echo ($row['time']);
    echo "</td><td>";
    echo ($row['fid']);
    echo "</td><td>";
    echo ($row['fname']);
    echo "</td><td>";
    echo ($row['subcode']);
    echo "</td></tr>";
  }
  echo "</tbody></table>\n";
?>
</div>
</div>
</div>
  
</body>
