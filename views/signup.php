<? include '../js/signup_form.js'; ?>
<div id="signup">
  <h3>Регистрация</h3>

  <form id="signup_form">

    <label for="sname">Имя пользователя</label>
    <input type="text" id="sname" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" required>

    <label for="ssurname">Фамилия пользователя</label>
    <input type="text" id="ssurname" value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>" required>

    <label for="smail">Адрес электронной почты</label>
    <input type="text" id="smail" value="<?php if (isset($_POST['mail'])) echo $_POST['mail']; ?>" required>

    <label for="slogin">Логин</label>
    <input type="text" id="slogin" value="<?php if (isset($_POST['login'])) echo $_POST['login']; ?>" required>

    <label for="spasswd">Пароль</label>
    <input type="password" id="spasswd" required>

    <label for="srepasswd">Подтверждение пароля</label>
    <input type="password" id="srepasswd" required>

    <div id="clear">
      <input type="reset" value="Очистить">
    </div>

    <div id="send">
      <input type="submit" value="Отправить">
    </div>

    <div class="clear"></div>
  </form>
</div>
