<?php
include_once("conexao.php");

$nome = $_POST["nomeTarefa"];
$idUsuario = $_POST["idUsuario"];
$descricao = $_POST["descricao"];
$dataFinal = $_POST["dataFinal"];
$categoria = $_POST["categoria"];

$inserir = "INSERT INTO to_do (id, nome, idUsuario, descricao, dataFim, categoria) VALUES (default, '$nome', '$idUsuario', '$descricao', '$dataFinal', '$categoria')";

$cadastrar = mysqli_query($conexao, $inserir);

if($cadastrar){?>
    <script>
        alert("Cadastrado com sucesso");
        window.location.assign("../formulario_to_do.php");
    </script>

<?php
};
?>