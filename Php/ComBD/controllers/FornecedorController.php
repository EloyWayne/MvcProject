<?php
include_once 'models/Fornecedor.php';
include_once 'models/Produto.php';
class FornecedorController {
    private $conn;


    public function __construct($db) {
        $this->conn = $db;
    }


    private function checkAuth() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?action=login");
            exit;
        }
    }
    public function listAll() {
        $fornecedorModel = new Fornecedor($this->conn);
        $result = $fornecedorModel->getAll();
        include 'views/fornecedores.php';
    }


    public function filter() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['fornecedor'];
            $fornecedorModel = new Fornecedor($this->conn);
            $result = $fornecedorModel->getByName($name);
            include 'views/fornecedor_detalhe.php';
        } else {
            include 'views/fornecedor_filtro.php';
        }
    }
    public function confirmDelete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $fornecedorModel = new Fornecedor($this->conn);
            $result = $fornecedorModel->getById($id);
            $fornecedor = $result->fetch_assoc();
            include 'views/confirm_delete.php';
        }
    }


    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $fornecedorModel = new Fornecedor($this->conn);
            $fornecedorModel->deleteById($id);
            header("Location: index.php?action=filter");
            exit;
        }
    }  
    
    public function edit() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $fornecedorModel = new Fornecedor($this->conn);
            $result = $fornecedorModel->getById($id);
            $fornecedor = $result->fetch_assoc();
            include 'views/edit_fornecedor.php';
        }
    }


    public function update() {
        if (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_GET['id'];
            $fornecedor = $_POST['fornecedor'];
            $telefone = $_POST['telefone'];
            $revendedor = $_POST['revendedor'];
            
            $fornecedorModel = new Fornecedor($this->conn);
            $fornecedorModel->updateById($id, $fornecedor, $telefone, $revendedor);
            header("Location: index.php?action=filter");
            exit;
        }
    }


    public function create() {
        $this->checkAuth();
        include 'views/cadastro_fornecedor.php';
    }


    public function store() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fornecedor = $_POST['fornecedor'];
            $telefone = $_POST['telefone'];
            $revendedor = $_POST['revendedor'];
            
            $fornecedorModel = new Fornecedor($this->conn);
            $fornecedorModel->create($fornecedor, $telefone, $revendedor);
            header("Location: index.php?action=filter");
            exit;
        }
    }
    public function viewProducts() {
        $this->checkAuth();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $fornecedorModel = new Fornecedor($this->conn);
            $fornecedorResult = $fornecedorModel->getById($id);
            $fornecedor = $fornecedorResult->fetch_assoc();
            
            $produtoModel = new Produto($this->conn);
            $result = $produtoModel->getByFornecedorId($id);
            include 'views/listar_produtos.php';
        }
    }   
    
}
?>
