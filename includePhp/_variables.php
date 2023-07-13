<?php
// определение текущего url
if (!empty($_SERVER["REQUEST_SCHEME"])) {
	$scheme = "{$_SERVER["REQUEST_SCHEME"]}://";
} else {
	$scheme = '';
}
if (!empty($_SERVER["SERVER_NAME"])) {
	$host = $_SERVER["SERVER_NAME"];
} else {
	$host = '';
}
if (!empty(rtrim(dirname($_SERVER['PHP_SELF']), '/\\'))) {
	$curentUri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
} else {
	$curentUri = '';
}
if (!empty($_SERVER["PHP_SELF"])) {
	$curentSelf = $_SERVER["PHP_SELF"];
} else {
	$curentSelf = '/';
}
$curentURL = $scheme . $host . $curentUri . $curentSelf;
$schemeHost = $scheme . $host;

// данные сессии
if (!empty($_SESSION)) {
	$userId = $_SESSION['userId'];
}
