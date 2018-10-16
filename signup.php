<? include_once '../models/model.php'; ?>
<?php
  if (isset($_POST['name'])) { $name = $_POST['name']; } 
  if (isset($_POST['surname'])) { $surname = $_POST['surname']; } 
  if (isset($_POST['login'])) { $login = $_POST['login']; }
  if (isset($_POST['mail'])) { $mail = $_POST['mail']; }
  if (isset($_POST['passwd'])) { $passwd = $_POST['passwd']; }
  if (isset($_POST['repasswd'])) { $repasswd = $_POST['repasswd']; }
?>

<?php
if (isset($name) && isset($surname) && isset($mail) && isset($login) && isset($passwd) && isset($repasswd)) {
    // соединение с БД
    
    /*if ($conn->query("SELECT id FROM users WHERE login='$login'")) {
        echo "<p style=\"color: red;\">Такой логин уже существует</p>";
    }
    if ($conn->query("SELECT id FROM users WHERE mail='$mail'")) {
        echo "<p style=\"color: red;\">Такой адрес электронной почты уже существует</p>";
    }*/
    if (strlen($name) > 30) { echo "<p style=\"color: red; font-size: 13pt;\">Имя пользователя не должно превышать 30 символов!</p>"; exit; }
    if (strlen($name) < 3) { echo "<p style=\"color: red; font-size: 13pt;\">Имя пользователя не должно быть короче 3 символов!</p>"; exit; }
    if (strlen($surname) > 30) { echo "<p style=\"color: red; font-size: 13pt;\">Фамилия пользователя не должно превышать 30 символов!</p>"; exit; }
    if (strlen($surname) < 3) { echo "<p style=\"color: red; font-size: 13pt;\">Фамилия пользователя не должно быть короче 3 символов!</p>"; exit; }
    if (strlen($mail) > 30) { echo "<p style=\"color: red; font-size: 13pt;\">Адрес эл. почты не должен превышать 30 символов!</p>"; exit; }
    if (strlen($mail) < 6) { echo "<p style=\"color: red; font-size: 13pt;\">Адрес эл. почты не должен быть короче 3 символов!</p>"; exit; }
    if (strlen($login) > 30) { echo "<p style=\"color: red; font-size: 13pt;\">Логин не должен превышать 30 символов!</p>"; exit; }
    if (strlen($login) < 3) { echo "<p style=\"color: red; font-size: 13pt;\">Логин не должен быть короче 3 символов!</p>"; exit; }
    if (strlen($passwd) > 30 || strlen($repasswd) > 30) { echo "<p style=\"color:red; font-size:13pt;\">Пароль не должен первышать 30 символов!</p>"; exit; }
    if (strlen($passwd) < 5 || strlen($repasswd) < 5) { echo "<p style=\"color:red; font-size:13pt;\">Пароль не должен быть короче 5 символов!</p>"; exit; }
    if (!strcmp($passwd, $repasswd) == 0) { echo "<p style=\"color: red; font-size: 13pt;\">Неверное подтверждение пароля!</p>"; exit; }
    if (!preg_match("/^[a-zA-Z0-9]+@mail.ru$/", $mail)) { echo "<p style=\"color: red; font-size: 13pt;\">Адрес эл. почты должен иметь формат имя_почтового_ящика@mail.ru</p>"; exit; }

    /*if (!preg_match("/^[а-яё\d]{1}[а-яё\d]{1}$/", $name)) { echo "<p style=\"color: red; font-size: 13pt;\">Имя пользователя должно быть написано русским алфавитом.</p>"; exit; }
    if (!preg_match("/^[а-яё\d]{1}[а-яё\d]{1}$/", $surname)) { echo "<p style=\"color: red; font-size: 13pt;\">Фамилия пользователя должна быть написана русским алфавитом.</p>"; exit; }
    if (!preg_match("/^[a-zA-Z\d]{1}[a-zA-Z\d]{1}$/", $login)) { echo "<p style=\"color: red; font-size: 13pt;\">Логин пользователя должен быть записан английскими символами.</p>"; exit; }
    
    
    */
    
    
    /*$i;
    $salt="";
    for($i = 1; $i <= 2; $i++){
        $rnd = (int)(rand(75) + 48);
        if (($rnd > 57) && ($rnd < 65)){
        $rnd = 65;
        } elseif (($rnd > 90) && ($rnd < 97)){
            $rnd = 97;
        }
        $salt.=chr($rnd);
    }
    $cryptPasswd = crypt($passwd, $salt);*/

    //$cryptPasswd = password_hash($passwd, PASSWORD_DEFAULT);

    signup($name, $surname, $mail, $login, $passwd);
}
?>

<? include '../views/signup.php'; ?>