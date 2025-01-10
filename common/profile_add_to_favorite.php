<?php
session_start();
// header('Content-Type: application/json'); // Можно оставить закомментированным, если вы используете JSON

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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);  // Чтение входных данных
    $product_id = $data["product_id"] ?? null;
    $client_id = $_SESSION["id"] ?? null;
    if ($client_id && $product_id) {
        $pre_sql = "SELECT product_id, client_id FROM favorites WHERE client_id = $client_id AND product_id = $product_id";
        $pre_result = $connection->query($pre_sql);
        if ($pre_result->num_rows > 0) {
            echo json_encode(["success" => true, "message" => "Товар уже был добавлен в избранное!"]);
            $connection->close();
            exit();
        }
        $sql = "INSERT INTO favorites (client_id, product_id) VALUES ($client_id, $product_id)";
        $result = $connection->query($sql);

        // Проверяем успешность выполнения запроса
        if ($result) {
            echo json_encode(["success" => true, "message" => "Товар добавлен в избранное!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Ошибка при добавлении в избранное"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Недостаточно данных"]);
    }
}

$connection->close();
?>