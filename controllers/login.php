<?  include '../models/model.php'; ?>
<?php
  require 'connect.php';
  if (isset($_POST['email'])) { $email = $_POST['email']; }
  if (isset($_POST['password'])) { $password = $_POST['password']; }
?>

<?php
  if (isset($email) && isset($password)) {
    $res = login($email);    
    if ($res) {
      if ($res->num_rows > 0) {
        if (password_verify($_POST['passwd'], $user['passwd'])) {
          $user = $res->fetch();
          $row = $res->fetch_assoc();
          session_start();
          $_SESSION['user_id'] = $user['id'];
          echo "<p style=\"color: #293499; font-size: 14pt;\">Имя пользователя: {$row['name']}<br>Адрес электронной почты: {$row['mail']}<br>Логин: {$row['login']}<br>Пароль: {$row['passwd']}</p>";
        } else {
          echo "Указан неверный пароль, попробуйте заново";
        }
      } else {
        echo "<p style=\"color: red; font-size: 14pt;\">Такого пользователя нет в системе! Пройдите регистрацию!</p>";
      }
    }
  } else {
    echo "Ошибка подключения к MySQL";
  }
?>
