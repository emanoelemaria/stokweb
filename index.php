<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Você deve fazer login primeiro";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>


<!doctype html>
<html class="no-js" lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/index.css">
    <title>StokWeb</title>


</head>

<body>


    <header> 
        <a href="index.php" class="headertitulo">StokWeb</a>
            <h4 class="headernome"><strong>| Olá, <?php echo $_SESSION['nome']; echo " " ;echo $_SESSION['sobrenome']; echo " |" ;?></strong></h4>
        <a href="login.php" class="headersair">Sair</a>
    </header>

    <div class="container">

    <h3 class="addproduto-titulo">Adicionar Produto</h3>
            <form method="POST" class="addproduto" action="additem.php">
  
            <div class="form-addproduto">
                <label for="name">Nome do Produto</label>
                <input type="text" class="form-control" name="produto_nome">
            </div>

            <div class="form-addproduto">
                <label for="name">Preço</label>
                <input type="text" class="form-control" name="preco">
            </div>

            <div class="form-addproduto">
                <label for="name">Quantidade</label>
                <input type="number" name="quant" id="quant" min="1" max="">
            </div>
        
            <button type="submit" class="btn btn-default" name="add">Adicionar</button>
 
            </form>


            <table>
            <caption>ESTOQUE</caption>
            <thead>
            
                <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOME</th>
                        <th scope="col">PREÇO</th>
                        <th scope="col">QUANTIDADE</th>
                        <th scope="col"> - </th>
			    </tr>
            
            </thead>
            <tbody>

            <?php 
               $conn = new mysqli("localhost","root","","stokweb");
               $sql = "SELECT * FROM produto";
               $result = $conn->query($sql);
					$count=0;
               if ($result -> num_rows >  0) {
				  
                 while ($row = $result->fetch_assoc()) 
				 {
					  $count=$count+1;
                   ?>
                  
                   
                   <tr>
                        <th><?php echo $count ?></th>
                        <th><?php echo $row["produto_nome"] ?></th>
                        <th><?php echo $row["preco"]  ?></th>
                        <th><?php echo $row["quantidade"]  ?></th>
					  
					    <th> <a href="up"Edit</a><a href="edit.php?id=<?php echo $row["produto_id"] ?>">editar</a> <a href="up"Edit</a><a href="deletar.php?id=<?php echo $row["produto_id"] ?>">del</a></th>
                    
                      
                    </tr>
            <?php
                 
                 }
               }

            ?>

            </tbody>
   
            </table>

    </div>

 
                <footer>
                    <div class="footer-area">
                        <p>© StokWeb, 2022.</p>
                    </div>
                </footer>

    
</body>

</html>
