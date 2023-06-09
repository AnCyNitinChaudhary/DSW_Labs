
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <style>
            body{
                font-family: 'Open Sans', sans-serif;
                color: azure;
            }
        </style>
</head>
<body>
    <nav class="navbar">
        <div class = "lome">
        <!-- <img src="/ logo.png" alt="logo" width="50px" height="50px" class = 'logo' > -->
        <a class = 'logo' href="index.html"><img src="logo.png" alt="logo" width="40px" height="40px"></a>
        </div>
            <!-- NAVIGATION MENU -->
            <ul class="nav-links">
            <!-- NAVIGATION MENUS -->
            <div class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="/">About</a></li>
                <li class="services">
                <a href="/">Subjects</a>
                <!-- DROPDOWN MENU -->
                <ul class="dropdown">
                    <li><a href="/">Data Structures</a></li>
                    <li><a href="/">Database Systems and Web lab</a></li>
                    <li><a href="/">Theortical foundation of computer science</a></li>
                    <li><a href="/">Electrical Science</a></li>
                    <li><a href="/">Physics</a></li>
                    <li><a href="/">Mathematics</a></li>
                    <li><a href="/">English</a></li>
                    <li><a href="/">Economics</a></li>
                    <li><a href="/">Presentation and Communication</a></li>
                    <li><a href="/">Software development and fundamentals</a></li>
                    <li><a href="/">Data Science</a></li>
                    <li><a href="/">Work shop</a></li>
                    <li><a href="/">Algorithms and Problem solving</a></li>
                    <li><a href="/">Artificial Intelligence and Machine Learning</a></li>
                    <li><a href="/">Psyshology</a></li>
                </ul>
                </li>
                
                <li><a href="/">Contact</a></li>
            </div>
            </ul>
        </nav>
    <div class="box">
    <form  action ="signup.php" method = "POST"> 
        <div class="form">
            <h2>Sign up</h2>
            <div class="inputBox">
                <input type="text" name="name" required="required">
                <span>Name</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" name="email" required="required">
                <span>Email</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" name="username" required="required">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required">
                <span>Password</span>
                <i></i>
            </div>
            <div class="links">
                
                <a href="login.php"><b>Sign in</b></a>
            </div>
            <button type="submit" class='submit' >Sign up </button>
        </div>
    </form>  
    </div>
    <div class="text">
        <h1>Wrong Password</h1>
        <!-- <h1>Username does not exist</h1> -->
        </div>
</body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        
        $servername_db = "localhost";
        $username_db = "root";
        $password_db = "";
        $database_db = "aryan_db";
        $secure_password = "";
        $name_err=$email_err=$username_err = $password_err = "";
        $name = $_POST['name'];
        $username=$_POST['username'];
        $email = $_POST['email'];
        $password=$_POST['password'];
        // Create a connection
        $conn = mysqli_connect($servername_db, $username_db, $password_db, $database_db);
        // Die if connection was not successful
        
        if (!$conn) {
            die("Sorry we failed to connect: " . mysqli_connect_error());
        } 
        else {
            //check if name is blank
            if (empty(trim($_POST["name"]))) {
                $name_err = "Name cannot be blank";
            echo $name_err;
              

            }
            else {
                $name = trim($_POST['name']);
            }
            //check if email is blank
            if (empty(trim($_POST["email"]))) {
                $email_err = "Email cannot be blank";
            echo $email_err;
            }
            else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_err = "Invalid email format";
                header("location: errorpage.html");
                  }
                $email = trim($_POST['email']);
                $result = mysqli_query($conn, "SELECT email FROM signup WHERE email = '$email'");
                if (mysqli_num_rows($result)) {
                    $email_err = "This email is already taken";
                    header("location: errorpage.html");
                }
             }
        
        // Check if username is empty
        if (empty(trim($_POST["username"]))){
            $username_err = "Username cannot be blank";
        }
        else {
            $username = trim($_POST['username']);
            $result = mysqli_query($conn, "SELECT username FROM signup WHERE username = '$username'");
            if (mysqli_num_rows($result)) {
                $username_err = "This username is already  taken";
                header("location: errorpage.html");
            }
        }
   // Check for password
        if (empty(trim($_POST['password']))) {
            $password_err = "Password cannot be blank";
        } elseif (strlen(trim($_POST['password'])) < 5) {
            $password_err = "Password cannot be less than 5 characters";
            header("location: errorpage.html");
        } else {
            $password = trim($_POST['password']);
            $secure_password = password_hash($password, PASSWORD_DEFAULT);
        }
        // If there were no errors, go ahead and insert into the database
        
        if ($name_err=="" && $email_err=="" &&  $username_err=="" && $password_err=="") {
            $sql = "INSERT INTO signup VALUES ('$name','$email','$username','$secure_password')";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                header("location: login.php");
            }
        }
    }
    }
?>