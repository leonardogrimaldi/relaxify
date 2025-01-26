<?php
require_once("bootstrap.php");
if(isUserLoggedIn()){
    if ($_SESSION["tipo"] == 0) {
        header("location: profilo.php?notifications");
    } elseif ($_SESSION["tipo"] == 1) {
        header("location: dashboard.php?notifications");
    }
} else {
    header("location: login.php");
}
exit;
?>