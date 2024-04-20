<?php
include ('../App/config.php');
include ('../layout/sesion.php');
include ('../layout/parte1.php');

include ('../App/controllers/roles/listado_roles.php');

?>

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
                  <form action="../App/controllers/usuarios/create.php" method="post">
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
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Rut:</label>
                              <input type="text" name="rut" class="form-control" placeholder="Ingrese rut..." required>
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

<?php include ('../layout/parte2.php'); ?>
<?php include ('../layout/mensajes.php'); ?>