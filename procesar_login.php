<?php
// Iniciar sesiones para poder crear la variable de acceso
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Capturar datos del formulario
    $usuario = trim($_POST["usuarioAdmin"] ?? "");
    $clave = trim($_POST["claveAdmin"] ?? "");

    // Credenciales del restaurante 
    $usuarioCorrecto = "admin";
    $claveCorrecta = "temuco2026"; 

    if ($usuario === $usuarioCorrecto && $clave === $claveCorrecta) {
        
        // Login exitoso: Se crea la sesión que funciona como llave de acceso
        $_SESSION["acceso_concedido"] = true;
        $_SESSION["nombre_usuario"] = "Administrador Principal";
        
        // Redirigir al panel de control de reservas
        header("Location: panel_reservas.php");
        exit();
        
    } else {
        // Fallo en el login
        echo "<script>
                alert('Credenciales incorrectas. Acceso denegado.');
                window.location.href = 'login.php';
              </script>";
    }
} else {
    // Si entran directamente por URL, expulsar al login
    header("Location: login.php");
    exit();
}
?>