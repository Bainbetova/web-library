<?php
include '../models/model.php';
require 'setup.php';

if (isset($_POST['id'])) {
   $r = $_POST['id'];
   //var_dump($r);
   appointment($r);
   /*$conn = new mysqli("localhost", "Student", "2017", "library");
   $sql = "UPDATE users SET is_owner = '1' WHERE id = $r";
   $t = $conn->query($sql);
   if ($conn->query($sql) === TRUE) {
      echo "Права пользователя успешно изменены.";
   } else {
      echo "Error: ".$conn->error;
   }*/
}
?>