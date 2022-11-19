<?php
include("conexao.php");

$id = $_GET["id"];
$acao = $_GET["acao"];
$local = $_GET["local"];
/* $idUser = $_GET["idUser"]; */

$nomeTarefa = $_POST["nomeTarefa"];
$idUsuario = $_POST['idUsuario'];
$descricao = $_POST['descricao'];
$dataFinal = $_POST['dataFinal'];
$categoria = $_POST['categoria'];

if($acao == "alterar") {
    $alterar = mysqli_query($conexao, "UPDATE to_do SET 
    nome = '$nomeTarefa',
    idUsuario = '$idUsuario',
    descricao = '$descricao',
    dataFim = '$dataFinal',
    categoria = '$categoria'
    WHERE id='$id'");
};

if($acao == "deletar") {
    $deletar = mysqli_query($conexao, "DELETE FROM to_do where id=$id");
}

?>

<?php
    if($local == "index") {?>
        <script>
            window.location.assign("../index.php");
        </script>
    <?php
    }; if($local == "tabela") {?>
        <script>
            window.location.assign("../tabela.php");
        </script>
    <?php
    }; if ($local == "paginaUnica") {?>
        <script>
            window.location.assign("../paginaUnica.php?id=<?=$idUser?>")
        </script>
    <?php
    };
?>