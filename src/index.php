<?php
require_once("bootstrap.php");
echo "Prova prova";

$templateParams["titolo"] = "Relaxify - Home";
$templateParams["nome"] = "lista-prodotti.php";

$templateParams["categorie"] = $dbh->getCategories();

$templateParams["prodotti"] = $dbh->getProducts();


require("template/base.php")
?>