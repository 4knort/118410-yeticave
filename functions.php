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

  function searchUserByEmail($email, $users) {
    $result = null;

    foreach ($users as $user) {
      if ($user['email'] == $email) {
        $result = $user;
        break;
      }
    }
    return $result;
  }
?>