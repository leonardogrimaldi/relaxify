<?php
require_once("bootstrap.php");

$templateParams["titolo"] = "Relaxify - Dashboard";
$templateParams["nome"] = "admin.php";
$templateParams["module"] = "module";
$templateParams["js"] = [new JSImport('tabs.js', true), new JSImport('dropdown.js', false), new JSImport('admin.js', false)];
$templateParams["categorie"] = $dbh->getCategories();
$templateParams["prodotti"] = $dbh->getProducts();
$prodotto = $templateParams["prodotti"][0];

// https://mailtrap.io/blog/php-form-validation/
class FormValidator {
    private $data;
    private $requiredFields = [];
    public function __construct($postData, $requiredFields) {
        $this->data = $postData;
        $this->requiredFields = $requiredFields;
    }
    public function validate() {
        // Common validation rules
        $this->validateRequiredFields();
    }
    private function validateRequiredFields() {
        // Check if required fields are present
        foreach ($this->requiredFields as $field) {
            if (empty($this->data[$field])) {
                throw new Exception("{$field} is required.");
            }
        }
    }
    private function validateEmailFormat() {
        // Check if email field is in a valid format
        if (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }
    }

    private function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getCleanData(): array {
        $clean_data = array();
        foreach ($this->requiredFields as $field) {
            $clean_data[$field] = $this->testInput($this->data[$field]);
        }

        return $clean_data;
    }

    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r($_POST);
    $requiredFields = ["nome", "categoria", "prezzo", "quantita", "descrizione", "immagine", "alt"];
    $validator = new FormValidator($_POST, $requiredFields);
    try {
        $validator->validate();
        $data = $validator->getCleanData();
        print_r($data);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    // Redirect to the same page (or another page)
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
require("template/base.php")
?>