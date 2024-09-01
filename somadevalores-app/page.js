// src/app/page.js

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
