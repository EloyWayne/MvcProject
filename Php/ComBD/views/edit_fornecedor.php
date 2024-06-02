<!DOCTYPE html>
<html>
<head>
    <title>Editar Fornecedor</title>
       <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com//docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <h2>Editar Fornecedor</h2>
                    <form method="post" action="index.php?action=update&id=<?php echo $fornecedor['Id']; ?>">
                        Fornecedor: <input type="text" name="fornecedor" value="<?php echo htmlspecialchars($fornecedor['Fornecedor']); ?>" required><br>
                        Telefone: <input type="text" name="telefone" value="<?php echo htmlspecialchars($fornecedor['Telefone']); ?>" required><br>
                        Revendedor: <input type="text" name="revendedor" value="<?php echo htmlspecialchars($fornecedor['Revendedor']); ?>" required><br>
                        <input type="submit" value="Atualizar" class="btn btn-success">
                        <a href="index.php?action=filter" class="btn btn-danger">Cancelar</a>
                    </form>
                    
                </div>
            </div>
    </div>
</body>
</html>
