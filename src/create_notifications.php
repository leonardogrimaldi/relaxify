<?php
function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
require_once("bootstrap.php");
header('Content-Type: application/json');
if(isUserLoggedIn()){
    if (isset($_GET['ordineID']) && isset($_GET['stato'])) {
        $ordineID = testInput($_GET['ordineID']);
        $stato = $_GET['stato'];
        $dbh->createNotification($ordineID, $stato);
        $dbh->updateOrderState($ordineID, $stato);
        echo json_encode("Notifica creata");
        exit;
    }
} else {
    $text = "Utente non loggato";
    echo json_encode($text);
}
exit;
?>