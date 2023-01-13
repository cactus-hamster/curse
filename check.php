<?php
$login = $_POST['login'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$role = $_POST['role'];
$dotup = $_POST['dotup'];

if(mb_strlen($login) < 5 || mb_strlen($login) > 50){
    header('Location: registration.php');
    exit();
}
else if(mb_strlen($name) < 5){
    header('Location: registration.php');
    exit();
} // Проверяем длину имени

$pass = md5($pass); // Создаем хэш из пароля

$mysql = new mysqli('localhost', 'me_user', 'good', 'curse');
mysqli_query($mysql,"SET NAMES 'utf8';");
mysqli_query($mysql,"SET CHARACTER SET 'utf8';");
mysqli_query($mysql,"SET SESSION collation_connection = 'utf8_general_ci';");

$result1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
if(!empty($user1)){
    echo "Данный логин уже используется!";
    header('Location: registration.php');
    exit();
}
mysqli_query($mysql,"INSERT INTO `users`( `login`, `pass`, `name`, `role`, `dotup`) VALUES ('$login','$pass','$name','$role','$dotup')");
header('Location: registration.php');
exit();
