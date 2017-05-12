<?php 
  require 'functions.php';
  require 'lots.php';

  $myLots = [];
  if (isset($_COOKIE["myLots"])) {
    $myLots = json_decode($_COOKIE["myLots"], true);
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

  <?=include_template("main-my-lots", ['lots' => $myLots]); ?>

  <?=include_template("footer", []); ?>
</body>
</html>
