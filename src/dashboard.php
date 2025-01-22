<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Dashboard";
$templateParams["nome"] = "admin.php";
$templateParams["module"] = "module";
$templateParams["js"] = [new JSImport('tabs.js', true), new JSImport('dropdown.js', false), new JSImport('admin.js', false)];
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();
$prodotto = $templateParams["prodotti"][0];
require("template/base.php")
?>