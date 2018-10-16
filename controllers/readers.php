<?php require '../controllers/setup.php'; 
      require_once ('../models/model.php'); ?>

<?php   // вывести пользователей, у которых не пустой формуляр
        $stmt = readers_books(); ?>

<? include '../views/readers.php'; ?>