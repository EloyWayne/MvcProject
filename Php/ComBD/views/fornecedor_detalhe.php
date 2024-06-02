<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Fornecedor</title>
       <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com//docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
        <div class="card">
            <div class="card-body">    
                <h2>Detalhes do Fornecedor</h2>
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Fornecedor</th>
                        <th>Telefone</th>
                        <th>Revendedor</th>
                        <th>Ações</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['Id']; ?></td>
                        <td><?php echo $row['Fornecedor']; ?></td>
                        <td><?php echo $row['Telefone']; ?></td>
                        <td><?php echo $row['Revendedor']; ?></td>
                        <td>
                            <a href="index.php?action=confirmDelete&id=<?php echo $row['Id']; ?>">Excluir</a>
                            <a href="index.php?action=edit&id=<?php echo $row['Id']; ?>">Editar</a>                            
                            <a href="index.php?action=viewProducts&id=<?php echo $row['Id']; ?>">Ver Produtos</a>
          
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </table>
                <a href="index.php?action=welcome" class="btn btn-danger">Voltar</a>
            </div>
        </div>
    </div>
</body>
</html>
