<?php include 'includes/header.php'; ?>
    <h2>Registrar tu correo</h2>
    <form id="registrationForm" action="thanks.php" method="POST">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required><br>
        
        <span id="emailError" style="color:red; display:none;">Por favor, introduce un correo válido.</span><br>

        <input type="submit" value="Registrar">
    </form>

    <!-- Enlace al archivo JavaScript -->
    <script src="js/validate.js"></script>

    <!-- Enlace al archivo JavaScript -->
    <script src="js/validate.js"></script>
<?php include 'includes/footer.php'; ?>

