
<?php
include("db_connect.php");
$sql_by_id="DROP TABLE IF EXISTS SELECT_USERS";
mysqli_query($conn,$sql_by_id);
$sql="CREATE TABLE IF NOT EXISTS Select_USERS(id_s INT AUTO_INCREMENT  PRIMARY KEY,id INT)";
mysqli_query($conn,$sql);
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">';
    ?>
    <title>Lotchy store</title>
  </head>
  <style>
 
<?php   
     include("design.css");
?>
  </style>
  <body>
    <nav><h1 class="titre">Lotchy Store</h1>
    <button><a href="../home/"> Home </a> </button></nav>
    
    <main>
 <div class="signin">

 <div class="container">
    <div class="title">Signin</div>
    <div class="content">
      <form action="save_data.php" method="post">
        <input style="display: none;" type="search" name="lang" id="" value="">
        <?php  
        if(isset($status)){
          echo ' <div class="alert alert-danger">
          <strong>'.$status.'</strong> </div>';
        }
        ?>
        <div class="user-details d_signin">
         
          <div class="input-box">
            <span class="details" >Email</span>
            <input type="text" placeholder="Enter your email" style="width: 20vw;" name="email" required>
          </div>
          
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" name="password" style="width: 20vw;" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="sub" value="Sign-in">
        </div>
        <h2 class="signupbtn" onclick="display('signup','signin')">Sign Up</h2>
      </form>
    </div>
  </div>
      </div>
      <div class="signup" >
      <div class="container">
    <div class="title">Signup</div>
    <div class="content">
      <form action="save_data.php" method="post">
      <?php  
        if(isset($status2)){
          if ($status2="success") {
            echo ' <div class="alert alert-success">
            <strong>'.$status2.'</strong> </div>';          }else{

            echo ' <div class="alert alert-danger">
            <strong>'.$status2.'</strong> </div>';
          }
         
        }
        ?>
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="fullname" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="username" name="username" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="tel"  name="phone" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="m">
          <input type="radio" name="gender" id="dot-2" value="f">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
        
          </div>
        </div>
        <div class="button">
          <input type="submit" name="signup" value="Register">
        </div>
      </form>
      <h2 class="signinbtn" onclick="display('signin','signup')">Sign In</h2>
    </div>
  </div>
      </div>
    </main>
    
    <div class="lang">
                <h1><a href="signinar.php">-عربية-</a></h1>
    </div>
    <h1 class="by">Created By IssaM MouhalA</h1>
  </body>
  <script src="../scriptPhone.js">
            
  </script>
  <script>
    document.querySelector('.'+window.localStorage.getItem("input")).style.display="block"
      function display(th,name) {
                 th=document.querySelector("."+th)
                th.style.display="block"
                th.id="test"
             document.querySelector("."+name).style.display="none"
             window.localStorage.setItem("input",th.className)
              }
              
             

  </script>
</html>
