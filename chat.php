<?php
include_once("includePhp/_connect.php");
include_once("includePhp/_login.php");
$errorChat = "";
if (isset($_POST["userMessege"])) {
	if ($_POST["userMessege"] != "") {
		$userMessege = htmlspecialchars($_POST["userMessege"]);
		$idUser = $_SESSION['userId'];
		$connectMySql->query("INSERT INTO `cityPortal_messege` (`id`, `messege`, `idUser`, `dateMessege`) VALUES (NULL, '$userMessege', '$idUser', CURRENT_TIMESTAMP);");
		header('HTTP/1.1 200 OK');
		header("Location: $schemeHost/chat.php");
	} else {
		$errorChat .= "Не написал сообщение. Без текста не получится!";
	}
}

// удаление своих сообщений
if (isset($_GET['id'])) {
	$messegeId = $_GET['id'];
	$connectMySql->query("DELETE FROM `cityPortal_messege` WHERE `cityPortal_messege`.`id` = $messegeId;");
	header('HTTP/1.1 200 OK');
	header("Location: {$scheme}{$host}/chat.php");
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
	<title>Сделаем лучше вместе. Чат</title>
	<?php
	include_once("includePhp/_head.php");
	?>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
	<div class="wrapper">

		<?php
		include_once("./includePhp/_header.php");
		?>
		<div class='container-md'>
			<h2 class='_h2 my-5'>Чат пользователей портала</h2>
			<?php
			// рендер формы отправки сообщения в чат
			if (!empty($_SESSION)) {
				echo "
					<form action='' class='' method='POST'>
					<div class='d-flex align-items-end'>
						<div class='col-5 mx-2'>
							<input class='regForm__input w-100 input p-3' data-error='' name='userMessege' placeholder='написать сообщение'></input>
						</div>
						<button type='submit' type='button' class='_btn'>Написать</button>
						</form>
						</div>
					";
			} else {
				echo "<div class='m-0 p-4 h5 alert alert-secondary w-auto' role='alert' style='text-align: center;'>Войди в свой аккаунт, чтобы оставлять сообщения</div>";
			}

			if ($errorChat != "") {
				echo "
					<div class='text-center my-4 mx-2 p-2 alert alert-danger w-auto' role='alert'>{$errorChat}</div>
					";
			}
			?>
			<hr>

			<?php
			// пагинация
			if (isset($_GET['pageMsg'])) {
				$pageMsg = $_GET['pageMsg'];
			} else {
				$pageMsg = 1;
			}
			$msgPerPage = 5; // кол-во записей на странице
			$firstOfsetMsg = ($pageMsg - 1) * $msgPerPage; // порядковый номер первого сообщения на странице
			$msgCountSQL = mysqli_fetch_array($connectMySql->query("SELECT COUNT(*) FROM `cityPortal_messege`"));
			$msgCountSQL = $msgCountSQL[0]; // кол-во сообщений в базе
			$pageCount = ceil($msgCountSQL / $msgPerPage); // необходимо кол-во страниц для сообщений

			// рендер блока сообщений
			$sqlMessege = $connectMySql->query("SELECT * FROM `cityPortal_users`, `cityPortal_messege` WHERE `cityPortal_messege`.`idUser`= `cityPortal_users`.`id` ORDER BY `cityPortal_messege`.`dateMessege` DESC LIMIT $firstOfsetMsg, $msgPerPage");
			$messegeFromSql = mysqli_fetch_array($sqlMessege);
			do {
				$date = date_format(date_create($messegeFromSql['dateMessege']), 'd M H:i');
				$messegeId = $messegeFromSql['id'];
				if ($messegeFromSql['idUser'] == $_SESSION['userId']) {
					echo "<div class='row gx-3 mb-5 d-flex align-items-start justify-content-start'>
								<img src='https://phonoteka.org/uploads/posts/2021-05/thumbs/1620314789_13-phonoteka_org-p-avatarki-s-prozrachnim-fonom-13.png' class='r-5' alt='аватар пользователя' style='max-width: 60px'>
								<div class='col-lg-auto mb-2' style='min-width: 150px'>
									<p class='mb-0 h4'><strong>{$messegeFromSql['userNicname']}:</strong></p>
									<p class='mt-2 mb-0' style='font-size: .6rem;'><small class='text-light bg-dark p-1 px-3 rounded-pill'>{$date}</small></p>
								</div>
								<p class='col-lg-5 pt-1'><em>{$messegeFromSql['messege']}</em></p>
								<a href='?id=$messegeId' class='btn btn-danger col-lg-1'><span class='_ic-close'></span></a>
							</div>";
				} else {
					echo "<div class='row gx-3 mb-5'>
					<img src='https://phonoteka.org/uploads/posts/2021-05/thumbs/1620314789_13-phonoteka_org-p-avatarki-s-prozrachnim-fonom-13.png' class='r-5' alt='аватар пользователя' style='max-width: 60px'>
								<div class='col-lg-auto mb-2' style='min-width: 150px'>
									<p class='mb-0 h4'><strong>{$messegeFromSql['userNicname']}:</strong></p>
									<p class='mt-2 mb-0' style='font-size: .6rem;'><small class='text-light bg-dark p-1 px-3 rounded-pill'>{$date}</small></p>
								</div>
								<p class='col-lg-5 pt-1'><em>{$messegeFromSql['messege']}</em></p>
							</div>";
				}
			} while ($messegeFromSql = mysqli_fetch_array($sqlMessege));

			?>

			<nav aria-label="Page navigation example">
				<ul class="pagination d-flex justify-content-center">
					<li class='page-item'>
						<a class='page-link' href=<?php if ($pageMsg <= 1) {
																echo "";
															} else {
																echo "?pageMsg=" . ($pageMsg - 1);
															} ?> aria-label='Previous'>
							<span aria-hidden='true'>&laquo;</span>
						</a>
					</li>
					<?php
					for ($i = 1; $i <= $pageCount; $i++) {
						if ($i == $pageMsg) {
							echo "
								<li class='page-item active'><a class='page-link' href='?pageMsg=$i'>$i</a></li>
								";
						} else {
							echo "
							<li class='page-item'><a class='page-link' href='?pageMsg=$i'>$i</a></li>
							";
						}
					}
					?>
					<li class='page-item'>
						<a class='page-link' href=<?php if ($pageMsg >= $pageCount) {
																echo "";
															} else {
																echo "?pageMsg=" . ($pageMsg + 1);
															} ?> aria-label='Next'>
							<span aria-hidden='true'>&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
	<script src="js/app.js"></script>

	<footer class="footer">

		<div class="footer__content">Новосибирск, 2022</div>
	</footer>

	<div id="popupReg" aria-hidden="true" class="popup">
		<div class="popup__wrapper">
			<div class="popup__content">
				<div data-close type="button" class="popup__close"><span class="_ic-close"></span></div>
				<div class="popup__text">
					<div class="form__reg reg">
						<div class="reg__head">
							<div class="reg__title _h1">Регистрация</div>
							<div class="reg__subtitle">нового пользователя</div>
						</div>
						<div class="reg__body">
							<form action="" method="post" class="reg__form regForm form" id="form-regForm">
								<div class="regForm__item">
									<label class='regForm__label' for="userName">Имя</label>
									<input class='regForm__input input' type="text" name="userName" id="userName" placeholder='от 2 до 50 символов. кирилица, пробел и тире' data-required='name' data-validate data-error="">
								</div>
								<div class="regForm__item">
									<label class='regForm__label' for="userNicname">Логин</label>
									<input class='regForm__input input' type="text" name="userNicname" id="userNicname" placeholder=' от 3 до 25 символов. латиница, цифры и тире' data-required='login' data-validate data-error="">
								</div>
								<div class="regForm__item">
									<label class='regForm__label' for="userEmail">Почта</label>
									<input class='regForm__input input' type="text" name="userEmail" id="userEmail" placeholder='адрес электронной почты' data-required='email' data-validate data-error="">
								</div>
								<div class="regForm__item">
									<label class='regForm__label' for="userPass">Пароль</label>
									<input class='regForm__input input' type="password" name="userPass" id="userPass" placeholder='более 8 символов, латиница, цифры, знаки &%#@' data-required='password' data-validate data-error="">
									<span class='regForm__viewpass _ic-check'></span>
								</div>
								<div class="regForm__item">
									<label class='regForm__label' for="userPassCheck">Повтор Пароля</label>
									<input class='regForm__input input' type="password" name="userPassCheck" id="userPassCheck" placeholder='повторите пароль' data-required='passRepeat' data-validate data-error="">
									<span class='regForm__viewpass _ic-check'></span>
								</div>
								<div class="regForm__item">
									<div class='regForm__agreement'>
										<input class='regForm__inputCheckbox checkbox' type="checkbox" name="agreement" id="userCheckbox" data-required data-error="" checked>
										<label class='regForm__labelCheckbox' for="userCheckbox">с условиями пользовательского соглашения ознакомлен</label>
									</div>
								</div>
								<div class="regForm__item">
									<button type="submit" class="regForm__button _btn"><span class='_ic-person'></span>Зарегистрироваться</button>
								</div>
								<div div class="regForm__item" class="regForm__item">
									<div class="regForm__login">уже зарегистрированы, то вам<a href="#" data-popup="#popupAuth">сюда</a></div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="popupAuth" aria-hidden="true" class="popup">
		<div class="popup__wrapper">
			<div class="popup__content">
				<div data-close type="button" class="popup__close"><span class="_ic-close"></span></div>
				<div class="popup__text">
					<div class="form__reg reg">
						<div class="reg__head">
							<div class="reg__title _h1">Авторизация</div>
							<div class="reg__subtitle">войди в свой кабинет</div>
						</div>
						<div class="reg__body">
							<form action="" method="post" class="reg__form regForm form" id="form-auth">
								<div class="regForm__item">
									<label class='regForm__label' for="authNicname">Логин</label>
									<input class='regForm__input input' type="text" name="authNicname" id="authNicname" data-required data-error="">
								</div>
								<div class="regForm__item">
									<label class='regForm__label' for="authPass">Пароль</label>
									<input class='regForm__input input' type="password" name="authPass" id="authPass" data-required data-error="">
								</div>
								<div class="regForm__item">
									<button type="submit" class="regForm__button _btn"><span class='_ic-target'></span>Войти</button>
								</div>
								<div div class="regForm__item" class="regForm__item">
									<div class="regForm__login">еще не зарегестрированы, то вам <a href="#" data-popup="#popupReg">сюда</a></div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="popupGoodReg" aria-hidden="true" class="popup">
		<div class="popup__wrapper">
			<div class="popup__content">
				<div data-close type="button" class="popup__close"><span class="_ic-close"></span></div>
				<div class="popup__text">
					<div class="popup__goodReg goodReg">
						<div class="goodReg__head">
							<div class="goodReg__title _h1">Успешно</div>
							<div class="goodReg__subtitle">вы успешно зарегистрировались</div>
						</div>
						<div class="goodReg__body">
							<div class="goodReg__item">
								<p>но для дальнейшего использования нужно подтвердить указанный email. Проверте на почте письмо.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="popupExit" aria-hidden="true" class="popup">
		<div class="popup__wrapper">
			<div class="popup__content">
				<div class="popup__text">
					<div class="popup__exit exit">
						<div class="exit__head">
							<div class="exit__title _h1">Вы уверены</div>
							<div class="exit__subtitle">Все несохраненные данные будут утеряны<br>точно хотите выйти из кабинета?</div>
						</div>
						<div class="exit__body">
							<div class="exit__item">
								<div data-close><a class='_btn' href="#">Нет, остаться</a></div>
								<div><a class='_btn' href="./includePhp/_exit.php">Да, выйти</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>