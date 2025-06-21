<?php

$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

$error = '';
if (strlen($username) <= 3) {
    $error = "Введите имя";
} elseif (strlen($email) <= 3) {
    $error = "Введите Email";
} elseif (strlen($login) <= 3) {
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

$user = 'root';
$password = 'root';
$db = 'testing';
$host = 'localhost';

$dsn = 'mysql:host=' . $host . ';dbname=' . $db;
$pdo = new PDO($dsn, $user, $password);
$sql = 'INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$username, $email, $login, $pass]);

echo 'Готово';
