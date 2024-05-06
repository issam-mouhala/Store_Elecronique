<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
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
    padding: 5px;
    background-color: transparent;
    border: none;
    font-size: x-large;
    color: crimson;
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
    font-size: x-large;
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
}
.q span{
    width: 20px;
    height: 20px;
    text-align: center;
    border-radius: 50px;
    font-size: large;
    border: 1px solid;
}
</style>
<body>
    <nav>

    </nav>
    <div class="content">

    <?php 
include("../signin/db_connect.php");
$by_id=mysqli_query($conn,
    "SELECT id FROM SELECT_USERS");
    $user=mysqli_fetch_assoc($by_id)["id"]; 
    $r2=mysqli_query($conn,"SELECT * FROM products_sale where id_user=$user");
   
?>
    <main>
        <p>Panier</p>
<?php 
   $sum=0;
 while($rows= mysqli_fetch_assoc($r2)){
    $getpro="SELECT * from products where id_s=".$rows['id_pro']." ";
       $r=mysqli_query($conn,$getpro);
       $pro= mysqli_fetch_assoc($r);
       $sum+=$pro['Price'];
    echo '        <div class="panier">
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
             <button type="reset">Delete</button>
             <div class="q">
             <span>-</span>
            <h2> '.$pro['stock'].'</h2>
            <span>+</span>

            </div>

    </div>
    </div>';
}

?>

          
    </main>
    <div class="resume">
           <h1>RESUME DU PANIER</h1>
           <div class="s_t">
            <h3>Sous-total</h3>
            <span>
                <?php
                echo $sum
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