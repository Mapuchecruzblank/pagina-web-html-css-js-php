<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Personal | La Buena Mesa</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="pantalla-ingreso">

    <main class="caja-ingreso">
        <h2>La Buena Mesa</h2>
        <p>Acceso exclusivo para personal</p>
        
        <form action="procesar_login.php" method="post">
            <input type="text" name="usuarioAdmin" class="campo-ingreso" placeholder="Usuario" required>
            <input type="password" name="claveAdmin" class="campo-ingreso" placeholder="Contraseña" required>
            
            <button type="submit" class="boton principal boton-bloque">
                Iniciar Sesión
            </button>
        </form>
        
        <a href="index.php" class="enlace-volver">← Volver al sitio público</a>
    </main>

</body>
</html>