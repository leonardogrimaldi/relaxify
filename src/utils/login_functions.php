<?php

function registerLoggedUser($user){
    $_SESSION["utenteID"] = $user["utenteID"];
    $_SESSION["tipo"] = $user["tipo"];
    $_SESSION["nome"] = $user["nome"];
    $_SESSION["cognome"] = $user["cognome"];
    $_SESSION["email"] = $user["email"];
}

/**
 * Deprecated. Use new functions isAdminLoggedIn or isRealUserLoggedIn.
 * Consider refactoring isRealUserLoggedIn to isUserLoggedIn.
 */

function isUserLoggedIn(){
    return !empty($_SESSION['utenteID']);
}

function isAdminLoggedIn(){
    return !empty($_SESSION['utenteID']) && $_SESSION['tipo'] == 1;
}

function isRealUserLoggedIn() {
    !empty($_SESSION['utenteID']) && $_SESSION['tipo'] == 0;
}

function isEmailPresent($input_email, $all_email){
    foreach($all_email as $email){
        if($email["email"] == $input_email){
            return true;
        }
    }
    return false;
}

function sendEmail($emailto, $subject, $msg){
    $headers = 'From relaxify@info.com';
    mail($emailto, $subject, $msg, $headers);
}

?>