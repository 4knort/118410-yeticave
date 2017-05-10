<?php 
require 'functions.php';
  unset($_SESSION['user']);

  header("Location: /index.php");
?>