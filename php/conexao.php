<?php
$conexao = mysqli_connect("localhost", "root", "", "atividade");

if(!$conexao) {
    die("Conexao não realizada".mysqli_error());
}


?>