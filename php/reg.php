<?php
$db = new SQLite3('../db.sqlite');

$login = $_POST['login'];
$password = hash('sha256', $_POST['password']);

$stmt = $db->prepare("INSERT INTO Users (user_login, user_password, user_is_admin) VALUES (:login, :password, false)");
$stmt->bindValue(':login', $login, SQLITE3_TEXT);
$stmt->bindValue(':password', $password, SQLITE3_TEXT);
$result = $stmt->execute();

if ($result) {
    echo json_encode(array('status' => 'success'));
} else {
    echo json_encode(array('status' => 'failure')); // Add a failure case
}

$db->close();