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
        "expiration date" => "2020-05-14"
    ],
    [
        "name" => "DC Ply Mens 2016/2017 Snowboard",
        "category" => "Доски и лыжи",
        "price" => 159999,
        "picture" => "img/lot-2.jpg",
        "expiration date" => "2020-05-15"
    ],
    [
        "name" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "category" => "Крепления",
        "price" => 8000,
        "picture" => "img/lot-3.jpg",
        "expiration date" => "2020-05-16"
    ],
    [
        "name" => "Ботинки для сноуборда DC Mutiny Charocal",
        "category" => "Ботинки",
        "price" => 10999,
        "picture" => "img/lot-4.jpg",
        "expiration date" => "2020-05-17"
    ],
    [
        "name" => "Куртка для сноуборда DC Mutiny Charocal",
        "category" => "Одежда",
        "price" => 7500,
        "picture" => "img/lot-5.jpg",
        "expiration date" => "2020-05-18"
    ],
    [
        "name" => "Маска Oakley Canopy",
        "category" => "Разное",
        "price" => 5400,
        "picture" => "img/lot-6.jpg",
        "expiration date" => "2020-05-12"
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
        $minutes = floor(($time_diff % 3600) / 60);
        // $time = [$hours, $minutes];
    // return $time[0] . ':' . $time[1];
    return $hours . ' часов ' . $minutes . ' минут';
} else {
        $time_over = [0, 0];
        return $time_over[0] . ':' . $time_over[1];
}
}

$page_content = include_template('main.php', ['categories' => $categories, 'items' => $items]);
$layout_content = include_template('layout.php', ['page_content' => $page_content, 'user_name' => $user_name, 'title' => $title, 'categories' => $categories, 'is_auth' => $is_auth]);
print($layout_content);
?>