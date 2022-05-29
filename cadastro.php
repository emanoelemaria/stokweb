<?php include('servidor.php') ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/cadastro.css">
    <title>Cadastre-se</title>

</head>
<body>

<div id="cadastro">

<form method="POST" class="cadastro" action="cadastro.php">
<?php include('errors.php'); ?>

    <div class="cadastro-header">
        <h2>Cadastre-se</h2>
    </div>

    <div class="cadastro-content">

        <div class="cadastro-content-area">
            <label for="name">Nome</label>
            <input type="text" name="nome" id="nome" required="_required"/>
        </div>

        <div class="cadastro-content-area">
            <label for="name">Sobrenome</label>
            <input type="text" name="sobrenome" id="sobrenome" required="_required"/>
        </div>

        <div class="cadastro-content-area">
            <label for="name">Nome de usuário</label>
            <input type="text" name="username" id="username" required="_required"/>
        </div>

        <div class="cadastro-content-area">
            <label for="email">email</label>
            <input type="email" name="email" id="email" required="_required"/>
        </div>

        <div class="cadastro-content-area">
            <label for="phone">Celular</label>
            <input type="celular" name="celular" id="celular" required="_required"/>
        </div>

        <div class="cadastro-content-area">
            <label for="pass">Senha</label>
            <input type="password" name="password_1" id="password_1" required="_required"/>
        </div>

        <div class="cadastro-content-area">
            <label for="re-pass">Repetir senha</label>
            <input type="password" name="password_2" id="password_2"required="_required"/>
        </div>

    </div>

    <div class="cadastro-footer">
        <input type="submit" name="reg_user" id="reg_user" class="submit" value="Cadastrar"/>
        <a href="login.php">Já tem uma conta?</a>
    </div>

</form>

</div>

</body>
</html>