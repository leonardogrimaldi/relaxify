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
    if (isset($_GET['notificaID'])) {
        $notificaID = testInput($_GET['notificaID']);
        $dbh->readNotification($notificaID);
        echo json_encode($_GET['notificaID']);
        exit;
    }
    if ($_SESSION["tipo"] == 0) {
        $notifications = $dbh->getNotifications($user = "utente");
        echo json_encode($notifications);
    } elseif ($_SESSION["tipo"] == 1) {
        $notifications = $dbh->getNotifications($user = "admin");
        echo json_encode($notifications);
    }
} else {
    $text = "Utente non loggato";
    echo json_encode($text);
}
exit;
?>