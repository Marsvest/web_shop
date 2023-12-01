<?php
$db = new SQLite3('../db.sqlite');

$login = $_POST['login'];
$password = hash('sha256', $_POST['pass']);

$stmt = $db->prepare("INSERT INTO Users (user_login, user_password) VALUES (:login, :password)");
$stmt->bindValue(':login', $login, SQLITE3_TEXT);
$stmt->bindValue(':password', $password, SQLITE3_TEXT);
$result = $stmt->execute();

$db->close();