// Importação de módulos e funções
import { Counter } from './Counter'; // Importa o componente Counter do arquivo Counter.js
import './App.css'; // Importa o arquivo de estilo CSS para estilizar o componente App

// Função principal do aplicativo
function App() {
  return (
    <div className="Site"> {/* Container principal do aplicativo */}
      <Counter /> {/* Renderiza o componente Counter dentro do container */}
    </div>
  );
}

export default App; // Exporta o componente App como padrão para que possa ser importado em outros arquivos

