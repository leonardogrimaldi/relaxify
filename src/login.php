<?php
require_once("bootstrap.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(isset($_GET["action"])) {
    if($_GET["action"] == "login"){
        if(isset($_POST["email"]) && isset($_POST["password"])){
            $user_login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
            if ($user_login_result == -1) {
                $templateParams["erroreLogin"] = "Errore! Controllare email e password";
            } else {
                registerLoggedUser($user_login_result);
                cartSessionLoggedUser($dbh);
            }
        }
    } elseif($_GET["action"] == "register"){
        if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["new-email"]) && isset($_POST["new-password"])) {
            if(!isEmailPresent($_POST["new-email"], $dbh->getAllEmails())){
                $hashedpwd = password_hash($_POST["new-password"], PASSWORD_DEFAULT);
                $dbh->registerNewUser($_POST["nome"], $_POST["cognome"], $_POST["new-email"], $hashedpwd);
                $user_login_result = $dbh->checkLogin($_POST["new-email"], $_POST["new-password"]);
                if($user_login_result != -1){
                    registerLoggedUser($user_login_result);
                    sendEmail($dbh->getEmailById($_SESSION["utenteID"]), 'Benvenuto in Relaxify', 'Siamo orgoglosi di darti il benvenuto tra noi, speriamo che i nostri prodotti ti possano piacere!');
                }
            } else {
                $templateParams["erroreEmail"] = "La email è gia registrata, prova con il login!";
            }
        }
    }
}


if(isUserLoggedIn()){
    if ($_SESSION["tipo"] == 0) {
        header("location: profilo.php");
    } elseif ($_SESSION["tipo"] == 1) {
        header("location: admin.php");
    } else {
        header("location: login.php");
    }
}



$templateParams["titolo"] = "Relaxify - Login";
$templateParams["nome"] = "login-form.php";
$templateParams["js"] = JS_ROOT.'tabs.js';
$templateParams["module"] = "module";

$templateParams["categorie"] = $dbh->getCategories();

function cartSessionLoggedUser($dbh){
    $carrello = getCartProducts();
    foreach($carrello as $prodotto){
        $dbh->insertProductInCart($_SESSION["utenteID"], $prodotto["prodottoID"]);
    }
}

require("template/base.php")
?>