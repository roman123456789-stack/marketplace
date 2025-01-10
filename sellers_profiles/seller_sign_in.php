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

    function sign(&$connection, &$fio){

        $_SESSION['id'] = $connection->insert_id;
        $_SESSION['seller_fio'] = $fio;
        header("Location: /sellers_profiles/seller_profile.php");
        exit();

    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $fio = $_POST["seller_fio"];
        $email = $_POST["email"];
        $sql = "SELECT * FROM sellers WHERE sellers.seller_fio = '$fio' AND sellers.seller_email = '$email'";
        $result = $connection->query($sql);

        if($result->num_rows > 0){

            sign($connection, $fio);
            
        }

        else{

            header("Location: /sellers_profiles/seller_sign_in.html");
            exit();

        }
        
    }

    else{
        // echo "Форма не была отправлена";
    }
    
?>