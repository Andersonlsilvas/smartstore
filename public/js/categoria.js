const linkCategoria = document.getElementById('mostrarCategoria');
const cadastroCategoria = document.getElementById('cadastroCategoria');

linkCategoria.addEventListener('click', function (e) {

    e.preventDefault();

    if (cadastroCategoria.style.display === 'block') {

        cadastroCategoria.style.display = 'none';

    } else {

        cadastroCategoria.style.display = 'block';

    }

});