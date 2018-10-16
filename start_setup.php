<?php
// connect to the database
require 'start_connect.php';
// start new or resume existing session
session_start();

$user = false;

// if user's id exists
if (isset($_SESSION['user_id'])) {
  // get user's data
  $stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
  $stmt->bindValue(':id', $_SESSION['user_id'], PDO::PARAM_INT);
  $stmt->execute();
  $user = $stmt->fetch();
}
?>