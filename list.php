<?php
include 'includes/header.php';
include 'includes/functions.php';

// Obtener los datos del archivo JSON
$data = getEmailsFromJson();

echo "<h2>Lista de correos electrónicos registrados</h2>";

if (!empty($data)) {
    echo "<ul>";
    foreach ($data as $entry) {
        echo "<li>" . htmlspecialchars($entry['name']) . " - " . htmlspecialchars($entry['email']) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No hay correos registrados.</p>";
}

include 'includes/footer.php';
