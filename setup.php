<?php
// connect to the database
require 'connect.php';
require_once '../models/model.php';
// start new or resume existing session
session_start();

$user = false;

// if user's id exists
if (isset($_SESSION['user_id'])) {
  // get user's data
  $stmt = setup($db, $_SESSION['user_id']);
  $user = $stmt->fetch();
}
?>
