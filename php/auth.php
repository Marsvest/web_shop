<?php
$db = new SQLite3('../db.sqlite');

$login = $_POST['login'];
$password = hash('sha256', $_POST['password']); // Update the password key

$stmt = $db->prepare("SELECT user_login, user_password FROM Users WHERE user_login = :login AND user_password = :password");
$stmt->bindValue(':login', $login, SQLITE3_TEXT);
$stmt->bindValue(':password', $password, SQLITE3_TEXT);
$result = $stmt->execute();

// Check if the user exists with the specified login and password
if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo json_encode(array('status' => 'success'));
} else {
    echo json_encode(array('status' => 'failure')); // Add a failure case
}

$db->close();