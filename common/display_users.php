<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Пользователи</title>
    
</head>
<body>
    <?php
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

        $sql = "SELECT id, Ник, email FROM users_table";
        $result = $connection->query($sql);

        if ($result->num_rows > 0){

            echo "<table id = 'users_table'><tr><th>ID</th><th>Ник</th><th>Email</th></tr>";
            while ($row = $result->fetch_assoc()){
                echo "<tr><td>".$row["id"]."</td><td>".$row["Ник"]."</td><td style>".$row["email"]."</td></tr>";
            }
            echo "</table>";
        }
        else{
            echo "Нет данных в таблице";
        }

        $connection->close();
    ?>
</body>
</html>

