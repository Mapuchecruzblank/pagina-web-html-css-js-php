<?php
// Iniciar la sesión para poder acceder a ella
session_start();

// Destruir todas las variables de sesión
session_unset();
session_destroy();

// Redirigir al usuario de vuelta a la pantalla de login
header("Location: login.php");
exit();
?>