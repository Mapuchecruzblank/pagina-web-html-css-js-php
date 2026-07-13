<?php

include 'conexion.php';

// Verificar que los datos lleguen con POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Capturar los datos del formulario.
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $personas = $_POST['personas'];
    $zona = $_POST['zona'];
    $ocasion = $_POST['ocasion'];
    $comentarios = $_POST['comentarios'];

    // Preparar la consulta SQL para insertar los datos en la tabla 'reservas'
    $sql = "INSERT INTO reservas (nombre, telefono, email, fecha, hora, personas, zona, ocasion, comentarios) 
            VALUES ('$nombre', '$telefono', '$email', '$fecha', '$hora', '$personas', '$zona', '$ocasion', '$comentarios')";

    // Ejecutar la consulta y verificar si se guardó correctamente
    if (mysqli_query($conexionBd, $sql)) {
        // Mensaje de éxito al usuario (cumple con el requisito de interacción con el usuario)
        echo "<script>
                alert('¡Reserva confirmada con éxito!');
                window.location.href = 'index.php';
              </script>";
    } else {
        // Mensaje en caso de que ocurra un error inesperado
        echo "Error al registrar la reserva: " . mysqli_error($conexionBd);
    }

    // Cerrar la conexión para liberar memoria
    mysqli_close($conexionBd);
} else {
    // Si alguien intenta entrar a este archivo directamente sin enviar el formulario, lo redirige al inicio
    header("Location: index.php");
    exit();
}
?>