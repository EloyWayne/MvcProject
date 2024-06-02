<!DOCTYPE html>
<html>
<head>
    <title>Login</title>  <!-- Bootstrap core CSS -->
   <link href="https://getbootstrap.com//docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2>Login</h2>
            <form method="post" action="index.php?action=login">
                Usuário: <input type="text" name="usuario" required><br>
                Senha: <input type="password" name="senha" required><br>
                <input type="submit" value="Login"  class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
</body>
</html>
