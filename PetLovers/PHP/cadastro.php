<?php
// Inserir dados do cliente
if (isset($_POST['submit'])) {
    include 'conexao.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['tel'];
    $cep = $_POST['cep'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];

    echo "Dados recebidos:<br>";
    echo "Nome: $nome<br>";
    echo "Email: $email<br>";
    echo "CPF: $cpf<br>";
    echo "Telefone: $telefone<br>";
    echo "CEP: $cep<br>";
    echo "Estado: $estado<br>";
    echo "Cidade: $cidade<br>";
    echo "Bairro: $bairro<br>";
    echo "Rua: $rua<br>";
    echo "Número: $numero<br>";

    $result = mysqli_query($conn, "INSERT INTO clientes (nome, email, cpf, telefone, cep, estado, cidade, bairro, rua, numero) VALUES ('$nome', '$email', '$cpf', '$telefone', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$numero')");
}
?>
