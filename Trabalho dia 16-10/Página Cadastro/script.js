function validarCPF(cpf) {
    cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (cpf.length !== 11) {
        return false; // CPF deve ter 11 dígitos
    }

    // Verifica se todos os dígitos são iguais (ex: 111.111.111-11 é inválido)
    if (/^(\d)\1+$/.test(cpf)) {
        return false;
    }

    // Cálculo do primeiro dígito verificador
    let soma = 0;
    for (let i = 0; i < 9; i++) {
        soma += parseInt(cpf.charAt(i)) * (10 - i);
    }
    let resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) {
        resto = 0;
    }
    if (resto !== parseInt(cpf.charAt(9))) {
        return false; // Primeiro dígito verificador inválido
    }

    // Cálculo do segundo dígito verificador
    soma = 0;
    for (let i = 0; i < 10; i++) {
        soma += parseInt(cpf.charAt(i)) * (11 - i);
    }
    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) {
        resto = 0;
    }
    if (resto !== parseInt(cpf.charAt(10))) {
        return false; // Segundo dígito verificador inválido
    }

    return true; // CPF válido
}

// Função para formatar o CPF e verificar sua validade
const cpfInput = document.querySelector("#CPF");

cpfInput.addEventListener('input', (e) => {
    let value = cpfInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos

    // Limita o número de caracteres para 11 (apenas os números do CPF)
    if (value.length > 11) {
        value = value.slice(0, 11);
    }

    // Adiciona os pontos e o traço conforme a formatação padrão do CPF
    if (value.length > 3) {
        value = value.slice(0, 3) + '.' + value.slice(3);
    }
    if (value.length > 7) {
        value = value.slice(0, 7) + '.' + value.slice(7);
    }
    if (value.length > 11) {
        value = value.slice(0, 11) + '-' + value.slice(11);
    }

    // Atualiza o valor do campo
    cpfInput.value = value;

    // Verifica a validade do CPF quando o usuário digitar 11 números
    if (value.replace(/\D/g, '').length === 11) {
        if (validarCPF(value)) {
            console.log("CPF válido");
            cpfInput.style.borderColor = "green"; // Mostra que o CPF é válido
        } else {
            console.log("CPF inválido");
            cpfInput.style.borderColor = "red"; // Mostra que o CPF é inválido
        }
    } else {
        cpfInput.style.borderColor = ""; // Remove a borda de cor se não tiver 11 dígitos
    }
});