<?php  include '../js/libs.js'; ?>

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
    <h1>Назначение администратора</h1>
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
    <h2>Заведующий библиотекой</h2>
      <table border="1" style="margin-left: 15px">
        <thead>
          <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Email</th>
        </thead>
        <tbody>
        <?php        
        while ($urow = $rbk->fetch_assoc()): ?>
        <tr>
          <td><?= $urow['surname'] ?></td>
          <td><?= $urow['name'] ?></td>
          <td><?= $urow['mail'] ?></td>
        </tr>        
        <?php endwhile; ?>
        </tbody>
      </table>

      <h2>Список библиотекарей</h2>
      <table border="1" style="margin-left: 15px">
        <thead>
          <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Действие</th>
        </thead>
        <tbody>
        <?php        
        while ($urow = $admin->fetch_assoc()): ?>
        <tr>
          <td><?= $urow['surname'] ?></td>
          <td><?= $urow['name'] ?></td>
          <td><?= $urow['mail'] ?></td>
          <td id="razgalovanie">
            <button class="razg" data-id="<?= $urow['id']?>">Разжаловать</button>
            </td>
            <? include '../js/razgalovanie.js';  ?>
        </tr>        
        <?php endwhile; ?>
        </tbody>
      </table>

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
        while ($row = $usr->fetch_assoc()): ?>
        <tr>
          <td><?= $row['surname'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['mail'] ?></td>
          <td id="naznachenie">
            <button class="naznach" data-id="<?= $row['id']?>">Назначить библиотекарем</button>
          </td>
          <? include '../js/naznachenie.js';  ?>
        </tr>
        <?php endwhile; ?>
        </tbody>
      </table>      
    </div>
    
  </div>
  <div id="footer">
    <p>Сайт изготовлен администратором сайта 2018.</p>
  </div>
</body>
</html>