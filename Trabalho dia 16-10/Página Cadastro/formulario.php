<?php
if (isset($_POST['submit'])) {
    include_once('config.php');

    // Capturando os dados do formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];

    // Inserindo os dados na tabela
    $result = mysqli_query($conexao, "INSERT INTO form (nome,cpf, telefone) VALUES ('$nome', '$cpf','$telefone')");
}
?>