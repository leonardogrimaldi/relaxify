<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Checkout";
$templateParams["nome"] = "checkout_template.php";
$templateParams["js"] = [new JSImport("checkout.js", false)];
$templateParams["module"] = "module";

$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();
$prodotto = $templateParams["prodotti"][0];

if(isUserLoggedIn()){
    $templateParams["prodotticarrello"] = $dbh->getCartProducts($_SESSION["utenteID"]); 
} else{
    $templateParams["prodotticarrello"] = getCartProducts(); 
}

require("template/base.php")
?>