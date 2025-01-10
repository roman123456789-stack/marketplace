<?php
session_start();

$config = require '../config/config.php';

$connection = new mysqli(
    $config['host'],
    $config['user'],
    $config['password'],
    $config['db']
);

 if ($connection->connect_error){
    
     die("Ошибка подключения: ".$connection->connect_error);

 }
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $product_id = strip_tags($_POST["product_id"]);
        $client_id = $_SESSION["id"];
        
        $sql = "INSERT INTO orders(product_id, client_id) VALUES ($product_id, $client_id)";
        
        if($connection->query($sql) == TRUE){
            header("Location: /common/profile.php");
            exit();
        }
        else{

            echo "Ошибка";
            echo $product_id;
            echo $client_id;

        }
    }
?>