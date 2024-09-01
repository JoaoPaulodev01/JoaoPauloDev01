
# Projeto: Soma de Valores

Este projeto é uma aplicação simples em Next.js que permite somar dois valores e exibir o resultado.

## 1. Configuração do Projeto

### 1.1 Iniciar um Novo Projeto Next.js

Para criar um novo projeto Next.js, execute o comando abaixo no terminal:

```bash
npx create-next-app@latest somadevalores-app
```

### 1.2 Estrutura do Projeto

Após criar o projeto, a estrutura básica dos arquivos será semelhante a esta:

```plaintext
somadevalores-app/
├── node_modules/
├── public/
├── src/
│   ├── app/
│   │   ├── globals.css
│   │   ├── layout.js
│   │   ├── page.js
│   └── pages/
├── .gitignore
├── package.json
└── README.md
```

## 2. Criação do Componente

### 2.1 Criação do Componente `page.js`

Dentro da pasta `src/app`, crie um arquivo chamado `page.js` com o seguinte conteúdo:

```javascript
"use client";

import React, { useState } from 'react';

export default function Page() {
  const [value1, setValue1] = useState(0);
  const [value2, setValue2] = useState(0);
  const [result, setResult] = useState(null);

  const handleSubmit = (event) => {
    event.preventDefault();
    const sum = value1 + value2;
    setResult(sum);
  };

  return (
    <div className="container">
      <h1 className="title">Soma de Valores</h1>
      <form onSubmit={handleSubmit}>
        <div className="input-group">
          <label htmlFor="value1">Valor 1:</label>
          <input
            type="number"
            id="value1"
            value={value1}
            onChange={(e) => setValue1(parseFloat(e.target.value))}
            className="input"
          />
        </div>
        <div className="input-group">
          <label htmlFor="value2">Valor 2:</label>
          <input
            type="number"
            id="value2"
            value={value2}
            onChange={(e) => setValue2(parseFloat(e.target.value))}
            className="input"
          />
        </div>
        <button type="submit" className="button">Calcular</button>
      </form>
      {result !== null && <h2 className="result">Resultado: {result}</h2>}
    </div>
  );
}
```

### 2.2 Renomear o Arquivo `pages.tsx`

Renomeie o arquivo `pages.tsx` para `pages.tsx_old` para evitar interferências:

```bash
mv src/app/pages.tsx src/app/pages.tsx_old
```

### 2.3 Estilização Global com CSS

Adicione as classes CSS globais no arquivo `globals.css`:

```css
/* src/app/globals.css */

.container {
  padding: 20px;
  max-width: 400px;
  margin: 0 auto;
}

.title {
  text-align: center;
  margin-bottom: 20px;
  width: 425px;
}

.input-group {
  margin-bottom: 10px;
}

.input {
  width: 100%;
  padding: 8px;
  margin-top: 5px;
}

.button {
  width: 425px;
  padding: 10px;
  background-color: #0070f3;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.result {
  text-align: center;
  margin-top: 20px;
}
```

## 3. Execução do Projeto

### 3.1 Iniciar o Servidor de Desenvolvimento

Inicie o servidor de desenvolvimento com o comando:

```bash
npm run dev
```

### 3.2 Acessar a Aplicação

Abra o navegador e acesse `http://localhost:3000` para visualizar a aplicação.

---

