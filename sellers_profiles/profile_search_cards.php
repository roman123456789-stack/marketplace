<?php
session_start();
$config = require '../config/config.php';

$connection = new mysqli(
    $config['host'],
    $config['user'],
    $config['password'],
    $config['db']
);
    $seller_id = $_SESSION["seller_id"];
    if ($connection->connect_error){
        die("Ошибка подключения: ".$connection->connect_error);
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $query = '%' . strip_tags($_POST["search_input"]) . '%';
        $sql = "SELECT products.product_id, products.title, products.price_now, products.bio, products.price_previos, products.seller_id, products.subcategory_id, product_images.image_path, sellers.company_name 
        FROM products 
        INNER JOIN sellers ON products.seller_id = sellers.seller_id AND sellers.seller_id = $seller_id 
        INNER JOIN product_images ON products.product_id = product_images.product_id AND product_images.is_main = 1
        WHERE products.bio LIKE '$query'";

        $result = $connection->query($sql);
    }
$products = [];
if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
echo json_encode($products);
// $connection->close();
?>