<?php
require_once("bootstrap.php");

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Relaxify - Preferiti";
    $templateParams["nome"] = "favorites.php";
    $templateParams["js"] = JS_ROOT.'preferred.js';
    $templateParams["module"] = "module";
    
    $templateParams["categorie"] = $dbh->getCategories();
    $templateParams["prodotti"] = $dbh->getProducts();
    $prodotto = $templateParams["prodotti"][0];
    $templateParams["prodottisuggeriti"] = $dbh->getRandomProducts(2);
    $templateParams["prodottipreferiti"] = $dbh->getAllUserPreferredProduct($_SESSION["utenteID"]);

    require 'template/base.php';
} else {
    header("location: login.php");
}

?>