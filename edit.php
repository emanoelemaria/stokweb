<?php

include('config.php');

if (isset($_POST['submit']))
{
$id=$_POST['id'];
$name=mysqli_real_escape_string($db, $_POST['produto_nome']);
$price=mysqli_real_escape_string($db, $_POST['preco']);
$quant=mysqli_real_escape_string($db, $_POST['quantidade']);

mysqli_query($db,"UPDATE produto SET produto_nome='$name', preco='$price' ,quantidade='$quant' WHERE produto_id='$id'");

header("Location:index.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysqli_query($db,"SELECT * FROM produto WHERE produto_id=".$_GET['id']);

$row = mysqli_fetch_array($result);

if($row)
{

$id = $row['produto_id'];
$name = $row['produto_nome'];
$price = $row['preco'];
$quant=$row['quantidade'];
}
else
{
echo "No results!";
}
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

    <html>
        <head>
            <title>Editar Produtos</title>
        </head>
    <body>



        <form action="" method="post" action="edit.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>

        <table border="1">
            <tr>
                <td colspan="2"><b><font color='black'>Editar Produtos: </font></b></td>
            </tr>

            <tr>
                <td width="179"><b><font >Nome<em>*</em></font></b></td>
                <td><label>
                <input type="text" name="produto_nome" value="<?php echo $name; ?>" />
                </label></td>
            </tr>

            <tr>
                <td width="179"><b><font color='#663300'>Preço<em>*</em></font></b></td>
                <td><label>
                <input type="text" name="preco" value="<?php echo $price ?>" />
                </label></td>
            </tr>

            <tr>
                <td width="179"><b><font color='#663300'>Quantidade<em>*</em></font></b></td>
                <td><label>
                <input type="text" name="quantidade" value="<?php echo $quant;?>" />
                </label></td>
            </tr>

            <tr align="Right">
                <td colspan="2"><label>
                <input type="submit" name="submit" value="Editar">
                </label></td>
            </tr>
            </table>
        </form>
    </body>
</html>
