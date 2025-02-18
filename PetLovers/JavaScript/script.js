// Seleção dos elementos
let theme = document.getElementById('color_mode');
let body = document.querySelector('body');
let section1 = document.querySelector('.section1');
let section3 = document.querySelector('.section3');
let section5 = document.querySelector('.section5');

// Função para aplicar o tema
function applyTheme(isDarkMode) {
  if (isDarkMode) {
    theme.classList.add('dark');
    body.classList.add('dark');
    section1.classList.add('dark');
    section3.classList.add('dark');
    section5.classList.add('dark');
  } else {
    theme.classList.remove('dark');
    body.classList.remove('dark');
    section1.classList.remove('dark');
    section3.classList.remove('dark');
    section5.classList.remove('dark');
    
  }
}

// Carregar o tema salvo no localStorage ao carregar a página
document.addEventListener('DOMContentLoaded', () => {
  const savedTheme = localStorage.getItem('theme') === 'dark';
  applyTheme(savedTheme);
});

// Alternar tema e salvar a escolha no localStorage
theme.addEventListener('click', () => {
  const isDarkMode = !body.classList.contains('dark'); // Verifica se o tema atual é claro
  applyTheme(isDarkMode);
  // Salvar o estado do tema no localStorage
  localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
});

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

const cpfInput = document.querySelector("#cpf");

cpfInput.addEventListener('input', (e) => {
    const value = cpfInput.value.replace(/[^0-9]/g, ''); // Remove caracteres não numéricos

    // Adiciona os pontos e o traço conforme a formatação padrão do CPF
    const formattedValue = `${value.slice(0, 3)}.${value.slice(3, 6)}.${value.slice(6, 9)}-${value.slice(9, 11)}`;

    // Atualiza o valor do campo
    cpfInput.value = formattedValue;

    // Verifica a validade do CPF quando o usuário digitar 11 números
    if (value.length === 11) {
        if (validarCPF(value)) {
            console.log("CPF válido");
            cpfInput.style.borderColor = "green"; // Mostra que o CPF é válido
        } else {
            console.log("CPF inválido");
            cpfInput.style.borderColor = "red"; // Mostra que o CPF é inválido
            alert("CPF inválido");
        }
    } else {
        cpfInput.style.borderColor = ""; // Remove a borda de cor se não tiver 11 dígitos
    }
});

const cpf2Input = document.querySelector("#cpf2");

cpf2Input.addEventListener('input', (e) => {
    const value = cpf2Input.value.replace(/[^0-9]/g, ''); // Remove caracteres não numéricos

    // Adiciona os pontos e o traço conforme a formatação padrão do CPF
    const formattedValue = `${value.slice(0, 3)}.${value.slice(3, 6)}.${value.slice(6, 9)}-${value.slice(9, 11)}`;

    // Atualiza o valor do campo
    cpf2Input.value = formattedValue;

    // Verifica a validade do CPF quando o usuário digitar 11 números
    if (value.length === 11) {
        if (validarCPF(value)) {
            console.log("CPF válido");
            cpf2Input.style.borderColor = "green"; // Mostra que o CPF é válido
        } else {
            console.log("CPF inválido");
            cpf2Input.style.borderColor = "red"; // Mostra que o CPF é inválido
            alert("CPF inválido");
        }
    } else {
        cpf2Input.style.borderColor = ""; // Remove a borda de cor se não tiver 11 dígitos
    }
});
