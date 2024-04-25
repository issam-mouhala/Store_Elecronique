<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <?php
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">';
    ?>
   <!-- <meta http-equiv="refresh" content="5"> -->
    <link rel="stylesheet" href="design.css">
    <title>Dashboard</title>
</head>
<style>
    <?php
    include("design.css");  
    include("../signin/db_connect.php");

    ?>
</style>
<body>
              <div class="i" ><i class="fa-solid fa-bars nav_bar"  data-nav="0"></i></div>

    <nav>
        <div>  
            <h1>Dashboard</h1>
<!-- <img src="../img/WhatsApp Image 2024-04-12 at 19.44.34.jpeg" alt="" srcset=""> -->
        </div>
      <ul>   <li onclick="main(this)" data-class="dash" id="li1"><i class="fa-solid fa-house"></i>Home</li>   
            <li onclick="main(this)" data-class="Products" id="li2"><i class="fa-solid fa-bag-shopping"></i>Products</li>
            <li onclick="main(this)" data-class="users" id="li3"><i class="fa-solid fa-user-group"></i>Users</li>
            <!-- <li>option4</li>
            <li>option5</li> -->
        </ul>
        <a href="../signin/signin.php">  <h2 class="out">Out</h2></a>  
    </nav>
    <main></main>
    <div class="dash screen"  data-class="dash">

         <div class="statique" >
             <div><div class="S1 s"><div><i class="fa-solid fa-user-group"></i></div><span data-pro="0" id="users">0</span></div><h1>Users</h1><div id="bar"><span data-bar="0" id="users_bar"></span></div></div> 
             <div><div class="S2 s"><div><i class="fa-solid fa-bag-shopping"></i></div><span data-pro="0" id="products">0</span></div><h1>Products</h1><div id="bar" ><span data-bar="0" id="products_bar"></span></div></div>
             <div><div class="S3 s"><div><i class="fa-solid fa-hand-holding-dollar"></i></div>$<span data-price="0" id="price_totale">0</span></div><h1>Price Totale</h1><div id="bar"><span data-bar="0" id="price_totale_bar"></span></div></div>
             <!-- <div><div class="S4">0</div><h1>A</h1><div id="bar"><span></span></div></div> -->
             <!-- <div><div class="S5">0</div><h1>A</h1><div id="bar"><span></span></div></div>  -->
         </div>
         <div class="controller">
         <div><div class="b_u"><span  id="best_user">Null</span></div><h1>Top User</h1><button data-s="0" onclick="display('d_user',this)">More Detaills</button><div class="detaills d_user">
         <div id="image" class="info"><div  class="label"></div><p></p></div>
         <div id="username" class="info"><div  class="label">Name : </div><p></p></div>
        <div id="email" class="info"><div  class="label">Email: </div><p> </p></div>
        </div></div> 
         <div><div class="b_pro"><span  id="best_product">Null</span></div><h1>Top Product</h1><button data-s="0" onclick="display('d_pro',this)">More Detaills</button><div class="detaills d_pro">
         <div id="image" class="info"><div  class="label"></div><p></p></div>
         <div id="name" class="info"><div  class="label">Name : </div><p></p></div>
        <div id="desc" class="info"><div  class="label">Description : </div><p> </p></div>
        <div id="price"class="info" ><div  class="label">Price : </div><p></p></div>
        <div id="solde" class="info"><div  class="label">Solde : </div><p></p></div>
        </div></div>
         <div><div class="b_p"><span  id="best_price">Null</span></div><h1>Top Price</h1><button data-s="0" onclick="display('d_price',this)">More Detaills</button><div class="detaills d_price">
         <div id="image" class="info"><div  class="label"></div><p></p></div>
         <div id="name" class="info"><div  class="label">Name : </div><p></p></div>
        <div id="desc" class="info"><div  class="label">Description : </div><p> </p></div>
        <div id="price"class="info" ><div  class="label">Price : </div><p></p></div>
        <div id="solde" class="info"><div  class="label">Solde : </div><p></p></div>
         </div></div>  
         </div>
    </div>
    <div class="Products screen"  data-class="Products">
    <h1>PRODUCTS</h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price($)</th>
                    <th>Solde(%)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
             $sql_data="select * from products ";
             $query_data=mysqli_query($conn,$sql_data);
            
            while ( $top_data=mysqli_fetch_assoc($query_data)) {
                echo '        <form action="get_statique.php" method="post">
                <input style="display:none"   type=\"hidden\" name="type"  value="products">

                ';
                 echo"
                 <tr>
            <td><div><input readonly type=\"search\" name=\"p\" id=\"\" value=\"".$top_data['id_s']."\"></div></td>
            <td><div><input   type=\"search\" name=\"name\" id=\"\" value=\"".$top_data['name']."\"></div></td>
            <td><div><input   type=\"search\" name=\"desc\" id=\"\" value=\"".$top_data['descreption']."\"></div></td>
            <td><div><input   type=\"search\" name=\"price\" id=\"\" value=\"".$top_data['Price']."\"></div></td>
            <td><div><input   type=\"search\" name=\"solde\" id=\"\" value=\"".$top_data['Solde']."\"></div></td>
            <input  style='display:none'  type=\"search\" name=\"image\" id=\"\" value=\"".$top_data['Image']."\">
            <td>  
            <div class=btn>
            <button type=\"submit\" name=\"edite\">Edite</button>
            <button type=\"submit\" name=\"delete\">Delete</button>
            </form>
            <form action=\"index.php\" method=\"post\">
            <input  style='display:none' type=\"search\" name=\"name\" id=\"\" value=\"".$top_data['name']."\">
            <input  style='display:none' type=\"search\" name=\"price\" id=\"\" value=\"".$top_data['Price']."\">
            <input style='display:none'  type=\"search\" name=\"solde\" id=\"\" value=\"".$top_data['Solde']."\">
            <input  style='display:none'  type=\"search\" name=\"image\" id=\"\" value=\"".$top_data['Image']."\">
            <button type=\"submit\" name=\"afficher\">Afficher</button>

            </form>
            </div>
             </td>

            </tr>";     
            
            }
          
            ?>
             <?php
             if (isset($_POST['btn1'])) {
                echo '<form action="get_statique.php" method="post">
                <input style="display:none"   type=\"hidden\" name="type"  value="saves1">
                ';
                          echo "
                          
                          <tr>
                          <td><div><input readonly type=\"search\" name=\"p\" id=\"\" value=\"--\"></div></td>
                          <td><div><input   type=\"search\" name=\"name\" id=\"\" value=\"\"></div></td>
                          <td><div><input   type=\"search\" name=\"desc\" id=\"\" value=\"\"></div></td>
                          <td><div><input   type=\"search\" name=\"price\" id=\"\" value=\"\"></div></td>
                          <td><div><input   type=\"search\" name=\"solde\" id=\"\" value=\"\"></div></td>
                          <td>  
                          <div class=btn>
                          <button type=\"submit\" name=\"add\" id=\"save\">Save</button>
                          <button type=\"reset\" name=\"add\" id=\"remove\">Remove</button>
                          </div>
                           </td>
                           </tr>
                           </form>
                           "; 

             }
        
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <form action="index.php" method="post">
                    <td colspan="6"><button name="btn1" type="submit"  id="add" >Add</button></td>
                    </form>
                </tr>
            </tfoot>
        </table>
        <div class="screen_pro">
            <h1>SCREEN PRODUCTS</h1>
            <?php 
            
            echo"
            <div  id=\"product\">
           
          </div>
                ";
            ?>
            <div id="x">X</div>
        </div>
        </div>
      
    </div>
    </form>
    <div class="users screen"   data-class="users">
        <h1>USERS</h1>
        <div style="display: none;"  id="message">
            <strong></strong> </div>
            <table >            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
            <?php
             $sql_data="select * from users ";
             $query_data=mysqli_query($conn,$sql_data);
            
            while ( $top_data=mysqli_fetch_assoc($query_data)) {
                echo '        <form action="get_statique.php" method="post">
                <input style="display:none"   type=\"hidden\" name="type"  value="users">
                ';
                 echo"
                 <tr>
            <td><div><input  readonly  type=\"search\" name=\"a\" id=\"idd\" value=\"".$top_data['id']."\"></div></td>
            <td><div><input   type=\"search\" name=\"username\" id=\"\" value=\"".$top_data['username']."\"></div></td>
            <td><div><input   type=\"search\" name=\"email\" id=\"\" value=\"".$top_data['email']."\"></div></td>
            <td><div>************</div></td>
            <td>  
            <div class=btn>
            <button type=\"submit\" name=\"edite\" >Edite</button>
            <button type=\"submit\" name=\"delete\">Delete</button>
            </div>
             </td>
             </tr>
             ";
             echo '</form>';
            }
             ?>
             <?php
             if (isset($_POST['btn2'])) {
                echo '<form action="get_statique.php" method="post">
                <input style="display:none"   type=\"hidden\" name="type"  value="saves">
                ';
                          echo "
                          
                          <tr>
                          <td><div><input   readonly  type=\"search\" name=\"a\" id=\"id\" value=\"--\"></div></td>
                          <td><div><input   type=\"search\" name=\"username\" id=\"\" value=\"\"></div></td>
                          <td><div><input   type=\"search\" name=\"email\" id=\"\" value=\"\"></div></td>
                          <td><div><input   type=\"search\" name=\"password\" id=\"\" value=\"\"></div></td>
                          <td>  
                          <div class=btn>
                          <button type=\"reset\" name=\"add\" id=\"save\">Save</button>
                          <button type=\"reset\" name=\"add\" id=\"remove\">Remove</button>
                          </div>
                           </td>
                           </tr>
                           </form>
                           "; 

             }
        
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <form action="index.php" method="post">
                    <td colspan="5"><button name="btn2" type="submit"  id="add" >Add</button></td>
                    </form>
                </tr>
            </tfoot>
        </table>
        
</div>
      <?php
      include("get_statique.php");
      ?>
        <script>
             <?php
              if($_SERVER["REQUEST_METHOD"] == "POST" & isset($_POST['afficher']) ){

              
            echo '
             let products=document.getElementById("product");
          let screen_pro=   document.querySelector(".screen_pro");
          screen_pro.style.display="flex"

          document.querySelectorAll("#x").forEach((e)=>{
              e.style.display="block"
            e.onclick=()=>{
            screen_pro.style.display="none"
          }
          })
             products.innerHTML= ` <div class=\"product_img\"><img src='.$_POST['image'].' alt=\"img\">
             </div>
             <h1>'.$_POST['name'].'</h1>
             <div class=\"product_price\">
             <a><h2>$'.$_POST['price'].'</h2></a>
             <h2>$'.$_POST['solde'].'</h2>
             </div>
             <div class=\"panier_paye\">
             <h1 class=\"paye\" name=\"paye\">Payer</h1>
              
                <i class=\"fa-solid fa-cart-plus panier\" ></i>
            </div>`
            
            ';}
            ?>

            
            let desp=document.querySelector("#"+window.localStorage.getItem("li"))
            document.querySelector("."+desp.dataset.class).style.display="flex"
              ;
               let nav_bar=document.querySelector(".nav_bar");
        nav_bar.onclick=()=>{                 

                 if(nav_bar.dataset.nav==0){
                    document.querySelector("nav").style.display="flex";
                    nav_bar.dataset.nav=1;
                 }else{
                    document.querySelector("nav").style.display="none";
                    nav_bar.dataset.nav=0;
                 }
        }
          
        function display(name,th){
            name=document.querySelector("."+name)
                    if(th.dataset.s==0){
                    name.style.visibility="visible";
                    th.dataset.s=1;
                 }else{
                    name.style.visibility="hidden";
                    th.dataset.s=0;
                 }
                
        }
        let screen=document.querySelectorAll(".screen");
              function main(th){
                  screen.forEach(e => {
                    
                    if(e.dataset.class==th.dataset.class){
                         e.style.display="flex"
                         window.localStorage.setItem("li",th.id)
                    }else{
                        e.style.display="none"
                    }
                  });
                
        }

        let message=document.getElementById("message");
        let save=document.getElementById("save");
        let input=document.querySelectorAll('input[type="search"]:not(#id)');
        let remove=document.getElementById("remove");
        remove.onclick=()=>{
            remove.parentNode.parentNode.parentNode.remove();
            message.style.display="none"



        }
           save.onclick=()=>{
                 input.forEach((e)=>{
                    if(e.value==""){
                        message.textContent="Complet Les Champs";
                        message.style.display="block"
                        message.setAttribute("class","alert alert-danger")
                        exit;
                    }
                 })
                 message.textContent="successfully User Add";
                        message.style.display="block"
                        message.setAttribute("class","alert alert-success")
                            save.setAttribute("type","submit")
                           
                          
           }
  </script>
    <script src="../scriptPhone.js">
</script>


</body>
</html>