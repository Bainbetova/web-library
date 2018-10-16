<?php include '../js/libs.js'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Библиотека</title>
  <link rel="stylesheet" href="../views/style.css">
  <meta name="Разработчик" content="Баинбетова В. В.">
</head>
<body>
  <div id="title">
    <h1>Химия</h1>
    <div id="serch_sait">
      <form method="get" action="search.php">
      <input type="search" name="word" placeholder="искать"></form>
    </div>
  </div>
  <div id="content">
    <div id="sections">
      <?php require 'side.php'; ?>
    </div>
    <div id="main">
      <?php
        $category = 'chim';      
        require '../controllers/output.php';
      ?>
    </div>
  </div>
  <div id="footer">
  <p>Сайт изготовлен администратором сайта 2018.</p>  </div>
</body>
</html>
