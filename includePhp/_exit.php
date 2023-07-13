<?php
include_once("./includePhp/_variables.php");
session_start();
session_destroy();
header("Location: /");
