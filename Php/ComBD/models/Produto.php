<?php
class Produto {
    private $conn;
    private $table = 'produto';


    public $id;
    public $produto;
    public $idfornecedor;


    public function __construct($db) {
        $this->conn = $db;
    }


    public function getByFornecedorId($idfornecedor) {
        $query = "SELECT * FROM " . $this->table . " WHERE idfornecedor = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idfornecedor);
        $stmt->execute();
        return $stmt->get_result();
    }


    // Outros métodos permanecem inalterados...
}
?>
