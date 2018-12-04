
<?php 
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bhalujadhav007' );
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
	$stmt = $pdo->query("select * from student order by usn ");
if(isset($_POST['usn'])){
$sqldel=("delete from student where usn=:usn");
	if(isset($_POST['del'])){
		$stmt=$pdo->prepare($sqldel);
		$stmt->execute(array(
			':usn'=>$_POST['usn'],
		)
		);
		 unset($_POST);
      header("Location: liststudent.php");
      return;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>List Of Students</title>
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
      <h3>Student List</h3>
    </div>
 <!--   <ul class="nav navbar-nav">
      <li ><a href="../admin/adash.html">Admin Dashboard</a></li>
    </ul> -->
  </div>
</nav>


<div id="form" class="container-fluid">
	
<form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="usn">USN :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usn" name="usn" placeholder="ex:2kl16cs016" required>
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






<div class="container-fluid">
	<div class="panel panel-default">
		<div class="table-responsive" >
	<?php	
	echo ('<table class="table table-hover table-bordered table-striped"><tbody>');	
		echo "<tr><td>";
		echo ("USN");
		echo "</td><td>";
		echo ("Fname");
		echo "</td><td>";
		echo ("Mname");
		echo "</td><td>";
		echo ("Lname");
		echo "</td><td>";
		echo ("Sem");
		echo "</td><td>";
		echo ("Email");
		echo "</td><td>";
		echo ("Phno");
		echo "</td></tr>";

	while($row = $stmt -> fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr><td>";
		echo ($row['usn']);
		echo "</td><td>";
		echo ($row['fname']);
		echo "</td><td>";
		echo ($row['mname']);
		echo "</td><td>";
		echo ($row['lname']);
		echo "</td><td>";
		echo ($row['sem']);
		echo "</td><td>";
		echo ($row['email']);
		echo "</td><td>";
		echo ($row['phno']);
		echo "</td></tr>";
	}
	echo "<tbody></table>\n";
	?>
		</div>
	</div>
	
</div>

 <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html>