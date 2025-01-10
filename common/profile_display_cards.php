<?php
$config = require '../config/config.php';

$connection = new mysqli(
    $config['host'],
    $config['user'],
    $config['password'],
    $config['db']
);

    $sql = "SELECT products.product_id, bio, price_now, price_previos, product_images.image_path, sellers.company_name AS company_name FROM products
        INNER JOIN sellers ON products.seller_id = sellers.seller_id
        INNER JOIN product_images ON products.product_id = product_images.product_id AND product_images.is_main = 1";
    $result = $connection->query($sql);

    $products;

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $products[] = $row;
        }

    }
    echo json_encode($products);
?>