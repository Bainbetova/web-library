<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Библиотека</title>
  <script src="libs/jquery-3.2.1.min.js"></script>
  <link rel="stylesheet" href="views/style.css">  
  <meta name="Разработчик" content="Баинбетова В.В.">
</head>
<body>
  <div id="title">
    <h1>Библиотека</h1>
    <div id="serch_sait">
      <form method="get" action="controllers/search.php">
      <input type="search" name="word" placeholder="искать"></form>
    </div>
  </div>
  <div id="content">
    <div id="sections">
      <?php require 'side.php'; ?>
    </div>
    <div id="main" style="width: 80%; font-size: 12pt">
      <h2>Добрый день!</h2>
      <p>
        На данном сайте Вы можете просматривать имеющиеся в библиотеке книги. А также следить за сроками сдачи книг в библитеку.<br><br>
        Часы работы библиотеки:<br>
        пн, вт, ср, чт, пт - с 9:00 до 20:00
        <br> сб, вс - выходной.<br><br>
      </p>
    </div>
    
  </div>
  <div id="footer">
    <p>Сайт изготовлен администратором сайта 2018.</p>
  </div>
</body>
</html>