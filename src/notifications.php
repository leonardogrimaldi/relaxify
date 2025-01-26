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
if (isset($_GET['notificaID'])) {
    $notificaID = testInput($_GET['notificaID']);
    $dbh->readNotification($notificaID);
    echo json_encode($_GET['notificaID']);
    exit;
}
$notifications = $dbh->getNotifications($user = "admin");
echo json_encode($notifications);
exit;
?>