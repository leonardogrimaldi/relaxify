<?php
require_once 'bootstrap.php';

$templateParams["js"] = JS_ROOT . "prodotto.js";

if (isset($_POST["itemToDelete"])) {
    $prodottoID = $_POST["itemToDelete"];
    $dbh->removeCartProduct($prodottoID, $_SESSION["utenteID"]); 
}

if (isset($_POST["itemToAdd"])) {
    $prodottoID = $_POST["itemToAdd"];
    $dbh->addCartProduct($prodottoID, $_SESSION["utenteID"]);
    
}

if (isset($_POST["itemToDecrease"])) {
    $prodottoID = $_POST["itemToDecrease"];
    $dbh->decreaseCartProduct($prodottoID, $_SESSION["utenteID"]); 
}

?>