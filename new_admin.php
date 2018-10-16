<?php require '../models/output.php'; 
      require '../controllers/setup.php'; ?>

<?
    $rbk = view_chief();
    $admin = view_admin();
    $usr = view_user();

?>

<? include '../views/new_admin.php'; ?>