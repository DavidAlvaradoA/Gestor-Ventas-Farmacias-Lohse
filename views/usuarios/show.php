<?php
include ('../../App/config.php');
include ('../../layout/sesion.php');
include ('../../layout/parte1.php');
include ('../../App/Controllers/usuarios/show_usuario.php');
include ('../../App/Controllers/usuarios/listado_usuarios.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid" style="text-align: center;" style="display: flex;">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Información de usuario </h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->



  <!-- Main content -->
  <div class="content">
    <div clas="container-fluid">
      <div class="row" style="justify-content: center; align-items: center;">
        <div class="col-md-5">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"> Ver usuarios</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Nombres:</label>
                        <input type="text" name="nombres" value="<?php echo $nombres; ?>" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Apellidos:</label>
                        <input type="text" name="apellidos" value="<?php echo $apellidos; ?>" class="form-control"
                          disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Rut:</label>
                        <input type="text" name="rut" value="<?php echo $rut; ?>" class="form-control" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Email:</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Tipo de Rol:</label>
                        <input type="text" name="rol" class="form-control" value="<?php echo $rol; ?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-group">
                <a href="index.php" class="btn btn-secondary">Volver</a>
              </div>
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
<?php include ('../../layout/mensajes.php'); ?>
<?php include ('../../layout/parte2.php'); ?>