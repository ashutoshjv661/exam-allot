
<?php 
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bh07' );
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
	$stmt = $pdo->query("select * from faculty order by fid ");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Faculty List</title>
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
      <h3>Faculty List</h3>
    </div>
    <ul class="nav navbar-nav">
     <!-- Admin Dash Href Removed-->
    </ul>
  </div>
</nav>

<div class="container-fluid">
	<div class="panel-default panel">
		<div class="col-lg-12 table-responsive" >
	<?php	
	echo ('<table class="table table-hover table-bordered table-striped"><tbody>');	
	echo "<tr><td>";
		echo ("FID");
		echo "</td><td>";
		echo ("Fname");
		echo "</td><td>";
		echo ("Mname");
		echo "</td><td>";
		echo ("Lname");
		echo "</td><td>";
		echo ("Dept Name");
		echo "</td><td>";
		echo ("Email");
		echo "</td><td>";
		echo ("Ph.no.");
		echo "</td></tr>";
	while($row = $stmt -> fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr><td>";
		echo ($row['fid']);
		echo "</td><td>";
		echo ($row['fname']);
		echo "</td><td>";
		echo ($row['mname']);
		echo "</td><td>";
		echo ($row['lname']);
		echo "</td><td>";
		echo ($row['deptname']);
		echo "</td><td>";
		echo ($row['email']);
		echo "</td><td>";
		echo ($row['phno']);
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