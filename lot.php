<?php 
  require 'functions.php';
  require 'lots.php';

  $currentLot = $lots[$_GET['id']];
  $minBet = $currentLot['price'] + 500;
  $betWasNotMade = true;

  if(!isset($currentLot)) {
    return header('HTTP/1.0 404 not found');
  }

  $testLots = json_decode($_COOKIE["myLots"], true);

  foreach ($testLots as $key => $value) {
    if ($value['name'] == $currentLot['name']) {
      $betWasNotMade = false;
    }
  }

  $errorArr = [];

  if(count($_POST) > 0) {
    $errors = false;

    if ($_POST['cost'] < $minBet) {
      $errorArr['cost'] = 'error';
    }

    foreach ($errorArr as $key => $value) {
      if ($value != '') {
        $errors = true;
      }
    }

    if(!$errors) {
      $myNewLot = [
        'name' => $currentLot['name'],
        'categorie' => $currentLot['categorie'],
        'img' => $currentLot['img'],
        'price' => $currentLot['price'] + $_POST['cost'],
        'date' => time(),
      ];

      $myLots = [];
      if (isset($_COOKIE["myLots"])) {
        $myLots = json_decode($_COOKIE["myLots"], true);
        array_push($myLots, $myNewLot);

      }

      $serializesLots = json_encode($myLots);

      setcookie('myLots', $serializesLots, strtotime("+30 days"));

      header("Location: /my-lots.php");
    }

  }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>DC Ply Mens 2016/2017 Snowboard</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <?=include_template("header", []); ?>

  <?=include_template("main-lot", [
    'lots' => $lots, 
    'bets' => $bets, 
    'currentLot' => $currentLot, 
    'minBet' => $minBet, 
    'betWasNotMade' => $betWasNotMade,
  ]); ?>

  <?=include_template("footer", []); ?>
</body>
</html>
