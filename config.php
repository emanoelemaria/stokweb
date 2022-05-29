<?php
$db = mysqli_connect('localhost', 'root', '', 'stokweb');
if (mysqli_connect_errno())
    {
    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
    }
?>