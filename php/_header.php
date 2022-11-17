<header class='header'>
	<div class='header__container'>
		<div class='header__body'>
			<div class='header__logo'>
				<div class='header__image'><a href="../index.php"><img src='img/logo.svg' alt='логотип городского портала'></a></div>
				<div class='header__line'></div>
				<div class='header__title'>Сделаем лучше <p>вместе</p>
				</div>
			</div>
			<nav class='header__menu menu'>
				<ul class='menu__list'>
					<?php
					// определяю основной путь
					$url = $_SERVER['REQUEST_URI'];
					$url = explode('?', $url);
					$url = $url[0];
					//рисую хэдер от условий
					if (!empty($_SESSION)) {
						if ($url == '/user.php' || $url == '/admin.php') {
							echo "
						<li class='menu__item'><a class='menu__signIn _nav' href='#' data-popup='#popupExit'><span class='_ic-smile'></span>выход</a></li>
						<li class='menu__item'><a class='menu__signUp _nav' href='./index.php'>на главную</a></li>
						";
						} else {
							// если на главной странице
							if ($_SESSION['userIsAdmin'] == 0) {
								echo "
								<li class='menu__item'><a class='menu__signIn _nav' href='#' data-popup='#popupExit'><span class='_ic-smile'></span>выход</a></li>
								<li class='menu__item'><a class='menu__signUp _nav' href='./user.php'>в кабинет</a></li>
								";
							} else {
								echo "
								<li class='menu__item'><a class='menu__signIn _nav' href='#' data-popup='#popupExit'><span class='_ic-smile'></span>выход</a></li>
								<li class='menu__item'><a class='menu__signUp _nav' href='./admin.php'>в кабинет</a></li>
								";
							}
						}
						// если не зарегистрирован
					} else {
						echo "
						<li class='menu__item'><a class='menu__signIn _nav' href='#' data-popup='#popupAuth'><span class='_ic-smile'></span>вход</a></li>
						<li class='menu__item'><a class='menu__signUp _nav' href='#' data-popup='#popupReg'>регистрация</a></li>
						";
					}
					?>
				</ul>
			</nav>
		</div>

	</div>
</header>

<?php
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>