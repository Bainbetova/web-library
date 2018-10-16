<?php   require_once ('../models/model.php'); 
        require '../controllers/setup.php'; ?>
<?php
//var_dump($row['id']);
//var_dump($_GET['id']);
  $idm = $_GET['id'];
  //var_dump($idm);
  $usr = data_cart($idm);  
?>

<?  include '../views/view.php';?>