<?php
	 $pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bhalujadhav007');
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
  $sucn=isset($_POST['fid']) ? $_POST['fid'] : '';
  $stmt = $pdo->query("select * from exam_allot.faculty where fid='$sucn' ");

  if(isset($_POST['update'])){
    $sql = "update faculty set fname=:fname,mname=:mname,lname=:lname,deptname=:deptname,email=:email,phno=:phno where fid=:fid"; 
      $stmt1=$pdo->prepare($sql);
      $stmt1->execute(array(
        ':fid'=>$_POST['fid'],
        ':fname'=>$_POST['fname'],
        ':mname'=>$_POST['mname'],
        ':lname'=>$_POST['lname'],
        ':deptname'=>$_POST['deptname'],
        ':email'=>$_POST['email'],
        ':phno'=>$_POST['phno'],
                            ));
       unset($_POST);
      header("Location: updatefaculty.php");
      return;
}

 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Update Faculty </title>
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
	<h1 class="jumbotron">Update Faculty Details</h1>
	<form class="form-horizontal" method="post" >
  <?php
if(!isset($_POST['fid'])) {echo (' <div class="form-group"> 
    <label class="control-label col-sm-2" for="fid">FID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fid" name="fid" value="" placeholder="" required>
    </div>
  </div> ');
}
?>
  <?php 
   if(isset($_POST['ret']))
  while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
  ?>
<div class="form-group"> 
    <label class="control-label col-sm-2" for="fid">FID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fid" name="fid" value="<?php echo $row['fid']; ?>" placeholder="" required readonly >
    </div>
  </div>
	 <div class="form-group">
    <label class="control-label col-sm-2" for="fname">First NAME</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row ['fname']; ?>" placeholder="">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="mname">Middle Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $row ['mname']; ?>" placeholder="">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="lname">Last Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row ['lname']; ?>" name="lname" placeholder="">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="deptname">Department</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="deptname" name="deptname" value="<?php echo $row ['deptname']; ?>" placeholder="ex:cse">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="email" value="<?php echo $row ['email']; ?>" placeholder="example@domain.com" >
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="phno">Ph.no</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="phno" name="phno" value="<?php echo $row ['phno']; ?>" placeholder="Without International Code" >
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="update">Update</button>
    </div>
  </div>
  <?php }?>
   <div class="form-group"> 
    <div class="col-sm-10 col-sm-10">
      <button type="submit" class="btn btn-default" name="ret">Retrieve</button>
    </div>
  </div>
</form>
	
</body>
</html>