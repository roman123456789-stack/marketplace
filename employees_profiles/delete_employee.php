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
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $employee_id = $_POST["employee_id"];
        
        $sql = "DELETE FROM employees WHERE employee_id = $employee_id AND employee_position <> 'Директор'";
        
        if($connection->query($sql) == TRUE){
            header("Location: /employees_profiles/employee_profile.php");
        }
        else{
            echo "У вас нет прав для этой операции";
        }
    }
?>