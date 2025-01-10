<?php
    session_start();
    if (!isset($_SESSION["employee_id"])) {
        header("Location: /employees_profiles/employee_sign_in.html");
    }
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
    $employee_id = $_SESSION["employee_id"];
    $sql = "SELECT * FROM employees WHERE employee_id <> $employee_id";
    $employees;
    $result = $connection->query($sql);

    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $employees[] = $row;
        }
    }
    else{
        echo "Ошибка";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/style_for_profile.css">
    <title>Профиль сотрудника</title>
</head>
<body>
    <div class="header">
        <div class="marketplace-name"> marketplace name </div>
        <div class="wrapper-for-sign-in">
            <?php
                if (isset($_SESSION['employee_fio'])) {
                    echo '<a href="" class="sign-in">'. $_SESSION['employee_fio'] . '</a>';
                }
            ?>
        </div>
    </div>
    <h1 style="text-align: center">Список сотрудников</h1>
    <div class="table-for-employees">
        <form action="/employees_profiles/add_new_employee.php" method="post" class="add-new-employee">
            <div class="wrapper-for-inputs-new-employee">
                <label for="">ФИО</label>
                <input type="text" name="employee_fio" required>
            </div>
            <div class="wrapper-for-inputs-new-employee">
                <label for="">email</label>
                <input type="text" name="employee_email" required>
            </div>
            <div class="wrapper-for-inputs-new-employee">
                <label for="">Должность</label>
                <input type="text" name="employee_position" required>
            </div>
            <div class="wrapper-for-inputs-new-employee"><button style="margin-top: 22px" type="submit">Добавить</button></div>
            
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Должность</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?= htmlspecialchars($employee['employee_id']) ?></td>
                        <td><?= htmlspecialchars($employee['employee_fio']) ?></td>
                        <td><?= htmlspecialchars($employee['employee_position']) ?></td>
                        <td>
                            <form method="POST" action="/employees_profiles/delete_employee.php">
                                <input type="hidden" name="employee_id" value="<?= $employee['employee_id'] ?>">
                                <button type="submit" name="delete" onclick="return confirm('Вы уверены, что хотите удалить этого сотрудника?')">
                                    Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="footer">
       <div class="company-info">@marketplace-name All rights reserved</div>
    </div>
</body>
</html>
<style>
    
    body{
        display: flex;
        width: 100%;
        height: 100vh;
        align-items: center;
        justify-content: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f4f4f4;
    }
    form {
        display: inline;
    }
    .table-for-employees{
        flex: 1;
        margin-top: 20px;
        width: 70%;
    }
    .add-new-employee{
        display: flex;
        width: 100%;
    }
    .wrapper-for-inputs-new-employee{
        display: flex;
        flex-direction: column;
        margin: 10px;
        width: 25%;
        text-align: center;
    }
</style>