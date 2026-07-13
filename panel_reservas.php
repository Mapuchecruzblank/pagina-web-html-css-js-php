<?php

session_start();
if (!isset($_SESSION["acceso_concedido"]) || $_SESSION["acceso_concedido"] !== true) {
    header("Location: login.php");
    exit();
}

// Incluir la conexión 
include "conexion.php";

// Consulta para leer todas las reservas ordenadas por fecha
$sqlLeerReservas = "SELECT id, nombre, telefono, email, fecha, hora, personas, zona, ocasion, comentarios FROM reservas ORDER BY fecha ASC, hora ASC";
$resultadoReservas = mysqli_query($conexionBd, $sqlLeerReservas);

if (!$resultadoReservas) {
    die("Error al consultar las reservas: " . mysqli_error($conexionBd));
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control | La Buena Mesa</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <main class="contenedor-admin">
        <div class="cabecera-admin">
            <div>
                <h2>Panel de Control - Reservas</h2>
                <p style="color: gray; margin-top: 5px;">Bienvenido al sistema de administración.</p>
            </div>
            
            <a href="cerrar_sesion.php" class="boton-salir">Cerrar Sesión</a>
        </div>
        
        <div style="margin-bottom: 20px;">
            <a href="index.php" class="boton principal" style="background-color: #123c33; color: white;">+ Crear nueva reserva desde el sitio</a>
        </div>

        <table class="tabla-reservas">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Cant.</th>
                    <th>Preferencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                while ($fila = mysqli_fetch_assoc($resultadoReservas)) {
                    // Cambiar formato de fecha de YYYY-MM-DD a DD-MM-YYYY para mostrar al admin
                    $fechaFormateada = date("d-m-Y", strtotime($fila["fecha"]));
                    
                    echo "<tr>";
                    echo "<td>" . $fila["id"] . "</td>";
                    echo "<td>" . htmlspecialchars($fila["nombre"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["telefono"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["email"]) . "</td>";
                    echo "<td>" . $fechaFormateada . "</td>";
                    echo "<td>" . substr($fila["hora"], 0, 5) . "</td>";
                    echo "<td>" . $fila["personas"] . "</td>";
                    echo "<td>" . ucfirst($fila["zona"]) . "</td>";
                    echo "<td>";
                    // Pasamos el ID por la URL mediante GET para saber cuál editar o borrar
                    echo "<a href='editar_reserva.php?id=" . $fila["id"] . "' class='enlace-accion enlace-modificar'>Modificar</a>";
                    echo "<a href='eliminar_reserva.php?id=" . $fila["id"] . "' class='enlace-accion enlace-eliminar' onclick='return confirm(\"¿Estás seguro de que deseas cancelar esta reserva?\")'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

</body>
</html>
<?php mysqli_close($conexionBd); ?>