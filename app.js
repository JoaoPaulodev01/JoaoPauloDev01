function pesquisar() {
    // Obtém a seção HTML onde os resultados da pesquisa serão exibidos
    let section = document.getElementById("resultados-pesquisa");

    let campoPesquisa = document.getElementById("campo-pesquisa").value;

    if (!campoPesquisa) {
        section.innerHTML = "<p class='msg-erro'>Nada foi encontrado, você não buscou por nenhum componente</p>"
        return
    }

    campoPesquisa = campoPesquisa.toLowerCase();

    // Inicializa uma string vazia para armazenar os resultados da pesquisa
    let resultados = "";
    let titulo = "";
    let descricao = "";

    // Intera sobre cada dado na lista de dados
    for (let dado of dados) {
        titulo = dado.titulo.toLowerCase()
        descricao = dado.descricao.toLowerCase()
        if (titulo.includes(campoPesquisa) || descricao.includes(campoPesquisa )) {
            // Constrói o HTML para cada item do resultado da pesquisa
            resultados += `
    <div class="item-resultado">
        <h2>${dado.titulo}</h2>
        <p class="descricao-meta">${dado.descricao}</p>
        <a href="${dado.link}" target="_blank">Mais informações</a>
    </div>
    `;
        }
    }

    if (!resultados) {
        resultados = "<p class ='msg-erro'>Nada foi encontrado, pois ainda não adicionamos esse componentes,<br> mande sua sugestão em joaopaulodev01@gmail.com</p>"   
    }

    // Atribui o HTML gerado à seção de resultados
    section.innerHTML = resultados;
}