<?php include '../models/model.php'; ?>
<?php
  if (isset($_POST['id'])) {
      $r = $_POST['id'];
      delete_book($r);      
  }
?>
