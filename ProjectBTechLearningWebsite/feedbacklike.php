<!doctype html>
<html> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Feel free to give feedback</title>
<link rel="stylesheet" type="text/css" href="feedbacklike.css">
</head>
<body>
<section>
<form action="feedbacklike.php" method="POST">
<div class="container">
<h2>Feel free to give feedback</h2>
<!-- </div> -->
<div class="row100">
<div class="col">
<div class="inputBox">
<input type="text" name="fname" required="required"> 
<span class="text">First Name</span>
<span class="line"></span>
</div>
</div>
<div class="col">
<div class="inputBox">
<input type="text" name="lname" required="required"> 
<span class="text">Last Name</span>
<span class="line"></span>
</div>
</div>
</div>
<div class="row100">
    <div class="col">
    <div class="inputBox">
    <input type="text" name="mail" required="required"> 
    <span class="text">Email</span>
    <span class="line"></span>
    </div>
    </div>
    <div class="col">
    <div class="inputBox">
    <input type="text" name="mobile" required="required"> 
    <span class="text">Mobile</span>
    <span class="line"></span>
    </div>
    </div>
</div>


<div class="row100"> 
<div class="col">     
<div class="inputBox textarea">
<textarea required="required" name="msg"></textarea>
<span class="text">Type Your Message Here...</span>
<span class="line"></span>
</div>
</div>
</div>


<div class="row100"> 
<div class="col">     
<button type="submit" class='submit' >Submit</button>
</div>
</div>
<!-- </div> -->
</form>
</section>
</body>
</html>

<?php


if  ($_SERVER['REQUEST_METHOD'] == "POST")
{

    $servername_db = "localhost";
      $username_db = "root";
      $password_db = "";
      $database_db = "aryan_db";

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email= $_POST['mail'];
      $mobile= $_POST['mobile'];

      $message= $_POST['msg'];
       //$password =$_POST['password'];
      // Create a connection
      $conn = mysqli_connect($servername_db, $username_db, $password_db, $database_db);
      
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else
      {
        $sql = "INSERT INTO feedback VALUES ('$fname','$lname','$email','$mobile','$message')";
        $result = mysqli_query($conn, $sql);
    }
}
?>

