<?php

$title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
$intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_STRING));
$text = trim(filter_var($_POST['text']));

$error = '';
if (strlen($title) <= 3) {
    $error = "Введите название статьи";
} elseif (strlen($intro) <= 15) {
    $error = "Введите интро для статьи";
} elseif (strlen($text) <= 20) {
    $error = "Введите текст для статьи";
}

if ($error != '') {
    echo $error;
    exit();
}

require_once '../mysql_connect.php';

$sql = 'INSERT INTO articles(title, intro, text, date, avtor) VALUES(?, ?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$title, $intro, $text, time(), $_COOKIE['login']]);

echo 'Готово';
