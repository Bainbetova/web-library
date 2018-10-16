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
    <h1>Библиотека</h1>
    <div id="serch_sait">
      <form method="get" action="../controllers/search.php">
      <input type="search" name="word" placeholder="искать"></form>
    </div>
  </div>
  <div id="content">
    <div id="sections">
      <?php require 'side.php'; ?>
    </div>
    <div id="main" style="width: 80%; font-size: 12pt">
      <h2>Результат поиска</h2>
        <p>
          <?php    
              print "<?xml version=\"1.0\"?>\n";
              print "<books>\n";                        
              while ($row = mysqli_fetch_assoc($query)) {  
                  if (empty($query) == false) {           
                      print "<book>\n";
                      print "<author>".$row['author']."</author>\n";
                      print "<title>".$row['title']."</title>\n";
                      print "<description>".$row['description']."</description>\n";
                      print "</book>\n";
                      echo "<br><br>";
                  } 
              } 
              print "</books>\n";              
          ?>
        </p>
    </div>
    </div>
    <div id="footer">
        <p>Сайт изготовлен администратором сайта 2018.</p>
    </div>
    </body>
</html>