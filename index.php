<!DOCTYPE html>
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
    <link rel="stylesheet" href="assets/style_atividades.css">
    <script src="assets/jQuery.js"></script>
    <script src="assets/jquery.mask.js"></script>
    <script>
        $(function() {
            $('#telefone').mask('(00) 00000-0000')
        })
    </script>
</head>

<body>
    <header>
        <nav class="table-dark">
            <ul>
                <li><a href="#">Cadastro de usuario</a></li>
                <li><a href="formulario_to_do.php">To-do</a>
                    <!-- <li><a href="form_disciplinas.html">Disciplinas</a></li> -->
                <li><a href="tabela.php">Tabela</a></li>
                <li><a href="tabelaUsuarios.php">Usuarios</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form method="post" action="php/cadastroUsuario.php">
            <legend>Cadastro de Usuario</legend>

            <fieldset>
                <div class="mb-3">
                    <label for="nomeUsuario" class="form-label">Nome do usuario</label>
                    <input name="nome" required type="text" class="form-control" id="nomeUsuario" placeholder="Nome">
                </div>
                <div class="mb-3">
                    <label for="dtNasc" class="form-label">Data de nascimento do usuario</label>
                    <input name="dtNasc" required type="date" class="form-control" id="dtNasc" placeholder="Data de nascimento">
                </div>
                <div class="mb-3">
                    <label for="telefone" class="form-label">Telefone do usuario</label>
                    <input name="telefone" required type="text" class="form-control" id="telefone" placeholder="(XX) X XXXX-XXXX">
                </div>

            </fieldset>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </main>

    <h1 class="atividades_h1">Atividades pendentes</h1>

    <section id="atividades_pendentes">
        <?php
            include_once("php/conexao.php");
            $mostra = mysqli_query($conexao, "SELECT * FROM to_do");
            while($dados = mysqli_fetch_assoc($mostra)) {
                $nome = $dados["nome"];
                $id = $dados["id"];
                $idUsuario = $dados["idUsuario"];
                $descricao = $dados["descricao"];
                $dataCadastro = explode("-", $dados["dataCadastro"]);
                $dataFim = explode("-", $dados["dataFim"]);
                $conclusao = $dados["conclusao"];
                $categoria = $dados["categoria"];

                $mostraUser = mysqli_query($conexao, "SELECT * FROM usuarios where id=$idUsuario");
                $dadosUser = mysqli_fetch_assoc($mostraUser);
                $nomeUser = $dadosUser["nome"];

                if ($conclusao == 0) {
                    echo "
                        <form method='post'";
                            if($conclusao == 1) {
                                echo "action='php/alterarConclusao.php?id=$id&acao=concluido&local=index'";
                            } else {
                                echo "action='php/alterarConclusao.php?id=$id&acao=andamento&local=index'";
                            }
                        echo " class='atividade'>
                            <div class='info'>
                                <p class='nome'>$nome</p>
                                <span class='nome_user'>$nomeUser</span>
                            </div>
                            <div class='datas'>
                                <p class='data_inicio'>Data de inicio: $dataCadastro[2]/$dataCadastro[1]/$dataCadastro[0]</p>
                                <p class='data_fim'>Data de conclusão: $dataFim[2]/$dataFim[1]/$dataFim[0]</p>
                            </div>
                            <div class='div_conclusao'>
                                <input name='conclusao' type='submit' id='conclusao' value='";
                                    if($conclusao == 1) {
                                        echo "Concluido' class='concluido btn bg-primary'";
                                    } else {
                                        echo "Em andamento' class='andamento btn bg-warning'";
                                    };
    
                                echo ">
                            </div>
                            <div class='div_descricao'>
                                <p class='descricao'>$descricao</p>
                            </div>
                            <div class='div_categoria'>
                                <p>$categoria</p>
                            </div>
                            <a class='btn btn-success botaoAlterar' href='alterar.php?id=$id&local=index'>Alterar</a>
                        </form>

                    ";
                };
                }
        ?>

    </section>

</body>

</html>