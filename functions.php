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

  // $categories = ['Доски и лыжи','Крепления','Ботинки','Одежда','Инструменты','Разное'];
  $categories = [
    [
      'name' => 'Доски и лыжи',
      'class' => 'boards'
    ],
    [
      'name' => 'Крепления',
      'class' => 'attachment'
    ],
    [
      'name' => 'Ботинки',
      'class' => 'boots'
    ],
    [
      'name' => 'Одежда',
      'class' => 'clothing'
    ],
    [
      'name' => 'Инструменты',
      'class' => 'tools'
    ],
    [
      'name' => 'Разное',
      'class' => 'other'
    ]
  ];
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

  ];

  // ставки пользователей, которыми надо заполнить таблицу
  $bets = [
      ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
      ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
      ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
      ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
  ];

  function formatDate($date) {
    $day = 86400;
    $hour = 3600;
    $minute = 60;
    $now = time();
    $formatedDate = '';
    $timeDifference = ($now - $date);

    if ($timeDifference < $hour) {
        $formatedDate = '' . $timeDifference / $minute . ' минут назад';
    } elseif ($timeDifference < $day) {
        $formatedDate = '' . $timeDifference / $hour . ' часов назад';
    } else {
      $formatedDate = '' . date("d:m:y", $date) .' в ' . date("h:i", $date) ;
    }

    return $formatedDate;
  };

  function include_template($file, $data) {
    $filePath = 'templates/' . $file . '.php';
    if (file_exists($filePath)) {
      require_once $filePath;
    } else { 
      return '';
    }
  }
?>