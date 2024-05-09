<?php 
include("../signin/db_connect.php");
$sql_by_id="SELECT * FROM USERS WHERE id=(SELECT id FROM SELECT_USERS)";
$by_id=mysqli_query($conn,
    "SELECT id FROM SELECT_USERS");
    $nom="Guest";
    if (mysqli_num_rows($by_id)>0) {
      
  $user=mysqli_fetch_assoc($by_id)["id"]; 
    $r2=mysqli_query($conn,"SELECT * FROM products_sale where id_user=$user");
if(mysqli_num_rows(mysqli_query($conn,$sql_by_id))<=0){
}else{
  $row=mysqli_fetch_assoc((mysqli_query($conn,$sql_by_id)));
  $nom=$row["username"];
  if(isset($_POST["btn"])){    
    $sql="SELECT *  FROM products_sale where id_user=$user and id_pro=".$_POST['products']."";
    $r= mysqli_query($conn,$sql);
      if(mysqli_num_rows($r)<=0){ 
          $sql="insert into products_sale(id_user,id_pro) values(".$user.",".$_POST["products"].")";
  mysqli_query($conn,$sql);
  header("location: index.php");

      }
    
  
  }
}
}else{
  if(isset($_POST["btn"])){
  
  }
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
      <!-- <input type="search" name="" id="" placeholder="Search in store...">
      <input type="submit" value="Search"> -->
      <ul class="nav" >
        <li onclick="main(this)" data-class="homes" id="li1">Home</li>
        <li onclick="main(this)" data-class="ordinateurs" id="li2">Ordinateurs</li>
        <li onclick="main(this)" data-class="materiels" id="li3">Materiels</li>
        <li onclick="main(this)" data-class="phones" id="li4">Phones</li>
        <li onclick="main(this)" data-class="screens" id="li5">Screens</li>
        <div id="sale_display" >
          <div class="top"></div>
        </div>
        <li id="sale_inc" data-click="false"><i class="fa-solid fa-cart-plus">
          <span id="sale">
          <?php
            if (mysqli_num_rows($by_id)>0) {
          $sql="SELECT COUNT(id_user) as sum FROM products_sale where id_user=$user ";
       $r= mysqli_query($conn,$sql);
       echo  mysqli_fetch_assoc($r)["sum"];
            }else{
              echo 0;
            }
        ?>
        </span></i></li>
        <?php
        if($nom=="Guest"){
          echo '<li class="signin"><a id="signin"href="../signin/signin.php" >Sign In<i class="fa-solid fa-chevron-down"></i></a></li>
          ';
        }else{
          echo '<h3>Hello <u id="name">'.$nom.'</h3></u><li><a id="signout" href="http://127.0.0.1/siteWebProject/SiteMiniProject/main/signin/signin.php">    
          <i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>';
        }
        
        
        
        ?>
      </ul>
    </nav>
    <div id="switch_imgs" data-i="2">
    <div id="price_solde">
        <img src="../img/stock/stock_img12.png"  >
        <h1>22.4Dhs</h1>
        </div>
        <div id="price_solde">
        <img src="../img/stock/stock_img11.png"  >
        <h1>6720Dhs</h1>
        </div>
        <div id="price_solde">
        <img src="../img/stock/stock_img2.png"  >
        <h1>3149Dhs</h1>
        </div>
         
        <div id="price_solde">
        <img src="../img/stock/stock_img13.png"  >
        <h1>500Dhs</h1>
        </div>        <div id="price_solde">
        <img src="../img/stock/stock_img14.png"  >
        <h1>2050Dhs</h1>
        </div>

      </div>
      <div class="flex_r screen homes" id="products" data-class="homes" >
        <?php 
        $sql="SELECT * FROM products";
       $r= mysqli_query($conn,$sql);
        $i=0;
       while($row=mysqli_fetch_assoc($r)){
          echo"
          <div class=\"product".$i."\" id=\"product\">
          <div class=\"before\">
          ".$row["Solde"]."%
        </div>
          <div class=\"product".$i."_img product_img\">
          <img src=\"".$row["Image"]."\" alt=\"img".$i."\">
        </div>
        <h1>".$row["name"]."</h1>
        <div class=\"product".$i."_price product_price\">
          <a><h2>Price ".$row["Price"]-($row["Price"]*($row["Solde"]/100))." <div class='dhs' >Dhs</div></h2></a>
          <h2>".$row["Price"]." <div class='dhs' >Dhs</div></h2>
        </div>
        <form action=\"index.php\" method=\"post\">
          <input name=\"products\" value=\"".$row['id_s']."\" style=\"display: none;\">
          <div class=\"panier_paye\">
            <button name=\"btn\" type=\"reset\" onclick=\"  let name='$nom'
            if (name=='Guest') {
                  document.querySelector('.signin_des').style.display='flex';
            }else{
                     this.type='submit';
            }\">
              <i class=\"fa-solid fa-cart-plus panier\" id=\"product".$i."\" data-click=\"false\" data-name_product=\"".$row["name"]."\"><h4>Add to carte</h4></i>
            </button>
          </div>
        </form>
        </div>
              ";
       }
        
    
       ?> 
      </div>
      <div class="displaye_paye">
         <div class="hide">
          x
         </div>
      </div>

      <div class="flex_r screen materiels"  data-class="materiels" id="products"  >
        <?php 
        $sql="SELECT * FROM products where type='materiels'";
       $r= mysqli_query($conn,$sql);
        $i=0;
       while($row=mysqli_fetch_assoc($r)){
          echo"
          <div class=\"product".$i."\" id=\"product\">
          <div class=\"before\">
          ".$row["Solde"]."%
        </div>
          <div class=\"product".$i."_img product_img\">
          <img src=\"".$row["Image"]."\" alt=\"img".$i."\">
        </div>
        <h1>".$row["name"]."</h1>
        <div class=\"product".$i."_price product_price\">
          <a><h2>Price ".$row["Price"]-($row["Price"]*($row["Solde"]/100))." <div class='dhs' >Dhs</div></h2></a>
          <h2>".$row["Price"]." <div class='dhs' >Dhs</div></h2>
        </div>
        <form action=\"index.php\" method=\"post\">
          <input name=\"products\" value=\"".$row['id_s']."\" style=\"display: none;\">
          <div class=\"panier_paye\">
            <button name=\"btn\" type=\"reset\" onclick=\"  let name='$nom'
            if (name=='Guest') {
                  document.querySelector('.signin_des').style.display='flex';
            }else{
                     this.type='submit';
            }\">
              <i class=\"fa-solid fa-cart-plus panier\" id=\"product".$i."\" data-click=\"false\" data-name_product=\"".$row["name"]."\"><h4>Add to carte</h4></i>
            </button>
          </div>
        </form>
        </div>
              ";
       }
        
    
       ?> 
      </div>
                  
      <div class="flex_r screen phones" data-class="phones" id="products"  >
        <?php 
        $sql="SELECT * FROM products where type='phones'";
       $r= mysqli_query($conn,$sql);
        $i=0;
       while($row=mysqli_fetch_assoc($r)){
          echo"
          <div class=\"product".$i."\" id=\"product\">
          <div class=\"before\">
          ".$row["Solde"]."%
        </div>
          <div class=\"product".$i."_img product_img\">
          <img src=\"".$row["Image"]."\" alt=\"img".$i."\">
        </div>
        <h1>".$row["name"]."</h1>
        <div class=\"product".$i."_price product_price\">
          <a><h2>Price ".$row["Price"]-($row["Price"]*($row["Solde"]/100))." <div class='dhs' >Dhs</div></h2></a>
          <h2>".$row["Price"]." <div class='dhs' >Dhs</div></h2>
        </div>
        <form action=\"index.php\" method=\"post\">
          <input name=\"products\" value=\"".$row['id_s']."\" style=\"display: none;\">
          <div class=\"panier_paye\">
            <button name=\"btn\" type=\"reset\" onclick=\"  let name='$nom'
            if (name=='Guest') {
                  document.querySelector('.signin_des').style.display='flex';
            }else{
                     this.type='submit';
            }\">
              <i class=\"fa-solid fa-cart-plus panier\" id=\"product".$i."\" data-click=\"false\" data-name_product=\"".$row["name"]."\"><h4>Add to carte</h4></i>
            </button>
          </div>
        </form>
        </div>
              ";
       }
        
    
       ?> 
      </div> 
      
      <div class="flex_r screen ordinateurs " data-class="ordinateurs" id="products"  >
        <?php 
        $sql="SELECT * FROM products where type='ordinateurs'";
       $r= mysqli_query($conn,$sql);
        $i=0;
       while($row=mysqli_fetch_assoc($r)){
          echo"
          <div class=\"product".$i."\" id=\"product\">
          <div class=\"before\">
          ".$row["Solde"]."%
        </div>
          <div class=\"product".$i."_img product_img\">
          <img src=\"".$row["Image"]."\" alt=\"img".$i."\">
        </div>
        <h1>".$row["name"]."</h1>
        <div class=\"product".$i."_price product_price\">
          <a><h2>Price ".$row["Price"]-($row["Price"]*($row["Solde"]/100))." <div class='dhs' >Dhs</div></h2></a>
          <h2>".$row["Price"]." <div class='dhs' >Dhs</div></h2>
        </div>
        <form action=\"index.php\" method=\"post\">
          <input name=\"products\" value=\"".$row['id_s']."\" style=\"display: none;\">
          <div class=\"panier_paye\">
            <button name=\"btn\" type=\"reset\" onclick=\"  let name='$nom'
            if (name=='Guest') {
                  document.querySelector('.signin_des').style.display='flex';
            }else{
                     this.type='submit';
            }\">
              <i class=\"fa-solid fa-cart-plus panier\" id=\"product".$i."\" data-click=\"false\" data-name_product=\"".$row["name"]."\"><h4>Add to carte</h4></i>
            </button>
          </div>
        </form>
        </div>
              ";
       }
        
    
       ?> 
      </div>
    
      
      <div class="flex_r screen screens" data-class="screens" id="products"  >
        <?php 
        $sql="SELECT * FROM products where type='screens'";
       $r= mysqli_query($conn,$sql);
        $i=0;
       while($row=mysqli_fetch_assoc($r)){
          echo"
          <div class=\"product".$i."\" id=\"product\">
          <div class=\"before\">
          ".$row["Solde"]."%
        </div>
          <div class=\"product".$i."_img product_img\">
          <img src=\"".$row["Image"]."\" alt=\"img".$i."\">
        </div>
        <h1>".$row["name"]."</h1>
        <div class=\"product".$i."_price product_price\">
          <a><h2>Price ".$row["Price"]-($row["Price"]*($row["Solde"]/100))." <div class='dhs' >Dhs</div></h2></a>
          <h2>".$row["Price"]." <div class='dhs' >Dhs</div></h2>
        </div>
        <form action=\"index.php\" method=\"post\">
          <input name=\"products\" value=\"".$row['id_s']."\" style=\"display: none;\">
          <div class=\"panier_paye\">
            <button name=\"btn\" type=\"reset\" onclick=\"  let name='$nom'
            if (name=='Guest') {
                  document.querySelector('.signin_des').style.display='flex';
            }else{
                     this.type='submit';
            }\">
              <i class=\"fa-solid fa-cart-plus panier\" id=\"product".$i."\" data-click=\"false\" data-name_product=\"".$row["name"]."\"><h4>Add to carte</h4></i>
            </button>
          </div>
        </form>
        </div>
              ";
       }
        
    
       ?> 
      </div>
      </div>
    </main>
    
    <footer>
    <div class="footer-content">
        <div class="footer-section about">
            <h2>À propos</h2>
            <p>
Lotchy Store est une boutique en ligne spécialisée dans la vente de produits de haute qualité. Notre entreprise s'engage à offrir une large gamme de produits tendance.</p>
            <div class="contact">
                <span><i class="fas fa-envelope"></i> Issam.MOUHALA@Gmail.com</span>
                <span><i class="fas fa-phone"></i> +123456789</span>
            </div>
            <div class="socials">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="footer-section links">
            <h2>Liens rapides</h2>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">À propos</a></li>
                <li><a href="#">Produits</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2024 Lotchy Store. Tous droits réservés.
    </div>
</footer>


    <div class="signin_des">
      <div class="x" onclick="document.querySelector('.signin_des').style.display='none'">
        X
      </div>
    <div class="signin"><a id="signin"href="../signin/signin.php" >Sign In<i class="fa-solid fa-chevron-down"></i></a></div>
    </div>
    <script>
        let desp=document.querySelector("#"+window.localStorage.getItem("li"))
            document.querySelector("."+desp.dataset.class).style.display="flex"
            desp.className="bg"
              function main(th){
                let screen=document.querySelectorAll(".screen");

                          th.className="bg";
                          document.querySelectorAll("li").forEach((e)=>{
                            if (e!=th) {
                                e.removeAttribute("class")
                            } 
                          })
                  screen.forEach(e => {
                    
                    if(e.dataset.class==th.dataset.class){
                         e.style.display="flex"
                         window.localStorage.setItem("li",th.id)
                    }else{
                        e.style.display="none"
                    }
                  });
                
        }
      let li;
      let h3;
      let div;
      let detils;
      let x;
       
      <?php
      include("main.js");
      // while($rows= mysqli_fetch_assoc($r2)){
      //   $getpro="SELECT * from products where id_s=".$rows['id_pro']." ";
      //      $r=mysqli_query($conn,$getpro);
      //      $pro= mysqli_fetch_assoc($r);
      //      $pro=$pro['name'];
      //      $date=$rows['date'];
      //     echo " 
      //     form=document.createElement('form')
      //     form.method='post'
      //     form.action='index.php'

      //     li=document.createElement('ol')
      //     detils=document.createElement('p')
      //     x=document.createElement('button')
      //     input=document.createElement('input')
      //     input.name='idpro'
      //     input.value=".$rows['id_pro']."
      //     input.style.display='none'
      //     x.name='delete'
      //     x.innerText='X'
      //     x.id='x'
      //     detils.innerText=\"".$pro."\"
      //     div=document.createElement('div')
      //     h3=document.createElement('h3')
      //     h3.innerText=\"".$date."\"
      //     div.append(detils,h3)
      //     li.append(div,x)
      //     form.append(li,input)

      //     sale_displays.append(form)";
                    
      //   }
         if(isset($_POST['delete'])){
          $getpro= $_POST['idpro'];
          $getpro="DELETE from products_sale where id_user=$user AND id_pro=$getpro";
          mysqli_query($conn,$getpro);
          header('location:index.php');
         }
      ?>
         // Accéder aux variables CSS définies dans :root
//     var rootStyles = getComputedStyle(document.documentElement);

// // Récupérer la valeur des variables
// var mainColor = rootStyles.getPropertyValue('--befor');

// Afficher les valeurs
  </script>
      <script src="../scriptPhone.js">
        
       </script>
       
 
       
  </body>
</html>
<?php


?>