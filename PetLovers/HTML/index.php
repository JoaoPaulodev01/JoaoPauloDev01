<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';
require './PHPMailer-master/src/Exception.php';

// Habilitar relatórios de erro para depuração
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inserir dados do cliente
if (isset($_POST['submit'])) {
    $servername = "LocalHost";
    $username = "root";
    $password = "";
    $dbname = "petlovers";

    $conn = new mysqli($servername, $username, $password, $dbname);

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

    $result = mysqli_query($conn, "INSERT INTO clientes (nome, email, cpf, telefone, cep, estado, cidade, bairro, rua, numero) VALUES ('$nome', '$email', '$cpf', '$telefone', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$numero')");

    if (isset($_POST['submit2'])) {
        $servername = "LocalHost";
        $username = "root";
        $password = "";
        $dbname = "petlovers";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $nome = $_POST['nome2'];
        $tipo = $_POST['tipoPet'];
        $raca = $_POST['raca'];
        $sexo = $_POST['sexo'];
        $data_nascimento = $_POST['dataNascimento'];
        $observacoes = $_POST['observacoes'];
        $observacoes = $_POST['observacoes'];

        if (empty($observacoes)) {
            $observacoes = "Não tem nenhuma observação";
        }
        $cpf_cliente = $_POST['cpf2'];

        $result = mysqli_query($conn, "INSERT INTO pets (nome, tipo, raca, sexo, data_nascimento, observacoes, cpf_cliente) VALUES ('$nome', '$tipo', '$raca', '$sexo', '$data_nascimento', '$observacoes', '$cpf_cliente')");
    }

    // Criar o e-mail de confirmação
    $assunto = "Confirmação de Cadastro - PetLovers";
    $mensagem = "
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <title>Cadastro realizado com sucesso!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            text-align: center;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h2 {
            color: #5aa6a4;
        }
        p {
            font-size: 16px;
            line-height: 1.5;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h2>Olá, $nome!</h2>
        <p>Seu cadastro no <strong>PetLovers</strong> foi realizado com sucesso.</p>
        <p>Agradecemos por confiar em nossos serviços!</p>
        <p class='footer'>Atenciosamente,<br><strong>Equipe PetLovers</strong></p>
    </div>
</body>
</html>
";

    // Configurar o envio de e-mail com PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'joaopaulodev01@gmail.com'; // Seu e-mail
        $mail->Password = 'dljj xhyq zode yeup'; // Senha de Aplicativo do Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // Porta SMTP

        // Remetente e destinatário
        $mail->setFrom('joaopaulodev01@gmail.com', 'PetShop');
        $mail->addAddress($email, $nome);

        // Configurar charset para UTF-8
        $mail->CharSet = 'UTF-8';

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = $assunto;
        $mail->Body = $mensagem;

        // Enviar e-mail
        if ($mail->send()) {
            echo "<script>alert('E-mail de confirmação enviado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao enviar e-mail de confirmação.');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Erro ao enviar e-mail: {$mail->ErrorInfo}');</script>";
    }

    // Fechar conexão com o banco de dados
    $conn->close();

    // Redirecionar para a página de cadastro
    echo "<script>window.location.href = 'index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="shortcut icon" href="../Imagens/logo.png" type="image/x-icon">
    <title>PetLovers</title>
</head>

<body>
    <section id="section1" class="section1">
        <nav class="menu">
            <a href="#quemsomos">
                <h2>Quem somos?</h2>
            </a>
            <a href="#servicos">
                <h2>Serviços</h2>
            </a>
            <a href="#depoimentos">
                <h2>Depoimentos</h2>
            </a>
            <a href="#cadastro">
                <h2>Cadastro</h2>
            </a>
            <a href="#contato">
                <h2>Contatos</h2>
            </a>
        </nav>
        <main class="main-section1">
            <img src="../Imagens/logo-transparente.png" alt="logo-transparente" class="logo-section1">
            <br>
            <div class="btn-container">
                <svg viewBox="0 0 16 16" class="bi bi-sun-fill" fill="currentColor" width="23"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8.657a.5.5 0 0 1-.708-.708l1.414-1.414a.5.5 0 0 1 .708 0l1.414 1.414a.5.5 0 0 1-.708.708l-1.414-1.414a.5.5 0 0 1 0-.708z"
                        color="red"></path>
                </svg>
                <label class="switch btn-color-mode-switch">
                    <input value="1" id="color_mode" name="color_mode" type="checkbox">
                    <label class="btn-color-mode-switch-inner" data-off="Light" data-on="Dark" for="color_mode"></label>
                </label>
                <svg viewBox="0 0 16 16" class="bi bi-moon-stars-fill" fill="currentColor" width="23"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"
                        color="orange"></path>
                    <path
                        d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"
                        color="black"></path>
                </svg>    
            </div>
            <strong>
                <h1>A PET SHOP MAIS<br> COMPLETA DE<br> CUIDADOS COM <br>SEUS PETS</h1>
            </strong>
            <a href="#cadastro"><button>
                    <h2>MARQUE UM DIA DE CUIDADO <br>PARA SEU PET</h2>
                </button></a>
            <img src="../Imagens/imagemcachorros.png" alt="cachorros">
        </main>
    </section>
    <section class="section2" id="quemsomos">
        <main class="main-section2">
            <img src="../Imagens/donaecachorro.png" alt="donaecachorro">
            <strong>
                <h1>QUEM SOMOS?</h1>
            </strong>
            <strong>
                <p>Aqui na nossa Pet Shop, tratamos seu pet com todo<br>
                    carinho e dedicação. Oferecemos serviços de qualidade,<br>
                    como banho e tosa, sempre com produtos especiais e um<br>
                    ambiente acolhedor. Nosso objetivo é garantir o bem-<br>estar e a felicidade do seu amigo de quatro
                    patas, com<br>
                    atenção e cuidado em cada detalhe.</p>
            </strong>
            <img src="../Imagens/logo.png" alt="logo" class="logo-section2">
        </main>
    </section>
    <section class="section3">
        <main class="main-section3">
            <img src="../Imagens/donaegato.png" alt="donaegato">
            <strong>
                <h1>SATISFAÇÃO<br> GARANTIDA</h1>
            </strong>
            <strong>
                <p>No nosso banho e tosa, cada detalhe é pensado<br> para o conforto e bem-estar do seu pet.<br>Usamos
                    produtos de alta qualidade, adequados<br> para cada tipo de pelagem, e nossa<br> equipe é treinada
                    para oferecer um atendimento <br>cuidadoso e carinhoso. Aqui, seu amigo <br>sai limpo, bonito e
                    feliz!</p>
            </strong>
            <img src="../Imagens/logo-transparente.png" alt="logo-transparente" class="logo-section3">
        </main>
    </section>
    <section class="section4" id="servicos">
        <main class="main-section4">
            <strong>
                <h1>ALGUNS SERVIÇOS<br>QUE OFERECEMOS</h1>
            </strong>
            <div class="imagens-servicos">
                <img src="../Imagens/cachorroservicos.png" alt="cachorroservicos">
                <img src="../Imagens/gatoservicos.png" alt="gatoservicos">
                <img src="../Imagens/outrosservicos.png" alt="outrosservicos">
            </div>
            <div class="h3-servicos">
                <h3>Profissionais para cachorros</h3>
                <h3>Profissionais para gatos</h3>
                <h3>Produtos e brinquedos</h3>
            </div>
            <div class="p-servicos">
                <p>Os melhores profissionais para entreter e<br>
                    deixar o seu aumigo cheiroso e bem-cuidado!
                </p>
                <p>Profissionais para dar um banho<br>
                    adequado e confortável para seu amigo<br>
                    que não curte água!</p>
                <p>Produtos para variados animais,<br>
                    na PetLovers garanto que no<br>
                    mínimo um brinquedo para seu
                    pet terá.
                </p>
            </div>
        </main>
    </section>
    <section class="section5" id="depoimentos">
        <main class="main-section5">
            <strong>
                <h1>FEEDBACKS E<br> DEPOIMENTOS</h1>
            </strong>
            <div class="imagens-depoimentos">
                <img src="../Imagens/donaecachorrodepoimentos.png" alt="donaecachorrodepoimentos">
                <img src="../Imagens/donaegatodepoimentos.png" alt="donaegatodepoimentos">
                <img src="../Imagens/donaecachorrodepoimentos2.png" alt="donaecachorrodepoimentos2">
            </div>
            <div class="h3-depoimentos">
                <h3>Tutora Larissa</h3>
                <h3>Tutor João</h3>
                <h3>Tutora Karolina</h3>
            </div>
            <div class="p-depoimentos">
                <p>"Adorei o atendimento na Pet Shop! Meu
                    cachorro ficou super feliz com o banho e tosa,
                    e o ambiente é muito acolhedor. Eles
                    realmente se preocupam com o bem-estar dos
                    animais. Com certeza vou voltar sempre!"</p>
                <p>"Recomendo muito! O meu gato é super
                    difícil com banho, mas a equipe foi
                    super paciente e cuidadosa. Ele saiu
                    tranquilo e bem tratado. Um lugar que
                    realmente se preocupa com os pets!"</p>
                <p>"Fiquei encantada com o carinho e a
                    atenção que meu furão recebeu. O
                    serviço de banho e tosa é excelente, e
                    o atendimento é de primeira. Meu pet
                    ficou lindo e feliz! Super indico!"</p>
            </div>
        </main>
    </section>
    <section class="section6" id="cadastro">
        <main class="main-section6">
            <div class="form-wrapper">
                <div class="container">
                    <section class="header">
                        <h2>Cadastro</h2>
                    </section>
                    <form action="index.php" method="post" id="form" class="form">
                        <div class="form-content">
                            <label for="nome">Nome completo *</label>
                            <input type="text" id="nome" name="nome" placeholder="digite o seu nome completo...">
                            <a>Nome completo é obrigatório</a>
                        </div>
                        <div class="form-content">
                            <label for="email">E-mail *</label>
                            <input type="email" id="email" name="email" placeholder="digite o seu email completo...">
                            <a>Email é obrigatório</a>
                        </div>
                        <div class="form-content">
                            <label for="cpf">CPF *</label>
                            <input type="text" id="cpf" name="cpf" placeholder="digite o seu cpf...">
                            <a>CPF é obrigatório</a>
                        </div>
                        <div class="form-content">
                            <label for="tel">Telefone *</label>
                            <input type="tel" id="tel" maxlength="15" onkeyup="handlePhone(event)" name="tel" placeholder="digite o seu telefone...">
                            <a>Telefone é obrigatório</a>
                        </div>
                        <div class="form-content">
                            <label for="cep">CEP *</label>
                            <input type="text" id="cep" maxlength="9" name="cep" placeholder="digite o seu cep...">
                            <a>CEP é obrigatório</a>
                        </div>
                        <div class="form-content">
                            <label for="estado">Estado *</label>
                            <input type="text" id="estado" name="estado" placeholder="digite o seu estado...">
                            <a>Estado é obrigatório</a>
                        </div>
                        <div class="form-content">
                            <label for="cidade">Cidade *</label>
                            <input type="text" id="cidade" name="cidade" placeholder="digite a sua cidade...">
                            <a>Cidade é obrigatório</a>
                        </div>
                        <div class="form-content">
                            <label for="bairro">Bairro *</label>
                            <input type="text" id="bairro" name="bairro" placeholder="digite o seu bairro...">
                            <a>Bairro é obrigatório</a>
                        </div>
                        <div class="form-content">
                            <label for="rua">Logradouro *</label>
                            <input type="text" id="rua" name="rua" placeholder="digite a sua rua...">
                            <a>Rua é obrigatório</a>
                        </div>
                        <div class="form-content-numero">
                            <label for="numero">Numero *</label>
                            <input type="text" id="numero" name="numero" placeholder="digite o seu número...">
                            <a>Número é obrigatório</a>
                            <button id="submit" onclick="logbutton()" type="submit" name="submit" class="submit">Cadastrar</button>
                        </div>
                    </form>
                </div>
                <div class="container2">
                    <section class="header2">
                        <h2>Cadastro de Pets</h2>
                    </section>
                    <form id="form2" class="form2" action="index.php" method="post">
                        <div class="form-content2">
                            <label for="nome2">Nome *</label>
                            <input type="text" id="nome2" name="nome2" placeholder="digite o nome do seu pet...">
                            <a>Nome do pet é obrigatório</a>
                        </div>
                        <div class="form-content2">
                            <label for="tipo">Tipo *</label>
                            <select name="tipoPet" id="tipoPet">
                                <option value="" selected disabled>Selecione o tipo de pet</option>
                                <option value="Cachorro">Cachorro</option>
                                <option value="Gato">Gato</option>
                                <option value="Pássaro">Pássaro</option>
                                <option value="Peixe">Peixe</option>
                                <option value="Hamster">Hamster</option>
                                <option value="Coelho">Coelho</option>
                                <option value="Tartaruga">Tartaruga</option>
                                <option value="Cobrinha">Cobrinha</option>
                                <option value="Rato">Rato</option>
                                <option value="Furão">Furão</option>
                            </select>
                            <a>Tipo é obrigatório</a>
                        </div>
                        <div class="form-content2">
                            <label for="raca">Raça *</label>
                            <input type="text" id="raca" name="raca" placeholder="digite a raça do seu pet...">
                            <a>Raça é obrigatória</a>
                        </div>
                        <div class="form-content2">
                            <label for="sexo">Gênero *</label>
                            <select name="sexo" id="sexo">
                                <option value="" selected disabled>Selecione o gênero do pet</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                            <a>Gênero é obrigatório</a>
                        </div>
                        <div class="form-content2">
                            <label for="dataNascimento">Data de nascimento do pet *</label>
                            <input type="date" id="dataNascimento" name="dataNascimento"
                                placeholder="digite a data de nascimento do seu pet...">
                            <a>Gênero é obrigatório</a>
                        </div>
                        <div class="form-content2">
                            <label for="observacoes">Observações</label>
                            <input type="text" id="observacoes" name="observacoes"
                                placeholder="digite suas observações caso haja...">
                        </div>
                        <div class="form-content2">
                            <label for="cpf">CPF *</label>
                            <input type="text" id="cpf2" name="cpf2" placeholder="digite o seu cpf...">
                            <a>CPF é obrigatório</a>
                        </div>
                        <div class="form-content2">
                            <button type="submit" name="submit2" id="submit2">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </section>
    <section class="section7" id="contato">
        <div class="main-section7">
            <footer>
                <h1>NOS ENCONTRE <br> AQUI</h1>
                <div class="h4-contatos">
                    <div>
                        <h4>Endereço:</h4>
                        <p class="endereco-contatos">01045-001, SP, São Paulo,<br> República, Praça da República,<br> nº
                            343</p>
                    </div>
                    <div>
                        <h4>Endereço de e-mail:</h4>
                        <p class="email-contatos">petlovers@gmail.com</p>
                    </div>
                    <div>
                        <h4>Número de telefone:</h4>
                        <p class="tel-contatos">(31) 99846-7353</p>
                    </div>
                </div>
            </footer>
        </div>
    </section>
</body>
<script src="../JavaScript/script.js"></script>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script>
    function aplicarMascaraCEP(cep) {
        cep = cep.replace(/\D/g, ''); // Remove tudo que não for número
        if (cep.length > 5) {
            cep = cep.substring(0, 5) + '-' + cep.substring(5, 8); // Adiciona o hífen após 5 números
        }
        return cep;
    }

    document.getElementById("cep").addEventListener("input", function(event) {
        event.target.value = aplicarMascaraCEP(event.target.value);
    });

    /*
     * Para efeito de demonstração, o JavaScript foi
     * incorporado no arquivo HTML.
     * O ideal é que você faça em um arquivo ".js" separado. Para mais informações
     * visite o endereço https://developer.yahoo.com/performance/rules.html#external
     */

    // Registra o evento blur do campo "cep", ou seja, a pesquisa será feita
    // quando o usuário sair do campo "cep"
    $("#cep").blur(function() {
        // Remove tudo o que não é número para fazer a pesquisa
        var cep = this.value.replace(/[^0-9]/, "");

        // Validação do CEP; caso o CEP não possua 8 números, então cancela
        // a consulta
        if (cep.length != 8) {
            return false;
        }

        // A url de pesquisa consiste no endereço do webservice + o cep que
        // o usuário informou + o tipo de retorno desejado (entre "json",
        // "jsonp", "xml", "piped" ou "querty")
        var url = "https://viacep.com.br/ws/" + cep + "/json/";

        // Faz a pesquisa do CEP, tratando o retorno com try/catch para que
        // caso ocorra algum erro (o cep pode não existir, por exemplo) a
        // usabilidade não seja afetada, assim o usuário pode continuar//
        // preenchendo os campos normalmente
        $.getJSON(url, function(dadosRetorno) {
            try {
                // Preenche os campos de acordo com o retorno da pesquisa
                $("#endereco").val(dadosRetorno.logradouro);
                $("#bairro").val(dadosRetorno.bairro);
                $("#cidade").val(dadosRetorno.localidade);
                $("#estado").val(dadosRetorno.uf);
            } catch (ex) {}
        });
    });

    const handlePhone = (event) => {
        let input = event.target
        input.value = phoneMask(input.value)
    }

    const phoneMask = (value) => {
        if (!value) return ""
        value = value.replace(/\D/g, '')
        value = value.replace(/(\d{2})(\d)/, "($1) $2")
        value = value.replace(/(\d)(\d{4})$/, "$1-$2")
        return value
    }

</script>

</html>