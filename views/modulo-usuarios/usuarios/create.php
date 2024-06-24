<?php
include ('../../../App/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php');

include ('../../../App/controllers/roles/listado_roles.php');

?>

<script type="module" src="https://unpkg.com/html-input-rut"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid" style="text-align: center;" style="display: flex;">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Registrar nuevo usuario </h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->



  <!-- Main content -->
  <div class="content">
    <div clas="container-fluid">
      <div class="row" style="justify-content: center; align-items: center;">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"> Creación de usuarios</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <form action="../../../App/controllers/usuarios/create.php" method="post">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Nombres:</label>
                              <input type="text" name="nombres" class="form-control" placeholder="Ingrese nombre..."
                                required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Apellidos:</label>
                              <input type="text" name="apellidos" class="form-control"
                                placeholder="Ingrese apellidos..." required>
                            </div>
                          </div>

                          <script>
                            function checkRut(rut) {
                              // Despejar Puntos
                              var valor = rut.value.replace('.', '');
                              // Despejar Guión
                              valor = valor.replace('-', '');

                              // Aislar Cuerpo y Dígito Verificador
                              cuerpo = valor.slice(0, -1);
                              dv = valor.slice(-1).toUpperCase();

                              // Formatear RUN
                              rut.value = cuerpo + '-' + dv

                              // Si no cumple con el mínimo ej. (n.nnn.nnn)
                              if (cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false; }

                              // Calcular Dígito Verificador
                              suma = 0;
                              multiplo = 2;

                              // Para cada dígito del Cuerpo
                              for (i = 1; i <= cuerpo.length; i++) {

                                // Obtener su Producto con el Múltiplo Correspondiente
                                index = multiplo * valor.charAt(cuerpo.length - i);

                                // Sumar al Contador General
                                suma = suma + index;

                                // Consolidar Múltiplo dentro del rango [2,7]
                                if (multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }

                              }

                              // Calcular Dígito Verificador en base al Módulo 11
                              dvEsperado = 11 - (suma % 11);

                              // Casos Especiales (0 y K)
                              dv = (dv == 'K') ? 10 : dv;
                              dv = (dv == 0) ? 11 : dv;

                              // Validar que el Cuerpo coincide con su Dígito Verificador
                              if (dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

                              // Si todo sale bien, eliminar errores (decretar que es válido)
                              rut.setCustomValidity('');
                            }
                          </script>
                          
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Rut:</label>
                              <input type="text" name="rut" class="form-control" required oninput="checkRut(this)" placeholder="Ingrese rut..." required>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Email:</label>
                              <input type="email" name="email" class="form-control" placeholder="Ingrese email..."
                                required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Tipo de Rol:</label>
                              <select name="rol" id="" class="form-control">
                                <?php
                                foreach ($datos_roles as $datos_rol) { ?>
                                  <option value="<?php echo $datos_rol['id_rol'] ?>"><?php echo $datos_rol['rol'] ?>
                                  </option>
                                  <?php
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Contraseña:</label>
                              <input type="password" name="password_user" class="form-control"
                                placeholder="Ingrese Contraseña..." required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Confirmar Contraseña:</label>
                              <input type="password" name="password_repeat" class="form-control"
                                placeholder="Confirme Contraseña..." required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <a href="index.php" class="btn btn-secondary">Cancelar</a>
                      <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                  </form>
                </div>
              </div>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->





<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Ventas</h5>
    <p>Ventas realizadas</p>
  </div>
</aside>
<!-- /.control-sidebar -->

<!-- Alerta de Logeo 
<script>
  Swal.fire({
    position: "top-center",
    icon: "success",
    title: "Bienvenido al sistema <br> <?php echo $nombres_sesion; ?>",
    showConfirmButton: false,
    timer: 1500
  });
</script>

-->

<?php include ('../../../layout/parte2.php'); ?>
<?php include ('../../../layout/mensajes.php'); ?>