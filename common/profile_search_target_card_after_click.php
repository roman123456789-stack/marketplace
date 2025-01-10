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
    $product_id = $_GET["id"];
    if($_SERVER["REQUEST_METHOD"] == "GET"){

        $sql1 = "SELECT * FROM products WHERE product_id = $product_id";
        $sql2 = "SELECT image_path FROM product_images WHERE product_id = $product_id";

        $result1 = $connection->query($sql1);
        
        if($result1->num_rows > 0){
            $row1 = $result1->fetch_assoc();
        }

        $result2 = $connection->query($sql2);
        $images = [];
        if($result2->num_rows > 0){
            while ($row2 = $result2->fetch_assoc()) {
                $images[] = $row2;
            }
        }
        $encodedRow1 = urlencode(json_encode($row1));
        $encodedImages = urlencode(json_encode($images));
        header("Location: profile_description_of_the_product_card.php?data=$encodedRow1&images=$encodedImages");
        // else{

        //     header("Location: profile.php");
        //     exit();

        // }
        
    }

    else{
        // echo "Форма не была отправлена";
    }    
?>
