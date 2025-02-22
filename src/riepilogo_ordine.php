<?php
require_once 'bootstrap.php';

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


    require 'template/base.php';
} else {
    header("location: index.php");
}
?>