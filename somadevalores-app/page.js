// Importa React e useState do pacote 'react'
import React, { useState } from 'react';

// Função principal que exporta o componente 'Page'
export default function Page() {
  // Define os estados iniciais para os valores de entrada e o resultado
  const [value1, setValue1] = useState(0); // Estado para armazenar o valor 1
  const [value2, setValue2] = useState(0); // Estado para armazenar o valor 2
  const [result, setResult] = useState(null); // Estado para armazenar o resultado da soma

  // Função que é chamada ao enviar o formulário
  const handleSubmit = (event) => {
    event.preventDefault(); // Previne o comportamento padrão do formulário de recarregar a página
    const sum = value1 + value2; // Calcula a soma dos dois valores
    setResult(sum); // Atualiza o estado 'result' com a soma calculada
  };

  // Retorna o JSX que renderiza o conteúdo da página
  return (
    <div className="container">
      <h1 className="title">Soma de Valores</h1>
      {/* Formulário para entrada de valores */}
      <form onSubmit={handleSubmit}>
        <div className="input-group">
          <label htmlFor="value1">Valor 1:</label>
          {/* Input para o primeiro valor */}
          <input
            type="number"
            id="value1"
            value={value1}
            onChange={(e) => setValue1(parseFloat(e.target.value))} // Atualiza o valor 1 com o input do usuário
            className="input"
          />
        </div>
        <div className="input-group">
          <label htmlFor="value2">Valor 2:</label>
          {/* Input para o segundo valor */}
          <input
            type="number"
            id="value2"
            value={value2}
            onChange={(e) => setValue2(parseFloat(e.target.value))} // Atualiza o valor 2 com o input do usuário
            className="input"
          />
        </div>
        {/* Botão para submeter o formulário e calcular a soma */}
        <button type="submit" className="button">Calcular</button>
      </form>
      {/* Exibe o resultado da soma se ele não for nulo */}
      {result !== null && <h2 className="result">Resultado: {result}</h2>}
    </div>
  );
}
