<?php 
	 $pdo=new PDO('mysql:host=localhost;port=3306;dbname=exam_allot','ashutosh','bhalujadhav007' );
   $pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
 try{  if(isset($_POST['ac']) && isset($_POST['pw'])){
     session_start();
    $stmt=$pdo->query("select * from admins");
    while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
      if($row['aname']==$_POST['ac'] && $row['apass']==$_POST['pw'] ){
        $_SESSION['name']=$row['aname'];
      }
      
 }


if($_SESSION['name']==$_POST['ac'])
{
  $_POST=array();
  header("Location: adash.html");
}
}
 }catch(Exception $e)
  {
      echo "Internal Error Contact Admin";
      error_log("aindex.php,SQL error=".$e->getMessage());
  }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
</head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../images/logo0.png" type="image/x-icon" >
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
<style type="text/css">


body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #c6ff00;

}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
<body class="text-center">
	<form class="form-signin" method="post">
      <img class="mb-4" src="../images/logo0.png" alt="adminlogin" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">username</label>
      <input type="text" id="inputEmail" class="form-control" name="ac" placeholder="username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="pw" placeholder="Password"  required>
      </div>
      <input class="btn btn-lg btn-primary btn-block" type="submit"></button>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>	
<!-- jQuery (Bootstrap JS plugins depend on it) -->
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
</body>
</html> 