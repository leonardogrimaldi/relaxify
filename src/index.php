<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Home";
$templateParams["nome"] = "lista-prodotti.php";
$templateParams["js"] = JS_ROOT.'prodotto.js';

$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();

if(isUserLoggedIn()){

    $templateParams["lista_preferiti"] = $dbh->getAllUserPreferredProductId($_SESSION["utenteID"]); 
    if(count($templateParams["lista_preferiti"]) > 0){
        foreach($templateParams["lista_preferiti"] as $prodotto){
            $prodottiPreferiti[] = $prodotto["prodottoID"]; 
        }
        $templateParams["lista_preferiti"] = $prodottiPreferiti; 
    }
}

require("template/base.php")
?>
