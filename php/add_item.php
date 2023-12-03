<?php
$db = new SQLite3('../db.sqlite');

$pic = $_GET['pic'];
$title = $_GET['title'];
$desc = $_GET['desc'];
$price = $_GET['price'];

$stmt = $db->prepare("INSERT INTO Items (item_image, item_label, item_desc, item_price) VALUES (:pic, :title, :desc, :price)");
$stmt->bindValue(':pic', $pic, SQLITE3_TEXT);
$stmt->bindValue(':title', $title, SQLITE3_TEXT);
$stmt->bindValue(':desc', $desc, SQLITE3_TEXT);
$stmt->bindValue(':price', $price, SQLITE3_TEXT);
$result = $stmt->execute();

$db->close();