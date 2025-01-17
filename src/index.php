<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Home";
$templateParams["nome"] = "lista-prodotti.php";

$templateParams["categorie"] = $dbh->getCategories();

$templateParams["prodotti"] = $dbh->getProducts();


require("template/base.php")
?>