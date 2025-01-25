<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Carrello";
$templateParams["nome"] = "cart.php";
$templateParams["js"] = [new JSImport('cart.js', false)];
$templateParams["module"] = "module";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();
$prodotto = $templateParams["prodotti"][0];

if(!isset($_SESSION['utenteID'])){
    header("Location: login.php");
    exit;
}

require("template/base.php")
?>