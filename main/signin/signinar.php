
<?php
include("db_connect.php");
$sql_by_id="DROP TABLE IF EXISTS SELECT_USERS";
mysqli_query($conn,$sql_by_id);
$sql="CREATE TABLE IF NOT EXISTS Select_USERS(id_s INT AUTO_INCREMENT  PRIMARY KEY,id INT)";
mysqli_query($conn,$sql);
?> 
<!DOCTYPE html>
<html lang="ar">
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
  <body dir="rtl">
    <nav>     <h1 class="titre">متجر لوتشي</h1>
   <button ><a href="../home/"> الصفحة الرئيسية</a> </button>
</nav>
    <main>
      <form action="save_data.php" method="post">
        <input style="display: none;" type="search" name="lang" id="" value="ar">
      <h1>تسجيل الدخول</h1>
        <div class="cont">
          <?php  
          if(isset($status)){
            echo ' <div class="alert alert-danger">
            <strong>'.$status.'</strong> </div>';
          }
          ?>
          <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="email" type="email" class="form-control" name="email" placeholder="اسم المستخدم/حساب">
  </div>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="password" placeholder="كلمة السر">
  </div>          <input type="submit" name="sub" value="تسحيل الدخول" />
          <!-- <h2><a href="">Forgot password?</a> Or <a href="">Sign Up</a></h2> -->
          <h2 class="signup"><a href="">إنشاء حساب</a></h2>
        </div>
      </form>
    </main>
    <div class="lang">
                <h1><a href="signin.php">-English-</a></h1>
    </div>
    <h1 class="by">إنشاء من عصام محلى</h1>
  </body>
  <script src="../scriptPhone.js">
  </script>
</html>
