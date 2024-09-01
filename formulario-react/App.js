/*import de funções*/
import React from 'react';
import './App.css';
import { FormularioEmail } from './FormularioEmail';

/*define que o site seja a função FormularioEmail */
function App() {
    return (
        <div className="App">
            <FormularioEmail />
        </div>
    );
}

/*exporta por padrão nossa função*/
export default App;
