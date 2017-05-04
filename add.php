<?php 
  require 'functions.php';
  $formClass = 'form form--add-lot container';
  $errorArr = [];

  function validation($formElements) {
    $value = '';
    global $formClass,$formItem,$errorArr;
    

    foreach ($formElements as $key => $val) {
      if($val == $value || $val == 'Выберите категорию') {
        $formClass = $formClass . ' form--invalid';
        array_push($errorArr, 'form__item--invalid');
      } else {
        array_push($errorArr, '');
      }
    }

  }

  validation($_POST);
  $name = basename($_FILES["add-lot-image"]["name"]);
  move_uploaded_file($_FILES['add-lot-image']['tmp_name'], 'img/' . $name);
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


 