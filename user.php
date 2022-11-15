<!DOCTYPE html>
<html lang="ru">

<head>
	<title>Личный кабинет</title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<!-- <style>body{opacity: 0;}</style> -->
	<link rel="stylesheet" href="css/style.min.css?_v=20221116025507">
	<link rel="icon" type="image/svg+xml" href="img/favicon.svg">
	<link rel="icon" type="image/png" href="img/favicon.png">
	<!-- <meta name="robots" content="noindex, nofollow"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
	<div class="wrapper">
		<header class="header">
			<div class="header__container">
				<div class="header__body">
					<div class="header__logo">
						<div class="header__image"><img src="img/logo.svg" alt="логотип городского портала"></div>
						<div class="header__line"></div>
						<div class="header__title">Сделаем лучше <p>вместе</p>
						</div>
					</div>
					<nav class="header__menu menu">
						<ul class="menu__list">
							<li class="menu__item"><a class="menu__signIn _nav" href="#" data-popup="#popupExit"><span class="_ic-smile"></span>выход</a></li>
						</ul>
					</nav>
				</div>

			</div>
		</header>


		<main class="page">

			<section class="page__newRequest newRequest">
				<div class="newRequest__container">
					<div class="newRequest__head">
						<h2 class="newRequest__title _h2">Создать новую заявку</h2>
					</div>
					<div class="newRequest__body">
						<form action="#" method='post' id="form-newRequest" class="newRequest__form form" data-dev>
							<div class="newRequest__item">
								<label for="newRequestTitle" class="newRequest__label">Что улучшить</label>
								<input type="text" id="newRequestTitle" name="title" class="input newRequest__input newRequest__input_text" data-required data-error="">
							</div>
							<div class="newRequest__item">
								<label for="newRequestDiscription" class="newRequest__label">Кратко опишите объект улучшения</label>
								<textarea id="newRequestDiscription" name="discription" class="input newRequest__input newRequest__input_discription" data-autoheight data-required data-error=""></textarea>
							</div>
							<div class="newRequest__item" style="z-index: 3;">
								<label for="newRequest-category" class="newRequest__label">Категория улучшения</label>
								<select class="newRequest__category" name="category" id="newRequest-category" data-show-selected data-speed="500">
									<option value="category1" selected>Категория1</option>
									<option value="category2">Категория2</option>
									<option value="category3">Категория3</option>
									<option value="category4">Категория4</option>
								</select>
							</div>
							<div class="newRequest__item">
								<div class="newRequest__label">Фотография</div>
								<div class="newRequest__fileInput fileInput">
									<div class="fileInput__body">
										<input class="fileInput__input" type="file" accept=".jpg, .png, .jpeg, .webp" name="inputFile" id="formImage" data-required data-error="">
										<div class="fileInput__button _btn _btn_medium">выбрать фото</div>
									</div>
									<span>файлы jpg, jpeg, png, bmp. не более 10 Mb</span>
									<div class="fileInput__preview" id="formPreview"></div>
								</div>

							</div>
							<button class="newRequest__button _btn" type="submit"><span class="_ic-smile"></span>Отправить на улучшение</button>

						</form>
					</div>

				</div>

			</section>

			<section class="page__myRequest myRequest">
				<div class="myRequest__container">
					<div class="myRequest__head">
						<h1 class="myRequest__title _h2">мои заявки</h1>
					</div>
					<div class="myRequest__filter filter">
						<div class="filter__body">
							<ul class="filter__list">
								<li class="filter__item _tags _tags_bright">категория</li>
								<li class="filter__item _tags _tags_bright">категория 1</li>
								<li class="filter__item _tags _tags_bright">категория 2</li>
								<li class="filter__item _tags _tags_bright">категория 3</li>
							</ul>
						</div>
					</div>
					<div class="myRequest__body">
						<div class="myRequest__column">
							<div class="myRequest__card myCard">
								<div class="myCard__date _tags _tags_bright"><span class="_ic-calendar"></span>15.07.2022</div>
								<div class="myCard__raw">
									<div class="myCard__media"><picture><source srcset="img/user/meRequest/imageRequest01.webp" type="image/webp"><img src="img/user/meRequest/imageRequest01.jpg" alt="фото объекта до улучшения"></picture></div>
									<div class="myCard__content">
										<h4 class="myCard__title _h4">Lorem ipsum dolor sit amet.</h4>
										<div class="myCard__text">
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ex ipsum voluptatum illo, possimus sapiente eligendi minima veritatis saepe autem, fugit rerum pariatur culpa id error adipisci atque assumenda consectetur!</p>
										</div>
										<div class="myCard__status _tags _tags_big _tags_bright">новая</div>
										<div class="myCard__category _tags _tags_bright">Категория1</div>
									</div>

								</div>
							</div>

						</div>
						<div class="myRequest__column">
							<div class="myRequest__card myCard">
								<div class="myCard__date _tags _tags_bright"><span class="_ic-calendar"></span>15.07.2022</div>
								<div class="myCard__raw">
									<div class="myCard__media"><picture><source srcset="img/user/meRequest/imageRequest02.webp" type="image/webp"><img src="img/user/meRequest/imageRequest02.jpg" alt="фото объекта до улучшения"></picture></div>
									<div class="myCard__content">
										<h4 class="myCard__title _h4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h4>
										<div class="myCard__text">
											<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Earum asperiores deserunt facere ducimus quia ipsa velit est fuga veniam in doloremque ullam, repellat accusantium quaerat numquam vel voluptatibus aspernatur. Vero. Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus expedita officia commodi ratione.</p>
										</div>
										<div class="myCard__status _tags _tags_big _tags_bright">новая</div>
										<div class="myCard__category _tags _tags_bright">Категория1</div>
									</div>

								</div>
							</div>

						</div>
						<div class="myRequest__column">
							<div class="myRequest__card myCard">
								<div class="myCard__date _tags _tags_bright"><span class="_ic-calendar"></span>15.07.2022</div>
								<div class="myCard__raw">
									<div class="myCard__media"><picture><source srcset="img/user/meRequest/imageRequest03.webp" type="image/webp"><img src="img/user/meRequest/imageRequest03.jpg" alt="фото объекта до улучшения"></picture></div>
									<div class="myCard__content">
										<h4 class="myCard__title _h4">Lorem ipsum dolor sit.</h4>
										<div class="myCard__text">
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, explicabo reprehenderit assumenda eveniet neque nobis ipsum molestiae aliquam ducimus in ipsa expedita labore aspernatur atque. Ab aperiam voluptas doloribus illum?
												Ab nisi libero debitis tenetur ipsam odio quos eum obcaecati dignissimos reprehenderit assumenda accusamus laboriosam itaque velit architecto dolores repudiandae molestiae sunt dolorem, provident nostrum ullam vel. Magni, voluptas voluptates.</p>
										</div>
										<div class="myCard__status _tags _tags_big _tags_bright">новая</div>
										<div class="myCard__category _tags _tags_bright">Категория1</div>
									</div>

								</div>
							</div>

						</div>
						<div class="myRequest__column">
							<div class="myRequest__card myCard">
								<div class="myCard__date _tags _tags_bright"><span class="_ic-calendar"></span>15.07.2022</div>
								<div class="myCard__raw">
									<div class="myCard__media"><picture><source srcset="img/user/meRequest/imageRequest04.webp" type="image/webp"><img src="img/user/meRequest/imageRequest04.jpg" alt="фото объекта до улучшения"></picture></div>
									<div class="myCard__content">
										<h4 class="myCard__title _h4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, reiciendis.</h4>
										<div class="myCard__text">
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod dolor illo aut, eum incidunt excepturi fugiat voluptatum expedita quis error quasi aperiam.</p>
										</div>
										<div class="myCard__status _tags _tags_big _tags_bright">новая</div>
										<div class="myCard__category _tags _tags_bright">Категория1</div>
									</div>

								</div>
							</div>

						</div>
						<div class="myRequest__column">
							<div class="myRequest__card myCard">
								<div class="myCard__date _tags _tags_bright"><span class="_ic-calendar"></span>15.07.2022</div>
								<div class="myCard__raw">
									<div class="myCard__media"><picture><source srcset="img/user/meRequest/imageRequest05.webp" type="image/webp"><img src="img/user/meRequest/imageRequest05.jpg" alt="фото объекта до улучшения"></picture></div>
									<div class="myCard__content">
										<h4 class="myCard__title _h4">Lorem, ipsum dolor sit amet consectetur adipisicing.</h4>
										<div class="myCard__text">
											<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illo eaque minima dignissimos? Autem eligendi fugiat dolore nulla cum rerum non facilis nisi, quas aspernatur recusandae veniam hic sequi maxime delectus.</p>
										</div>
										<div class="myCard__status _tags _tags_big _tags_bright">новая</div>
										<div class="myCard__category _tags _tags_bright">Категория1</div>
									</div>

								</div>
							</div>

						</div>
						<div class="myRequest__column">
							<div class="myRequest__card myCard">
								<div class="myCard__date _tags _tags_bright"><span class="_ic-calendar"></span>15.07.2022</div>
								<div class="myCard__raw">
									<div class="myCard__media"><picture><source srcset="img/user/meRequest/imageRequest06.webp" type="image/webp"><img src="img/user/meRequest/imageRequest06.jpg" alt="фото объекта до улучшения"></picture></div>
									<div class="myCard__content">
										<h4 class="myCard__title _h4">Cursus diam cras proin tempus sit ipsum</h4>
										<div class="myCard__text">
											<p>Cursus diam cras proin tempus sit ipsum. Cursus diam cras proin tempus sit ipsum</p>
										</div>
										<div class="myCard__status _tags _tags_big _tags_bright">новая</div>
										<div class="myCard__category _tags _tags_bright">Категория1</div>
									</div>

								</div>
							</div>

						</div>

					</div>
					<div class="myRequest__pagination _h4">Показать еще...</div>
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
								<div><a class='_btn' href="home.html">Да, выйти</a></div>
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