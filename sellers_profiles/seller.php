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

        $fio = strip_tags($_POST["seller_fio"]);
        $email = strip_tags($_POST["email"]);
        $company_name = strip_tags($_POST["company_name"]);
        $sql = "INSERT INTO sellers(seller_fio, seller_email, company_name) VALUES ('$fio','$email', '$company_name')";
        
        if($connection->query($sql) == TRUE){
            
            $_SESSION['id'] = $connection->insert_id;
            $_SESSION['seller_fio'] = $fio;
            header("Location: /sellers_profiles/seller_profile.php");
            exit();
        }
        else{
            echo "Ошибка";
        }

    }
?>