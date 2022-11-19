<?php
    include_once("php/conexao.php");
    $mostra = mysqli_query($conexao, "SELECT * FROM usuarios");
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
        <form method="post" action="php/cadastro_to_do.php">
            <legend>Cadastro de To-do</legend>
            <fieldset>
                <div class="mb-3">
                    <label for="nomeTarefa" class="form-label">Nome da tarefa</label>
                    <input required name="nomeTarefa" required type="text" class="form-control" id="nomeTarefa" placeholder="Nome">
                </div>
                <div class="mb-3">
                    <label for="idUsuario" class="form-label">Usuario</label>
                    <select name="idUsuario" required class="form-select" aria-label="Usuario de cadastro do To-do">
                        <option value="" disabled selected>Selecione o usuario</option>
                        <?php
                            while($dados = mysqli_fetch_assoc($mostra)) {
                                $id = $dados["id"];
                                $nome = $dados["nome"];
                                echo "
                                    <option value='$id'>$nome</option>
                                ";
                            }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição da tarefa</label>
                    <textarea name="descricao" rows="3" class="form-control" id="descricao" placeholder="descricao"></textarea>
                </div>

                <div class="mb-3">
                    <label for="dataFinal" class="form-label">Data de conclusao</label>
                    <input required type="date" name="dataFinal" class="form-control" id="dataFinal" placeholder="Data de conclusao">
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria</label>
                    <input required type="text" name="categoria" class="form-control" id="categoria" placeholder="Categoria">
                </div>
 
            </fieldset>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </main>

</body>

</html>