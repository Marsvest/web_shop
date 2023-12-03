<?php
$db = new SQLite3('../db.sqlite');

$stmt = $db->prepare("SELECT * FROM Items");
$result = $stmt->execute();

$sum = '';
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $img = $row['item_image'];
    $label = $row['item_label'];
    $desc = $row['item_desc'];
    $price = $row['item_price'];

    $answer = '<div class="product">
        <img src="' . $img . '" alt="item_img">
        <h2>' . $label . '</h2>
        <p>' . $desc . '</p>
        <p>' . $price . ' руб.</p>
    </div>';
    $sum .= $answer;
}
echo $sum;

$db->close();