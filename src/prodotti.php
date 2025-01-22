<?php
require_once("bootstrap.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$templateParams["titolo"] = "Relaxify - Home";
$templateParams["nome"] = "lista-prodotti-cat.php";
$templateParams["js"] = JS_ROOT.'barra.js';

$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();

$templateParams["prodotticat"] = $dbh->getProductsByCategory($_GET["id"]);

require("template/base.php")
?>
