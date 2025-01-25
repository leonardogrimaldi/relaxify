<?php
class DatabaseHelper
{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);

        if ($this->db->connect_error) {
            die("Connessione al DB fallita.");
        }
    }

    public function getCategories()
    {
        $stmt = $this->db->prepare("SELECT categoriaID, nome FROM categoria");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProducts($n = -1)
    {
        $query = "SELECT prodotto.*, categoria.nome AS 'categoria' FROM prodotto, categoria WHERE prodotto.categoriaID = categoria.categoriaID";
        if ($n > 0) {
            $query = $query . " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if ($n > 0) {
            $stmt->bind_param("i", $n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLogin($email, $input_pwd)
    {
        $stmt = $this->db->prepare("SELECT * FROM utente WHERE email = ? ");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);
        if (password_verify($input_pwd, $result[0]["password"])) {
            return $result[0];
        } else {
            return -1;
        }
    }

    public function registerNewUser($nome, $cognome, $email, $password)
    {
        $stmt = $this->db->prepare("INSERT INTO `utente`(`nome`, `cognome`, `email`, `password`) VALUES (?,?,?,?)");
        $stmt->bind_param('ssss', $nome, $cognome, $email, $password);
        $stmt->execute();
    }

    public function getAllEmails()
    {
        $stmt = $this->db->prepare("SELECT email FROM utente");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEmailById($id)
    {
        $stmt = $this->db->prepare("SELECT email FROM utente WHERE utenteID = ? ");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);
        return $result[0]["email"];
    }

    public function getCartProducts($utenteID)
    {
        $stmt = $this->db->prepare("SELECT * FROM prodotto_carrello, prodotto WHERE prodotto_carrello.prodottoID=prodotto.prodottoID AND utenteID = ? ");
        $stmt->bind_param('i', $utenteID);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    private function isProductInCart($idprodotto, $idutente)
    {
    $stmt = $this->db->prepare("SELECT * FROM prodotto_carrello WHERE prodottoID = ? AND utenteID = ?");
    $stmt->bind_param('ii', $idprodotto, $idutente);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->num_rows > 0;
    }

    
    public function addCartProduct($prodottoID, $utenteID)
    {
        if ($this->isProductInCart($prodottoID, $utenteID)) {
            $stmt = $this->db->prepare("UPDATE `prodotto_carrello` SET `quantita` = `quantita` + 1 WHERE `prodottoID` = ? && `utenteID` = ?");
            $stmt->bind_param('ii', $prodottoID, $utenteID);
            $stmt->execute();
            return true;
        } else {
            $stmt = $this->db->prepare("INSERT INTO `prodotto_carrello`(`prodottoID`, `utenteID`) VALUES (?, ?)");
            $stmt->bind_param('ii', $prodottoID, $utenteID);
            $stmt->execute();
            return true;
        }
        return false;
    }

    public function removeCartProduct($prodottoID){
        $stmt = $this->db->prepare("DELETE FROM `prodotto_carrello` WHERE carrelloID = ?");
        $stmt->bind_param('i', $prodottoID);
        $stmt->execute();
    }

    public function getProductsByCategory($id)
    {
        $query = "SELECT prodotto.prodottoID, prodotto.nome as prodottonome, prodotto.descrizione as prodottodescrizione, prodotto.prezzo, prodotto.immagine, prodotto.categoriaID, categoria.nome as categorianome, categoria.descrizione as categoriadescrizione FROM prodotto, categoria WHERE prodotto.categoriaID=categoria.categoriaID AND prodotto.categoriaID=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($id)
    {
        $stmt = $this->db->prepare("SELECT prodottoID, nome, descrizione, prezzo, immagine, categoriaID FROM prodotto WHERE prodottoID=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRandomProducts($n)
    {
        $stmt = $this->db->prepare("SELECT * FROM prodotto ORDER BY RAND() LIMIT ? ");
        $stmt->bind_param("i", $n);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function newProduct($data, $nomeImmagine)
    {
        // Check file name already exists
        $stmt = $this->db->prepare("SELECT immagine FROM prodotto WHERE immagine = ?");
        $stmt->bind_param("s", $file_name);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            throw new Exception("Esiste già un prodotto con lo stesso nome immagine. Sceglierne un altro");
        }

        // Add to database
        $stmt = $this->db->prepare("INSERT INTO prodotto(nome, categoriaID, prezzo, descrizione, immagine) VALUES (?, ?, ?, ?, ?);");
        $stmt->bind_param("sidss", $data["nome"], $data["categoria"], $data["prezzo"], $data["descrizione"], $nomeImmagine);
        $stmt->execute();
        $result = $stmt->get_result();
    }

    public function editProduct($data, $image)
    {
        print_r($data);
        print_r($image);
        $this->db->begin_transaction();
        try {
            foreach ($data as $key => $value) {
                $query = "UPDATE prodotto SET $key = ? WHERE prodottoID = ?;";
                $stmt = $this->db->prepare($query);
                $stmt->bind_param("si", $value, $data["prodottoID"]);
                $stmt->execute();
            }
            clearstatcache();
            if (filesize($image['tmp_name'])) {
                $getImage = "SELECT immagine FROM prodotto WHERE prodottoID = ?;";
                $stmt = $this->db->prepare($getImage);
                $stmt->bind_param("s", $data["prodottoID"]);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows != 1) {
                    throw new Exception("Failed");
                }
                $row = $result->fetch_assoc();
                $old_image_name = $row['immagine'];
                // Update image path in database
                $setNewImage = "UPDATE prodotto SET immagine = ? WHERE prodottoID = ?;";
                $stmt = $this->db->prepare($setNewImage);
                $stmt->bind_param("si", $image['name'], $data["prodottoID"]);
                $stmt->execute();
                // Save new image
                DatabaseHelper::saveImage($image);
                // Delete old image
                $oldImagePath = IMG_ROOT . "/" . $old_image_name;
                if ($old_image_name != $image['name']) {
                    unlink($oldImagePath);
                }
            }
            $this->db->commit();
        } catch (mysqli_sql_exception $exception) {
            $this->db->rollback();
            throw $exception;
        }
    }

    public function deleteProduct($productID) {}

    public function getOrders() {}

    public function getAllUserPreferredProduct($utenteID)
    {
        $stmt = $this->db->prepare("SELECT * FROM prodotto_preferito, prodotto WHERE prodotto_preferito.prodottoID = prodotto.prodottoID && utenteID = ?");
        $stmt->bind_param('s', $utenteID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllUserPreferredProductId($utenteID)
    {
        $stmt = $this->db->prepare("SELECT prodottoID FROM `prodotto_preferito` WHERE utenteID = ?");
        $stmt->bind_param('s', $utenteID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function removePreferredProduct($prodottoID, $utenteID)
    {
        $stmt = $this->db->prepare("DELETE FROM `prodotto_preferito` WHERE prodottoID = ? && utenteID = ?");
        $stmt->bind_param('ss', $prodottoID, $utenteID);
        $stmt->execute();
    }

    public function addNewPreferredProduct($prodottoID, $utenteID)
    {
        $stmt = $this->db->prepare("INSERT INTO `prodotto_preferito`(`prodottoID`,`utenteID`) VALUES (?,?)");
        $stmt->bind_param('ss', $prodottoID, $utenteID);
        $stmt->execute();
    }

    public static function saveImage($immagine)
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
}
