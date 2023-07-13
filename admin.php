<?php
include_once("./includePhp/_connect.php");
if (isset($_POST['category']) && isset($_POST['itemStatus']) && isset($_POST['inputFile']) || isset($_POST['itemStatus']) && isset($_POST['discription'])) {
}
?>
<!DOCTYPE html>
<html lang="ru">

	<head>
		<title>Сделаем лучше вместе. Кабинет админа</title>
		<?php
	include_once("includePhp/_head.php");
	?>
	</head>

	<body>
		<div class="wrapper">
			<?php
		include_once("./includePhp/_header.php");
		?>

			<main class="page">
				<div class="page__hello">
					<?php
				if (!empty($_SESSION)) {
					echo "
					<h2 class=' _h2'>Привет, \${ {$_SESSION['userNicname']} }</h2>
					";
				} else {
					echo "
					<h2 class=' _h2'>Привет, вы не вошли в свой аккаунт. Функции кабинета ограничены.</h2>
					";
				}
				?>
				</div>

				<section class="page__newRequestTable newRequestTable">
					<div class="newRequestTable__container">
						<div class="newRequestTable__head">
							<h2 class="newRequestTable__title _h2">поступившие новые заявки</h2>
							<div class="newRequestTable__text">
								<p>Для изменения заявки, выделите нужную строку в таблице и внесите необходимые изменения в форме ниже.</p>
							</div>
						</div>
					</div>
					<div class="newRequestTable__body">
						<div class="newRequestTable__table tableNewRequestTable">
							<table>
								<thead>
									<tr>
										<th class='idRequest'>idRequest</th>
										<th>Дата</th>
										<th>Категория</th>
										<th>Название</th>
										<th>Описание</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class='idRequest'>00001</td>
										<td>22 Oct, 2020</td>
										<td>Категория1</td>
										<td>Imperdiet gravida bibendum ultricies ipsum</td>
										<td>Feugiat accumsan ultrices massa tellus iaculis lectus sit tellus. Ut pulvinar adipiscing in eu accumsan volutpat imperdiet. Pellentesque viverra eget risus sit proin morbi.</td>
									</tr>
									<tr>
										<td class='idRequest'>00002</td>
										<td>17 Oct, 2020</td>
										<td>Категория2</td>
										<td>Donec fames non ultrices</td>
										<td>Massa sit libero nunc sed ligula aliquam lorem nulla mauris. Feugiat et iaculis nisi in pretium.</td>
									</tr>
									<tr>
										<td class='idRequest'>00003</td>
										<td>21 Sep, 2020</td>
										<td>Категория3</td>
										<td>Risus urna dictum</td>
										<td>Vitae nisi, consectetur est tortor quis gravida lectus. Vitae, et quisque sapien odio velit a pharetra, egestas. Commodo eleifend turpis amet vel magna lacus, enim. Sodales pellentesque est mauris, nec.</td>
									</tr>
									<tr>
										<td class='idRequest'>00004</td>
										<td>8 Sep, 2020</td>
										<td>Категория4</td>
										<td>Quis vestibulum aliquet</td>
										<td>In euismod adipiscing suspendisse sed morbi nec sed. Ut scelerisque diam donec sed aliquam eget.</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

				</section>

				<section class="page__editRequest editRequest">
					<div class="editRequest__container">
						<div class="editRequest__head">
							<h2 class="editRequest__title _h2">редактор заявки</h2>
						</div>
						<div class="editRequest__body">
							<form method="post" action='' class="editRequest__form">
								<div class="editRequest__item">
									<h3 class='_h3 newRequest__label'>Свойства заявки</h3>
									<div class="editRequest__discription">
										<div class='editRequest__info'>
											<label for="newRequestTitle" class="newRequest__label">Название</label>
											<input type="text" id="newRequestTitle" name="title" class="input newRequest__input newRequest__input_text" data-required data-error="" disabled>
											<label for="newRequestDiscription" class="newRequest__label">Описание</label>
											<textarea id="newRequestDiscription" name="discription" class="input newRequest__input newRequest__input_discription" data-autoheight data-required data-error="" disabled></textarea>
										</div>
										<div class="editRequest__imageBefor">
											<picture>
												<source srcset="img/admin/editeRequest/imageBefor.webp" type="image/webp"><img src="img/admin/editeRequest/imageBefor.png" alt="фото места улучшения">
											</picture>
										</div>
									</div>
								</div>
								<div class="editRequest__item">
									<label for="newRequest-category" class="newRequest__label _h3">Редактировать категорию или добавить новую</label>
									<select class="newRequest__category" name="category" id="newRequest-category" data-show-selected data-speed="500">
										<option value="category1" selected>Категория1</option>
										<option value="Категория2">Категория2</option>
										<option value="Категория3">Категория3</option>
										<option value="Категория4">Категория4</option>
										<option id='addCategory' value="добавить категорию">добавить категорию</option>
									</select>
								</div>
								<div class="editRequest__item itemStatus">
									<div class="itemStatus__title _h3">Смена статуса заявки</div>
									<div class="itemStatus__body">
										<div class="itemStatus__column">
											<div class="itemStatus__cardStatus cardStatus">
												<input class='cardStatus__status' type="radio" name="itemStatus" value='Solved' id="itemStatusSolved">
												<label class='_btn _btn_medium _btn_bright' for="itemStatusSolved">Решено</label>
												<div class="cardStatus__fileInput fileInput">
													<div class="fileInput__title cardStatus__title">Загрузите фото “после”</div>
													<div class="fileInput__body">
														<input class="fileInput__input" type="file" accept=".jpg, .png, .jpeg, .webp" name="inputFile" id="formImage">
														<div class="fileInput__button _btn _btn_medium">выбрать фото</div>
													</div>
													<p>файлы jpg, jpeg, png, bmp. не более 10 Mb</p>
													<div class="fileInput__preview" id="formPreview"></div>
												</div>
											</div>
										</div>
										<div class="itemStatus__column">
											<div class="itemStatus__cardStatus cardStatus cardStatus_right">
												<input class='cardStatus__status' type="radio" name="itemStatus" value='Rejected' id="itemStatusRejected">
												<label class='_btn _btn_medium _btn_bright' for="itemStatusRejected">Отклонить</label>
												<div class="cardStatus__title">Укажите причину отклонения</div>
												<textarea id="cardStatusRejection" name="discription" class="input newRequest__input newRequest__input_discription" data-autoheight></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="editRequest__item editRequest__item_button"><button class='_btn' type='submit'><span class='_ic-smile'></span>подтвердить изменения</button></div>
							</form>
						</div>
					</div>
				</section>

				<section class="page__myRequest myRequest">
					<div class="myRequest__container">
						<div class="myRequest__head">
							<h1 class="myRequest__title _h2">Все заявки</h1>
						</div>
						<div class="myRequest__body">
							<?php
						$requestLimit = 4;
						if (isset($_GET['requestLimit'])) {
							$requestLimit += 4;
						}
						$sqlRequest = $connectMySql->query("SELECT * FROM `cityPortal_requests` ORDER BY `cityPortal_requests`.`requestCreateDate` DESC LIMIT $requestLimit");
						$requestFromSql = mysqli_fetch_array($sqlRequest);
						do {
							$date = date_format(date_create($requestFromSql['requestCreateDate']), 'd m Y H:i');
							$requestTitle = $requestFromSql['requestTitle'];
							$requestDiscription = $requestFromSql['requestDiscription'];
							$requestCategory = $requestFromSql['requestCategory'];
							$requestFileBefore = $requestFromSql['requestFileBefore'];
							$requestStatus = $requestFromSql['requestStatus'];
							echo "
							<div class='myRequest__column'>
							<div class='myRequest__card myCard'>
								<div class='myCard__date _tags _tags_bright'><span class='_ic-calendar'></span>$date</div>
								<div class='myCard__raw'>
									<div class='myCard__media'>
										<picture>
											<source srcset='$requestFileBefore' type='image/webp'><img src='$requestFileBefore' alt='фото объекта до улучшения'>
										</picture>
									</div>
									<div class='myCard__content'>
										<h4 class='myCard__title _h4'>$requestTitle</h4>
										<div class='myCard__text'>
											<p>$requestDiscription</p>
										</div>
										<div class='myCard__status _tags _tags_big _tags_bright'>$requestStatus</div>
										<div class='myCard__category _tags _tags_bright'>$requestCategory</div>
									</div>
								</div>
							</div>
						</div>
								";
						} while ($requestFromSql = mysqli_fetch_array($sqlRequest));
						?>
							<!-- <div class="myRequest__column">
								<div class="myRequest__card myCard">
									<div class="myCard__date _tags _tags_bright"><span class="_ic-calendar"></span>15.07.2022</div>
									<div class="myCard__raw">
										<div class="myCard__media">
											<picture>
												<source srcset="img/user/myRequest/imageRequest01.webp" type="image/webp"><img src="img/user/myRequest/imageRequest01.jpg" alt="фото объекта до улучшения">
											</picture>
										</div>
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

							</div> -->
						</div>
						<div class="myRequest__pagination _h4"><a href=<?php echo '"?requestLimit"' ?>>Показать еще...</a></div>
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
									<div><a class='_btn' href="./includePhp/_exit.php">Да, выйти</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="js/app.js"></script>
	</body>

</html>
