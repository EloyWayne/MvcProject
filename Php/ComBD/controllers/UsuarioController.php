
<?php
include_once 'models/Usuario.php';
class UsuarioController {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }


    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            $userModel = new Usuario($this->conn);
            $user = $userModel->login($usuario, $senha);


            if ($user) {
                session_start();
                $_SESSION['usuario'] = $user['usuario'];
                $_SESSION['tipo'] = $user['tipo'];
                header("Location: index.php?action=welcome");
                exit;
            } else {
                echo "Usuário ou senha inválidos.";
            }
        }
        include 'views/login.php';
    }
    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    }
}
?>
