<?php
$requestErrorPhp = '';

if (isset($_POST['title']) && isset($_POST['discription']) && isset($_POST['category']) && $_FILES['inputFile']['name']) {
	if ($_POST['title'] != '') {
		$requestName = htmlspecialchars($_POST['title']);
	} else {
		$requestErrorPhp .= 'Поле "Название" не заполнено.';
	}
	if ($_POST['discription'] != '') {
		$requestDiscription = htmlspecialchars($_POST['discription']);
	} else {
		$requestErrorPhp .= 'Поле "Описание" не заполнено.';
	}
	if ($_POST['category'] != '') {
		$requestCategory = htmlspecialchars($_POST['category']);
	} else {
		$requestErrorPhp .= 'Поле "Категория" не заполнено.';
	}
	if ($_FILES['inputFile']['name'] != '') {
		$_FILES['inputFile']['name'] = htmlspecialchars($_FILES['inputFile']['name']);
		$ext = strtolower(pathinfo($_FILES['inputFile']['name'], PATHINFO_EXTENSION));
		$_FILES['inputFile']['name'] = $host . "_" . time() . "." . $ext;
		$requestFileBefore = 'img/request/before/' . $_FILES['inputFile']['name'];
	} else {
		$requestErrorPhp .= 'Поле "Файл" не заполнено.';
	}

	// добавление заявки на сервер
	$connectMySql->query("INSERT INTO `cityPortal_requests` (`requestId`, `requestTitle`, `requestDiscription`, `requestCategory`, `requestFileBefore`, `requestFileAfter`, `requestStatus`, `requestCreateDate`, `IdRequestUserCreated`, `IdRequestUserEdit`) VALUES (NULL, '$requestName', '$requestDiscription', '$requestCategory', '$requestFileBefore', NULL, 'новая', CURRENT_TIMESTAMP, '$userId', NULL);");
	echo "<script>
	alert('Успешно!');
	</script>";
	move_uploaded_file($_FILES['inputFile']['tmp_name'], $requestFileBefore);

	header('HTTP/1.1 200 OK');
	header("Location: $schemeHost/user.php");
}

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

// echo '<pre>';
// print_r($_FILES);
// echo '</pre>';

// echo time();
