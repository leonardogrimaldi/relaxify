<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);

        if($this->db->connect_error){
            die("Connessione al DB fallita.");
        }
    }

    public function getCategories(){
        $stmt = $this->db->prepare("SELECT categoriaID, nome FROM categoria");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProducts($n=-1){
        $query = "SELECT prodotto.*, categoria.nome AS 'categoria' FROM prodotto, categoria WHERE prodotto.categoriaID = categoria.categoriaID";
        if($n>0){
            $query = $query . " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n>0){
            $stmt->bind_param("i", $n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLogin($email, $input_pwd){
        $stmt = $this->db->prepare("SELECT * FROM utente WHERE email = ? ");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);
        if(password_verify($input_pwd, $result[0]["password"])){
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

    public function getAllEmails(){
        $stmt = $this->db->prepare("SELECT email FROM utente");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEmailById($id){
        $stmt = $this->db->prepare("SELECT email FROM utente WHERE utenteID = ? ");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);
        return $result[0]["email"];
    }

    public function getCartProducts($idutente){
        $stmt = $this->db->prepare("SELECT *, prodotto_carrello.carrelloID as idprodotto FROM prodotto_carrello, prodotto WHERE prodotto_carrello.idprodotto=prodotto.prodottoID AND utenteID = ? ");
        $stmt->bind_param('i', $idutente);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);
    }

    private function isProductInCart($idprodotto, $idutente){
        $stmt = $this->db->prepare("SELECT * FROM prodotto_carrello WHERE prodottoID = ? && utenteID = ?");
        $stmt->bind_param('ii', $idprodotto, $idutente);
        $stmt->execute();
        $result = $stmt->get_result();
        return mysqli_num_rows($result) > 0;
    }

    public function insertProductInCart($idutente, $idprodotto)
    {
        if ($this->isProductInCart($idprodotto, $idutente)) {
            $stmt = $this->db->prepare("UPDATE `prodotto_carrello` SET `quantita` = `quantita` + 1 WHERE `prodottoID` = ? && `utenteID` = ?");
            $stmt->bind_param('ii', $idProdotto, $idUtente);
            $stmt->execute();
            return true;
        } else {
            $stmt = $this->db->prepare("INSERT INTO `prodotto_carrello`(`utenteID`, `prodottoID`) VALUES (?, ?)");
            $stmt->bind_param('ii', $idutente, $idprodotto);
            $stmt->execute();
            return true;
        }
        return false;
    }

    public function getProductsByCategory($id){
        $query = "SELECT prodotto.prodottoID, prodotto.nome as prodottonome, prodotto.descrizione as prodottodescrizione, prodotto.prezzo, prodotto.immagine, prodotto.categoriaID, categoria.nome as categorianome, categoria.descrizione as categoriadescrizione FROM prodotto, categoria WHERE prodotto.categoriaID=categoria.categoriaID AND prodotto.categoriaID=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($id){
        $stmt = $this->db->prepare("SELECT prodottoID, nome, descrizione, prezzo, immagine, categoriaID FROM prodotto WHERE prodottoID=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRandomProducts($n){
        $stmt = $this->db->prepare("SELECT * FROM prodotto ORDER BY RAND() LIMIT ? ");
        $stmt->bind_param("i", $n);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function newProduct($data, $nomeImmagine) {
        // Check file name already exists
        $stmt = $this->db->prepare("SELECT immagine FROM prodotto WHERE immagine = ?");
        $stmt->bind_param("s", $file_name);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result-> num_rows > 0) {
            throw new Exception("Esiste già un prodotto con lo stesso nome immagine. Sceglierne un altro");
        }

        // Add to database
        $stmt = $this->db->prepare("INSERT INTO prodotto(nome, categoriaID, prezzo, descrizione, immagine) VALUES (?, ?, ?, ?, ?);");
        $stmt->bind_param("sidss", $data["nome"], $data["categoria"], $data["prezzo"], $data["descrizione"], $nomeImmagine);
        $stmt->execute();
        $result = $stmt->get_result();
    }

    public function editProduct($data, $image) {
        print_r($data);
        print_r($image);
        foreach($data as $key=>$value) {
            $query = "UPDATE prodotto SET $key = ? WHERE prodottoID = ?;";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("si", $value, $data["prodottoID"]);
            $stmt->execute();
        }
    }

    public function deleteProduct($productID) {
        
    }

    public function getOrders() {
        
    }
}

?>