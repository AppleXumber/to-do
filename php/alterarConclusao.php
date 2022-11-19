<?php
include("conexao.php");

$id = $_GET["id"];
$acao = $_GET["acao"];
$local = $_GET["local"];
$idUser = $_GET["idUser"];


if ($acao == "concluido") {
    $alterar = mysqli_query($conexao, "UPDATE to_do SET conclusao=0 where id='$id'");
} elseif ($acao == "andamento") {
    $alterar = mysqli_query($conexao, "UPDATE to_do SET conclusao=1 where id='$id'");
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