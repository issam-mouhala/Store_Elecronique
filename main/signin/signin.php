
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
    <title>Lotchy store</title>
  </head>
  <style>
 
<?php   
     include("design.css");
?>
  </style>
  <body>
    <main>
      <form action="http://127.0.0.1/siteWebProject/SiteMiniProject/main/signin/save_data.php" method="post">
        <div class="cont">
          <h1>Sign In</h1>
          <?php  
          if(isset($status)){
            echo "<h2>$status</h2>";
          }
          ?>
          <input type="email" name="email" placeholder="Email" />
          <input type="password" name="password" placeholder="Password" />
          <input type="submit" name="sub" value="Sign In" />
          <!-- <h2><a href="">Forgot password?</a> Or <a href="">Sign Up</a></h2> -->
          <h2><a href="">Sign Up</a></h2>
        </div>
      </form>
    </main>
    <video class="jw-video jw-reset" tabindex="-1" disableremoteplayback="" webkit-playsinline="" playsinline="" preload="auto" src="https://server-hls2-stream-c2.cdn-tube.xyz/v/01/00046/glenvu4a21ht_o/o.mp4?t=tO1Ppd-LcZor44ebsnfFtzGWEKJG0BND7I6NrAu1dlo&amp;s=1713357198&amp;e=86400&amp;f=230107&amp;sp=30000&amp;i=0.0"></video>
    <button><a href="http://127.0.0.1/SiteWebProject/SiteMiniProject/main/home/index.php">Back To Home Page</a> </button>
  </body>
  <script src="../scriptPhone.js">

  </script>
</html>
