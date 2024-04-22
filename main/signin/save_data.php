<?php 
include("db_connect.php");

$email = $_POST["email"];
$pass = $_POST["password"];
$sub = isset($_POST["sub"]) ? $_POST["sub"] : null;
$status=null;
if(isset($sub)) {
    if($email=="Admin@a.a" && $pass=="admin"){
        header("Location: ../dashboard/");
        exit;
    }else{
    $sql = "SELECT id,email,pass FROM USERS WHERE email='$email' and pass='$pass'";
    if(mysqli_num_rows(mysqli_query($conn,$sql))==0){
        $status="Username Or Password Incorrect!";
        include("signin.php");
        exit;
    }else{
        $row=mysqli_fetch_assoc((mysqli_query($conn,$sql)));
        $sql = "Insert  into select_users values (1,".(int)$row["id"].")";
        mysqli_query($conn,$sql);
        header("Location: ../home/");

        exit;
         
    }}
}      

mysqli_close($conn);
?>
