<?php
require_once("bootstrap.php");
header('Content-Type: application/json');
if(isUserLoggedIn()){
    if (isAdminLoggedIn()) {
        $orderStates = $dbh->getOrderStates("");
        echo json_encode($orderStates);
        exit;
    } else if (isRealUserLoggedIn()) {
        $orderStates = $dbh->getOrderStates($_SESSION["utenteID"]);
        echo json_encode($orderStates);
        exit;
    }
} else {
    $text = "Utente non loggato";
    echo json_encode($text);
}
exit;
?>