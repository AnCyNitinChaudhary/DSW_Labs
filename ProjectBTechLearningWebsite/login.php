
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signin.css">
</head>
<body>

        <nav class="navbar">
        <div class = "lome">
        <!-- <img src="/ logo.png" alt="logo" width="50px" height="50px" class = 'logo' > -->
        <a class = 'logo' href="index.html"><img src="logo.png" alt="logo" width="40px" height="40px"></a>
        </div>
            <!-- NAVIGATION MENU -->
            <ul class="nav-links">
            <!-- USING CHECKBOX HACK -->
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
            <!-- NAVIGATION MENUS -->
            <div class="menu">
                <li><a href="/">Home</a></li>
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
                <!-- <li><a href="/">Pricing</a></li> -->
                <li><a href="/">Contact</a></li>
            </div>
            </ul>
        </nav>

    
    <div class="box">
        <form  action ="login.php" method = "POST"> 
            <div class="form">
                <h2>Sign in</h2>
               
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
                    
                    <a href="signup.html"><b>Sign up</b></a>
                </div>
                <button type="submit" class='submit' >Sign in </button>
            </div>
        </form> 

        
    </div>
    <div class="text">
    <h1>Wrong Password</h1>
    <!-- <h1>Username does not exist</h1> -->
    </div>

       
       
<?php


if  ($_SERVER['REQUEST_METHOD'] == "POST")
{

    $servername_db = "localhost";
      $username_db = "root";
      $password_db = "";
      $database_db = "aryan_db";

      $username = $_POST['username'];
       $password =$_POST['password'];
      // $secure_password = password_hash($password, PASSWORD_DEFAULT);

      // Create a connection
      $conn = mysqli_connect($servername_db, $username_db, $password_db, $database_db);
      
    //echo $hashpassword['password'];
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else
      {
       
        $sql = "SELECT * FROM signup WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $sql = "SELECT password FROM signup WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $hashpassword = mysqli_fetch_assoc($result);
            // $sql = "SELECT * FROM signup WHERE username = '$username' AND password ='$secure_password'";
            // $result = mysqli_query($conn, $sql);
            // $sql = "SELECT password FROM signup WHERE username = '$username";
            // $result = mysqli_query($conn, $sql);
            // $hashpassword = mysqli_fetch_assoc($result);
            if (!password_verify($password, $hashpassword['password']))
            // if(mysqli_num_rows($result) == 1)
            {
                echo
                $pass_err = "<h1>";
                $pass_err .= "Wrong Password !!";
                $pass_err .= "</h1>";
                // echo "<head></head>";
                echo $pass_err;
                header("location: errorpage.html");
            } else {
                // $pass_err = '<html><head></head><body><div class="text"><h1>';
                // $pass_err .= "Wrong Password !!";
                // $pass_err .= "</h1></div></body></html>";
                // echo $pass_err;
                // header("location: signup.php");
                header("location: home.php");
                    echo 'jfbvduvbsbv';
                // }
            }
        }
            else{

                // $pass_err = '<html><head></head><body><div class="text"><h1>';
                // $pass_err .= "username does not exist";
                // $pass_err .= "</h1></div></body></html>";
                // echo $pass_err;
                echo 'jfbvduvbsbv';
                
            }
        
      }
    }

?>
</body>
</html>










