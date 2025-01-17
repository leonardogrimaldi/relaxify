<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Login";
$templateParams["nome"] = "login-form.php";
$templateParams["js"] = JS_ROOT.'tabs.js';
$templateParams["module"] = "type='module'";

$templateParams["categorie"] = $dbh->getCategories();


require("template/base.php")
?>