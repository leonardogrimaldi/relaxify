<?php
session_start();
define("IMG_ROOT", "./resources/img/");
define("JS_ROOT", "js/");
require_once("../db/database.php");
require_once("utils/login_functions.php");
require_once("utils/cart_functions.php");
$dbh = new DatabaseHelper("localhost", "root", "", "relaxify", 3306);

class JSImport {
    private readonly string $file_name;
    public readonly bool $module;
    public readonly bool $bottom; /* If true, script should be placed at bottom of page */

    function __construct(string $file_name, bool $module, bool $bottom = true)
    {
        $this->file_name = $file_name;
        $this->module = $module;
        $this->bottom = $bottom;
    }

    public function fileName()
    {
        return JS_ROOT.$this->file_name;
    }
}
?>