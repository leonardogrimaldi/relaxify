<?php

function getCartProducts()
{
    if (isset($_SESSION["carrello"])) {
        return $_SESSION["carrello"];
    } else {
        $_SESSION["carrello"] = [];
        return $_SESSION["carrello"];
    }
}

?>