<?php 
  require 'functions.php';
  $formClass = 'form form--add-lot container';
  $formItem = 'form__item';

  function validation($formElements) {
    $value = '';
    global $formClass,$formItem;
    

    foreach ($formElements as $key => $val) {
      if($val == $value) {
        $formClass = $formClass . ' form--invalid';
        $formItem = $formItem . ' form__item--invalid';
      }
    }
  }

  validation($_POST);
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

  <?=include_template("main-add-lot", ['formClass' => $formClass, 'formItem' => $formItem])?>

  <?=include_template("footer", []); ?>
</body>
</html>


 