<?php

function registerLoggedUser($user){
    $_SESSION["utenteID"] = $user["utenteID"];
    $_SESSION["tipo"] = $user["tipo"];
}

function isUserLogged(){
    return !empty($_SESSION['utenteID']);
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