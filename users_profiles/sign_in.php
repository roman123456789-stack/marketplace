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

        $_SESSION['fio'] = $fio;
        header("Location: /common/profile.php");
        exit();

    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $fio = $_POST["fio"];
        $email = $_POST["email"];

        $sql = "SELECT * FROM clients WHERE clients.fio = '$fio' AND clients.email = '$email'";

        $result = $connection->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION["id"] = $row["client_id"];
            sign($connection, $fio);

        }
        
        else{

            header("Location: index.html");
            exit();

        }
        
    }

    else{
        echo "Форма не была отправлена";
    }
    
?>