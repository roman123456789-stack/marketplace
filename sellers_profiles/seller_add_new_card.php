<?php
session_start();
$config = require '../config/config.php';

$connection = new mysqli(
    $config['host'],
    $config['user'],
    $config['password'],
    $config['db']
);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["images"])) {
        
            $user_id = $_SESSION["id"];
            $title = strip_tags($_POST["title"]);
            $bio = strip_tags($_POST["bio"]);
            $prev = strip_tags($_POST["prev"]);
            $now = strip_tags($_POST["now"]);
            $category = strip_tags($_POST["category-text"]);
            $subcategory = strip_tags($_POST["subcategory-text"]);
            $fio = $_SESSION["seller_fio"];
        
            $sql1 = "SELECT seller_id FROM sellers
                WHERE seller_fio = '$fio'";
            $result = $connection -> query($sql1);
            if ($result && $row = $result -> fetch_assoc()) {
                $seller_id = $row["seller_id"];
                
            }
            else {
                // echo "Запрос не удался <br>";
                exit();
            }
            $sql2 = "INSERT INTO products (title, price_now, bio, price_previos, seller_id, subcategory_id) 
            VALUES ('$title', $now, '$bio', $prev, $seller_id, '$subcategory')";
            //echo $sql2 . "<br>";

            
            if($connection->query($sql2) == TRUE){
                $product_id = $connection->insert_id;
                // header("Location: seller_create_new_card.php");
                // header("Location: seller_profile.php");
                //echo "Успешно <br>";
            }
            //**********************ИЗОБРАЖЕНИЯ*****************************
            $isFirtImage = 1;
            $uploadDir = __DIR__ . '/../product_images/';
            $uploadedFiles = $_FILES["images"];
            // echo json_encode($_FILES);
            foreach ($uploadedFiles['name'] as $index => $fileName) {
                // Проверяем, был ли файл загружен
                if ($uploadedFiles['error'][$index] == 0) {
                    // Получаем расширение файла
                    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                    
                    // Создаем уникальное имя файла с использованием uniqid() и basename()
                    $uniqueFileName = uniqid('img_', true) . '.' . $fileExtension;
        
                    // Путь для сохранения файла
                    $filePath = $uploadDir . $uniqueFileName;
                    $relativeFilePath = '/product_images/' . $uniqueFileName;
                    if ($isFirtImage === 1) {
                        $sql3 = "INSERT INTO product_images(product_id, image_path, is_main) VALUES ($product_id, '$relativeFilePath', true)";
                        $isFirtImage = 0;
                    }else {
                        $sql3 = "INSERT INTO product_images(product_id, image_path, is_main) VALUES ($product_id, '$relativeFilePath', false)";
                    }
                    if ($connection->query($sql3) === TRUE) {
                        // echo "Данные успешно добавлены в базу данных.<br>";
                    } else {
                        // echo "Ошибка при добавлении данных в базу: " . $connection->error . "<br>";
                    }
                    // echo "Проход по циклу";
                    // Перемещаем загруженный файл в нужный каталог
                    if (move_uploaded_file($uploadedFiles['tmp_name'][$index], $filePath)) {
                        // echo "Файл $fileName успешно загружен с новым именем: $uniqueFileName <br>";
                    } else {
                        // echo "Ошибка загрузки файла $fileName.<br>";
                    }
                }
            }
            header("Location: seller_profile.php");
            // else {
            //     header("Location: seller_create_new_card.php");
            //     //echo "Неуспешно <br>" . $connection -> error;
            // }

        echo "fio: $fio <br>";
        echo "user_id: $user_id <br>";
        echo "bio: $bio <br>";
        echo "title: $title <br>";
        echo "price_prev: $prev <br>";
        echo "price_now: $now <br>";
        echo "seller_id:" . $seller_id . "<br>";
        echo "subcategory:" . $subcategory . "<br>";
        echo "product_id:" . $product_id . "<br>";
    }
}
?>