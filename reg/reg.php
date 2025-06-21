<?php

$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

if (strlen($username) <= 3) {
    exit();
} elseif (strlen($email) <= 3) {
    exit();
} elseif (strlen($login) <= 3) {
    exit();
} elseif (strlen($pass) <= 3) {
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
