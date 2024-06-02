<?php
class Fornecedor {
    private $conn;
    private $table = 'fornecedor';


    public $id;
    public $fornecedor;
    public $telefone;
    public $revendedor;


    public function __construct($db) {
        $this->conn = $db;
    }


    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($query);
        return $result;
    }
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE Id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
    
    public function getByName($name) {
        $query = "SELECT * FROM " . $this->table . " WHERE fornecedor LIKE ?";
        $stmt = $this->conn->prepare($query);
        $name = "%" . $name . "%";
        $stmt->bind_param("s", $name);
        $stmt->execute();
        return $stmt->get_result();
    }
    public function deleteById($id) {
        $query = "DELETE FROM " . $this->table . " WHERE Id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }


    public function updateById($id, $fornecedor, $telefone, $revendedor) {
        $query = "UPDATE " . $this->table . " SET Fornecedor = ?, Telefone = ?, Revendedor = ? WHERE Id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", $fornecedor, $telefone, $revendedor, $id);
        return $stmt->execute();
    }


    public function create($fornecedor, $telefone, $revendedor) {
        $query = "INSERT INTO " . $this->table . " (Fornecedor, Telefone, Revendedor) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $fornecedor, $telefone, $revendedor);
        return $stmt->execute();
    }
}
?>
