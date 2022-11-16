<!DOCTYPE html>
<html lang="ru">

	<?php
include_once("./php/_head.php");
?>

	<body>
		<div class="wrapper">

			<?php
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

		$errorRegPhp = '';

		if (isset($_POST['userName']) && isset($_POST['userNicname']) && isset($_POST['userEmail']) && isset($_POST['userPass'])) {
			if ($_POST['userName'] != '') {
				$userName = $_POST['userName'];
			} else {
				$errorRegPhp .= '<div style="text-align: center;">Поле "Имя" не заполнено.</div>';
			}

			if ($_POST['userNicname'] != '') {
				$userNicname = $_POST['userNicname'];
			} else {
				$errorRegPhp .= '<div style="text-align: center;">Вы не придумали свой логин.</div>';
			}

			if ($_POST['userEmail'] != '') {
				$userEmail = $_POST['userEmail'];
			} else {
				$errorRegPhp .= '<div style="text-align: center;">Вы не указали почту.</div>';
			}

			if ($_POST['userPass'] != '') {
				$userPass = $_POST['userPass'];
			} else {
				$errorRegPhp .= '<div style="text-align: center;">Вы не задали пароль.</div>';
			}

			if (isset($_POST['agreement']) && $_POST['agreement'] != 'false') {
				$agreement = $_POST['agreement'];
			} else {
				$errorRegPhp .= '<div style="text-align: center;">Вы не согласны.</div>';
			}
		}

		include_once("./php/_header.php");

		?>

			<main class="page">

				<section class="page__first first">
					<div class="first__content">
						<div class="first__container">
							<div class="first__body">
								<h1 class="first__title _h1">Позаботимся о благоустройстве вместе</h1>
								<div class="first__text _p">Amet viverra tellus lobortis blandit eleifend justo, etiam dignissim amet risus pellentesque velit vulputate tortor</div>
								<a href="#" class="first__btn _btn"><span class="_ic-smile"></span>узнать подробнее</a>
							</div>

						</div>

					</div>
					<div class="first__image">
						<img src="img/first/Linth.svg" alt="узор на главном экране">
					</div>

				</section>

				<section class="page__request request">
					<div class="request__container">
						<div class="request__head">
							<h2 class="request__title _h2">Последние заявки</h2>
						</div>
						<div class="request__body">
							<div class="request__row">
								<div class="request__column">
									<div class="request__card cardRequest">
										<div class="cardRequest__body">
											<div class="cardRequest__date _tags _tags_bright"><span class="_ic-calendar"></span>15.07.2022</div>
											<div class="cardRequest__image">
												<img src="img/request/Rectangle 3.png" alt="фото заявки">
												<div class="cardRequest__status _tags _tags_big _tags_bright">новая</div>
											</div>

											<div class="cardRequest__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium dignissimos tempora modi eos dolore odit expedita illo, sed, commodi dolores minima quas officia, maxime eligendi assumenda animi ex sapiente minus?</div>
											<div class="cardRequest__category _tags _tags_bright">категория1</div>
										</div>
									</div>
								</div>
								<div class="request__column">
									<div class="request__card cardRequest">
										<div class="cardRequest__body">
											<div class="cardRequest__date _tags _tags_bright"><span class="_ic-calendar"></span>15.07.2022</div>
											<div class="cardRequest__image">
												<img src="img/request/Rectangle 3-1.png" alt="фото заявки">
												<div class="cardRequest__status _tags _tags_big _tags_bright">новая</div>
											</div>

											<div class="cardRequest__text">Cursus diam cras proin tempus sit ipsum</div>
											<div class="cardRequest__category _tags _tags_bright">категория1</div>
										</div>
									</div>
								</div>
								<div class="request__column">
									<div class="request__card cardRequest">
										<div class="cardRequest__body">
											<div class="cardRequest__date _tags _tags_bright"><span class="_ic-calendar"></span>15.07.2022</div>
											<div class="cardRequest__image">
												<img src="img/request/Rectangle 3-2.png" alt="фото заявки">
												<div class="cardRequest__status _tags _tags_big _tags_bright">новая</div>
											</div>

											<div class="cardRequest__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus ipsam fuga quis.</div>
											<div class="cardRequest__category _tags _tags_bright">категория1</div>
										</div>
									</div>
								</div>
								<div class="request__column">
									<div class="request__card cardRequest">
										<div class="cardRequest__body">
											<div class="cardRequest__date _tags _tags_bright"><span class="_ic-calendar"></span>15.07.2022</div>
											<div class="cardRequest__image">
												<img src="img/request/Rectangle 3-3.png" alt="фото заявки">
												<div class="cardRequest__status _tags _tags_big _tags_bright">новая</div>
											</div>

											<div class="cardRequest__text">Cursus diam cras proin tempus sit ipsum</div>
											<div class="cardRequest__category _tags _tags_bright">категория1</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</section>

				<section class="page__count count">
					<div class="count__container">
						<div class="count__head">
							<h2 class="count__title _h2">количество решенных заявок</h2>
						</div>
						<div class="count__body"><img src="img/count/Group 46.svg" alt="">
							<p>147</p>
						</div>
					</div>
				</section>

			</main>

			<footer class="footer">

				<div class="footer__content">Новосибирск, 2022</div>
			</footer>

		</div>

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
										<div class="regForm__login">попап успешной регистрации<a href="#" data-popup="#popupGoodReg">сюда</a></div>
										<div class="regForm__login">ссылка на страницу админа<a href="/admin.php">тыдыц</a></div>
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
										<label class='regForm__label' for="userNicname">Логин</label>
										<input class='regForm__input input' type="text" name="userNicname" id="authNicname" data-required data-error="">
									</div>
									<div class="regForm__item">
										<label class='regForm__label' for="userPass">Пароль</label>
										<input class='regForm__input input' type="password" name="userPass" id="authPass" data-required data-error="">
									</div>
									<div class="regForm__item">
										<button type="submit" class="regForm__button _btn"><span class='_ic-person'></span>Войти</button>
									</div>
									<div div class="regForm__item" class="regForm__item">
										<div class="regForm__login">еще не зарегестрированы, то вам <a href="#" data-popup="#popupReg">сюда</a></div>
										<div class="regForm__login">ссылка на страницу юзера<a href="/user.php">тыдыц</a></div>
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

		<script src="js/app.min.js?_v=20221116025507"></script>

	</body>

</html>
