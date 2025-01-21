<?php
session_start();
define("IMG_ROOT", "./resources/img/");
define("JS_ROOT", "js/");
require_once("../db/database.php");
require_once("utils/login_functions.php");
require_once("utils/cart_functions.php");
$dbh = new DatabaseHelper("localhost", "root", "", "relaxify", 3306);
?>