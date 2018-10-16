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
    <h1>Формуляр пользователя</h1>
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
          
      <table border="1" style="margin-left: 15px">
        <thead>
          <tr>
            <th>Автор</th>
            <th>Название</th>
            <th>Дата сдачи</th>     
            <th>Действие</th>         
          </tr>
        </thead>
      <tbody>
        <h2>Список книг:</h2> 
        <?php while ($row = $usr->fetch()): ?>
        <? $red = $row['surname'] ?> <? $reed = $row['name'] ?>        
        <tr>
          <td><?= $row['author'] ?></td>
          <td><?= $row['title'] ?></td>
          <td><?= $row['date_del'] ?></td>
          <td id="write_of"><button class="js_write_of" data-id="<?= $row['id']?>">Списать книгу</button></td>
        </tr>
        <?php endwhile; ?>  
      </tbody>
      </table>   
      <h2> Читатель <?=$red ?> <?=$reed?> </h2>
      <? include '../js/write_of.js'; ?>
       
    </div>
    </div>
  <div id="footer">
  <p>Сайт изготовлен администратором сайта 2018.</p>
  </div>
</body>
</html>
