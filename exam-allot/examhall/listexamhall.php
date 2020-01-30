
<?php 
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bh07' );
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
	$stmt = $pdo->query("select * from examhall ");
try{
	$sqldel=("delete from examhall where hallno=:hallno and block=:block");
	if(isset($_POST['del'])){
		$stmt=$pdo->prepare($sqldel);
		$stmt->execute(array(
			':hallno'=>$_POST['hallno'],
			':block'=>$_POST['block'],
		)
		);
		 unset($_POST);
      header("Location: listexamhall.php");
      return;
	}
	}catch(Exception $e)
  {
      echo "Internal Error Contact Admin";
      error_log("listexamhall.php,SQL error=".$e->getMessage());
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title> Exam Halls Available </title>
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
      <h3>Exam Halls Available </h3>
    </div>
    <ul class="nav navbar-nav">
    	<!-- Used to be admin redirect href But I Removed to security reasona-->
    </ul>
  </div>
</nav>
<div id="form" class="container-fluid">
	
<form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="hallno">HALL NO :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="hallno" name="hallno" placeholder="ex:MB001" required>
    </div>
  </div>
	 <div class="form-group">
    <label class="control-label col-sm-2" for="block">Block NAME</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="block" name="block" placeholder="ex:cse">
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


<div class="container-fluid">
	<div class="panel panel-default">
		<div class="table-responsive" >
	<?php	
	echo ('<table class="table table-hover table-bordered table-striped"><tbody>');	
		echo "<tr><td>";
		echo ("Hall Number");
		echo "</td><td>";
		echo ("Block Name");
		echo "</td><td>";
		echo ("Number Of seats");
		echo "</td></tr>";
	while($row = $stmt -> fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr><td>";
		echo ($row['hallno']);
		echo "</td><td>";
		echo ($row['block']);
		echo "</td><td>";
		echo ($row['noofseats']);
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