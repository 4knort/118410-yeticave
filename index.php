<?php 
  require 'functions.php';
  require 'lots.php';

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
  <?=include_template("header", []); ?>

  <?=include_template("main-index", ['lots' => $lots, 'categories' => $categories]); ?>

  <?=include_template("footer", []); ?>
</body>
</html>