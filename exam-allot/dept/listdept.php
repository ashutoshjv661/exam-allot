
<?php 
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bh07' );
try{
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
	$stmt = $pdo->query("select * from department");
	 }catch(Exception $e)
  {
      echo "Internal Error Contact Admin";
      error_log("listdept.php,SQL error=".$e->getMessage());
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Department with Department Head</title>
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
      <h3>Department with Department Head</h3>
    </div>
 <!--   <ul class="nav navbar-nav">
      <li ><a href="#" onclick="history.go(-1)"> Dashboard</a></li>
    </ul> -->
  </div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
	<?php	

	echo ('<table class="table-hover table-bordered table-striped">');	
		echo "<tr><td><h4>";
		echo ("Department Name");
		echo "</h4></td><td><h4>";
		echo ("Department Head");
		echo "</h4></td></tr>";
	while($row = $stmt -> fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr><td>";
		echo ($row['deptname']);
		echo "</td><td>";
		echo ($row['dhead']);
		echo "</td></tr>";
	}
	echo "</table>\n";
	?>
		</div>
	</div>
	
</div>

 <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>
