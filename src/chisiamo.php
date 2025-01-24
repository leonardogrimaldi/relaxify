<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Chisiamo";
$templateParams["nome"] = "chisiamo-template.php";

$templateParams["categorie"] = $dbh->getCategories();


require("template/base.php")
?>