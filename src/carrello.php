<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Carrello";
$templateParams["nome"] = "cart.php";
$templateParams["js"] = [new JSImport('cart.js', false)];
$templateParams["js1"] = JS_ROOT.'prodotto.js';
$templateParams["module"] = "module";
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();
$prodotto = $templateParams["prodotti"][0];

if(isUserLoggedIn()){
    $templateParams["prodotticarrello"] = $dbh->getCartProducts($_SESSION["utenteID"]); 
} else{
    $templateParams["prodotticarrello"] = getCartProducts(); 
}

if (!isRealUserLoggedIn()) {
    header("location: login.php");
    exit;
}

require("template/base.php")
?>