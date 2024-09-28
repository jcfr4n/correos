<?php
include 'includes/header.php';
include 'includes/functions.php';

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    
    // Comprobar si el correo ya existe en el archivo JSON
    if (isEmailDuplicate($email)) {
        echo "<h2>Error</h2>";
        echo "<p>El correo electrónico <strong>$email</strong> ya está registrado. Intenta con otro correo.</p>";
        echo '<a href="register.php">Volver al formulario</a>';
    } else {
        // Guardar los datos en el archivo JSON
        addEmailToJson($name, $email);
        echo "<h2>¡Gracias, $name!</h2>";
        echo "<p>Tu correo electrónico <strong>$email</strong> ha sido registrado correctamente.</p>";
        echo '<a href="list.php">Ver lista de correos registrados</a>';
    }
}
include 'includes/footer.php';
