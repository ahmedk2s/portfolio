<?php 
try{
    $server_name = "localhost";
    $db_name = "portfolio";
    $user_name = "root";
    $password = "";
    $db = new PDO("mysql:host=$server_name;dbname=$db_name;charset=utf8mb4", $user_name, "");
    //echo "connection réussie 👍";
} catch(PDOException $e){
    echo "echec de connexion : ". $e->getMessage();
}