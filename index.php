<?php
include ('App/config.php');
include ('layout/sesion.php');
include ('layout/parte1.php');

include ('App/controllers/usuarios/listado_usuarios.php');
include ('App/controllers/roles/listado_roles.php');
include ('App/controllers/categorias/listado_categorias.php');
include ('App/controllers/inventario/listado_productos.php');
include ('App/controllers/proveedores/listado_proveedores.php');
include ('App/controllers/compras/listado_compras.php');
include ('App/controllers/ventas/listado_ventas.php');
include ('App/controllers/clientes/listado_clientes.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid" style="text-align: center;" style="display: flex;">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0"> <b>Bienvenido al sistema</b>
            <h4><?php echo $nombres_sesion ?> <?php echo $apellidos_sesion; ?></h4>
          </h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->



  <!-- Main content -->
  <div class="content">
    <?php
    if ($rol_sesion == "ADMINISTRADOR") { ?>
      <div class="container-fluid">
        <br><br>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $contador_usuarios = 0;
                foreach ($datos_usuarios as $datos_usuario) {
                  $contador_usuarios = $contador_usuarios + 1;
                }
                ?>
                <h3><?php echo $contador_usuarios; ?></h3>
                <p>Usuarios Registrados</p>
              </div>
              <a href="<?php echo $URL; ?>/views/modulo-usuarios/usuarios/create.php">
                <div class="icon">
                  <i class="fas fa-user-plus"></i>
                </div>
              </a>
              <a href="<?php echo $URL; ?>/views/modulo-usuarios/usuarios" class="small-box-footer">
                Más detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                $contador_roles = 0;
                foreach ($datos_roles as $datos_rol) {
                  $contador_roles = $contador_roles + 1;
                }
                ?>
                <h3><?php echo $contador_roles; ?></h3>
                <p>Roles Registrados</p>
              </div>
              <a href="<?php echo $URL; ?>/views/modulo-roles/roles/create.php">
                <div class="icon">
                  <i class="fas fa-address-card"></i>
                </div>
              </a>
              <a href="<?php echo $URL; ?>/views/modulo-roles/roles" class="small-box-footer">
                Más detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $contador_categorias = 0;
                foreach ($datos_categorias as $datos_categoria) {
                  $contador_categorias = $contador_categorias + 1;
                }
                ?>
                <h3><?php echo $contador_categorias; ?></h3>
                <p>Categorías Registradas</p>
              </div>
              <a href="<?php echo $URL; ?>/views/modulo-bodega/categorias">
                <div class="icon">
                  <i class="fas fa-tags"></i>
                </div>
              </a>
              <a href="<?php echo $URL; ?>/views/modulo-bodega/categorias" class="small-box-footer">
                Más detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                $contador_productos = 0;
                foreach ($datos_productos as $datos_producto) {
                  $contador_productos = $contador_productos + 1;
                }
                ?>
                <h3><?php echo $contador_productos; ?></h3>
                <p>Productos Registrados</p>
              </div>
              <a href="<?php echo $URL; ?>/views/modulo-bodega/inventario/create.php">
                <div class="icon">
                  <i class="fas fa-list"></i>
                </div>
              </a>
              <a href="<?php echo $URL; ?>/views/modulo-bodega/inventario" class="small-box-footer">
                Más detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <?php
                $contador_clientes = 0;
                foreach ($datos_clientes as $datos_cliente) {
                  $contador_clientes = $contador_clientes + 1;
                }
                ?>
                <h3><?php echo $contador_clientes; ?></h3>
                <p>Clientes Registradas</p>
              </div>
              <a href="<?php echo $URL; ?>/views/modulo-bodega/clientes/index.php">
                <div class="icon">
                  <i class="fas fa-user-friends"></i>
                </div>
              </a>
              <a href="<?php echo $URL; ?>/views/modulo-bodega/clientes" class="small-box-footer">
                Más detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-dark">
              <div class="inner">
                <?php
                $contador_proveedores = 0;
                foreach ($datos_proveedores as $datos_proveedor) {
                  $contador_proveedores = $contador_proveedores + 1;
                }
                ?>
                <h3><?php echo $contador_proveedores; ?></h3>
                <p>Proveedores Registrados</p>
              </div>
              <a href="<?php echo $URL; ?>/views/modulo-administracion/proveedores/index.php">
                <div class="icon">
                  <i class="fas fa-car"></i>
                </div>
              </a>
              <a href="<?php echo $URL; ?>/views/modulo-administracion/proveedores" class="small-box-footer">
                Más detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                $contador_compras = 0;
                foreach ($datos_compras as $datos_compra) {
                  $contador_compras = $contador_compras + 1;
                }
                ?>
                <h3><?php echo $contador_compras; ?></h3>
                <p>Compras Registradas</p>
              </div>
              <a href="<?php echo $URL; ?>/views/modulo-administracion/compras/create.php">
                <div class="icon">
                  <i class="fas fa-cart-plus"></i>
                </div>
              </a>
              <a href="<?php echo $URL; ?>/views/modulo-administracion/compras" class="small-box-footer">
                Más detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $contador_ventas = 0;
                foreach ($datos_ventas as $datos_venta) {
                  $contador_ventas = $contador_ventas + 1;
                }
                ?>
                <h3><?php echo $contador_ventas; ?></h3>
                <p>Ventas Registradas</p>
              </div>
              <a href="<?php echo $URL; ?>/views/modulo-ventas/ventas/create.php">
                <div class="icon">
                  <i class="fas fa-shopping-basket"></i>
                </div>
              </a>
              <a href="<?php echo $URL; ?>/views/modulo-ventas/ventas" class="small-box-footer">
                Más detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- /.content -->
      </div>
      <div class="row">
        <div class="col-md-6">
           <div>
            <canvas id="myChart"></canvas>
           </div>
           <?php
              $enero = 0; $febrero = 0; $marzo = 0; $abril = 0; $mayo = 0; $junio = 0; $julio = 0; 
              $agosto = 0; $septiembre = 0; $octubre = 0; $noviembre = 0; $diciembre = 0; 
              foreach ($datos_ventas as $datos_venta) {
                $fecha = $datos_venta['fecha_venta'];
                $fecha = strtoTime($fecha);
                $mes = date("m", $fecha);
                if($mes == "01") $enero = $enero + 1;
                if($mes == "02") $febrero = $febrero + 1;
                if($mes == "03") $marzo = $marzo + 1;
                if($mes == "04") $abril = $abril + 1;
                if($mes == "05") $mayo = $mayo + 1;
                if($mes == "06") $junio = $junio + 1;
                if($mes == "07") $julio = $julio + 1;
                if($mes == "08") $agosto = $agosto + 1;
                if($mes == "09") $septiembre = $septiembre + 1;
                if($mes == "10") $octubre = $octubre + 1;
                if($mes == "11") $noviembre = $noviembre + 1;
                if($mes == "12") $diciembre = $diciembre + 1;
              }
              $ventas_meses = $enero.",".$febrero.",".$marzo.",".$abril.",".$mayo.",".$junio.",".$julio.",".$agosto.",".$septiembre.",".$octubre.",".$noviembre.",".$diciembre;
            ?>
          <script>
            var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                        'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            var datos = [<?php echo $ventas_meses?>];
            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
              type: 'line',
              data: { 
                labels: meses,
                datasets: [{
                  label: 'Ventas registradas',
                  data: datos,
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>
        </div>
        <div class="col-md-6">
           <div>
            <canvas id="myChart2"></canvas>
           </div>
           <?php
              $enero = 0; $febrero = 0; $marzo = 0; $abril = 0; $mayo = 0; $junio = 0; $julio = 0; 
              $agosto = 0; $septiembre = 0; $octubre = 0; $noviembre = 0; $diciembre = 0; 
              foreach ($datos_productos as $datos_producto) {
                $fecha_pro = $datos_producto['fecha_ingreso'];
                $fecha_pro = strtoTime($fecha_pro);
                $mes = date("m", $fecha_pro);
                if($mes == "01") $enero = $enero + 1;
                if($mes == "02") $febrero = $febrero + 1;
                if($mes == "03") $marzo = $marzo + 1;
                if($mes == "04") $abril = $abril + 1;
                if($mes == "05") $mayo = $mayo + 1;
                if($mes == "06") $junio = $junio + 1;
                if($mes == "07") $julio = $julio + 1;
                if($mes == "08") $agosto = $agosto + 1;
                if($mes == "09") $septiembre = $septiembre + 1;
                if($mes == "10") $octubre = $octubre + 1;
                if($mes == "11") $noviembre = $noviembre + 1;
                if($mes == "12") $diciembre = $diciembre + 1;
              }
              $productos = $enero.",".$febrero.",".$marzo.",".$abril.",".$mayo.",".$junio.",".$julio.",".$agosto.",".$septiembre.",".$octubre.",".$noviembre.",".$diciembre;
            ?>
          <script>
            var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                        'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            var datos = [<?php echo $productos?>];
            const ctx2 = document.getElementById('myChart2');
            new Chart(ctx2, {
              type: 'bar',
              data: { 
                labels: meses,
                datasets: [{
                  label: 'Productos registrados',
                  data: datos,
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>
        </div>
      </div>

    </div>
    <?php
    }

    if ($rol_sesion == "FARMACÉUTICO") { ?>
    <div class="container-fluid">
      <br><br>
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              $contador_categorias = 0;
              foreach ($datos_categorias as $datos_categoria) {
                $contador_categorias = $contador_categorias + 1;
              }
              ?>
              <h3><?php echo $contador_categorias; ?></h3>
              <p>Categorías Registradas</p>
            </div>
            <a href="<?php echo $URL; ?>/views/modulo-bodega/categorias">
              <div class="icon">
                <i class="fas fa-tags"></i>
              </div>
            </a>
            <a href="<?php echo $URL; ?>/views/modulo-bodega/categorias" class="small-box-footer">
              Más detalles <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <?php
              $contador_productos = 0;
              foreach ($datos_productos as $datos_producto) {
                $contador_productos = $contador_productos + 1;
              }
              ?>
              <h3><?php echo $contador_productos; ?></h3>
              <p>Productos Registrados</p>
            </div>
            <a href="<?php echo $URL; ?>/views/modulo-bodega/inventario/create.php">
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
            </a>
            <a href="<?php echo $URL; ?>/views/modulo-bodega/inventario" class="small-box-footer">
              Más detalles <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              $contador_clientes = 0;
              foreach ($datos_clientes as $datos_cliente) {
                $contador_clientes = $contador_clientes + 1;
              }
              ?>
              <h3><?php echo $contador_clientes; ?></h3>
              <p>Clientes Registradas</p>
            </div>
            <a href="<?php echo $URL; ?>/views/modulo-bodega/clientes/index.php">
              <div class="icon">
                <i class="fas fa-user-friends"></i>
              </div>
            </a>
            <a href="<?php echo $URL; ?>/views/modulo-bodega/clientes" class="small-box-footer">
              Más detalles <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              $contador_ventas = 0;
              foreach ($datos_ventas as $datos_venta) {
                $contador_ventas = $contador_ventas + 1;
              }
              ?>
              <h3><?php echo $contador_ventas; ?></h3>
              <p>Ventas Registradas</p>
            </div>
            <a href="<?php echo $URL; ?>/views/modulo-ventas/ventas/create.php">
              <div class="icon">
                <i class="fas fa-shopping-basket"></i>
              </div>
            </a>
            <a href="<?php echo $URL; ?>/views/modulo-ventas/ventas" class="small-box-footer">
              Más detalles <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- /.content -->
    </div>
    <div class="row">
        <div class="col-md-6">
           <div>
            <canvas id="myChart"></canvas>
           </div>
           <?php
              $enero = 0; $febrero = 0; $marzo = 0; $abril = 0; $mayo = 0; $junio = 0; $julio = 0; 
              $agosto = 0; $septiembre = 0; $octubre = 0; $noviembre = 0; $diciembre = 0; 
              foreach ($datos_ventas as $datos_venta) {
                $fecha = $datos_venta['fecha_venta'];
                $fecha = strtoTime($fecha);
                $mes = date("m", $fecha);
                if($mes == "01") $enero = $enero + 1;
                if($mes == "02") $febrero = $febrero + 1;
                if($mes == "03") $marzo = $marzo + 1;
                if($mes == "04") $abril = $abril + 1;
                if($mes == "05") $mayo = $mayo + 1;
                if($mes == "06") $junio = $junio + 1;
                if($mes == "07") $julio = $julio + 1;
                if($mes == "08") $agosto = $agosto + 1;
                if($mes == "09") $septiembre = $septiembre + 1;
                if($mes == "10") $octubre = $octubre + 1;
                if($mes == "11") $noviembre = $noviembre + 1;
                if($mes == "12") $diciembre = $diciembre + 1;
              }
              $ventas_meses = $enero.",".$febrero.",".$marzo.",".$abril.",".$mayo.",".$junio.",".$julio.",".$agosto.",".$septiembre.",".$octubre.",".$noviembre.",".$diciembre;
            ?>
          <script>
            var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                        'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            var datos = [<?php echo $ventas_meses?>];
            const ctx3 = document.getElementById('myChart');
            new Chart(ctx3, {
              type: 'line',
              data: { 
                labels: meses,
                datasets: [{
                  label: 'Ventas registradas',
                  data: datos,
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>
        </div>
        <div class="col-md-6">
           <div>
            <canvas id="myChart2"></canvas>
           </div>
           <?php
              $enero = 0; $febrero = 0; $marzo = 0; $abril = 0; $mayo = 0; $junio = 0; $julio = 0; 
              $agosto = 0; $septiembre = 0; $octubre = 0; $noviembre = 0; $diciembre = 0; 
              foreach ($datos_productos as $datos_producto) {
                $fecha_pro = $datos_producto['fecha_ingreso'];
                $fecha_pro = strtoTime($fecha_pro);
                $mes = date("m", $fecha_pro);
                if($mes == "01") $enero = $enero + 1;
                if($mes == "02") $febrero = $febrero + 1;
                if($mes == "03") $marzo = $marzo + 1;
                if($mes == "04") $abril = $abril + 1;
                if($mes == "05") $mayo = $mayo + 1;
                if($mes == "06") $junio = $junio + 1;
                if($mes == "07") $julio = $julio + 1;
                if($mes == "08") $agosto = $agosto + 1;
                if($mes == "09") $septiembre = $septiembre + 1;
                if($mes == "10") $octubre = $octubre + 1;
                if($mes == "11") $noviembre = $noviembre + 1;
                if($mes == "12") $diciembre = $diciembre + 1;
              }
              $productos = $enero.",".$febrero.",".$marzo.",".$abril.",".$mayo.",".$junio.",".$julio.",".$agosto.",".$septiembre.",".$octubre.",".$noviembre.",".$diciembre;
            ?>
          <script>
            var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                        'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            var datos = [<?php echo $productos?>];
            const ctx4 = document.getElementById('myChart2');
            new Chart(ctx4, {
              type: 'bar',
              data: { 
                labels: meses,
                datasets: [{
                  label: 'Productos registrados',
                  data: datos,
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>
        </div>
      </div>
  </div>

  <?php
    }

    if ($rol_sesion == "AUXILIAR") { ?>
      <div class="container-fluid">
        <br><br>
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <?php
                $contador_productos = 0;
                foreach ($datos_productos as $datos_producto) {
                  $contador_productos = $contador_productos + 1;
                }
                ?>
                <h3><?php echo $contador_productos; ?></h3>
                <p>Productos Registrados</p>
              </div>
              <a href="<?php echo $URL; ?>/views/modulo-bodega/inventario/create.php">
                <div class="icon">
                  <i class="fas fa-list"></i>
                </div>
              </a>
              <a href="<?php echo $URL; ?>/views/modulo-bodega/inventario" class="small-box-footer">
                Más detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $contador_ventas = 0;
                foreach ($datos_ventas as $datos_venta) {
                  $contador_ventas = $contador_ventas + 1;
                }
                ?>
                <h3><?php echo $contador_ventas; ?></h3>
                <p>Ventas Registradas</p>
              </div>
              <a href="<?php echo $URL; ?>/views/modulo-ventas/ventas/create.php">
                <div class="icon">
                  <i class="fas fa-shopping-basket"></i>
                </div>
              </a>
              <a href="<?php echo $URL; ?>/views/modulo-ventas/ventas" class="small-box-footer">
                Más detalles <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- /.content -->
      </div>
      <div class="row">
        <div class="col-md-6">
           <div>
            <canvas id="myChart"></canvas>
           </div>
           <?php
              $enero = 0; $febrero = 0; $marzo = 0; $abril = 0; $mayo = 0; $junio = 0; $julio = 0; 
              $agosto = 0; $septiembre = 0; $octubre = 0; $noviembre = 0; $diciembre = 0; 
              foreach ($datos_ventas as $datos_venta) {
                $fecha = $datos_venta['fecha_venta'];
                $fecha = strtoTime($fecha);
                $mes = date("m", $fecha);
                if($mes == "01") $enero = $enero + 1;
                if($mes == "02") $febrero = $febrero + 1;
                if($mes == "03") $marzo = $marzo + 1;
                if($mes == "04") $abril = $abril + 1;
                if($mes == "05") $mayo = $mayo + 1;
                if($mes == "06") $junio = $junio + 1;
                if($mes == "07") $julio = $julio + 1;
                if($mes == "08") $agosto = $agosto + 1;
                if($mes == "09") $septiembre = $septiembre + 1;
                if($mes == "10") $octubre = $octubre + 1;
                if($mes == "11") $noviembre = $noviembre + 1;
                if($mes == "12") $diciembre = $diciembre + 1;
              }
              $ventas_meses = $enero.",".$febrero.",".$marzo.",".$abril.",".$mayo.",".$junio.",".$julio.",".$agosto.",".$septiembre.",".$octubre.",".$noviembre.",".$diciembre;
            ?>
          <script>
            var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                        'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            var datos = [<?php echo $ventas_meses?>];
            const ctx5 = document.getElementById('myChart');
            new Chart(ctx5, {
              type: 'line',
              data: { 
                labels: meses,
                datasets: [{
                  label: 'Ventas registradas',
                  data: datos,
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>
        </div>
        <div class="col-md-6">
           <div>
            <canvas id="myChart2"></canvas>
           </div>
           <?php
              $enero = 0; $febrero = 0; $marzo = 0; $abril = 0; $mayo = 0; $junio = 0; $julio = 0; 
              $agosto = 0; $septiembre = 0; $octubre = 0; $noviembre = 0; $diciembre = 0; 
              foreach ($datos_productos as $datos_producto) {
                $fecha_pro = $datos_producto['fecha_ingreso'];
                $fecha_pro = strtoTime($fecha_pro);
                $mes = date("m", $fecha_pro);
                if($mes == "01") $enero = $enero + 1;
                if($mes == "02") $febrero = $febrero + 1;
                if($mes == "03") $marzo = $marzo + 1;
                if($mes == "04") $abril = $abril + 1;
                if($mes == "05") $mayo = $mayo + 1;
                if($mes == "06") $junio = $junio + 1;
                if($mes == "07") $julio = $julio + 1;
                if($mes == "08") $agosto = $agosto + 1;
                if($mes == "09") $septiembre = $septiembre + 1;
                if($mes == "10") $octubre = $octubre + 1;
                if($mes == "11") $noviembre = $noviembre + 1;
                if($mes == "12") $diciembre = $diciembre + 1;
              }
              $productos = $enero.",".$febrero.",".$marzo.",".$abril.",".$mayo.",".$junio.",".$julio.",".$agosto.",".$septiembre.",".$octubre.",".$noviembre.",".$diciembre;
            ?>
          <script>
            var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                        'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            var datos = [<?php echo $productos?>];
            const ctx6 = document.getElementById('myChart2');
            new Chart(ctx6, {
              type: 'bar',
              data: { 
                labels: meses,
                datasets: [{
                  label: 'Productos registrados',
                  data: datos,
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>
        </div>
      </div>
    </div>
    <?php
    }            
    ?>
</div>
<!-- /.content-wrapper -->






<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <div style="text-align: center;">
    <h5>Ventas</h5>
    <hr>
    <p>Ventas realizadas</p>
      <?php echo $contador_ventas?>
    </div>
  </div>
</aside>
<!-- /.control-sidebar -->

<!-- Alerta de Logeo -->
<script>
  Swal.fire({
    position: "top-center",
    icon: "success",
    title: "Bienvenido al sistema <br> <?php echo $nombres_sesion; ?> <?php echo $apellidos_sesion; ?>",
    showConfirmButton: false,
    timer: 1500
  });
</script>

<?php include ('layout/parte2.php'); ?>