<?php 
  require 'functions.php';
  require 'lots.php';
  
  if (!isset($_SESSION['user'])) {
    return header('HTTP/1.0 403 Forbidden');
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
  <?php

   
  echo include_template("header", []);

  $formClass = 'form form--add-lot container';
  $errorArr = [];
  if(count($_POST) > 0) {

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

      $newLot = [
        'name' => $_POST['lot-name'], 
        'categorie' => $_POST['category'], 
        'price' => $_POST['lot-rate'],
        'img' => 'img/' . $name,
        'description' => $_POST['message'],
      ];
      array_push($lots, $newLot);
      $newLotsId = count($lots) - 1;
       
      echo include_template("main-lot", ['lots' => $lots, 'bets' => $bets, 'currentLot' => $lots[$newLotsId], 'minBet' => $minBet]);
    } else {
      // Если были ошибки, то снова отображаем форму добавления нового лота
      $formClass = $formClass . ' form--invalid';
      echo include_template("main-add-lot", ['formClass' => $formClass, 'errorArr' => $errorArr]);
    }
  } else {
    // Если это не POST-запрос отображаем форму добавления лота
    echo include_template("main-add-lot", ['formClass' => $formClass, 'errorArr' => $errorArr]);
  }
?>

  <?=include_template("footer", []); ?>
</body>
</html>


 