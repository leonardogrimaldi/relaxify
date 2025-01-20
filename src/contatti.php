<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Login";
$templateParams["nome"] = "contatti-template.php";

$templateParams["categorie"] = $dbh->getCategories();


require("template/base.php")
?>