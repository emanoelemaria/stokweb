
<?php
$db = mysqli_connect('localhost', 'root', '', 'stokweb');
if (mysqli_connect_errno())
    {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    }
?>
<?php

if (isset($_GET['id']))
{

$result = mysqli_query($db,"DELETE FROM produto WHERE produto_id=".$_GET['id']);
if($result==true)
	echo "sucess";
header("Location:index.php");
}

?>