<?php require_once ('../models/model.php');  
      require '../controllers/setup.php'; ?>

<?php
  $stmt = view_debtors();
?>

<?php include '../views/debtors.php'; ?>