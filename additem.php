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
<?php



$item_name = "";
$item_price    = "";



$db = mysqli_connect('localhost', 'root', '', 'stokweb');
if (mysqli_connect_errno())
    {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    }


if (isset($_POST['add'])) {

  echo "connect";
  $item_name=mysqli_real_escape_string($db, $_POST['produto_nome']);
  $item_price=mysqli_real_escape_string($db, $_POST['preco']);
  $quant=mysqli_real_escape_string($db, $_POST['quant']);
  
    $query = "INSERT INTO produto (produto_nome,preco,quantidade) 
  			  VALUES('$item_name','$item_price','$quant')";
      if(mysqli_query($db, $query))
      {
      echo "<script>alert('Successfully stored');</script>";
				
    }
    else{
        echo"<script>alert('Somthing wrong!!!');</script>";
    }
  	
  	header('location: index.php');
  
}
?>