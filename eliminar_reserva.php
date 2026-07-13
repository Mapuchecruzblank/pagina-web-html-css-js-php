<?php
session_start();
if (!isset($_SESSION["acceso_concedido"]) || $_SESSION["acceso_concedido"] !== true) {
    header("Location: login.php");
    exit();
}

include "conexion.php";

// Capturar el ID que viene desde el enlace de la tabla
$idReservaEliminar = intval($_GET["id"] ?? 0);

if ($idReservaEliminar <= 0) {
    echo "<script>
            alert('ID de reserva no válido.');
            window.location.href = 'panel_reservas.php';
          </script>";
    exit();
}

// Estructura segura con sentencia preparada
$sqlEliminarReserva = "DELETE FROM reservas WHERE id = ?";
$stmtEliminar = mysqli_prepare($conexionBd, $sqlEliminarReserva);

mysqli_stmt_bind_param($stmtEliminar, "i", $idReservaEliminar);

if (mysqli_stmt_execute($stmtEliminar)) {
    echo "<script>
            alert('La reserva ha sido eliminada correctamente.');
            window.location.href = 'panel_reservas.php';
          </script>";
} else {
    echo "Error al intentar eliminar el registro: " . mysqli_error($conexionBd);
}

mysqli_stmt_close($stmtEliminar);
mysqli_close($conexionBd);
?>