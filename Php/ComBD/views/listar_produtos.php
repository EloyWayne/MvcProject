<!DOCTYPE html>
<html>
<head>
    <title>Produtos do Fornecedor</title>
       <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com//docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>    
    <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <h2>Produtos do Fornecedor: <?php echo htmlspecialchars($fornecedor['Fornecedor']); ?></h2>
                    <table border="1">
                        <tr>
                            <th>ID</th>
                            <th>Produto</th>
                        </tr>
                        <?php while ($produto = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($produto['Id']); ?></td>
                            <td><?php echo htmlspecialchars($produto['Produto']); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </table>
                    <a href="index.php?action=listAll">Voltar</a>
                    
            </div>
         </div>
    </div>                    
</body>
</html>
