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

    function __construct(string $file_name, bool $module)
    {
        $this->file_name = $file_name;
        $this->module = $module;
    }

    public function fileName()
    {
        return JS_ROOT.$this->file_name;
    }
}
?>