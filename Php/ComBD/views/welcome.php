<?php
// session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php?action=login");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bem-vindo</title>
       <!-- Bootstrap core CSS -->
       <link href="https://getbootstrap.com//docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2>Bem-vindo, <?php echo $_SESSION['usuario']; ?> (<?php echo $_SESSION['tipo']; ?>)</h2>
                <a href="index.php?action=listAll" class="btn btn-primary">Lista de Fornecedores</a>
                <a href="index.php?action=filter" class="btn btn-info">Pesquisar Fornecedor</a>
                <a href="index.php?action=create" class="btn btn-success">Cadastrar novo fornecedor</a>
                <a href="index.php?action=logout" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>

