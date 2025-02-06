<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Contatti";
$templateParams["nome"] = "contatti-template.php";

$templateParams["categorie"] = $dbh->getCategories();
$templateParams["pageType"] = "https://schema.org/ContactPage";

require("template/base.php")
?>