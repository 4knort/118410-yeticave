<?php 
  require 'functions.php';
  require 'userdata.php';

  session_start();

  $formClass = 'form form--add-lot container';
  $errorArr = [];

  if (count($_POST) > 0) {
    $value = '';
    $errors = false;

    if ($_POST['email'] == $value) {
      $errorArr['email-class'] = 'form__item--invalid';
    }

    if ($_POST['password'] == $value) {
      $errorArr['password-class'] = 'form__item--invalid';
    }

    foreach ($errorArr as $key => $value) {
      if ($value != '') {
        $errors = true;
      }
    }

    if(!$errors) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      if ($user = searchUserByEmail($email, $users)) {
        if (password_verify($password, $user['password'])) {
          $_SESSION['user'] = $user;
          header("Location: /index.php");
        } else {
          $formClass = $formClass . ' form--invalid';
          $errorArr['password-class'] = 'form__item--invalid';
        }
      } else {
        $formClass = $formClass . ' form--invalid';
        $errorArr['email-class'] = 'form__item--invalid';
      }
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

  <?=include_template("main-login", ['formClass' => $formClass, 'errorArr' => $errorArr]); ?>

  <?=include_template("footer", []); ?>
</body>
</html>
