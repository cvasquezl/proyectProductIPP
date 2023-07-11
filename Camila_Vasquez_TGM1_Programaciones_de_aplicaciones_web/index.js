// funcion para que muestre el mensaje que solicita el nombre con sus variables correspondiente
function mostrarMensaje() {
  var nombre = document.getElementById("nombreInput").value;
  var mensajeTexto = document.getElementById("mensajeTexto");
  var nombreLabel = document.getElementById("nombreLabel");
  var nombreInput = document.getElementById("nombreInput");
  var botonAceptar = document.getElementById("botonAceptar");

  mensajeTexto.textContent =
    "¡Que tengas una linda experiencia, " + nombre + "!";

  // Ocultar el campo de entrada y el botón
  nombreInput.style.display = "none";
  botonAceptar.style.display = "none";
  nombreLabel.style.display = "none";
  // Mostrar el mensaje personalizado
  mensajeTexto.style.display = "block";
}

// Activar el modal al cargar la página
$(window).on("load", function () {
  $("#welcomeModal").modal("show");
});

// Código JavaScript para inicializar el carrusel
var carousel = new bootstrap.Carousel(
  document.querySelector("#carouselExampleRide"),
  {
    ride: true,
  }
);
