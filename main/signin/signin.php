
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
    <main>
      <form action="save_data.php" method="post">
      <h1>Sign In</h1>
        <div class="cont">
          <?php  
          if(isset($status)){
            echo ' <div class="alert alert-danger">
            <strong>'.$status.'</strong> </div>';
          }
          ?>
          <input type="email" name="email" placeholder="Email" />
          <input type="password" name="password" placeholder="Password" />
          <input type="submit" name="sub" value="Sign In" class="btn btn-success" />
          <!-- <h2><a href="">Forgot password?</a> Or <a href="">Sign Up</a></h2> -->
          <h2 class="signup"><a href="">Sign Up</a></h2>
        </div>
      </form>
    </main>
    <button class=" btn-primary disabled"><a href="../home/">Back To Home Page</a> </button>
  </body>
  <script src="../scriptPhone.js">

  </script>
</html>
