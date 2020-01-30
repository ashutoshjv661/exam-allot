
<?php 
$pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bh07' );
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
  $stmt = $pdo->query("select * from sub ");
?>
<?php
  require_once "../pdo.php";
  try{
    if(isset($_POST['add'])){
  if(isset($_POST['subcode'])  && isset($_POST['subname'])){

      $sql = "insert into sub values (:subcode,:subname)";
      $stmt=$pdo->prepare($sql);
      $stmt->execute(array(
        ':subcode'=>$_POST['subcode'],
        ':subname'=>$_POST['subname'],));
       unset($_POST);
      header("Location: sublist.php");
      return;
      
    }
  }
   if(isset($_POST['dele'])){
  if(isset($_POST['subcode'])  && isset($_POST['subname'])){

      $sql2 = "delete from sub where subcode=:subcode and subname=:subname";
      $stmt2=$pdo->prepare($sql2);
      $stmt2->execute(array(
        ':subcode'=>$_POST['subcode'],
        ':subname'=>$_POST['subname'],));
       unset($_POST);
      header("Location: sublist.php");
      return;
      
    }
  }
  }catch(Exception $e)
  {
      echo "Internal Error Contact Admin";
      error_log("sublist.php,SQL error=".$e->getMessage());
  }


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
      <h3>Subject List</h3>
    </div>
 
  </div>
</nav>

  <form class="form-horizontal" method="post" >
  <div class="form-group">
    <label class="control-label col-sm-2" for="subcode">Subcode:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="subcode" name="subcode" placeholder="" required>
    </div>
  </div>
  

    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="subname">Subname</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="subname" name="subname" placeholder="">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="add">ADD</button>
    </div>
  </div>
   <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="dele">DEL</button>
      <p style="color: red;">If you delete SUB all data with reference will be deleted </p>
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
        echo ("subname");
    echo "</td></tr>";
  while($row = $stmt -> fetch(PDO::FETCH_ASSOC))
  {
    echo "<tr><td>";
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