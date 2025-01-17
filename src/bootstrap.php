<?php
define("IMG_ROOT", "./resources/img/");
define("JS_ROOT", "js/");
require_once("../db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "relaxify", 3306);
?>