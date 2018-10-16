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
    <h1>Формуляр</h1>
    <div id="serch_sait">
      <form method="get" action="search.php">
      <input type="search" name="word" placeholder="искать"></form>
    </div>
  </div>
  <div id="content">
    <div id="sections">
      <?php require 'side.php'; ?>
    </div>
    <div id="main" style="width: auto">
    <h4 style="font-size:12pt">Книги, которые нужно сдать</h4>
      <table border="1" style="margin-left: 15px">
        <thead>
          <tr>
            <th>Автор</th>
            <th>Название книги</th>
            <th>Дата сдачи</th>
          </tr>
        </thead>
        <tbody>
        <?php      
        while ($row = $stmt->fetch()): ?>
        <tr>
          <td><?= $row['author'] ?></td>
          <td><?= $row['title'] ?></td>
          <td><?= $row['date_del'] ?></td>
        </tr>
        <?php endwhile; ?>
        </tbody>
      </table>      
    </div>
  </div>
  <div id="footer">
    <p>Сайт изготовлен администратором сайта 2018</p>
  </div>
</body>
</html>
