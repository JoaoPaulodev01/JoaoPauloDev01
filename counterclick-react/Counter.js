import React, { useState } from "react";

// Componente Counter
export function Counter() {
  // Declaração do estado 'contador' com valor inicial 0
  const [contador, setContador] = useState(0);

  return (
    <div className="App">
      {/* Label que exibe o valor atual do contador */}
      <label className="resultado">{contador}</label>
      
      <div className="campocontador">
        {/* Botão para incrementar o contador em 1 */}
        <button onClick={() => setContador(contador + 1)} className="primary">+</button>
        
        {/* Botão para resetar o contador para 0 */}
        <button onClick={() => setContador(0)}>↻</button>
        
        {/* Botão para decrementar o contador em 1 */}
        <button onClick={() => setContador(contador - 1)} className="secondary">-</button>
      </div>
    </div>
  );
}
