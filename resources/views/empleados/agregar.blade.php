<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
  
  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <style>
    body {
      background-color: #343a40; /* Cambiar el color de fondo según tus preferencias */
    }
    .container {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      background-color: #fff;
    }
    .card-body {
      width: 500px; /* Ajusta el ancho de la tarjeta según tus necesidades */
      margin: 0 auto;
    }
  </style>

</head>

<body class="hold-transition sidebar-mini">
  <div class="container">
    <section class="content">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Registrar Empleado</h3>
            </div>
            <form action="{{ route('empleado.store') }}" method="post" id="form-empleado">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="RPE_Empleado">RPE:</label>
                  <input type="text" class="form-control" id="RPE_Empleado" name="RPE_Empleado" placeholder="RPE">
                </div>
                <div class="form-group">
                  <label for="nombre_Empleado">Nombre:</label>
                  <input type="text" class="form-control" id="nombre_Empleado" name="nombre_Empleado" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label>Fecha Ingreso:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="fecha_ingreso" id="fecha_ingreso" readonly required>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Agregar esta sección antes de la etiqueta </body> -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var formEmpleado = document.getElementById("form-empleado");
      var fechaIngresoInput = document.getElementById("fecha_ingreso");
      
      // Obtener laFecha actual del sistema
      var fechaActual = new Date();
      var dia = String(fechaActual.getDate()).padStart(2, '0');
      var mes = String(fechaActual.getMonth() + 1).padStart(2, '0');
      var anio = fechaActual.getFullYear();
      var fechaFormateada = anio + '-' + mes + '-' + dia;
      
      // Establecer la fecha actual en el campo de fecha de ingreso
      fechaIngresoInput.value = fechaFormateada;
      
      formEmpleado.addEventListener("submit", function(event) {
        event.preventDefault();

        // Validar el formulario y mostrar la alerta de éxito
        var rpeInput = document.getElementById("RPE_Empleado");
        var nombreInput = document.getElementById("nombre_Empleado");
        
        if (rpeInput.value === "" || nombreInput.value === "") {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, complete todos los campos',
          });
          return;
        }

        // Enviar el formulario de forma manual
        formEmpleado.submit();

        // Mostrar alerta de éxito
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: 'El formulario se envió correctamente',
            timer: 3000,  // Duración en milisegundos
            timerProgressBar: true,  // Mostrar barra de progreso
            showConfirmButton: false  // Ocultar botón de confirmación
        });
      });
    });
  </script>
</body>
</html>