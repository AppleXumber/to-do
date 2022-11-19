<?php
    include_once("php/conexao.php");
    $id = $_GET["id"];
    $local = $_GET["local"];
    $mostraToDos = mysqli_query($conexao, "SELECT * from to_do where id=$id");
    $dadosToDos = mysqli_fetch_assoc($mostraToDos);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <header>
        <nav class="table-dark">
            <ul>
                <li><a href="index.php">Cadastro de usuario</a></li>
                <li><a href="#">To-do</a>
                    <!-- <li><a href="form_disciplinas.html">Disciplinas</a></li> -->
                <li><a href="tabela.php">Tabela</a></li>
                <li><a href="tabelaUsuarios.php">Usuarios</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form method="post" action="php/alterarDados.php?id=<?=$id?>&acao=alterar&local=index">
            <legend>Cadastro de To-do</legend>
            <fieldset>
                <div class="mb-3">
                    <label for="nomeTarefa" class="form-label">Nome da tarefa</label>
                    <input required value="<?=$nome=$dadosToDos['nome'];?>" name="nomeTarefa" required type="text" class="form-control" id="nomeTarefa" placeholder="Nome">
                </div>
                <div class="mb-3">
                    <label for="idUsuario" class="form-label">Usuario</label>
                    <select required name="idUsuario" required class="form-select" aria-label="Usuario de cadastro do To-do">
                        <option value="" disabled selected>Selecione o usuario</option>
                        <?php
                            $mostraUser = mysqli_query($conexao, "SELECT * FROM usuarios");
                            while($dadosUser = mysqli_fetch_assoc($mostraUser)) {
                                $idUser = $dadosUser["id"];
                                $nomeUser = $dadosUser["nome"];
                                $idUsuario = $dadosToDos["idUsuario"];
                                echo "
                                    <option "; if($idUser == $idUsuario){echo  "selected ";}; echo "value='$idUser'>$nomeUser</option>
                                ";
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição da tarefa</label>
                    <textarea required name="descricao" rows="3" class="form-control" id="descricao" placeholder="descricao"><?=$descricao=$dadosToDos['descricao'];?></textarea>
                </div>

                <div class="mb-3">
                    <label for="dataFinal" class="form-label">Data de conclusao</label>
                    <input required value="<?=$dataFinal=$dadosToDos['dataFim'];?>" type="date" name="dataFinal" class="form-control" id="dataFinal" placeholder="Data de conclusao">
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                    <input required value="<?=$categoria=$dadosToDos['categoria'];?>" type="text" name="categoria" class="form-control" id="categoria" placeholder="Categoria">
                </div>
 
            </fieldset>
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="php/alterarDados.php?id=<?=$id?>&acao=deletar&local=<?=$local?>" class="btn btn-danger">Deletar</a>
        </form>
    </main>

</body>

</html>