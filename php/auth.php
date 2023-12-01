<?php
$db = new SQLite3('../db.sqlite');

$login = $_POST['login'];
$password = hash('sha256', $_POST['pass']);

$stmt = $db->prepare("SELECT user_login, user_password FROM Users WHERE user_login = :login AND user_password = :password");
$stmt->bindValue(':login', $login, SQLITE3_TEXT);
$stmt->bindValue(':password', $password, SQLITE3_TEXT);
$result = $stmt->execute();

// Проверка наличия пользователя с указанными логином и паролем
if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    // Пользователь найден, выполняйте необходимые действия для авторизации
    echo "Пользователь успешно авторизован.";
} else {
    // Пользователь не найден, обработайте ошибку или перенаправьте на страницу снова
    echo "Ошибка авторизации. Пожалуйста, проверьте введенные данные.";
}

$db->close();

