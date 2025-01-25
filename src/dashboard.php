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
class FormValidator
{
    private $data;
    private $requiredFields = [];
    public function __construct($postData, $requiredFields)
    {
        $this->data = $postData;
        $this->requiredFields = $requiredFields;
    }
    public function validate()
    {
        // Common validation rules
        $this->validateRequiredFields();
    }
    private function validateRequiredFields()
    {
        // Check if required fields are present
        foreach ($this->requiredFields as $field) {
            if (empty($this->data[$field])) {
                throw new Exception("{$field} is required.");
            }
        }
    }
    private function validateEmailFormat()
    {
        // Check if email field is in a valid format
        if (!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }
    }

    static function testInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getCleanData(): array
    {
        $clean_data = array();
        foreach ($this->requiredFields as $field) {
            $clean_data[$field] = $this->testInput($this->data[$field]);
        }

        return $clean_data;
    }
}

function saveImage($immagine)
{
    $allowedTypes = [
        'image/png' => 'png',
        'image/jpeg' => 'jpg'
    ];

    if (!isset($immagine)) {
        throw new Exception("There is no file to upload.");
    }
    $filepath = $immagine['tmp_name'];
    $fileSize = filesize($filepath);
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
    $filetype = finfo_file($fileinfo, $filepath);

    if ($fileSize === 0) {
        throw new Exception("The file is empty.");
    }
    if ($fileSize > 3145728) { // 3 MB (1 byte * 1024 * 1024 * 3 (for 3 MB))
        throw new Exception("The file is too large");
    }

    if (!in_array($filetype, array_keys($allowedTypes))) {
        throw new Exception("File not allowed.");
    }
    $filename = basename($immagine['name']);
    $extension = $allowedTypes[$filetype];

    $newFilepath = IMG_ROOT . "/" . $filename;
    if (file_exists(IMG_ROOT . "" . $filename)) {
        throw new Exception("File already exists");
    }
    if (!copy($filepath, $newFilepath)) { // Copy the file, returns false if failed
        throw new Exception("Can't move file.");
    }
    unlink($filepath);

    return $immagine['name'];
}
$requiredFields = ["nome", "categoriaID", "prezzo", "quantita", "descrizione"];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nuovoProdotto'])) {
        $validator = new FormValidator($_POST, $requiredFields);
        try {
            $validator->validate();
            $data = $validator->getCleanData();
            $imageName = saveImage($_FILES['immagine']);
            $dbh->newProduct($data, $imageName);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else if (isset($_POST['salvaModifiche'])) {
        $fields = ["prodottoID", "nome", "categoriaID", "prezzo", "quantita", "descrizione"];
        $clean_data = array();
        foreach($fields as $field) {
            $field_name = "modify-".$field;
            if (!empty($_POST[$field_name])) {
               $clean_data[$field] = FormValidator::testInput($_POST[$field_name]);
            }
        }
        $dbh->editProduct($clean_data, $_FILES['modify-immagine']);
    }
    // Redirect to the same page (or another page)
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
require("template/base.php");