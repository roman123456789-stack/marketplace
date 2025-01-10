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
        $fio = strip_tags($_POST["fio"]);
        $email = strip_tags($_POST["email"]);
        
        $sql = "INSERT INTO clients(fio, email) VALUES ('$fio','$email')";
        
        if($connection->query($sql) == TRUE){
        
            $_SESSION['id'] = $connection->insert_id;
            $_SESSION['fio'] = $fio;
            header("Location: ../common/profile.php");
            exit();

        }
        else{

            echo "Ошибка";

        }
    }
?>