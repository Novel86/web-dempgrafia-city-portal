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

	//регистрация. проверка на существ пользователя
	if ($errorRegPhp == '') {

		$isUserNicname = mysqli_fetch_array($connectMySql->query("SELECT * FROM `cityPortal_users` WHERE `userNicname` = '$userNicname';"));
		$isUserEmail = mysqli_fetch_array($connectMySql->query("SELECT * FROM `cityPortal_users` WHERE `userEmail` = '$userEmail';"));

		if ($isUserNicname || $isUserEmail) {

			if ($isUserNicname) {
				$errorRegPhp .= '<div style="text-align: center;">Логин уже существует.</div>';
			}
			if ($isUserEmail) {
				$errorRegPhp .= '<div style="text-align: center;">Почта уже существует.</div>';
			}
			if (isset($_POST['userName'])) {
				echo "<meta http-equiv='refresh' content='6; URL=/'>";
			}
		} else {
			$connectMySql->query("INSERT INTO `cityPortal_users` (`id`, `userName`, `userNicname`, `userEmail`, `userPass`, `userIsAdmin`, `userRegDate`) VALUES (NULL, '$userName', '$userNicname', '$userEmail', '$userPass', '0', CURRENT_TIMESTAMP)");
			$successMessege = '
					<div class="popup__goodReg goodReg">
						<div class="goodReg__head">
								<div class="goodReg__title _h1">Регистрация успешна</div>
								<div class="goodReg__subtitle">вы успешно зарегистрировались</div>
						</div>
						<div class="goodReg__body">
							<div class="goodReg__item">
									<p>сейчас вы будете перенаправлены на страницу личного кабинета.</p>
							</div>
						</div>
					</div>';
			if (isset($_POST['userName'])) {
				echo '<meta http-equiv="refresh" content="6; URL=user.php">';
			}
		}
	}
}
