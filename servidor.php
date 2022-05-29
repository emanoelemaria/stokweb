<?php
session_start();


$username = "";
$email    = "";

$errors = array(); 


$db = mysqli_connect('localhost', 'root', '', 'stokweb');
if (mysqli_connect_errno())
    {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    }


if (isset($_POST['reg_user'])) {
  
  $nome=mysqli_real_escape_string($db, $_POST['nome']);
  $sobrenome=mysqli_real_escape_string($db, $_POST['sobrenome']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $celular= mysqli_real_escape_string($db, $_POST['celular']);

  
  
  if (empty($username)) { array_push($errors, "Username é obrigatório"); }
  if (empty($nome)) { array_push($errors, "Nome é obrigatório"); }
  if (empty($sobrenome)) { array_push($errors, "Sobrenome é obrigatório"); }
  if (empty($email)) { array_push($errors, "Email é obrigatório"); }
  if (empty($password_1)) { array_push($errors, "Senha é obrigatório"); }
  if (empty($celular)) { array_push($errors, "Celular é obrigatório"); }
  if ($password_1 != $password_2) {
	array_push($errors, "As duas senhas não combinam");
  }

  

  $user_check_query = "SELECT * FROM cadastro WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username já existe");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email já existe");
    }
  }

  
  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO cadastro (username,email,password_1,nome,sobrenome,celular) 
  			  VALUES('$username', '$email', '$password','$nome','$sobrenome',$celular)";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['nome'] =$nome;
	$_SESSION['sobrenome'] =$sobrenome;
  	header('location: index.php');
  }
}


if(isset($_POST['submit']))
{
  
 
  
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
      array_push($errors, "Username é obrigatório");
    }
    if (empty($password)) {
      array_push($errors, "Senha é obrigatório");
    }
    
    if (count($errors) == 0) 
    {
      $password = md5($password);
      if (md5($_POST['password']) !== $password)
{
    echo "Senha inválida";
}
      $query = "SELECT * FROM cadastro WHERE username='$username' AND password_1 ='$password'";
		
		
		
		
		$sql="SELECT nome,sobrenome FROM cadastro WHERE username='$username' AND password_1 ='$password'";
		$result=mysqli_query($db,$sql);  
		$row=mysqli_fetch_assoc($result);
	 
	 
	 
      $results = mysqli_query($db, $query);
      $res=mysqli_num_rows($results);
      if ($res) 
      {
        $_SESSION['username'] = $username;
        $_SESSION['nome'] =$row["nome"];
		
		$_SESSION['sobrenome'] =$row["sobrenome"];
        header('location: index.php');
      }
      else 
      {
        array_push($errors, "LOGIN/SENHA INVÁLIDO");
      }
    }

    

   
  }
  
  ?>
  