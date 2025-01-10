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
    $client_id = $_SESSION["id"];
        $sql = "SELECT products.product_id, products.title, products.price_now, products.bio, products.price_previos, products.seller_id, products.subcategory_id, product_images.image_path, sellers.company_name 
        FROM products 
        INNER JOIN sellers ON products.seller_id = sellers.seller_id 
        INNER JOIN product_images ON products.product_id = product_images.product_id AND product_images.is_main = 1
        INNER JOIN favorites ON favorites.product_id = products.product_id AND favorites.client_id = $client_id";

        $result = $connection->query($sql);
$products = [];
if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
echo json_encode($products);
// $connection->close();
?>