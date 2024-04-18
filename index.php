<?php
  include('App/config.php');
  include('layout/sesion.php');
  include('layout/parte1.php');

  include('App/controllers/usuarios/listado_usuarios.php');
  include('App/controllers/roles/listado_roles.php');
  include('App/controllers/categorias/listado_categorias.php');
  include('App/controllers/inventario/listado_productos.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid" style="text-align: center;" style="display: flex;">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Bienvenido al sistema  <h5><?php echo $rol_sesion;?> </h5></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <br><br>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $contador_usuarios = 0;
                  foreach($datos_usuarios as $datos_usuario){
                    $contador_usuarios = $contador_usuarios +1;
                  }
                ?>
                <h3><?php echo $contador_usuarios;?></h3>
                  <p>Usuarios Registrados</p>
              </div>
              <a href="<?php echo $URL;?>/usuarios/create.php">
                <div class="icon">
                  <i class="fas fa-user-plus"></i>
                </div>
              </a>
              <a href="<?php echo $URL;?>/usuarios" class="small-box-footer">
                Más detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $contador_roles = 0;
                  foreach($datos_roles as $datos_rol){
                    $contador_roles = $contador_roles +1;
                  }
                ?>
                <h3><?php echo $contador_roles;?></h3>
                  <p>Roles Registrados</p>
              </div>
              <a href="<?php echo $URL;?>/roles/create.php">
                <div class="icon">
                  <i class="fas fa-address-card"></i>
                </div>
              </a>
              <a href="<?php echo $URL;?>/roles" class="small-box-footer">
                Más detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $contador_categorias = 0;
                  foreach($datos_categorias as $datos_categoria){
                    $contador_categorias = $contador_categorias +1;
                  }
                ?>
                <h3><?php echo $contador_categorias;?></h3>
                  <p>Categorías Registradas</p>
              </div>
              <a href="<?php echo $URL;?>/categorias">
                <div class="icon">
                  <i class="fas fa-tags"></i>
                </div>
              </a>
              <a href="<?php echo $URL;?>/categorias" class="small-box-footer">
                Más detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                $contador_productos = 0;
                  foreach($datos_productos as $datos_producto){
                    $contador_productos = $contador_productos +1;
                  }
                ?>
                <h3><?php echo $contador_productos;?></h3>
                  <p>Productos Registrados</p>
              </div>
              <a href="<?php echo $URL;?>/inventario/create.php">
                <div class="icon">
                  <i class="fas fa-list"></i>
                </div>
              </a>
              <a href="<?php echo $URL;?>/inventario" class="small-box-footer">
                Más detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
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

  <!-- Alerta de Logeo -->
<script>
  Swal.fire({
    position: "top-center",
    icon: "success",
    title: "Bienvenido al sistema <br> <?php echo $nombres_sesion;?>",
    showConfirmButton: false,
    timer: 1500
  });
</script>

<?php include('layout/parte2.php');?>