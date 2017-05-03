<?php 
  require 'functions.php';
  require 'lots.php';

  $currentLot = $lots[$_GET['id']];
  $minBet = 500;

  if(!isset($currentLot)) {
    return header('HTTP/1.0 404 not found');
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

  <?=include_template("main-lot", ['lots' => $lots, 'bets' => $bets, 'currentLot' => $currentLot, 'minBet' => $minBet]); ?>

  <?=include_template("footer", []); ?>
</body>
</html>
