<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Preferiti";
$templateParams["nome"] = "favorites.php";
$templateParams["js"] = JS_ROOT.'tabs.js';
$templateParams["module"] = "module";

$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();
$prodotto = $templateParams["prodotti"][0];
require("template/base.php")
?>