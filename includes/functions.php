<?php

// Ruta del archivo JSON
define('JSON_FILE', 'data/emails.json');

// Función para obtener todos los correos del archivo JSON
function getEmailsFromJson() {
    if (file_exists(JSON_FILE)) {
        return json_decode(file_get_contents(JSON_FILE), true);
    } else {
        return [];
    }
}

// Función para agregar un correo al archivo JSON
function addEmailToJson($name, $email) {
    $data = getEmailsFromJson(); // Obtener los datos actuales
    
    // Añadir nueva entrada
    $data[] = [
        'name' => $name,
        'email' => $email
    ];

    // Guardar los datos en el archivo JSON
    file_put_contents(JSON_FILE, json_encode($data, JSON_PRETTY_PRINT));
}

// Función para verificar si el correo ya está registrado
function isEmailDuplicate($email) {
    $data = getEmailsFromJson();  // Obtener los datos actuales

    foreach ($data as $entry) {
        if ($entry['email'] === $email) {
            return true;  // El correo ya existe
        }
    }
    return false;  // El correo es nuevo
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    
    // Comprobar si el correo ya existe
    if (isEmailDuplicate($email)) {
        echo json_encode(['status' => 'error', 'message' => 'El correo ya está registrado.']);
    } else {
        echo json_encode(['status' => 'success', 'message' => 'El correo es válido.']);
    }
}

