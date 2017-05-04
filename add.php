<?php 
  require 'functions.php';
  $formClass = 'form form--add-lot container';
  $errorArr = [];
  $value = '';
  $errors = false;

  if ($_POST['lot-name'] == $value) {
    $errorArr['lot-name'] = 'enter lot name';
    $errorArr['lot-name-class'] = 'form__item--invalid';
  }

  if ($_POST['lot-rate'] <= 0) {
    $errorArr['lot-rate'] = 'enter lot rate';
    $errorArr['lot-rate-class'] = 'form__item--invalid';
  }
  if ($_POST['lot-step'] <= 0) {
    $errorArr['lot-step'] = 'enter lot step';
    $errorArr['lot-step-class'] = 'form__item--invalid';
  }


  foreach ($errorArr as $key => $value) {
    if ($value != '') {
      $errors = true;
    }
  }
  
  if(!$errors) {
    $name = basename($_FILES["add-lot-image"]["name"]);
    move_uploaded_file($_FILES['add-lot-image']['tmp_name'], 'img/' . $name);
  }
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

  <?=include_template("main-add-lot", ['formClass' => $formClass, 'errorArr' => $errorArr])?>

  <?=include_template("footer", []); ?>
</body>
</html>


 