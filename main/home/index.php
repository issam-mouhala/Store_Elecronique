<?php 
include("../signin/db_connect.php");
$sql_by_id="SELECT * FROM USERS WHERE id=(SELECT id FROM SELECT_USERS)";
if(mysqli_num_rows(mysqli_query($conn,$sql_by_id))<=0){
  $nom="Guest";
}else{
  $row=mysqli_fetch_assoc((mysqli_query($conn,$sql_by_id)));
  $nom=$row["email"];
  if(isset($_POST["btn"])){
  $sql="insert into products_sale(id_user,id_pro) values(".mysqli_fetch_assoc((mysqli_query($conn,
  "SELECT id FROM SELECT_USERS")))["id"].",".$_POST["products"].")";
mysqli_query($conn,$sql);}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <meta http-equiv="refresh" content="20000">
    <title>Lotchy Store</title>
  </head>
  <style>
    <?php
    include("design.css")
    ?>
  </style>
  <body>
    <nav class="flex_r_sb">
      <div class="titre flex_r">
        <h1>Lotchy Store</h1>
      </div>
      <input type="search" name="" id="" placeholder="Search in store...">
      <input type="submit" value="Search">
      <ul class="nav" >
       
        <li><a  href="" id="a">Option2</a></li>
        <li><a href="" id="a">Option3</a></li>
        <li><a href="" id="a">Option4</a></li>
        <div id="sale_display" ><ol></ol></div>
        <li id="sale_inc" data-click="false"><i class="fa-solid fa-cart-plus"><span id="sale">0</span></i></li>
        <?php
        if($nom=="Guest"){
          echo '<li class="signin"><a id="signin"href="../signin/signin.php" >Sign In<i class="fa-solid fa-chevron-down"></i></a></li>
          ';
        }else{
          echo '<h3>'.$nom.'</h3><li><a id="signout" href="http://127.0.0.1/siteWebProject/SiteMiniProject/main/signin/signin.php">    
          Sign Out</a></li>';
        }
        
        
        
        ?>
      </ul>
    </nav>
    <main>
    <div id="switch_imgs" data-i="2">
        <img src="../img/stock/stock_img3.jpg" alt="" >
        <img src="../img/stock/stock_img4.jpg"  >
        <img src="../img/stock/stock_img9.jpg" >
        <img src="../img/stock/stock_img10.jpg" >
        <img src="../img/stock/stock_img2.jpg" >

      </div>
      <div class="flex_r" id="products">
        <?php 
       $n=20;
         for($i=1;$i<$n+1;$i++){
          
              echo"
              <div class=\"product".$i."\" id=\"product\">
              <div class=\"product".$i."_img product_img\">
              <img src=\"../img/stock/stock".$i."_img.jpg\" alt=\"img".$i."\">
            </div>
            <h1>Pc Laptob 350G sdd</h1>
            <div class=\"product".$i."_price product_price\">
              <a><h2>Price $91</h2></a>
              <h2>$103</h2>
            </div>
            <form action=\"index.php\" method=\"post\">
              <input name=\"products\" value=\"".$i."\" style=\"display: none;\">
              <div class=\"panier_paye\">
                <h1 class=\"paye\" name=\"paye\">Payer</h1>
                <button name=\"btn\">
                  <i class=\"fa-solid fa-cart-plus panier\" id=\"product".$i."\" data-click=\"false\" data-name_product=\"Pc Laptob 350G sdd\"></i>
                </button>
              </div>
            </form>
            </div>
                  ";
         }
       
       ?> 
      </div>
    </main>
    <footer>
    </footer>
    <script>
      <?php
      include("main.js");
      ?>
        
    </script>
      <script src="../scriptPhone.js">
      // .style.setProperty("--befor","b")
      console.log( document.querySelector(":root"));
       
       </script>
  </body>
</html>
