<?php
  include('../App/config.php');
  include('../layout/sesion.php');
  include('../layout/parte1.php');

  include('../App/controllers/roles/update_roles.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid" style="text-align: center;" style="display: flex;">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Editar Rol </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


 
    <!-- Main content -->
    <div class="content">
      <div clas="container-fluid" >
        <div class="row" style="justify-content: center; align-items: center;">
          <div class="col-md-5">
          <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"> Edición de Roles</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <form  action="../App/controllers/roles/update.php" method="post">
                      <div class="form-group">
                      <input type="text" name="id_rol" value="<?php echo $id_rol_get;?>" hidden>
                      <label for="">Nombre del Rol</label>
                      <input type="text" name="rol" class="form-control" value="<?php echo $rol;?>" placeholder="Ingrese nombre del Rol..." required>
                      </div>
                      
                      <hr>
                      <div class="form-group">
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">Actualizar</button>
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

<?php include('../layout/parte2.php');?>
<?php include('../layout/mensajes.php');?>