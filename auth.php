<?php

$login = $_POST['login'];
$pass = $_POST['pass'];

$pass = md5($pass); // Создаем хэш из пароля

$mysql = new mysqli('localhost', 'me_user', 'good', 'curse');
mysqli_set_charset($mysql, "utf8"); /* Procedural approach */

mysqli_query($mysql,"SET SESSION collation_connection = 'cp1251'");
$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
var_dump($mysql->error);
try{
    $user =  $result->fetch_assoc(); // Конвертируем в массив
}

catch(Exception $e){
    echo "Ошибка в логине или пароле, попробуйте снова";
    exit();
}

if(count((array)$user) == 0){
    header('Location: index.php');
    echo "Такой пользователь не найден.";
    exit();
    }
else if(count((array)$user) == 1){
    header('Location: index.php');
    echo "Логин или пароль введены неверно";
    exit();
}
  setcookie('user', htmlspecialchars($user['name']), time() + 3600, "/curs");
  session_start();
  $_SESSION['user']   = true;
  $_SESSION['login']  = $_POST['login'];
  $_SESSION['role']   = $user['role'];
  $_SESSION['name']   = $user['name'];  

$mysql->close();
header('Location: hellopage.php');