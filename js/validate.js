document.getElementById('registrationForm').addEventListener('submit', function(event) {
    var emailField = document.getElementById('email');
    var emailError = document.getElementById('emailError');
    var email = emailField.value;

    // Expresión regular básica para validar un correo electrónico
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Validar el formato del correo electrónico
    if (!emailPattern.test(email)) {
        event.preventDefault();  // Evitar que el formulario se envíe
        emailError.style.display = 'block';  // Mostrar el mensaje de error
        emailError.textContent = 'Por favor, introduce un correo válido.';
        return;
    }

    // Validar si el correo ya existe (AJAX)
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/functions.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        var response = JSON.parse(xhr.responseText);

        if (response.status === 'error') {
            event.preventDefault();  // Evitar que el formulario se envíe si hay error
            emailError.style.display = 'block';  // Mostrar el mensaje de error
            emailError.textContent = response.message;  // Mostrar mensaje de duplicado
        } else {
            emailError.style.display = 'none';  // Ocultar el mensaje si no hay duplicado
        }
    };
    xhr.send("email=" + encodeURIComponent(email));
});
