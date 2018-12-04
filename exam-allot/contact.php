<?php
    require_once "nocookie.php";
	require_once "pdo.php";
    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['subject'])){
    $sql="insert into feedback values (:firstname,:lastname,:subject)";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(
        array (
            ':firstname'=>$_POST['firstname'],
            ':lastname'=>$_POST['lastname'],
            ':subject'=>$_POST['subject'],));
    require_once "logout.php";
}
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Feedback Form </title>
</head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/logo0.png" type="image/x-icon" >
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<style type="text/css">
/* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */  
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
    background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<body>

	<div class="jumbotron text-left">
        <h1> Feedback Form </h1>
        <p style="color: red;"> Mail Further Queries at ashutoshjadhav661@gmail.com</p>

    </div>
	<form class="form-horizontal" method="post" >
 <div class="container">

    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.. (128 characters)" style="height:200px" required ></textarea>

    <input type="submit" value="Submit" name="submit1"></input>
    

  </form>
</div>
	
</body>
</html>