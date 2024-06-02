<?php
class Usuario {
    private $conn;
    private $table = 'usuario';


    public $id;
    public $usuario;
    public $senha;
    public $tipo;


    public function __construct($db) {
        $this->conn = $db;
    }


    public function login($usuario, $senha) {
        $query = "SELECT * FROM " . $this->table . " WHERE usuario = ? AND senha = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $usuario, $senha);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
<?php
class Usuario {
    private $conn;
    private $table = 'usuario';


    public $id;
    public $usuario;
    public $senha;
    public $tipo;


    public function __construct($db) {
        $this->conn = $db;
    }


    public function login($usuario, $senha) {
        $query = "SELECT * FROM " . $this->table . " WHERE usuario = ? AND senha = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $usuario, $senha);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
