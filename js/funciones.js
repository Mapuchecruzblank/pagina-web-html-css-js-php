
document.addEventListener("DOMContentLoaded", function () {
    
    // Seleccionar el formulario de reserva por su clase
    const formularioReserva = document.querySelector(".formulario-reserva");

    // Si el formulario existe en la página, escuchar cuando el usuario intente enviarlo
    if (formularioReserva) {
        formularioReserva.addEventListener("submit", function (evento) {
            
           
            const nombre = document.getElementById("nombre").value.trim();
            const telefono = document.getElementById("telefono").value.trim();
            const fechaSeleccionada = document.getElementById("fecha").value;
            const correo = document.getElementById("correo").value.trim();

            // Validación del Nombre (Evitar nombres demasiado cortos o espacios vacíos)
            if (nombre.length < 3) {
                evento.preventDefault(); // Detiene por completo el envío del formulario a PHP
                alert("Por favor, ingresa un nombre completo válido (mínimo 3 caracteres).");
                return; 
            }

            // Validación del Correo Electrónico (Formato válido)

            const patronCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!patronCorreo.test(correo)) {
                evento.preventDefault();
                alert("Por favor, ingresa un correo electrónico válido.");
                return;
            }





            // 4. Validación del Teléfono (Aceptar solo números y opcionalmente el signo +)
          
            const patronTelefono = /^[0-9+]{8,15}$/;
            if (!patronTelefono.test(telefono)) {
                evento.preventDefault();
                alert("Por favor, ingresa un número de teléfono válido (solo números, mínimo 8 dígitos).");
                return;
            }

            // 4. Validación de la Fecha (Evitar que reserven en días pasados)
            const fechaActual = new Date();
            fechaActual.setHours(0, 0, 0, 0);

            // Crear el objeto de fecha con la opción seleccionada por el usuario
            const fechaReserva = new Date(fechaSeleccionada + "T00:00:00");

            if (fechaReserva < fechaActual) {
                evento.preventDefault();
                alert("La fecha de la reserva no puede ser un día anterior al actual.");
                return;
            }
        });
    }
});

//confirmar antes de eliminar
function confirmarEliminacion(evento) {
    const confirmacion = confirm("¿Estás completamente seguro de que deseas cancelar y eliminar esta reserva?");
    if (!confirmacion) {
        evento.preventDefault(); // Si el usuario presiona "Cancelar", no se borra nada
    }
}