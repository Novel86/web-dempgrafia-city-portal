<?php
session_start();
session_destroy();
header("Location: ../index.php");
// header("Location: {$_SERVER["SERVER_NAME"]}/index.php");
// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';