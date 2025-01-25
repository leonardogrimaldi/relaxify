<?php
require_once("bootstrap.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$templateParams["titolo"] = "Relaxify - Home";
$templateParams["nome"] = "lista-prodotti-cat.php";
$templateParams["js"] = JS_ROOT.'prodotto.js';

$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();

$templateParams["prodotticat"] = $dbh->getProductsByCategory($_GET["id"]);

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
