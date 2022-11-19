<?php
include_once("conexao.php");

$nome = $_POST["nome"];
$dtNasc = $_POST["dtNasc"];
$telefone = $_POST["telefone"];

$inserir = "INSERT INTO usuarios (id, nome, dtNasc, telefone) VALUES (default, '$nome', '$dtNasc', '$telefone')";

$cadastrar = mysqli_query($conexao, $inserir);

if($cadastrar) {?>
    <script>
        alert("Cadastrado realizado com sucesso");
        window.location.assign("../index.html");
    </script>

<?php
};
?>
