
<?php 
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bh07' );
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
try{
	$stmt = $pdo->query("select usn,s.subcode,subname from enrolled e,sub s where e.subcode=s.subcode ");

if(isset($_POST['usn']) && isset($_POST['subcode'])){
$sqldel=("delete from enrolled where usn=:usn and subcode=:subcode");
	if(isset($_POST['del'])){
		$stmt1=$pdo->prepare($sqldel);
		$stmt1->execute(array(
			':usn'=>$_POST['usn'],
			':subcode'=>$_POST['subcode'],
		)
		);
		 unset($_POST);
      header("Location: liststudentenrolled.php");
      return;
	}
}
}catch(Exception $e)
  {
      echo "Internal Error Contact Admin";
      error_log("listdept.php,SQL error=".$e->getMessage());
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Enrolled Students List</title>
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
      <h3>Enrolled Students List</h3>
    </div>
 <!--   <ul class="nav navbar-nav">
      <li ><a href="../admin/adash.html">Admin Dashboard</a></li>
    </ul> -->
  </div>
</nav>




<div id="form" class="container-fluid">
	
<form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="usn">USN</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usn" name="usn" placeholder="ex:2kl16cs016" required>
    </div>
  </div>
	 <div class="form-group">
    <label class="control-label col-sm-2" for="subcode">Subcode </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="subcode" name="subcode" placeholder="ex:15cs43">
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
	echo "<tr><td><h4>";
		echo ("Usn");
		echo "</h4></td><td><h4>";
		echo ("Subject Code");
		echo "</h4></td><td><h4>";
		echo ("SubName");
		echo "</h4></td></tr>";
	while($row = $stmt -> fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr><td>";
		echo ($row['usn']);
		echo "</td><td>";
		echo ($row['subcode']);
		echo "</td><td>";
		echo ($row['subname']);
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