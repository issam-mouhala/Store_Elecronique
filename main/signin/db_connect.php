<?php
$local = "localhost";
$root = "root";
$pass = "";
$n_db = "users_lotchy";
$conn = mysqli_connect($local, $root, $pass);
$sql= "CREATE DATABASE IF NOT EXISTS {$n_db}";
mysqli_query($conn,$sql);
$conn = mysqli_connect($local, $root, $pass,$n_db);
$sql="CREATE TABLE IF NOT EXISTS USERS(id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255),pass VARCHAR(255))";
mysqli_query($conn,$sql);
$sql="CREATE TABLE IF NOT EXISTS Products(id_s INT AUTO_INCREMENT  PRIMARY KEY,name varchar(255),descreption varchar(255),Price float(3),Solde float(3),Image varchar(255))";
mysqli_query($conn,$sql);
$sql="CREATE TABLE IF NOT EXISTS Products_sale(id_spro INT AUTO_INCREMENT  PRIMARY KEY,id_pro int,id_user int,date timestamp,FOREIGN KEY (id_pro) REFERENCES Products(id_s) ,
FOREIGN KEY (id_user) REFERENCES USERS(id) )";
mysqli_query($conn,$sql);

?> 
