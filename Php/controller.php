<?php
include 'model.php'; // Verifique se o caminho está correto aqui

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    $user = new User($username, $password); 

    if ($user->isValid()) { 
        // Redirect to welcome page
        header('Location: welcome.php?username=' . $username); 
        exit; 
    } else { 
        // Redirect to login page with error parameter
        header('Location: login.php?error=true'); 
        exit; 
     } 
} else { 
    // Redirect to login page if accessed directly
    header('Location: login.php'); 
    exit; 
} 
?>
