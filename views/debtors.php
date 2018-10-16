<?php include '../js/libs.js'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Библиотека</title>
  <link rel="stylesheet" href="../views/style.css">
  <meta name="Разработчик" content="Баинбетова В.В.">
</head>
<body>
  <div id="title">
    <h1>Должники</h1>
    <div id="serch_sait">
      <form method="get" action="search.php">
      <input type="search" name="word" placeholder="искать"></form>
    </div>
  </div>
  <div id="content">
    <div id="sections">
      <?php require 'side.php'; ?>
    </div>
    <div id="main" style="width: 80%">
      <h2>Список должников</h2>
      <table border="1" style="margin-left: 15px">
        <thead>
          <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Автор</th>
            <th>Название книги</th>
            <th>Дата сдачи</th>
          </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $stmt->fetch_assoc()): ?>
        <tr>
          <td><?= $row['surname'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['mail'] ?></td>
          <td><?= $row['author'] ?></td>
          <td><?= $row['title'] ?></td> 
          <td><?= $row['date_del'] ?></td>
        </tr>
        <? endwhile; ?>        
        </tbody>
      </table>      
    </div>
    
  </div>
  <div id="footer">
    <p>Сайт изготовлен администратором сайта 2018.</p>
  </div>
</body>
</html>