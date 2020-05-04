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
        "picture" => "img/lot-1.jpg"
    ],
    [
        "name" => "DC Ply Mens 2016/2017 Snowboard",
        "category" => "Доски и лыжи",
        "price" => 159999,
        "picture" => "img/lot-2.jpg"
    ],
    [
        "name" => "Крепления Union Contact Pro 2015 года размер L/XL",
        "category" => "Крепления",
        "price" => 8000,
        "picture" => "img/lot-3.jpg"
    ],
    [
        "name" => "Ботинки для сноуборда DC Mutiny Charocal",
        "category" => "Ботинки",
        "price" => 10999,
        "picture" => "img/lot-4.jpg"
    ],
    [
        "name" => "Куртка для сноуборда DC Mutiny Charocal",
        "category" => "Одежда",
        "price" => 7500,
        "picture" => "img/lot-5.jpg"
    ],
    [
        "name" => "Маска Oakley Canopy",
        "category" => "Разное",
        "price" => 5400,
        "picture" => "img/lot-6.jpg"
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

$page_content = include_template('main.php', ['categories' => $categories, 'items' => $items]);
$layout_content = include_template('layout.php', ['main' => $page_content, 'user' => $user_name, 'title' => $title, 'categories' => $categories, 'items' => $items]);
print($layout_content);
?>