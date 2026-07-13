<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Buena Mesa | Reservas</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="encabezado">
        <nav class="navegacion" aria-label="Navegacion principal">
            <a class="logo" href="#inicio">La Buena Mesa</a>

            <ul class="menu-navegacion">
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#menus">Menus</a></li>
                <li><a href="#reserva">Reservar</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="portada" id="inicio">
            <div class="contenido-portada">
                <p class="etiqueta">Restaurante ficticio de cocina casera y moderna</p>
                <h1>Reserva tu mesa en La Buena Mesa</h1>
                <p>
                    Disfruta una experiencia calida con platos preparados al momento,
                    menus para todos los gustos y un ambiente perfecto para compartir.
                </p>

                <div class="acciones-portada">
                    <a class="boton principal" href="#reserva">Crear reserva</a>
                    <a class="boton secundario" href="#menus">Ver menus</a>
                </div>
            </div>
        </section>

        <section class="seccion" id="menus">
            <div class="titulo-seccion">
                <p class="etiqueta">Nuestra carta</p>
                <h2>Menus destacados</h2>
                <p>Elige entre entradas, platos de fondo, postres y bebidas para armar tu visita ideal.</p>
            </div>

            <div class="grid-menu">
                <article class="tarjeta-menu">
                    <h3>Entradas</h3>
                    <ul>
                        <li>
                            <span>Bruschettas de tomate y albahaca</span>
                            <strong>$4.500</strong>
                        </li>
                        <li>
                            <span>Empanaditas de queso</span>
                            <strong>$3.900</strong>
                        </li>
                        <li>
                            <span>Crema de zapallo asado</span>
                            <strong>$4.200</strong>
                        </li>
                    </ul>
                </article>

                <article class="tarjeta-menu">
                    <h3>Platos principales</h3>
                    <ul>
                        <li>
                            <span>Pastas frescas con salsa de la casa</span>
                            <strong>$8.900</strong>
                        </li>
                        <li>
                            <span>Filete con papas rusticas</span>
                            <strong>$12.500</strong>
                        </li>
                        <li>
                            <span>Risotto de champinones</span>
                            <strong>$9.800</strong>
                        </li>
                    </ul>
                </article>

                <article class="tarjeta-menu">
                    <h3>Postres</h3>
                    <ul>
                        <li>
                            <span>Cheesecake de frutos rojos</span>
                            <strong>$4.800</strong>
                        </li>
                        <li>
                            <span>Brownie tibio con helado</span>
                            <strong>$4.600</strong>
                        </li>
                        <li>
                            <span>Flan casero con caramelo</span>
                            <strong>$3.900</strong>
                        </li>
                    </ul>
                </article>

                <article class="tarjeta-menu">
                    <h3>Bebidas</h3>
                    <ul>
                        <li>
                            <span>Limonada menta jengibre</span>
                            <strong>$3.500</strong>
                        </li>
                        <li>
                            <span>Jugo natural de temporada</span>
                            <strong>$3.200</strong>
                        </li>
                        <li>
                            <span>Copa de vino seleccion</span>
                            <strong>$4.000</strong>
                        </li>
                    </ul>
                </article>
            </div>
        </section>

        <section class="seccion seccion-reserva" id="reserva">
            <div class="titulo-seccion">
                <p class="etiqueta">Reserva online</p>
                <h2>Crea tu reserva</h2>
                <p>Completa tus datos y prepararemos una mesa para tu visita.</p>
            </div>

            <form class="formulario-reserva" action="procesar_reserva.php" method="post">
                <div class="grupo-campo">
                    <label for="nombre">Nombre completo</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ej: Camila Torres" required>
                </div>

                <div class="grupo-campo">
                    <label for="telefono">Telefono</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="+56 9 1234 5678" required>
                </div>

                <div class="grupo-campo">
                    <label for="email">Correo electronico</label>
                    <input type="email" id="email" name="email" placeholder="correo@ejemplo.com" required>
                </div>

                <div class="grupo-campo">
                    <label for="fecha">Fecha</label>
                    <input type="date" id="fecha" name="fecha" required>
                </div>

                <div class="grupo-campo">
                    <label for="hora">Hora</label>
                    <input type="time" id="hora" name="hora" required>
                </div>

                <div class="grupo-campo">
                    <label for="personas">Cantidad de personas</label>
                    <input type="number" id="personas" name="personas" min="1" max="20" value="2" required>
                </div>

                <div class="grupo-campo">
                    <label for="zona">Preferencia de mesa</label>
                    <select id="zona" name="zona" required>
                        <option value="">Selecciona una opcion</option>
                        <option value="interior">Interior</option>
                        <option value="terraza">Terraza</option>
                        <option value="ventana">Cerca de la ventana</option>
                    </select>
                </div>

                <div class="grupo-campo">
                    <label for="ocasion">Ocasion</label>
                    <select id="ocasion" name="ocasion">
                        <option value="normal">Comida casual</option>
                        <option value="cumpleanos">Cumpleanos</option>
                        <option value="aniversario">Aniversario</option>
                        <option value="reunion">Reunion</option>
                    </select>
                </div>

                <div class="grupo-campo campo-completo">
                    <label for="comentarios">Comentarios especiales</label>
                    <textarea id="comentarios" name="comentarios" rows="5" placeholder="Alergias, silla de bebe, decoracion especial, etc."></textarea>
                </div>

                <button class="boton principal campo-completo" type="submit">Confirmar reserva</button>
            </form>
        </section>
    </main>

    <footer class="pie-pagina" id="contacto">
        <div>
            <h2>La Buena Mesa</h2>
            <p>Av. Manuel Montt 123, temuco</p>
        </div>

        <div>
            <p><strong>Horario:</strong> Lunes a domingo, 12:00 a 23:00</p>
            <p><strong>Telefono:</strong> +56 2 2345 6789</p>
            <p><strong>Email:</strong> reservas@labuenamesa.cl</p>
        </div>
    </footer>
    <script src="js/funciones.js"></script>
</body>
</html>
