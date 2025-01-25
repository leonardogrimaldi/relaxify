<?php
require_once 'bootstrap.php';

$templateParams["js"] = JS_ROOT . "preferred.js";

if (isset($_POST["itemToDelete"])) {
    $prodottoID = $_POST["itemToDelete"];
    $dbh->removePreferredProduct($prodottoID, $_SESSION["utenteID"]); 
}

if (isset($_POST["itemToAdd"])) {
    $prodottoID = $_POST["itemToAdd"];
    $dbh->addNewPreferredProduct($prodottoID, $_SESSION["utenteID"]); 
    
}

?>