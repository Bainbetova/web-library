<?php  require_once ('../models/model.php'); ?>
<?php 

if (isset($_POST['id'])) {
  $r = $_POST['id'];
  //var_dump($r);
  /*$conn = new mysqli("localhost", "Student", "2017", "library");

  $sql = "DELETE FROM map WHERE book_id = '$r'";
  $res = $conn->query($sql);
  if ($conn->query($sql) === TRUE) {
    echo "<p style=\"color: #293499; font-size: 14pt;\">Запись удалена.";
      
  } else {
    echo "<p style=\"color: red; font-size: 14pt;\">Ошибка: ".$conn->error;
  }*/
  delete_of_cart($r);
}
?>
