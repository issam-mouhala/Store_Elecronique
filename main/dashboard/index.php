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
              <div ><i class="fa-solid fa-bars nav_bar"  data-nav="0"></i></div>

    <nav>
        <div>  
            <h1>Dashboard</h1>
<!-- <img src="../img/WhatsApp Image 2024-04-12 at 19.44.34.jpeg" alt="" srcset=""> -->
        </div>
      <ul>   <li>Home</li>   
            <li>Products</li>
            <li>Users</li>
            <li>option4</li>
            <li>option5</li>
        </ul>
        <a href="http://127.0.0.1/siteWebProject/SiteMiniProject/main/signin/signin.php">  <h2 class="out">Out</h2></a>  
    </nav>
    <div class="dash">
         <div class="statique" >
             <div><div class="S1 s"><span data-pro="0" id="users">0</span></div><h1>Users</h1><div id="bar"><span data-bar="0" id="users_bar"></span></div></div> 
             <div><div class="S2 s"><span data-pro="0" id="products">0</span></div><h1>Products</h1><div id="bar" ><span data-bar="0" id="products_bar"></span></div></div>
             <div><div class="S3 s">$<span data-price="0" id="price_totale">0</span></div><h1>Price Totale</h1><div id="bar"><span data-bar="0" id="price_totale_bar"></span></div></div>
             <!-- <div><div class="S4">0</div><h1>A</h1><div id="bar"><span></span></div></div> -->
             <!-- <div><div class="S5">0</div><h1>A</h1><div id="bar"><span></span></div></div>  -->
         </div>
         <div class="controller">
         <div><div class="b_u"><span  id="best_user">Null</span></div><h1>Top User</h1><button>More Detaills</button></div> 
         <div><div class="b_pro"><span  id="best_product">Null</span></div><h1>Top Product</h1><button>More Detaills</button></div>
         <div><div class="b_p"><span  id="best_price">Null</span></div><h1>Top Price</h1><button>More Detaills</button></div>  
         </div>
    </div>
        <?php
        $sql_Nb_users="SELECT COUNT(*) user FROM USERS";
        $sql_Nb_Products="SELECT COUNT(*) products FROM Products";
        $sql_Sum_Products="SELECT SUM(price) sum,MAX(price) max FROM Products";
        $query_Nb_users=mysqli_query($conn,$sql_Nb_users);
        $query_Nb_products=mysqli_query($conn,$sql_Nb_Products);
        $query_sum_products=mysqli_query($conn,$sql_Sum_Products);
        $Nb_users=mysqli_fetch_assoc($query_Nb_users);
        $Nb_products=mysqli_fetch_assoc($query_Nb_products);
        $Sum_products=mysqli_fetch_assoc($query_sum_products);
        echo ' <script>
        let s=document.querySelectorAll(".s > span");
        s.forEach(e => {
            if(e.id=="users"){
                e.dataset.pro='.$Nb_users["user"].'
            }
            if(e.id=="products"){
                e.dataset.pro='.$Nb_products["products"].'
            }
            if(e.id=="price_totale"){
                e.dataset.price='.$Sum_products["sum"].'.toFixed(3);
                e.textContent='.$Sum_products["sum"].'.toFixed(3)
            }
             let count=  setInterval(()=>{
                if(e.id!="price_totale"){
                                                ++e.textContent;           

                }
            
        if(e.textContent==e.dataset.pro){
            clearInterval(count);
        }
        },20)
        });
        let bar=document.querySelectorAll("#bar > span");
        bar.forEach(e => {   
                if(e.id=="users_bar"){
                    e.dataset.bar='.$Nb_users["user"].'
                }
                if(e.id=="products_bar"){
                    e.dataset.bar='.$Nb_products["products"].'
                }
                if(e.id=="price_totale_bar"){
                    e.dataset.bar=(('.$Sum_products["sum"].'.toFixed(0)*0.1)/10000).toFixed(9)*1000
                }
                e.style.width= e.dataset.bar+"%";
            if(e.style.width==e.dataset.bar){
                clearInterval(count);
            }
            });

       let top_price=document.querySelector("#best_price");
       top_price.textContent= "$"+'.$Sum_products["max"].';
        </script>';
        ?>
        <script>
               let nav_bar=document.querySelector(".nav_bar");
        nav_bar.onclick=()=>{                    console.log("eee");

                 if(nav_bar.dataset.nav==0){
                    document.querySelector("nav").style.display="flex";
                    nav_bar.dataset.nav=1;
                 }else{
                    document.querySelector("nav").style.display="none";
                    nav_bar.dataset.nav=0;
                 }
        }
 

  </script>
    <script src="../scriptPhone.js">

</script>
</body>
</html>