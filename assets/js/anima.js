function observarElemento(elemento, classeAnimacao) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add(classeAnimacao);
            } else {
                entry.target.classList.remove(classeAnimacao);
            }
        });
    });

    elemento.forEach((item) => {
        observer.observe(item);
    });
}

// Exemplo de uso para diferentes conjuntos de elementos com animações diferentes
const elementosAparecer = document.querySelectorAll('.aparecer');
observarElemento(elementosAparecer, 'aparecer__show');

const elementosRotate = document.querySelectorAll('.rotate');
observarElemento(elementosRotate, 'rotate__show');

const elementosDeslizaDireita = document.querySelectorAll('.desliza-direita');
observarElemento(elementosDeslizaDireita, 'desliza-direita__show');

const elementosDeslizaEsquerda = document.querySelectorAll('.desliza-esquerda');
observarElemento(elementosDeslizaEsquerda, 'desliza-esquerda__show');

const elementosCrescer = document.querySelectorAll('.cresce');
observarElemento(elementosCrescer, 'cresce__show');

const elementosSobe = document.querySelectorAll('.sobe');
observarElemento(elementosSobe, 'sobe__show');
