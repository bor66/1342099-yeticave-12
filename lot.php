<?php
include ('helpers.php');
$is_auth = rand(0, 1);
$user_name = 'Aleksandr';
$title = '';

$con = mysqli_connect("localhost", "root", "", "yeticave");
mysqli_set_charset($con, "utf8");

$lot_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); 

$sql_lot = "SELECT l.id, l.name, l.add_date,  l.description, l.image_link, l.start_price, l.expiration_date, l.step_sum, b.sum_price, c.name category 
FROM lots l JOIN categories c ON c.id = l.category_id
LEFT JOIN bet b ON b.lot_id = l.id WHERE l.id = '$lot_id'";

$result_lots = mysqli_query($con, $sql_lots);
$rows_lots = mysqli_fetch_all($result_lots, MYSQLI_ASSOC);

$sql_categories = "SELECT name, code FROM categories";
$result_lots = mysqli_query($con, $sql_categories);
$rows_categories = mysqli_fetch_all($result_lots, MYSQLI_ASSOC);

$sql_bet = "SELECT b.bet_date, b.sum_price, b.user_id, b.lot_id, u.name FROM bet b JOIN users u ON b.id = u.id WHERE WHERE b.lot_id = '$lot_id'"
$result_bet = mysqli_query($con, $sql_bet);
$rows_bet = mysqli_fetch_all($result_bet, MYSQLI_ASSOC);

if (isset ($_GET['id']))

$lot_page_content = include_template('lot_info.php', ['categories' => $rows_categories, 'items' => $rows_lots, 'rows_bet' => $rows_bet]);
$layout_content = include_template('layout.php', ['page_content' => $page_content, 'user_name' => $user_name, 'title' => $title, 'categories' => $rows_categories, 'is_auth' => $is_auth]);
print($layout_content);
?> 
