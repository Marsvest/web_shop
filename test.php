<?php
$db = new SQLite3('db.sqlite');

$login = 'test';
$password = hash('sha256', 123);

$stmt = $db->prepare("SELECT user_login, user_password FROM Users WHERE user_login = :login AND user_password = :password");
$stmt->bindValue(':login', $login, SQLITE3_TEXT);
$stmt->bindValue(':password', $password, SQLITE3_TEXT);
$result = $stmt->execute();


// Проверка наличия пользователя с указанными логином и паролем

if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo json_encode(['status' => 'success', 'message' => '228']);
}
//else {
//    // Пользователь не найден, обработайте ошибку или перенаправьте на страницу снова
//    $response = array(
//        'status' => 'error',
//        'message' => 'Ошибка регистрации'
//    );
//}
//
//header('Content-Type: application/json');
//echo json_encode($response);

$db->close();