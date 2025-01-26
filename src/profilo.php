<?php
require_once("bootstrap.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$templateParams["titolo"] = "Relaxify - Profilo";
$templateParams["nome"] = "profile.php";
$templateParams["js"] = JS_ROOT.'tabs.js';
$templateParams["module"] = "module";

$templateParams["js"] = [new JSImport('tabs.js', true), new JSImport('dropdown.js', false), new JSImport('notifications.js', false)];
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();
$prodotto = $templateParams["prodotti"][0];
require("template/base.php")
?>