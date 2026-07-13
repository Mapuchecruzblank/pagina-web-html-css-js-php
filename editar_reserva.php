<?php
session_start();
if (!isset($_SESSION["acceso_concedido"]) || $_SESSION["acceso_concedido"] !== true) {
    header("Location: login.php");
    exit();
}

include "conexion.php";

$idReserva = intval($_GET["id"] ?? 0);

// Buscar los datos actuales de esa reserva
$sqlBuscar = "SELECT * FROM reservas WHERE id = $idReserva";
$resultado = mysqli_query($conexionBd, $sqlBuscar);

if (mysqli_num_rows($resultado) === 1) {
    $reserva = mysqli_fetch_assoc($resultado);
} else {
    header("Location: panel_reservas.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Reserva | La Buena Mesa</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="pantalla-ingreso"> <main class="contenedor-formulario-editar">
        <h2 class="titulo-admin">Modificar Reserva N° <?php echo $reserva["id"]; ?></h2>
        <p class="subtitulo-admin">Cambia los parámetros de la mesa asignada al cliente.</p>

        <form action="actualizar_reserva.php" method="post" class="formulario-reserva">
            
            <input type="hidden" name="idReservaActualizar" value="<?php echo $reserva["id"]; ?>">

            <div class="grupo-campo">
                <label>Nombre del Cliente</label>
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($reserva["nombre"]); ?>" required>
            </div>

            <div class="grupo-campo">
                <label>Teléfono</label>
                <input type="tel" name="telefono" value="<?php echo htmlspecialchars($reserva["telefono"]); ?>" required>
            </div>

            <div class="grupo-campo">
                <label>Correo Electrónico</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($reserva["email"]); ?>" required>
            </div>

            <div class="grupo-campo">
                <label>Fecha</label>
                <input type="date" name="fecha" value="<?php echo $reserva["fecha"]; ?>" required>
            </div>

            <div class="grupo-campo">
                <label>Hora</label>
                <input type="time" name="hora" value="<?php echo $reserva["hora"]; ?>" required>
            </div>

            <div class="grupo-campo">
                <label>Cantidad de Personas</label>
                <input type="number" name="personas" value="<?php echo $reserva["personas"]; ?>" min="1" max="20" required>
            </div>

            <div class="grupo-campo">
                <label>Preferencia de Mesa</label>
                <select name="zona" required>
                    <option value="interior" <?php if($reserva["zona"] == "interior") echo "selected"; ?>>Interior</option>
                    <option value="terraza" <?php if($reserva["zona"] == "terraza") echo "selected"; ?>>Terraza</option>
                    <option value="ventana" <?php if($reserva["zona"] == "ventana") echo "selected"; ?>>Cerca de la ventana</option>
                </select>
            </div>

            <div class="grupo-campo">
                <label>Ocasión</label>
                <select name="ocasion">
                    <option value="normal" <?php if($reserva["ocasion"] == "normal") echo "selected"; ?>>Comida casual</option>
                    <option value="cumpleanos" <?php if($reserva["ocasion"] == "cumpleanos") echo "selected"; ?>>Cumpleaños</option>
                    <option value="aniversario" <?php if($reserva["ocasion"] == "aniversario") echo "selected"; ?>>Aniversario</option>
                    <option value="reunion" <?php if($reserva["ocasion"] == "reunion") echo "selected"; ?>>Reunión</option>
                </select>
            </div>

            <div class="grupo-campo campo-completo">
                <label>Comentarios especiales</label>
                <textarea name="comentarios" rows="4"><?php echo htmlspecialchars($reserva["comentarios"]); ?></textarea>
            </div>

            <button type="submit" class="boton principal campo-completo">Guardar Cambios</button>
            <a href="panel_reservas.php" class="enlace-volver" style="text-align: center;">Cancelar y volver al panel</a>
        </form>
    </main>

</body>
</html>
<?php mysqli_close($conexionBd); ?>