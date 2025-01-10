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
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $employee_fio = strip_tags($_POST["employee_fio"]);
        $employee_email = strip_tags($_POST["employee_email"]);
        $employee_position = strip_tags($_POST["employee_position"]);

        if ($employee_fio && $employee_email && $employee_position) {
            $sql = "INSERT INTO employees(employee_fio, employee_email, employee_position) VALUES ('$employee_fio', '$employee_email', '$employee_position')";
            
            if($connection->query($sql) == TRUE){
                header("Location: /employees_profiles/employee_profile.php");
            }
            else{
                echo "Ошибка";
            }
        }
        else {
            header("Location: /employees_profiles/employee_profile.php");
        }
    }
?>