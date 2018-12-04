<?php
date_default_timezone_set("Asia/Calcutta");
echo ("<h6>"); //India time (GMT+5:30)
echo date('Y-m-d');
echo ("</h6>");
?>

<?php 
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bhalujadhav007' );
$date=date('Y-m-d');
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
  $stmt = $pdo->query("select * from studenthallallot where date='$date' ");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Exam  Alloted  Student List </title>
</head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../images/logo0.png" type="image/x-icon" >
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
<link rel="shortcut icon" href="../images/logo0.png" type="image/x-icon" >
<style type="text/css">
  div.container{
    margin-top: 20px;
  }
  .navbar{
    background-color: lightgrey;
  }
</style>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <h3>Exam Alloted Student List</h3>
    </div>
 
  </div>
</nav>
<p style="color:red; text-align: center;">Shows Exam Allotment on the day of Exam .
	<br/>Students can view There alloted Seats in the morning on the day of exam .</p>

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

 <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>