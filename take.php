<?php
require '../controllers/setup.php';
include_once '../models/model.php'; ?>

<?php 
  if (isset($_POST['id'])) {
    $pos = $_POST['id']; 
    $dir = get_count($pos);  
    $row = $dir->fetch_assoc();
    $tcount = $row['count'];
    // если количество книг на складе < 5 
    if ($tcount <= 5) {
      // дата сдачи - 3 дня
      $dateexp = 3; 
      $date_insert = date('Y-m-d', strtotime ('+'.$dateexp.' day'));
    } else {
      // иначе - 10 дней
      $dateexp = 10; 
      $date_insert = date('Y-m-d', strtotime ('+'.$dateexp.' day'));
    }
    
    $usr = $user['id'];
    $bkId = $_POST['id'];
    $stmt = insert_from_map($usr,  $bkId, $date_insert, $pos, $tcount);
    
  }
?>