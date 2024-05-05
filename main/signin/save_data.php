<?php 
include("db_connect.php");

$email = $_POST["email"];
$pass = $_POST["password"];


$sub = isset($_POST["sub"]) ? $_POST["sub"] : null;
$signup=isset($_POST["signup"]) ? $_POST["signup"] : null;
$status=$status2=null;
if(isset($sub)) {
    if($email=="Admin@a.a" && $pass=="admin"){
        header("Location: ../dashboard/");
        exit;
    }else{
    $sql = "SELECT id,email,pass FROM USERS WHERE email='$email' and pass='$pass'";
    if(mysqli_num_rows(mysqli_query($conn,$sql))==0){
        if ($_POST["lang"]=="ar") {
            $status="الحساب او كلمةالسر خاطئة";
            include("signinar.php");

        }else{
             $status="Username Or Password Incorrect!";        include("signin.php");

        }
       
        exit;
    }else{
        $row=mysqli_fetch_assoc((mysqli_query($conn,$sql)));
        $sql = "Insert  into select_users values (1,".(int)$row["id"].")";
        mysqli_query($conn,$sql);
        header("Location: ../home/");

        exit;
         
    }}
}      
if(isset($signup)) {
    $username=$_POST["username"];
$phone=$_POST["phone"];
    $sql = "SELECT email,pass FROM USERS WHERE email='$email' and pass='$pass'";
    if(mysqli_num_rows(mysqli_query($conn,$sql))==0){
        $sql = "INSERT INTO  USERS(email,pass,username,phone,gander) VALUES ('$email','$pass','$username','$phone','".$_POST["gender"]."')";
        mysqli_query($conn,$sql);
        $status2="success";
    }else{
        $status2="User Existe !";
       
    }
    include("signin.php");
    exit;
    
    
    
}
mysqli_close($conn);
