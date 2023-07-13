<header class='header'>
	<div class='header__container'>
		<div class='header__body'>
			<div class='header__logo'>
				<?php
				// убираю ссылку с логотипа на главной
				if ($curentSelf == '/index.php') {
					echo "<div class='header__image'><img src='{$scheme}{$host}/img/logo.svg' alt='логотип городского портала'></div>";
				} else {
					echo "<div class='header__image'><a href='{$scheme}{$host}/'><img src='{$scheme}{$host}/img/logo.svg' alt='логотип городского портала'></a></div>";
				}
				?>
				<div class='header__line'></div>
				<div class='header__title'>Сделаем лучше <p>вместе</p>
				</div>
			</div>
			<nav class='header__menu menu'>
				<ul class='menu__list'>
					<li class='menu__item'><a class='_nav' href='chat.php'><span class='_ic-target'></span>чат</a></li>
					<?php
					//рисую хэдер от условий
					if (!empty($_SESSION)) {
						if ($curentSelf == '/user.php' || $curentSelf == '/admin.php') {
							echo "
						<li class='menu__item'><a class='menu__signIn _nav' href='#' data-popup='#popupExit'><span class='_ic-smile'></span>выход</a></li>
						<li class='menu__item'><a class='menu__signUp _nav' href='{$scheme}{$host}/'>на главную</a></li>
						";
						} else {
							// если юзер на главной странице
							if ($_SESSION['userIsAdmin'] == 0) {
								echo "
								<li class='menu__item'><a class='menu__signIn _nav' href='#' data-popup='#popupExit'><span class='_ic-smile'></span>выход</a></li>
								<li class='menu__item'><a class='menu__signUp _nav' href='{$scheme}{$host}/user.php'>в кабинет</a></li>
								";
							} else {
								echo "
								<li class='menu__item'><a class='menu__signIn _nav' href='#' data-popup='#popupExit'><span class='_ic-smile'></span>выход</a></li>
								<li class='menu__item'><a class='menu__signUp _nav' href='{$scheme}{$host}/admin.php'>в кабинет</a></li>
								";
							}
						}
						// если юзер не зарегистрированый
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
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';

// echo "$scheme$host</br>";
// echo "$curentURL";
?>
