<!DOCTYPE html>
<html>
<head>
    <title>Filtrar Fornecedor</title>
   <!-- Bootstrap core CSS -->
   <link href="https://getbootstrap.com//docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
<div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2>Filtrar Fornecedor</h2>
                <form method="post" action="index.php?action=filter">
                    Nome do Fornecedor: <input type="text" name="fornecedor" required><br>
                    <input type="submit" value="Pesquisar">
                </form>
                <a href="index.php?action=welcome" class="btn btn-danger">Voltar</a>
            </div>
        </div>
    </div>
</body>
</html>
