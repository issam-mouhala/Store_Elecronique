
<?php 
include("../signin/db_connect.php");
$by_id=mysqli_query($conn,
    "SELECT id FROM SELECT_USERS");
    $user=mysqli_fetch_assoc($by_id)["id"]; 
    $r2=mysqli_query($conn,"SELECT * FROM products_sale where id_user=$user");
    error_reporting(E_ALL ^ E_WARNING);

?>
<?php
    if(isset($_POST['delete'])){
        $getpro= $_POST['idpro'];
        $getc="DELETE from commande where id_user=$user AND id_pro=$getpro";
        mysqli_query($conn,$getc);
        $getpro="DELETE from products_sale where id_user=$user AND id_pro=$getpro";
        mysqli_query($conn,$getpro);
       
        header('Location:cart.php');
        exit;
    }
    if (isset($_POST['add'])) {
        $getpro="UPDATE  commande set qnt=".($_POST['q']+1)." where id_user=".$_POST['user']." and id_pro=".$_POST['idpro']."";
        mysqli_query($conn,$getpro); 
        header('Location:cart.php');
        exit;
          }
          if (isset($_POST['sus']) && $_POST['q']>1 ) {
            $getpro="UPDATE  commande set qnt=".($_POST['q']-1)." where id_user=".$_POST['user']." and id_pro=".$_POST['idpro']."";
            mysqli_query($conn,$getpro); 
            header('Location:cart.php');
            exit;
              }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lotchy Store</title>
</head>
<style>
    body{
    padding:0;
    margin: 0;
}
*{
    box-sizing: border-box;
    /* font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; */
}
nav{
    height: 10vh;
    width: 100vw;
    background-color: #191919;
    display: flex;
    color: antiquewhite;
    justify-content: space-between;
}
nav > h1 , nav > h2{
    margin: auto 200px;
}
a{
    color: aliceblue;
    text-decoration: none;
}
main{
    height: max-content;
    width: 50vw;
    margin: 5vh 10vw;
    box-shadow: 0px 0px 10px gainsboro;
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
}
p{
    font-size: x-large;
    margin-left: 10px;
}
#pro{
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 45vw;
    border-top: 1px solid gray;
}
.solde{
    display: flex;
    column-gap: 4px;
    align-items: center;

}
h4:last-child{
    padding: 4px;
    background-color: orange;
    border-radius: 4px;
}
.panier{
    display: flex;
    flex-direction: column;
    row-gap: 10px;
    align-items: flex-start;
    margin: 20px;
}
button{
    padding: 10px;
    background-color: transparent;
    border: none;
    font-size: xx-large;
    color: crimson;
    border-radius: 150px;
    cursor: pointer;
}
.cader{
    display: flex;
    align-items: center;
    column-gap: 20px;
    padding: 20px;
}
img{
    box-shadow: inset 0px 0px 10px gainsboro;
    width: 150px;
    border-radius: 20px;
}
.desc{
    display: flex;
    flex-direction: column;
    width: 500px;
}
.resume{
    width: 20vw;
    border-radius: 4px;
    box-shadow: 0px 0px 10px gainsboro;
    padding: 20px;
    position: fixed;
    top: 25vh;
    right: 15vw;
    
}
.content{
    display: flex;
    align-items: center;
}
.s_t{
    display: flex;
    column-gap: 5px;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    margin: 10px;
    border-top: 1px solid gray;

}
.resume button{
    width: 90%;
    padding: 20px;
    text-align: center;
    background-color: orangered;
    transform: translateX(20px);
    border: none;
    font-size: large;
    color: aliceblue;
}
.resume h1{
    font-size: large;
    color: #191919;
    margin-left: 5px;
}
.s_t p{
    font-size: medium;
}
.controller{
    width: 100%;
    display: flex;
    justify-content: space-between;
}
.q{
    display: flex;
    align-items: center;
    column-gap: 10px;
    transform: translateX(-30px);
}
.q button{
  padding: 4px;
  background-color: orangered;
  color: aliceblue;
  height: 30px;
  width: 30px;
  justify-content: center;
  align-items: center;
  display: flex;
}
#stock{
    border: 0;
    font-size:x-large;
    width: 50px;
}
#stock:focus{
    outline: 0;
    border: 0;
}
.vide{
    font-size: large;
    width: 100%;
    text-align: center;
   color: rgba(179, 166, 166, 0.377);

}
</style>
<body>
    <nav>
            <h1>Panier</h1>
            <h2><a href="index.php">Home</a></h2>
    </nav>
    <div class="content">

    <main>
        <p>Panier</p>
        
<?php 
 if(mysqli_num_rows($r2)<=0) {
    echo '<h3 class="vide">Votre panier est vide!</h3>';
    # code...
}   else{
    while($rows= mysqli_fetch_assoc($r2)){
    $getpro="SELECT * from products where id_s=".$rows['id_pro']." ";
    $r=mysqli_query($conn,$getpro);
    $pro= mysqli_fetch_assoc($r);
    $getcommande="SELECT * from commande where id_user=".$rows['id_user']." and  id_pro=".$rows['id_pro']."";
    $qcommande=mysqli_query($conn,$getcommande);
    $commande= mysqli_fetch_assoc($qcommande);
    $c=(isset($commande['qnt'])) ? $commande['qnt']: 1 ;
    $sql="SELECT *  FROM commande where id_user=$user and id_pro=".$rows['id_pro']."";
    $rr= mysqli_query($conn,$sql);
    // $sum+=($pro["Price"]-($pro["Price"]*($pro["Solde"]/100)));
       if(mysqli_num_rows($rr)<=0 && $rows['id_pro']==$pro['id_s']){ 
        $getc="INSERT  INTO commande(id_user,id_pro,price,qnt)  VALUES(".$rows['id_user'].",".$rows['id_pro'].",".($pro["Price"]-($pro["Price"]*($pro["Solde"]/100))).",1 ) ";
        mysqli_query($conn,$getc); 
    }

    echo '        <form class="panier" action="cart.php" method="post">
    <input style="display:none" name="idpro" value="'.$rows['id_pro'].'">
    <div class="pro1" id="pro">
        <div class=" cader">
        <img src="'.$pro['Image'].'" alt="img">
        <div class="desc">
        <h1>'.$pro['name'].'</h1>
             <p>'.$pro['descreption'].'</p>
        </div>
        </div>
              <div class="detile">
              <h2>$'.$pro["Price"]-($pro["Price"]*($pro["Solde"]/100)).'</h2>
                <div class="solde">
                         <h4><del>$'.$pro['Price'].'</del></h4>
                         <h4>-'.$pro['Solde'].'%</h4>

                </div>
              </div>
    </div>
    <div class="controller">
             <button type="submit" name="delete">Delete</button>
             <div class="q">
             <button type="submit" id="sus" name="sus" onclick="desc(this)">-</button>
            <input id="stock" value="'.$c.'" name="q"  readonly type="number"  min="1" max="5">
            <button type="submit"  name="add">+</button>

            </div>
            

    </div>
    <input style="display:none" name="user" value="'.$rows['id_user'].'">
    <input style="display:none" name="idpro" value="'.$rows['id_pro'].'">

    </form>';
   
    
}}

?>

          
    </main>
    <div class="resume">
           <h1>RESUME DU PANIER</h1>
           <div class="s_t">
            <h3>Sous-total</h3>
            <span>
                <?php
                 $sum=0;
                $gsum="SELECT SUM(price*qnt) as sum from commande where id_user=$user ";
                $r=mysqli_query( $conn,$gsum);
                if(mysqli_num_rows($r)>0){
                    $sum=mysqli_fetch_assoc($r)['sum'];
                }else{
                    $sum=0;
                }
                $sum=($sum==null) ? 0: $sum;
                echo $sum;

                ?>$</span>
            <p>Frais de livraison non inclus a ce stade</p>
           </div>
           <hr>
          <button type="submit">COMMANDER($ <?php
          
                echo $sum
                ?>)</button>
          </div>
          </div>
   
</body>
</html>
<script>
   
   
    
    function desc(th){
        let stock=document.querySelectorAll("#stock")
        if ( stock.value==1 ) {
        th.style.backgroundColor="rgba(179, 166, 166, 0.377)"
    } 
    }
    
    

</script>
