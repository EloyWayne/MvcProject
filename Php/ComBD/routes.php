<?php
// Include necessary files for configuration and controllers
include_once 'config.php';
include_once 'controllers/UsuarioController.php';
include_once 'controllers/FornecedorController.php';

// Instantiate the controllers with the database connection
$usuarioController = new UsuarioController($conn);
$fornecedorController = new FornecedorController($conn);

// Check if an action is set in the URL parameters
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    // Route the action to the corresponding controller method
    switch ($action) {
        case 'login':
            $usuarioController->login();
            break;
        case 'logout':
            $usuarioController->logout();
            break;
        case 'welcome':
            include 'views/welcome.php';
            break;
        case 'listAll':
            $fornecedorController->listAll();
            break;
        case 'filter':
            $fornecedorController->filter();
            break;
        case 'confirmDelete':
            $fornecedorController->confirmDelete();
            break;
        case 'delete':
            $fornecedorController->delete();
            break;
        case 'edit':
            $fornecedorController->edit();
            break;
        case 'update':
            $fornecedorController->update();
            break;
        case 'create':
            $fornecedorController->create();
            break;
        case 'store':
            $fornecedorController->store();
            break;
        case 'viewProducts':
            $fornecedorController->viewProducts();
            break;
        default:
            // Default action if none or invalid action is provided
            $usuarioController->login();
            break;  
    }
} else {
    // Default action if action parameter is not set
    $usuarioController->login();
}
?>

