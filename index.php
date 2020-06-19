<?php
include ('helpers.php');
$is_auth = rand(0, 1);
$user_name = 'Aleksandr'; // укажите здесь ваше имя
$title = 'Главная';

$con = mysqli_connect("localhost", "root", "", "yeticave");
mysqli_set_charset($con, "utf8");

$sql_lots = "SELECT l.name, l.start_price, l.image_link, b.sum_price, c.name category, l.expiration_date FROM lots l JOIN categories c ON c.id = l.category_id
LEFT JOIN bet b ON b.lot_id = l.id WHERE l.expiration_date > NOW() ORDER BY l.add_date DESC";
$result_lots = mysqli_query($con, $sql_lots);
$rows_lots = mysqli_fetch_all($result_lots, MYSQLI_ASSOC);

$sql_categories = "SELECT name, code FROM categories";
$result_lots = mysqli_query($con, $sql_categories);
$rows_categories = mysqli_fetch_all($result_lots, MYSQLI_ASSOC);

function get_cost($number) {
    $cost;
    if (is_numeric($number)) {
    $cost = ceil($number);
    if ($cost >= 1000) {
        $cost = number_format($cost, 0, ',', ' ');
    }
    }
    return $cost . ' ₽';
};

function countdown($insp_date) {
    $time_diff = strtotime($insp_date) - time();
    if ($time_diff > 0) {
        $hours = floor($time_diff / 3600);
        $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
        $minutes = ceil(($time_diff % 3600) / 60);
        $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);
        $time = [$hours, $minutes];
}  else {
        $time = ['00', '00'];
 }
    return $time;
}

$page_content = include_template('main.php', ['categories' => $rows_categories, 'items' => $rows_lots]);
$layout_content = include_template('layout.php', ['page_content' => $page_content, 'user_name' => $user_name, 'title' => $title, 'categories' => $rows_categories, 'is_auth' => $is_auth]);
print($layout_content);
?>