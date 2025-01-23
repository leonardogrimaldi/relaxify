<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Login";
$templateParams["nome"] = "cart.php";
$templateParams["js"] = [new JSImport('cart.js', false)];
$templateParams["module"] = "module";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();
$prodotto = $templateParams["prodotti"][0];
require("template/base.php")
?>