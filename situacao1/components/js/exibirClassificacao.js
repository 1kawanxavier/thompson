function obterParametroGET(nome) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(nome);
}

document.addEventListener('DOMContentLoaded', function() {
    const classificacao = obterParametroGET('classificacao');
    if (classificacao) {
        const resultadoElemento = document.createElement('p');
        resultadoElemento.textContent = `O pacote é classificado como: ${classificacao}`;
        resultadoElemento.classList.add('resultado-classificacao'); // Adiciona classe ao elemento
        document.getElementById('resultadoElemento').appendChild(resultadoElemento);
    }
});
