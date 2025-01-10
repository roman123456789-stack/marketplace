<?php
    session_start();    
    $fio = $_SESSION["seller_fio"];
    if (!isset($_SESSION["seller_fio"])) {
        header("Location: seller_sign_in.html");
        exit();
    }

$config = require '../config/config.php';

    $connection = new mysqli(
        $config['host'],
        $config['user'],
        $config['password'],
        $config['db']
    );

    $company_name;
    $sql1 = "SELECT seller_id FROM sellers
    WHERE seller_fio = '$fio'";
    $result_id = $connection -> query($sql1);
    if ($result_id && $row = $result_id -> fetch_assoc()) {
        $seller_id = $row["seller_id"];
        $_SESSION["seller_id"] = $seller_id;
    }
    else {
        echo "Запрос не удался <br>";
        exit(); 
    }

    $sql2 = "SELECT products.product_id, title, bio, price_now, price_previos, products.seller_id, subcategory_id, sellers.company_name, product_images.image_path 
    FROM products
    INNER JOIN sellers ON sellers.seller_id = products.seller_id
    INNER JOIN product_images ON product_images.product_id = products.product_id AND product_images.is_main = 1
    WHERE products.seller_id = $seller_id";
    $products;
    $result = $connection->query($sql2);
    if (($connection->query($sql2)) == TRUE) {
        if ($result -> num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
                // echo json_encode($row);
            }
        }
    }

    else {
        // echo $connection->error;
    }

    // echo $sql2;
    echo json_encode($products);
?>