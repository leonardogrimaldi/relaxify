<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Prodotto";
$templateParams["nome"] = "product.php";
$templateParams["js"] = [new JSImport('product.js', false)];
$templateParams["module"] = "module";

$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();
$templateParams["prodottoid"] = $dbh->getProductById($_GET["id"]);
$prodotto = $templateParams["prodotti"][0];
$templateParams["prodottisuggeriti"] = $dbh->getRandomProducts(2);
require("template/base.php")
?>