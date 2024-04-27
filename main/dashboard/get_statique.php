<?php
    include("../signin/db_connect.php");
        $sql_Nb_users="SELECT COUNT(*) user FROM USERS";
        $sql_top_Products="SELECT count(id_pro) as top_pro FROM products_sale  GROUP BY id_pro ORDER BY count(id_pro) DESC LIMIT 1 ";
        $sql_Sum_Products="SELECT SUM(price) sum,MAX(price) max FROM Products";
        $query_top_products=mysqli_query($conn,$sql_top_Products);
        $top_products=mysqli_fetch_assoc($query_top_products);
        $sql_top_Pro_name="SELECT * FROM Products where id_s='".$top_products["top_pro"]."'";
        $query_top_pro_name=mysqli_query($conn,$sql_top_Pro_name);
        $top_pro_name=mysqli_fetch_assoc($query_top_pro_name);
        $sql_Nb_Products="SELECT COUNT(*) products FROM Products";
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
                e.dataset.price='.$Sum_products["sum"].';
                e.innerText='.$Sum_products["sum"].'
            }
             let count=  setInterval(()=>{
                if(e.id!="price_totale"){
                                                ++e.innerText;           

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
                    e.dataset.bar=(('.$Sum_products["sum"].'*0.1)/100000)*1000
                }
                e.style.width= e.dataset.bar+"%";
            if(e.style.width==e.dataset.bar){
                clearInterval(count);
            }
            });

       let top_price=document.querySelector("#best_price");
       top_price.textContent= "$"+'.$Sum_products["max"].';
       let top_pro=document.querySelector("#best_product");
       top_pro.textContent= " '.$top_pro_name["name"].'";
       let d_price=document.querySelector(".d_pro #name p");
       d_price.textContent=" '.$top_pro_name["name"].'";
       let d_image=document.querySelector(".d_pro #image img");
       d_image.src=" '.$top_pro_name["Image"].'";
       let d_desc=document.querySelector(".d_pro #desc p");
       d_desc.textContent=" '.$top_pro_name["descreption"].'";
       let price=document.querySelector(".d_pro #price p");
       price.textContent="$'.$top_pro_name["Price"].'";
       let solde=document.querySelector(".d_pro #solde p");
       solde.textContent=" '.$top_pro_name["Solde"].'%";
       
        </script>';
        $sql_top_price="SELECT * FROM Products where price=(select MAX(price) FROM Products)";
        $query_top_price=mysqli_query($conn,$sql_top_price);
        $top_price=mysqli_fetch_assoc($query_top_price);
        echo '
        <script>
         top_pro=document.querySelector("#best_price");
        top_pro.textContent= "$'.$top_price["Price"].'";
         d_price=document.querySelector(".d_price #name p");
        d_price.textContent="'.$top_price["name"].'";
         d_desc=document.querySelector(".d_price #desc p");
        d_desc.textContent=" '.$top_price["descreption"].'";
         price=document.querySelector(".d_price #price p");
        price.textContent="$'.$top_price["Price"].'";
         solde=document.querySelector(".d_price #solde p");
        solde.textContent=" '.$top_price["Solde"].'%";
        </script>
        
        ';
        $sql_top_user="select * from users where id=(SELECT id_user FROM products_sale  GROUP BY id_user ORDER BY count(id_user) DESC LIMIT 1)";
        $query_top_user=mysqli_query($conn,$sql_top_user);
        $top_user=mysqli_fetch_assoc($query_top_user);
    if(mysqli_num_rows( $query_top_user)>0){
        echo '
        <script>
         top_pro=document.querySelector("#best_user");
        top_pro.textContent= "'.$top_user["username"].'";
         d_price=document.querySelector(".d_user #username p");
        d_price.textContent="'.$top_user["username"].'";
        d_desc=document.querySelector(".d_user #email p");
        d_desc.textContent="'.$top_user["email"].'";
        </script>
        
        ';}
        $message=null;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
        if (isset($_POST['edite'])){
            if (empty($_POST['username']) || empty($_POST['email']) ) {
              $message="Complete Les Champe";
              
            }
            else{
                
                if ($_POST['type']=="users") {
                    $sql="UPDATE users set username='".$_POST['username']."' , email='".$_POST['email']."' where id='".$_POST['a']."'";
                    $sql_query=mysqli_query($conn,$sql);

                    
                }
                  
            }
            if ( $_POST['type']=="products") {
                if (!empty($_POST['name']) &  !empty($_POST['price']) &  !empty($_POST['solde']) &  !empty($_POST['desc'])  ) {
                    $sql="UPDATE products set name='".$_POST['name']."', price='".$_POST['price']."' ,solde='".$_POST['solde']."' , descreption='".$_POST['desc']."',stock='".$_POST['stock']."' where id_s='".$_POST['p']."'";
                    $sql_query=mysqli_query($conn,$sql);

                }
                
                    
                }
                header("location:index.php");

           
        }
        if (isset($_POST['delete']) ) {
            if ( $_POST['type']=="users") {
            $sql="delete from  users where id='".$_POST['a']."'";
            $sql_query=mysqli_query($conn,$sql);

            }
            if ($_POST['type']=="products") {
                    $sql="delete from  products where id_s='".$_POST['p']."'";
                    $sql_query=mysqli_query($conn,$sql);

                }
                header("location:index.php");

        
        }
        if(isset($_POST['add'])){
            if (!empty($_POST['username']) &  !empty($_POST['email']) &  !empty($_POST['password'])  ) {
                if ($_POST['type']=="saves") {
                    $sql="INSERT INTO USERS (username,email,pass) values ('".$_POST['username']."','".$_POST['email']."','".$_POST['password']."')";
                                    $sql_query=mysqli_query($conn,$sql);

            }} 

            if (!empty($_POST['name']) &  !empty($_POST['price']) &  !empty($_POST['solde']) &  !empty($_POST['desc'])  ) {
                if ($_POST['type']=="saves1") {
                $sql="INSERT INTO products (name,price,solde,descreption,stock) values('".$_POST['name']."', '".$_POST['price']."' ,'".$_POST['solde']."' ,'".$_POST['desc']."','".$_POST['stock']."')";
                $sql_query=mysqli_query($conn,$sql);

            }}
            header("location:index.php");


    }
}

        ?>
