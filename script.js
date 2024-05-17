document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    const errorMensaje = document.getElementById('errorMensaje');

    form.addEventListener('submit', function (event) {
        let valid = true;
        errorMensaje.textContent = '';

        const nombre = form.nombre.value.trim();
        const email = form.email.value.trim();
        const mensaje = form.mensaje.value.trim();

        if (nombre === '' || email === '' || mensaje === '') {
            errorMensaje.textContent = 'Todos los campos son obligatorios.';
            valid = false;
        } else if (!validateEmail(email)) {
            errorMensaje.textContent = 'Por favor, introduce un correo electrónico válido.';
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
});