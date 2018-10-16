<? include '../models/model.php'; ?>
<?php
	if (isset($_POST['email'])) { $tmail = $_POST['email']; }
	if (isset($_POST['password'])) { $tpasswd = $_POST['password']; }

	if (isset($tmail) && isset($tpasswd)) {
		$res = authorization($tmail);
		if ($res->num_rows > 0) {
			$cart = auth_cart();
			$user=$res->fetch_assoc();
			if ($user) {
				$password = $user['passwd'];
				//if (crypt($tpasswd, $password) == $password) {
				//if(password_verify($password, $tpasswd)) {
				if (hash(md5, $tpasswd) == $password) {
					session_start();
					$_SESSION['user_id'] = $user['id'];
					$_SESSION['tcart'] = $cart['id'];
					echo "<p style=\"color: #293499; font-size: 14pt;\">Имя пользователя: {$user['name']}<br>Фамилия пользователя: {$user['surname']}<br>Адрес электронной почты: {$user['mail']}<br>Логин: {$user['login']}<br><br><br><a href='/library/index.php'>На главную</a></p>";
				} else {
					echo "<p style=\"color: red; font-size: 14pt;\">Введен не верный пароль.<br><br><a href='/library/index.php'>На главную</a></p>";
				}
			} else {
				echo "<p style=\"color: red; font-size: 14pt;\">Такого пользователя нет в системе. Пожалуйста пройдите регистрацию.<br><br><a href='/library/index.php'>На главную</a></p>";
			}
		} else {
			echo "<p style=\"color: red; font-size: 14pt;\">Такого пользователя нет в системе. Пожалуйста пройдите регистрацию.<br><br><a href='/library/index.php'>На главную</a></p>";
		}	
	}
?>
<?php
	/*require 'connect.php';
	if (isset($_POST['email'])) { $tmail = $_POST['email']; }
	if (isset($_POST['passwd'])) { $tpasswd = $_POST['passwd']; }

	if (isset($tmail) && isset($tpasswd)) {

		$conn = new mysqli("localhost", "Student", "2017", "library");
		if ($res = $conn->query("SELECT * FROM users  WHERE mail='$tmail'")) {
			if ($res->num_rows > 0) {
				$cart = $conn->query("SELECT * FROM cart WHERE id = :id");				
				$user=$res->fetch_assoc();
				if ($user) {
					//$hash = substr($user['passwd'], 0, 2);
					//$hash2 = crypt($tpasswd, $hash);
					//if (strcmp($hash2, $user['passwd']) == 0) {
					//$password = $user['passwd'];
					//if (hash_equals($password, crypt($tpasswd, $password))) {
					//if (crypt($tpasswd, $password) == $password) {
					//if (password_verify($user['passwd'], $tpasswd)) {
					//if (hash_equals($user['passwd'], crypt($tpasswd, $user['passwd']))) {
					//if (hash_equals($res['passwd'], crypt($tpasswd, $res['passwd']))) {
					//if (password_verify($tpasswd, $user['passwd'])) {
						session_start();
						$_SESSION['user_id'] = $user['id'];
						$_SESSION['tcart'] = $cart['id'];
						echo "<p style=\"color: #293499; font-size: 14pt;\">Имя пользователя: {$user['name']}<br>Фамилия пользователя: {$user['surname']}<br>Адрес электронной почты: {$user['mail']}<br>Логин: {$user['login']}<br><br><a href='/library/index.php'>На главную</a></p>";
					} else {
						echo "<p style=\"color: red; font-size: 14pt;\">Указан неверный пароль, попробуйте заново</p>";
					}
				//} else {
					//echo "<p style=\"color: red; font-size: 14pt;\">Такого пользователя нет в системе. Пожалуйста пройдите регистрацию.</p>";
				//}
			} else {
				echo "<p style=\"color: red; font-size: 14pt;\">Такого пользователя нет в системе. Пожалуйста пройдите регистрацию.</p>";
			}
		} else {
			echo "<p style=\"color: red; font-size: 14pt;\">Такого пользователя нет в системе. Пожалуйста пройдите регистрацию.</p>";
		}
	}*/
?>