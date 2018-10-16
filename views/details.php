<?php include '../js/libs.js';            ?>

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
  <?php if (strcmp($row['category'],"inf") == 0): ?> 
    <h1>Информатика</h1>
  <?php endif ?>
  <?php if (strcmp($row['category'],"prib") == 0): ?> 
    <h1>Приборостроение</h1>
  <?php endif ?>
  <?php if (strcmp($row['category'],"elec") == 0): ?> 
    <h1>Электротехника</h1>
  <?php endif ?>
  <?php if (strcmp($row['category'],"tm") == 0): ?> 
    <h1>Технология машиностроения</h1>
  <?php endif ?>
  <?php if (strcmp($row['category'],"chim") == 0): ?> 
    <h1>Химия</h1>
  <?php endif ?>
  <?php if (strcmp($row['category'],"ekon") == 0): ?> 
    <h1>Экономика</h1>
  <?php endif ?>
  <?php if (strcmp($row['category'],"mng") == 0): ?> 
    <h1>Менеджмент</h1>
  <?php endif ?>
    <div id="serch_sait">
      <form method="get" action="../controllers/search.php">
      <input type="search" name="word" placeholder="искать"></form>
    </div>
  </div>
  <div id="content">
    <div id="sections">
      <?php require 'side.php'; ?>
    </div>
    <div id="main" style="width: 30%">
      <?  if ($row): ?>
        <h4> <?= $row['title'] ?> <br>
            Автор: <?= $row['author']?> 
        </h4>
        <p>
          <img class="picture" style="width: 90%;" src="../image/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
          Библиографическое описание: <?= $row['description'] ?> <br>
        </p>
        <p>
        <?php if ($row['count'] > 0): ?>
          В наличии <?= $row['count'] ?> шт.<br>
        </p>
        <?php if ($user): ?>
          <p id="take">
            <button>Взять книгу</button>
          </p>
      <? include '../js/take_button.js'; ?>
        <?php endif; ?>        
        <?php if ($user['is_owner'] == 1 || $user['is_owner'] == 2): ?>  
          <p id = "edit">                
            <button>Изменить</button>
          </p>
          <p id="delete"> 
            <button>Удалить</button> 
          </p>
          <p id="relationtag"> 
            <button>Привязать тег</button> 
          </p>
          <? include '../js/edit_button.js'; ?>         
          <? include '../js/delete_button.js'; ?>
          <? include '../js/details.js'; ?>   
          <?php endif; ?>        
        <?php else: ?>
          Нет в наличии<br>
        </p>
        <?php endif; ?>
      <?php endif; ?>
    </div>
    </div>
  <div id="footer">
  <p>Сайт изготовлен администратором сайта 2018.</p>
  </div>
</body>
</html>
