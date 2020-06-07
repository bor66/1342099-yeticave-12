<?php
include ('helpers.php');
$is_auth = rand(0, 1);
$user_name = 'Aleksandr'; // укажите здесь ваше имя
$title = 'Главная';
$categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
$items = [
    [
        "name" => "2014 Rossignol District Snowboard",
        "category" => "Доски и лыжи",
        "price" => 10999,
        "picture" => "img/lot-1.jpg",
        "expiration date" => "2020-05-20"
    ],
    [
        "name" => "DC Ply Mens 2016/2017 Snowboard",
        "category" => "Доски и лыжи",
        "price" => 159999,
        "picture" => "img/lot-2.jpg",
        "expiration date" => "2020-06-15"
    ],
    [
        "name" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "category" => "Крепления",
        "price" => 8000,
        "picture" => "img/lot-3.jpg",
        "expiration date" => "2020-06-23"
    ],
    [
        "name" => "Ботинки для сноуборда DC Mutiny Charocal",
        "category" => "Ботинки",
        "price" => 10999,
        "picture" => "img/lot-4.jpg",
        "expiration date" => "2020-06-25"
    ],
    [
        "name" => "Куртка для сноуборда DC Mutiny Charocal",
        "category" => "Одежда",
        "price" => 7500,
        "picture" => "img/lot-5.jpg",
        "expiration date" => "2020-07-10"
    ],
    [
        "name" => "Маска Oakley Canopy",
        "category" => "Разное",
        "price" => 5400,
        "picture" => "img/lot-6.jpg",
        "expiration date" => "2020-07-25"
    ]
];

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

$page_content = include_template('main.php', ['categories' => $categories, 'items' => $items]);
$layout_content = include_template('layout.php', ['page_content' => $page_content, 'user_name' => $user_name, 'title' => $title, 'categories' => $categories, 'is_auth' => $is_auth]);
print($layout_content);
?>