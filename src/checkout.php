<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Checkout";
$templateParams["nome"] = "checkout_template.php";
$templateParams["js"] = JS_ROOT.'tabs.js';
$templateParams["js1"] = JS_ROOT.'checkout.js';
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