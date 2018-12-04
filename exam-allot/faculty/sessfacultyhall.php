
<?php
session_start(); 
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bhalujadhav007' );
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
//print_r($_SESSION);
$fid=$_SESSION['name'];
	$stmt = $pdo->query("select * from facultyhallallot where fid='$fid' ");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Faculty Exam Alloted List</title>
</head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../images/logo0.png" type="image/x-icon" >
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
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
      <h3>Faculty Exam Alloted List</h3>
    </div>
    <ul class="nav navbar-nav">
     <!-- Admin Dash Href Removed-->
    </ul>
  </div>
</nav>

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

 <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>