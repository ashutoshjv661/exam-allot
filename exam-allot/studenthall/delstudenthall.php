
<?php 
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bhalujadhav007' );
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
  $stmt = $pdo->query("select * from studenthallallot ");
?>


<?php
	require_once "../pdo.php";
  if(isset($_POST['hallno']) && isset($_POST['subcode']) && isset($_POST['usnfrom']) ){
$sqldel=("delete from studenthallallot where subcode=:subcode and hallno=:hallno and usnfrom=:usnfrom");
  if(isset($_POST['del'])){
    $stmt=$pdo->prepare($sqldel);
    $stmt->execute(array(
      ':subcode'=>$_POST['subcode'],
      ':hallno'=>$_POST['hallno'],
      ':usnfrom'=>$_POST['usnfrom'],
    )
    );
     unset($_POST);
      header("Location: delstudenthall.php");
      return;
  }
}
 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Remove Student Hall </title>
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
	<h1 class="jumbotron">Remove HALL Student </h1>
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
 <!--  <div class="form-group">
    <label class="control-label col-sm-2" for="block">Block</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="block" name="block" placeholder="" required autofocus>
    </div>
  </div> -->
 <div class="form-group">
    <label class="control-label col-sm-2" for="usnfrom">USN From</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usnfrom" name="usnfrom" placeholder="" >
    </div>
  </div>
  <!--
   <div class="form-group">
    <label class="control-label col-sm-2" for="usnto">USN TO</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usnto" name="usnto" placeholder="">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="date">Date</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="date" name="date" placeholder="" required>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="time">Time</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="time" name="time" placeholder="" required>
    </div>
  </div> -->
  
   <!--<div class="form-group">
    <label class="control-label col-sm-2" for="fid">FID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fid" name="fid" placeholder=""  required autofocus > 
    </div>
  </div>
-->
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="del">Submit</button>
    </div>
  </div>
</form>
	
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
</html>