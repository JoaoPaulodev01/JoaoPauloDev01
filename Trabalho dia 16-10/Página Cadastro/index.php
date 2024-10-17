<?php
if (isset($_POST['submit'])) {
    include_once('config.php');

    // Capturando os dados do formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];

    // Inserindo os dados na tabela
    $result = mysqli_query($conexao, "INSERT INTO formulario (nome,cpf, telefone) VALUES ('$nome', '$cpf','$telefone')");
}
?>                                                                          

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="/Imagens/Logo.png">
    <title>Cadastro</title>
</head>
<body>
    <aside class="navegacao">
        <a href="http://127.0.0.1:5500/P%C3%A1gina%20Inicial/index.html">
            <img src="/Imagens/Logo.png" class="logo">
        </a>
        <nav class="opcoesNav">
            <a href="http://127.0.0.1:5500/P%C3%A1gina%20Fotos/indexfotos.html" class="a">Fotos</a>
            <a href="http://127.0.0.1:5500/P%C3%A1gina%20Email/index.html" class="a">E-mail</a>
            <a href="http://127.0.0.1:5500/P%C3%A1gina%20Localiza%C3%A7%C3%A3o/index.html" class="a">Localização</a>
            <a href="http://localhost/Trabalho%20dia%2016-10/P%C3%A1gina%20Cadastro/index.php" class="a">Cadastro</a>
            <a href="http://127.0.0.1:5500/P%C3%A1gina%20Sair/index.html" class="a">Sair</a>
        </nav>
    </aside>
    <div class="box">
        <form action="index.php" method="post">
            <fieldset>
                <legend><b>Formulário de Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" required>
                    <label for="cpf" class="labelInput">CPF</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br><br>
                <button type="submit" id="submit" name="submit">Enviar</button>
            </fieldset>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>