<?php
require_once("bootstrap.php");
$templateParams["titolo"] = "Relaxify - Prodotto";
$templateParams["nome"] = "product.php";
$templateParams["js"] = [new JSImport('product.js', false)];
$templateParams["js1"] = JS_ROOT.'prodotto.js';
$templateParams["module"] = "module";

$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();
$templateParams["prodottoid"] = $dbh->getProductById($_GET["id"]);
$templateParams["pageType"] = "https://schema.org/ItemPage";
if (isset($_GET['fetch']) && $_GET['fetch'] === 'true') {
    header('Content-Type: application/json');
    echo json_encode($templateParams["prodottoid"]);
    exit;
}

if(isUserLoggedIn()){

    $templateParams["lista_preferiti"] = $dbh->getAllUserPreferredProductId($_SESSION["utenteID"]); 
    if(count($templateParams["lista_preferiti"]) > 0){
        foreach($templateParams["lista_preferiti"] as $prodotto){
            $prodottiPreferiti[] = $prodotto["prodottoID"]; 
        }
        $templateParams["lista_preferiti"] = $prodottiPreferiti; 
    }
}

$prodotto = $templateParams["prodotti"][0];
if (empty($templateParams["prodottoid"])) {
    header("location: index.php");
}
$templateParams["prodottisuggeriti"] = $dbh->getRandomProducts(2);
require("template/base.php");
?>