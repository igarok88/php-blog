<?php

$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

$error = '';
if (strlen($login) <= 3) {
    $error = "Введите логин";
} elseif (strlen($pass) <= 3) {
    $error = "Введите палорь";
}
if ($error != '') {
    echo $error;
    exit();
}

$hash = "sadlkjn4598c0vzcxjv";
$pass = md5($pass . $hash);

require_once '../mysql_connect.php';

$sql = 'SELECT `id` FROM `users` WHERE `login` = :login && `pass` = :pass';
$query = $pdo->prepare($sql);
$query->execute(['login' => $login, 'pass' => $pass]);

$user = $query->fetch(PDO::FETCH_OBJ);
if ($query->rowCount() == 0) {
    echo "Такого пользователя не существует";
} else {
    setcookie('login', $login, time() + 3600 * 24 * 30, "/");
    echo "Готово";
}

// echo 'Готово';
