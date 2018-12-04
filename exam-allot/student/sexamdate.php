
<?php 
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bhalujadhav007' );
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
	
	$stmt = $pdo->query("select * from examdate ");
/*try{
	if(isset($_POST['date'])  && isset($_POST['subcode'])){
	$sqldel=("delete from examdate where date=:date  and subcode=:subcode");
	if(isset($_POST['del'])){
		$stmt1=$pdo->prepare($sqldel);
		$stmt1->execute(array(
			':date'=>$_POST['date'],
			':subcode'=>$_POST['subcode'],
		)
		);
		 unset($_POST);
      header("Location: listexamdate.php");
      return;
	}
}
}catch(Exception $e){
	echo "Internal Error Contact Admin";
      error_log("listexamdate.php,SQL error=".$e->getMessage());
}
*/

?>

<!DOCTYPE html>
<html>
<head>
	<title> Exam Dates Of All Semester </title>
</head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../images/logo0.png" type="image/x-icon" >
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
<style type="text/css">
	div.container-fluid{
		margin-top: 20px;
	}
	.navbar{
		background-color: lightgrey;
	}
	div.panel{
		background-color: white;
		margin-top: 20px;
	}
	#form{
		background-color : lightgreen;
		margin-bottom: 20px; 
	}
	.form-horizontal{
		margin: 10px;
		padding: 10px;
	}
</style>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <h3>Exam Dates of All semester </h3>
    </div>
 <!--   <ul class="nav navbar-nav">
      <li ><a href="../admin/adash.html"> Dashboard</a></li>
    </ul> -->
  </div>
</nav>


<!-- <div id="form" class="container-fluid">
	
<form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="date">Date</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" required>
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-2" for="time">Time </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="time" name="time" placeholder="HH:MM:SS">
    </div>
  </div> 
<div class="form-group">
    <label class="control-label col-sm-2" for="subcode">Subject Code </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="subcode" name="subcode" placeholder="ex:15CS43">
    </div>
  </div>

  <div class="container-fluid">
  	<div class="row">
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="del">Delete</button>
    </div>
  </div>
</div>
</div>

</div>
-->



<div class="container-fluid">
	<div class="panel panel-default">
		<div class="table-responsive" >
	<?php	
	echo ('<table class=" table table-hover table-bordered table-striped"><tbody>');	
		echo "<tr><td>";
		echo ("Date");
	
		echo "</td><td>";
		echo ("Time");
	
		echo "</td><td>";
		echo ("Subject Code");
		echo "</td><td>";
		echo ("Sem");
		echo "</td><td>";
		echo ("Scheme");
		echo "</td></tr>";
	while($row = $stmt -> fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr><td>";
		echo ($row['date']);
		echo "</td><td>";
		echo ($row['time']);
		echo "</td><td>";
		echo ($row['subcode']);
		echo "</td><td>";
		echo ($row['sem']);
		echo "</td><td>";
		echo ($row['scheme']);
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