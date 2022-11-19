<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/style_atividades.css">
</head>
<body>
<header>
        <nav class="table-dark">
            <ul>
                <li><a href="index.php">Cadastro de usuario</a></li>
                <li><a href="formulario_to_do.php">To-do</a>
                    <!-- <li><a href="form_disciplinas.html">Disciplinas</a></li> -->
                <li><a href="tabela.php">Tabela</a></li>
                <li><a href="tabelaUsuarios.php">Usuarios</a></li>
            </ul>
        </nav>
    </header>
    <?php
    include_once("php/conexao.php");

    $mostra = mysqli_query($conexao, "SELECT * FROM usuarios");?>

    <table class='table table-striped caption-top' border='1'>
        <caption>Lista de usuarios</caption>
        <thead class='table-dark'>
            <td>ID</td>
            <td>Nome</td>
        </thead>

    <?php
    while ($dados = mysqli_fetch_assoc($mostra)) {
        $id = $dados["id"];
        $nome = $dados["nome"];
        echo"
            <tr>
                <td><a href='paginaUnica.php?id=$id'>$id</a></td>
                <td>$nome</td>
            </tr>";
    }?>

    </table>
    

    
    
    
</body>
</html>