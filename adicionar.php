<?php
include("conexao.php");
$valor = $_POST['valor'];
$salario = $_POST['salario'];
$descricao = $_POST['descricao'];
$data_transacao = $_POST['data_transacao'];
$sql = "INSERT INTO transacoes (valor ,salario, descricao,data_transacao) VALUES ('$valor','$salario', '$descricao','$data_transacao')";


if (mysqli_query($conexao, $sql)) {
    header("Location: dashboard.php");
    exit;
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}


mysqli_close($conexao);
?>
<!DOCTYPE html>             