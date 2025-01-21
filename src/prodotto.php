<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Login";
$templateParams["nome"] = "product.php";
$templateParams["js"] = JS_ROOT.'tabs.js';
$templateParams["module"] = "module";

$templateParams["categorie"] = $dbh->getCategories();


require("template/base.php")
?>