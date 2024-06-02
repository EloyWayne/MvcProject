<!DOCTYPE html>
<html>
<head>
    <title>Confirmar Exclusão</title>
       <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com//docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <h2>Confirmar Exclusão</h2>
                    <p>Tem certeza que deseja excluir o fornecedor <?php echo htmlspecialchars($fornecedor['Fornecedor']); ?>?</p>
                    <form method="post" action="index.php?action=delete&id=<?php echo $fornecedor['Id']; ?>">
                        <input type="submit" value="Confirmar Exclusão">
                    </form>
                    <a href="index.php?action=filter" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
        </div>
</body>
</html>
