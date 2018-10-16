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
    <h1>Список читателей</h1>
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
    <h2>Список пользователей</h2>
    <table border="1" style="margin-left: 15px">
      <thead>
        <tr>
          <th>Фамилия</th>
          <th>Имя</th>
          <th>Email</th>
          <th>Действие</th>            
        </tr>
      </thead>
    <tbody>
    <?php
    // вывести пользователей, у которых не пустой формуляр
    //$stmt = readers_books();
    while ($row = $stmt->fetch_assoc()): ?>
      <tr>
        <td><?= $row['surname'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['mail'] ?></td>
        <td id="views">
          <a href="../controllers/view.php?id=<?= $row['user_id'] ?>" id="view" style="color: blue; font-size: 12pt; margin-left: 3%">Просмотр формуляра</a>    
        </td>
      </tr>  
    <?php endwhile; ?>
      </tbody>
    </table> 
    </div>
  </div>
  <div id="footer">
  <p>Сайт изготовлен администратором сайта 2018.</p>  </div>
</body>
</html>