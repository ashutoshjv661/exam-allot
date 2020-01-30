<?php
  $pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bh07');
  try{
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
  $sucn=isset($_POST['usn']) ? $_POST['usn'] : '';
  $stmt = $pdo->query("select * from exam_allot.student where usn='$sucn' ");

  if(isset($_POST['update'])){
    $sql = "update student set fname=:fname,mname=:mname,lname=:lname,sem=:sem,dept=:dept,email=:email,phno=:phno where usn=:usn"; 
      $stmt1=$pdo->prepare($sql);
      $stmt1->execute(array(
        ':usn'=>$_POST['usn'],
        ':fname'=>$_POST['fname'],
        ':mname'=>$_POST['mname'],
        ':lname'=>$_POST['lname'],
        ':sem'=>$_POST['sem'],
        ':email'=>$_POST['email'],
        ':phno'=>$_POST['phno'],
        ':dept'=>$_POST['dept'],
                            ));
       unset($_POST);
      header("Location: updatestudent.php");
      return;
}
}catch(Exception $e)
{
      echo "Internal Error Contact Admin";
      error_log("updatestudent.php,SQL error=".$e->getMessage());
  }




 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>EDIT Student </title>
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
 
  <h1 class="jumbotron">Edit  Student  Data</h1>
  <form class="form-horizontal" method="post" >
    <?php
if(!isset($_POST['usn'])) echo ('
  <div class="form-group">
  <label class="control-label col-sm-2" for="usn">USN</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usn" name="usn" value="" placeholder="usn" required>
    </div>
  </div>');
?>
   <?php 
   if(isset($_POST['ret']))
  while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
  ?>
  <div class="form-group">
  <label class="control-label col-sm-2" for="usn">USN</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usn" name="usn" value="<?php echo $row['usn']; ?>" placeholder="usn" required readonly>
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
      <input type="text" class="form-control" id="lname" value="<?php echo $row ['lname']; ?>" name="lname" placeholder="">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="sem">Semester</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="sem" name="sem" value="<?php echo $row ['sem']; ?>" placeholder="ex: 1(for 1st sem)">
    

    <!--  <select type="text" class="form-control" id="sem" name="sem" placeholder="ex: 1(for 1st sem)" value="<?php //echo $row ['sem']; ?>" selected >
  <option value="1">1st</option>
  <option value="2">2nd</option>
  <option value="3">3rd</option>
  <option value="4">4th</option>
   <option value="5">5th</option>
  <option value="6">6th</option>
  <option value="7">7th</option>
  <option value="8">8th</option>
</select>

-->
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="dept">Department</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="dept" name="dept" value="<?php echo $row ['dept']; ?>" placeholder="ex.cse">
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