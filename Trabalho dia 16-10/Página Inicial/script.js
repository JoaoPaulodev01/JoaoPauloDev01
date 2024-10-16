function calcular() {
    // Captura os valores do formulário
    let dataNascimento = document.getElementById("dataNascimento").value;
    let altura = parseFloat(document.getElementById("altura").value);
    let peso = parseFloat(document.getElementById("peso").value);
    let resultado = document.getElementById("resultado");

    // Valida se os valores são válidos
    if (!dataNascimento || isNaN(altura) || isNaN(peso)) {
        resultado.innerHTML = "<p style='color: red;'>Por favor, preencha todos os campos corretamente.</p>";
        resultado.style.display = "block"; // Garante que a mensagem de erro seja exibida
        return;
    }

    // Calcula o IMC
    var imc = peso / (altura * altura);

    // Classificação do IMC
    let classificacao = "";
    let cor = "";
    if (imc < 18.5) {
        classificacao = "Abaixo do peso";
        cor = "blue";  // Cor azul
    } else if (imc >= 18.5 && imc <= 24.9) {
        classificacao = "Peso normal";
        cor = "green";   // Cor verde
    } else {
        classificacao = "Sobrepeso ou Obesidade";
        cor = "red";     // Cor vermelha
    }

    // Exibe o resultado no campo resultado
    resultado.innerHTML = `
        <p style='color: ${cor};'>Seu IMC é: ${imc.toFixed(2)} (${classificacao})</p>
    `;

    // Garante que o resultado seja exibido após o cálculo
    resultado.style.display = "block";
}