<?php
require_once("bootstrap.php");

if (!isRealUserLoggedIn()) {
    header("location: login.php");
    exit;
}

$templateParams["titolo"] = "Relaxify - Preferiti";
$templateParams["nome"] = "favorites.php";
$templateParams["js"] = JS_ROOT . 'preferred.js';
$templateParams["js1"] = JS_ROOT . 'prodotto.js';
$templateParams["module"] = "module";

$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();
$prodotto = $templateParams["prodotti"][0];
$templateParams["prodottisuggeriti"] = $dbh->getRandomProducts(2);
$templateParams["prodottipreferiti"] = $dbh->getAllUserPreferredProduct($_SESSION["utenteID"]);
require 'template/base.php';
?>