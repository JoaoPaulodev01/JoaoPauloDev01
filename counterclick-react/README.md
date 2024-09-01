
# Projeto Counter

## Objetivo

Este projeto inclui um componente React simples chamado `Counter` que exibe um contador e permite ao usuário incrementar, decrementar e resetar o valor do contador. Os testes são escritos usando Jest e React Testing Library para garantir que o componente funcione corretamente e ofereça feedback visual adequado.

## Componente `Counter`

### Descrição

O componente `Counter` exibe um número e fornece três botões para controlar o valor do contador:

- **Incrementar**: Aumenta o valor do contador em 1.
- **Decrementar**: Diminui o valor do contador em 1.
- **Resetar**: Reseta o valor do contador para 0.

### Código

```jsx
// src/Counter.js
import React, { useState } from 'react';

const Counter = () => {
  const [count, setCount] = useState(0);

  const increment = () => setCount(count + 1);
  const decrement = () => setCount(count - 1);
  const reset = () => setCount(0);

  return (
    <div>
      <label className="resultado">Count: {count}</label>
      <div className="campocontador">
        <button className="primary" onClick={increment}>+</button>
        <button onClick={reset}>↻</button>
        <button className="secondary" onClick={decrement}>-</button>
      </div>
    </div>
  );
};

export default Counter;
```

### Funcionamento

- **Estado**: Utiliza o hook `useState` para armazenar e atualizar o valor do contador. O estado `count` armazena o valor atual do contador, e as funções `increment`, `decrement`, e `reset` são usadas para alterar esse valor.
- **Funções**:
  - `increment`: Aumenta o valor do contador em 1 quando o botão de incremento é clicado.
  - `decrement`: Diminui o valor do contador em 1 quando o botão de decremento é clicado.
  - `reset`: Reseta o valor do contador para 0 quando o botão de reset é clicado.
- **Renderização**:
  - **Label**: Exibe o valor atual do contador.
  - **Botões**:
    - **Incrementar**: Botão com o símbolo `+`, que chama a função `increment`.
    - **Resetar**: Botão com o símbolo `↻`, que chama a função `reset`.
    - **Decrementar**: Botão com o símbolo `-`, que chama a função `decrement`.

## Testes do Componente `Counter`

### Objetivo dos Testes

Os testes têm como objetivo garantir que o componente `Counter` funcione conforme o esperado, verificando que:

1. O componente é renderizado corretamente.
2. O valor do contador é atualizado corretamente ao clicar nos botões.
3. O feedback visual do contador está correto.

### Arquivo de Teste `Counter.test.js`

```jsx
// src/Counter.test.js
import React from 'react';
import { render, screen, fireEvent } from '@testing-library/react';
import '@testing-library/jest-dom';
import Counter from './Counter';

test('renders counter component and displays initial count', () => {
  render(<Counter />);
  const countElement = screen.getByText(/Count:/i);
  expect(countElement).toBeInTheDocument();
  expect(countElement).toHaveTextContent('Count: 0');
});

test('increments the counter when Increment button is clicked', () => {
  render(<Counter />);
  const incrementButton = screen.getByText(/+/i);
  fireEvent.click(incrementButton);
  const countElement = screen.getByText(/Count:/i);
  expect(countElement).toHaveTextContent('Count: 1');
});

test('decrements the counter when Decrement button is clicked', () => {
  render(<Counter />);
  const decrementButton = screen.getByText(/-/i);
  fireEvent.click(decrementButton);
  const countElement = screen.getByText(/Count:/i);
  expect(countElement).toHaveTextContent('Count: -1');
});

test('resets the counter when Reset button is clicked', () => {
  render(<Counter />);
  const incrementButton = screen.getByText(/+/i);
  fireEvent.click(incrementButton); // Increment to 1
  fireEvent.click(incrementButton); // Increment to 2
  const resetButton = screen.getByText(/↻/i);
  fireEvent.click(resetButton);
  const countElement = screen.getByText(/Count:/i);
  expect(countElement).toHaveTextContent('Count: 0');
});
```

### Explicação dos Testes

1. **Teste de Renderização Inicial**:
   - **Propósito**: Verificar se o componente é renderizado corretamente e se o valor inicial do contador é exibido corretamente.
   - **O que Verifica**: O texto "Count: 0" deve estar presente na tela após o componente ser renderizado.

2. **Teste de Incremento**:
   - **Propósito**: Verificar se o valor do contador é incrementado corretamente ao clicar no botão de incremento.
   - **O que Verifica**: Após clicar no botão de incremento, o valor exibido deve mudar para "Count: 1".

3. **Teste de Decremento**:
   - **Propósito**: Verificar se o valor do contador é decrementado corretamente ao clicar no botão de decremento.
   - **O que Verifica**: Após clicar no botão de decremento, o valor exibido deve mudar para "Count: -1".

4. **Teste de Reset**:
   - **Propósito**: Verificar se o contador é resetado corretamente ao clicar no botão de reset.
   - **O que Verifica**: Após incrementar o valor do contador e clicar no botão de reset, o valor exibido deve voltar para "Count: 0".

## Instruções para Executar os Testes

1. **Instale as Dependências**:
   Se ainda não fez isso, execute o seguinte comando para instalar todas as dependências necessárias:
   ```bash
   npm install
   ```

2. **Execute os Testes**:
   Para rodar os testes e verificar se o componente está funcionando corretamente, use:
   ```bash
   npm test
   ```

3. **Verifique os Resultados**:
   - Os testes devem passar se o componente `Counter` funcionar conforme o esperado. Caso contrário, os testes fornecerão informações sobre quais aspectos precisam ser corrigidos.

## Problemas Conhecidos e Soluções

Se você encontrar problemas relacionados à instalação ou execução dos testes, considere as seguintes etapas:

1. **Limpe o Cache do npm**:
   ```bash
   npm cache clean --force
   ```

2. **Reinstale as Dependências**:
   ```bash
   rm -rf node_modules
   npm install
   ```

3. **Verifique se as Dependências Estão Corretamente Instaladas**:
   ```bash
   npm list @testing-library/jest-dom
   ```

4. **Detecção de Manutenção**:
   Se você encontrar problemas como falhas na execução de testes devido a "handles abertos", você pode tentar rodar o comando com a flag `--detectOpenHandles` para encontrar vazamentos:
   ```bash
   npm test -- --detectOpenHandles
   ```

## Conclusão

A documentação e os testes garantem que o componente `Counter` funcione corretamente e forneça feedback visual adequado ao usuário.