<?php
$db = new SQLite3('db.sqlite');

$login = $_POST['login'];
$password = $_POST['pass'];

// Используйте подготовленные запросы для безопасности
$stmt = $db->prepare("INSERT INTO Users (user_login, user_password) VALUES (:login, :password)");
$stmt->bindValue(':login', $login, SQLITE3_TEXT);
$stmt->bindValue(':password', $password, SQLITE3_TEXT);
$result = $stmt->execute();

// Закрываем соединение с базой данных
$db->close();
?>
