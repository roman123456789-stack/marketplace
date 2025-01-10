<?php
session_start();

$config = require '../config/config.php';

$connection = new mysqli(
    $config['host'],
    $config['user'],
    $config['password'],
    $config['db']
);

if ($connection->connect_error) {
    die("Ошибка подключения: " . $connection->connect_error);
}

$sql = "SELECT category_id, category_name FROM `categories`";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $subcategories = [];
    while ($row = $result->fetch_assoc()) {
        $subcategories[] = $row;
    }
    echo json_encode($subcategories);
} else {
    echo "Нет Категорий";
}

$connection->close();
?>