<?php
require_once 'bootstrap.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["payed"])) {
    $templateParams["titolo"] = "Relaxify - Ordine Confermato";
    $templateParams["nome"] = "ordine_confermato.php";

    $templateParams["categorie"] = $dbh->getCategories();

    $prodotti = $dbh->getCartProducts($_SESSION["utenteID"]);
    $data = date('Y-m-d');
    $speseSpedizione = 5;
    $totale = 0;
    foreach ($prodotti as $prodotto) {
        $totale += $prodotto["prezzo"]*$prodotto["quantita"];
    }

    $totale += $speseSpedizione;
    $idOrdine = $dbh->addNewOrder($_SESSION["utenteID"], $data, "p", $totale);
    foreach ($prodotti as $prodotto) {
        $dbh->addNewOrderedProduct($prodotto["prodottoID"], $idOrdine, $_SESSION["utenteID"], $prodotto["quantita"]);
    }
    $dbh->deleteCartProducts($_SESSION["utenteID"]);
    $dbh->createNotification($idOrdine, 'p');
    sendEMail($dbh->getEmailById($_SESSION["utenteID"]),"Ordine Confermato","Il tuo ordine è stato confermato, complimenti! ");


    require 'template/base.php';
} else {
    header("location: index.php");
}
?>