<?php
$errorRegPhp = '';
$successMessege = '';

//регистрация. проверка на пустые поля формы
if (
	isset($_POST['userName'])
	&& isset($_POST['userNicname'])
	&& isset($_POST['userEmail'])
	&& isset($_POST['userPass'])
) {
	if ($_POST['userName'] != '') {
		$userName = htmlspecialchars($_POST['userName']);
	} else {
		$errorRegPhp .= '<div style="text-align: center;">Поле "Имя" не заполнено.</div>';
	}

	if ($_POST['userNicname'] != '') {
		$userNicname = htmlspecialchars($_POST['userNicname']);
	} else {
		$errorRegPhp .= '<div style="text-align: center;">Вы не придумали свой логин.</div>';
	}

	if ($_POST['userEmail'] != '') {
		$userEmail = htmlspecialchars($_POST['userEmail']);
	} else {
		$errorRegPhp .= '<div style="text-align: center;">Вы не указали почту.</div>';
	}

	if ($_POST['userPass'] != '') {
		$userPass = htmlspecialchars($_POST['userPass']);
	} else {
		$errorRegPhp .= '<div style="text-align: center;">Вы не задали пароль.</div>';
	}

	if (isset($_POST['agreement']) && $_POST['agreement'] != 'false') {
		$agreement = $_POST['agreement'];
	} else {
		$errorRegPhp .= '<div style="text-align: center;">Вы не согласны.</div>';
	}

	//регистрация. проверка на существующего пользователя
	if ($errorRegPhp == '') {

		$isUserNicname = mysqli_fetch_array($connectMySql->query("SELECT * FROM `cityPortal_users` WHERE `userNicname` = '$userNicname';"));
		$isUserEmail = mysqli_fetch_array($connectMySql->query("SELECT * FROM `cityPortal_users` WHERE `userEmail` = '$userEmail';"));

		if ($isUserNicname || $isUserEmail) {

			if ($isUserNicname) {
				$errorRegPhp .= 'Такой ЛОГИН уже зарегистрирован. \n';
			}
			if ($isUserEmail) {
				$errorRegPhp .= 'Я уже знаю такой ПОЧТОВЫЙ ЯЩИК. \n';
			}
			if ($errorRegPhp != '') {
				echo "<script>
			alert('{$errorRegPhp}');
			</script>";
			}

			if (isset($_POST['userName'])) {
				echo "<meta http-equiv='refresh' content='0; URL=/'>";
			}
		} else {
			$connectMySql->query("INSERT INTO `cityPortal_users` (`id`, `userName`, `userNicname`, `userEmail`, `userPass`, `userIsAdmin`, `userRegDate`) VALUES (NULL, '$userName', '$userNicname', '$userEmail', '$userPass', '0', CURRENT_TIMESTAMP)");

			$successMessege = 'Всё успешно! Сейчас перенаправлю в личный кабинет.';
			if ($successMessege != '') {
				echo "<script>
			alert('{$successMessege}');
			</script>";
			}

			$_SESSION['userName'] = $_POST['userName'];
			$_SESSION['userNicname'] = $_POST['userNicname'];
			if (isset($_POST['userName'])) {
				header('HTTP/1.1 200 OK');
				header("Location: $schemeHost/user.php");
			}
			$isReged = mysqli_fetch_array($connectMySql->query("SELECT * FROM `cityPortal_users` WHERE `userNicname` = '$userNicname' AND `userPass` = '$userPass';"));
			if ($isReged) {
				$_SESSION['userId'] = $isReged['id'];
				$_SESSION['userIsAdmin'] = $isReged['userIsAdmin'];
			}
		}
	}
}
//авторизация. проверка на пустые поля формы
if (isset($_POST['authNicname']) && isset($_POST['authPass'])) {
	if ($_POST['authNicname'] != '') {
		$authNicname = htmlspecialchars($_POST['authNicname']);
	} else {
		$errorRegPhp .= '<div style="text-align: center;">Поле "Логин" не заполнено.</div>';
	}
	if ($_POST['authPass'] != '') {
		$authPass = htmlspecialchars($_POST['authPass']);
	} else {
		$errorRegPhp .= '<div style="text-align: center;">Поле "Пароль" не заполнено.</div>';
	}

	//авторизация. проверка на существ пользователя и вход
	if ($errorRegPhp == '') {

		$isLogin = mysqli_fetch_array($connectMySql->query("SELECT * FROM `cityPortal_users` WHERE `userNicname` = '$authNicname' AND `userPass` = '$authPass';"));

		if ($isLogin) {
			$_SESSION['userId'] = $isLogin['id'];
			$_SESSION['userName'] = $isLogin['userName'];
			$_SESSION['userNicname'] = $isLogin['userNicname'];
			$_SESSION['userIsAdmin'] = $isLogin['userIsAdmin'];
			if ($_SESSION['userIsAdmin'] == 0) {
				header('HTTP/1.1 200 OK');
				header("Location: {$scheme}{$host}/user.php");
				// header("Location: $schemeHost/user.php");
				// echo "<meta http-equiv='refresh' content='0; URL=./user.php'>";
			} else {
				header('HTTP/1.1 200 OK');
				header("Location: {$scheme}{$host}/admin.php");
				// header("Location: $schemeHost/admin.php");
				// echo "<meta http-equiv='refresh' content='0; URL=./admin.php'>";
			}
		} else {
			$errorRegPhp .= 'Я не нашел такаго юзера. Логин или пароль указаны не верно!';
			echo "<script>
			alert('{$errorRegPhp}');
			</script>";
		}
	}
}
