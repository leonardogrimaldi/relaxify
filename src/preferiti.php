<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Preferiti";
$templateParams["nome"] = "favorites.php";
$templateParams["js"] = JS_ROOT.'tabs.js';
$templateParams["module"] = "module";

$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();
$prodotto = $templateParams["prodotti"][0];
$templateParams["prodottisuggeriti"] = $dbh->getRandomProducts(2);

if(!isset($_SESSION['utenteID'])){
    header("Location: login.php");
    exit;
}

require("template/base.php")
?>