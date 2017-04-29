<?php
// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');

// записать в эту переменную оставшееся время в этом формате (ЧЧ:ММ)
$lot_time_remaining = "00:00";

// временная метка для полночи следующего дня
$tomorrow = strtotime('22.04.2017 00:00');

// временная метка для настоящего времени
$now = time();
// далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining
// ...
$x = $tomorrow - $now;
$y = sprintf('%02d:%02d:%02d', $x / 3600, ($x % 3600) / 60, $x % 60);
$lot_time_remaining = $y;

$categories = ['Доски и лыжи','Крепления','Ботинки','Одежда','Инструменты','Разное'];

$lots = [
    [
        'name' => '2014 Rossignol District Snowboard', 
        'categorie' => 'Доски и лыжи', 
        'price' => '10999', 
        'img' => 'img/lot-1.jpg'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard  ', 
        'categorie' => 'Доски и лыжи', 
        'price' => '159999', 
        'img' => 'img/lot-2.jpg'
    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL', 
        'categorie' => 'Крепления', 
        'price' => '8000', 
        'img' => 'img/lot-3.jpg'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal ', 
        'categorie' => 'Ботинки', 
        'price' => '10999', 
        'img' => 'img/lot-4.jpg'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal  ', 
        'categorie' => 'Одежда', 
        'price' => '7500', 
        'img' => 'img/lot-5.jpg'
    ],
    [
        'name' => 'Маска Oakley Canopy  ', 
        'categorie' => 'Разное', 
        'price' => '5400', 
        'img' => 'img/lot-6.jpg'
    ]

]
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>



<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="all-lots.html">Доски и лыжи</a>
            </li>
            <li class="promo__item promo__item--attachment">
                <a class="promo__link" href="all-lots.html">Крепления</a>
            </li>
            <li class="promo__item promo__item--boots">
                <a class="promo__link" href="all-lots.html">Ботинки</a>
            </li>
            <li class="promo__item promo__item--clothing">
                <a class="promo__link" href="all-lots.html">Одежда</a>
            </li>
            <li class="promo__item promo__item--tools">
                <a class="promo__link" href="all-lots.html">Инструменты</a>
            </li>
            <li class="promo__item promo__item--other">
                <a class="promo__link" href="all-lots.html">Разное</a>
            </li>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
            <select class="lots__select">
                <?php foreach ($categories as $key => $val): ?>
                    <option><?=$val; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <ul class="lots__list">
            <?php foreach ($lots as $key => $val): ?>
                <li class="lots__item lot">
                    <div class="lot__image">
                        <img src="<?=$val['img'];?>" width="350" height="260" alt="Сноуборд">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"><?=$val['category'];?></span>
                        <h3 class="lot__title"><a class="text-link" href=""><?=$val['name'];?></a></h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <span class="lot__amount">Стартовая цена</span>
                                <span class="lot__cost"><?=$val['price'];?><b class="rub">р</b></span>
                            </div>
                            <div class="lot__timer timer">
                                <?=$lot_time_remaining;?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>



</body>
</html>