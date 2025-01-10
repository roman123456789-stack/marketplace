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

    function sign(&$connection, &$fio){

        $_SESSION['employee_fio'] = $fio;
        header("Location: /employees_profiles/employee_profile.php");
        exit();

    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $fio = $_POST["employee_fio"];
        $email = $_POST["email"];

        $sql = "SELECT * FROM employees WHERE employees.employee_fio = '$fio' AND employees.employee_email = '$email'";

        $result = $connection->query($sql);

        $employee_id;

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $employee_id = $row["employee_id"];
            $_SESSION["employee_id"] = $employee_id;
            sign($connection, $fio);
        }
        else{
            header("Location: /employees_profiles/employee_sign_in.html");
            exit();
        }
        
    }

    else{

        // echo "Форма не была отправлена";

    }
    
?>