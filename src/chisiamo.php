<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Chisiamo";
$templateParams["nome"] = "chisiamo-template.php";

$templateParams["categorie"] = $dbh->getCategories();
$templateParams["pageType"] = "https://schema.org/AboutPage";

require("template/base.php")
?>