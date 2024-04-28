<?php
include ('../../App/config.php');
include ('../../layout/sesion.php');
include ('../../layout/parte1.php');
include ('../../App/Controllers/usuarios/show_usuario.php');
include ('../../App/Controllers/roles/listado_roles.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid" style="text-align: center;" style="display: flex;">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Eliminar usuario </h1>
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
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title"> ¿Esta seguro de eliminar usuario?</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <form action="../../App/controllers/usuarios/delete_usuario.php" method="post">
                  <input type="text" name="id_usuario" value="<?php echo $id_usuario_get;?>" hidden>
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
                              <input type="text" name="apellidos" value="<?php echo $apellidos; ?>" class="form-control" disabled>
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
                      <button class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
                    </div>
                  </form>
                </div>
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



<?php include ('../../layout/mensajes.php'); ?>
<?php include ('../../layout/parte2.php'); ?>