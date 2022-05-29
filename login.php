<?php include('servidor.php') ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
    
</head>
<body>

<div id="login">

<form method="POST" class="login" action="login.php">
<?php include('errors.php'); ?>

    <div class="login-header">
        <h2>Login</h2>
    </div>

    <div class="login-content">

        <div class="login-content-area">
            <label for="usuario">Usuário</label>     
            <input type="text" name="username" id="username" required="_required"/>
        </div>

        <div class="login-content-area">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required="_required"/>
        </div>

    </div>

    <div class="login-footer">
        <input type="submit" name="submit" id="submit" class="submit" value="Entrar"/>
        <a href="cadastro.php">Ainda não tem cadastro?</a>
    </div>

</form>

</div>

</body>
</html>