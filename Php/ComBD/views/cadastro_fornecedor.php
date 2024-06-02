<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Fornecedor</title>
       <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com//docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2>Cadastro de Fornecedor</h2>
                <form method="post" action="index.php?action=store">
                    Fornecedor: <input type="text" name="fornecedor" required><br>
                    Telefone: <input type="text" name="telefone" required><br>
                    Revendedor: <input type="text" name="revendedor" required><br>
                    <input type="submit" value="Cadastrar" class="btn btn-success">
                </form>
                <a href="index.php?action=filter" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</body>
</html>
