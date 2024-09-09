function pesquisar() {
// Obtém a seção HTML onde os resultados da pesquisa serão exibidos
    let section = document.getElementById("resultados-pesquisa");

    let campoPesquisa = document.getElementById("campo-pesquisa").value;

    if (!campoPesquisa) {
        section.innerHTML = "<p class='msg-erro'>Nada foi encontrado, você não buscou por nenhum produto</p>"
        return
    }

    campoPesquisa = campoPesquisa.toLowerCase();

    // Inicializa uma string vazia para armazenar os resultados da pesquisa
    let resultados = "";
    let titulo = "";
    let tags = "";

    // Intera sobre cada dado na lista de dados
    for (let dado of dados) {
        titulo = dado.titulo.toLowerCase()
        preco = dado.preco.toLowerCase()
        tags = dado.tags.toLocaleLowerCase()
        if (titulo.includes(campoPesquisa) || preco.includes(campoPesquisa) || tags.includes(campoPesquisa)) {
            // Constrói o HTML para cada item do resultado da pesquisa
            resultados += `
        <div class="item-resultado">
            <a href="https://www.instagram.com/distrito27_loja/" target="_blank">
                <h2>${dado.titulo}</h2>
            </a>
            <img src="Imagens/${dado.imagem}" class="imagem">
            <p class="descricao-meta">${dado.preco}</p>
            <p class="descricao-meta">${dado.tamanho}</p>
        </div>
        `;
        }
    }

    if (!resultados) {
        resultados = '<p class="msg-erro">Não temos o que você está procurando, deixe sua sugestão para um novo produto em: </p><a href="https://www.instagram.com/distrito27_loja/" target="_blank"><img src="Imagens/Logos/LogoInsta.png" class="logoinsta" alt="Instagram"></a>';
    }

    // Atribui o HTML gerado à seção de resultados
    section.innerHTML = resultados;
    console.log("Voce")
}