<?php
session_start();
if (!isset($_SESSION["acceso_concedido"]) || $_SESSION["acceso_concedido"] !== true) {
    header("Location: login.php");
    exit();
}

include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Capturar variables del POST
    $idReserva = intval($_POST["idReservaActualizar"] ?? 0);
    $nombre = trim($_POST["nombre"] ?? "");
    $telefono = trim($_POST["telefono"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $personas = intval($_POST["personas"] ?? 2);
    $zona = $_POST["zona"];
    $ocasion = $_POST["ocasion"];
    $comentarios = trim($_POST["comentarios"] ?? "");

    if ($idReserva <= 0) {
        header("Location: panel_reservas.php");
        exit();
    }

    // Sentencia preparada para actualizar de forma segura
    $sqlActualizar = "UPDATE reservas SET 
                      nombre = ?, 
                      telefono = ?, 
                      email = ?, 
                      fecha = ?, 
                      hora = ?, 
                      personas = ?, 
                      zona = ?, 
                      ocasion = ?, 
                      comentarios = ? 
                      WHERE id = ?";

    $stmtActualizar = mysqli_prepare($conexionBd, $sqlActualizar);

    // Tipos de datos: s = string, i = entero
    // 8 strings, 1 entero (personas), 1 entero (id) -> "sssssisssi"
    mysqli_stmt_bind_param($stmtActualizar, "sssssisssi", 
        $nombre, 
        $telefono, 
        $email, 
        $fecha, 
        $hora, 
        $personas, 
        $zona, 
        $ocasion, 
        $comentarios, 
        $idReserva
    );

    if (mysqli_stmt_execute($stmtActualizar)) {
        echo "<script>
                alert('¡La reserva ha sido actualizada con éxito!');
                window.location.href = 'panel_reservas.php';
              </script>";
    } else {
        echo "Error al intentar actualizar la reserva: " . mysqli_error($conexionBd);
    }

    mysqli_stmt_close($stmtActualizar);
} else {
    header("Location: panel_reservas.php");
}

mysqli_close($conexionBd);
?>