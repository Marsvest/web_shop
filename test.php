<?php
$db = new SQLite3('db.sqlite');

$login = $_POST['login'];
$password = $_POST['pass'];

$results = $db->query("Insert into Users(user_login, user_password) values ($login, $password)");
?>