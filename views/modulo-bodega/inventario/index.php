<?php
  include('../../../App/config.php');
  include('../../../layout/sesion.php');
  include('../../../layout/parte1.php');
  include('../../../App/controllers/inventario/listado_productos.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid" style="text-align: center;" style="display: flex;">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de Productos </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content" style="text-align: center">
      <div class="container-fluid">
        <div class="row" style="justify-content: center; align-items: center;">
          <div class="col-md-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Productos</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
              </div>
              <div class="card-body" style="display: block;">
                <div class="table table-responsive">
                  <table id="example1" class="table table-bordered table-striped table-sm" >
                    <thead>
                    <tr>
                      <th>Nro</th>
                      <th>Código</th>
                      <th>Categoría</th>
                      <th>Nombre</th>
                      <th>Laboratorio</th>
                      <th>Marca</th>
                      <th>Principio Activo</th>
                      <th>Concentración</th>
                      <th>Forma Farmacéutica</th>
                      <th>Bioequivalente</th>
                      <th>Petitorio</th>
                      <th>Stock</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $contador = 0;
                        foreach($datos_productos as $datos_producto) { 
                        $id_producto = $datos_producto['id_producto'] ?>
                        <tr>
                          <td><?php echo $contador = $contador + 1?></td>
                          <td><?php echo $datos_producto['codigo_producto']?></td>
                          <td><?php echo $datos_producto['categoria']?></td>
                          <td><?php echo $datos_producto['nombre_producto']?></td>
                          <td><?php echo $datos_producto['nombre_laboratorio']?></td>
                          <td><?php echo $datos_producto['nombre_marca']?></td>
                          <td><?php echo $datos_producto['principio_activo']?></td>
                          <td><?php echo $datos_producto['concentracion']?></td>
                          <td><?php echo $datos_producto['forma_farmaceutica']?></td>
                          <td><?php echo $datos_producto['bioequivalente']?></td>
                          <td><?php echo $datos_producto['petitorio']?></td>
                          <?php
                          $stock_actual = $datos_producto['stock_producto'];
                          $stock_minimo = $datos_producto['stock_minimo'];
                          $stock_maximo = $datos_producto['stock_maximo'];
                          if($stock_actual < $stock_minimo){ ?>
                            <td style="background-color: #FD6767"><?php echo $datos_producto['stock_producto'];?></td>
                          <?php  
                          }
                          else if($stock_actual > $stock_maximo){ ?>
                            <td style="background-color: #F4D03F"><?php echo $datos_producto['stock_producto'];?></td>
                          <?php  
                          } else { ?>
                            <td style="background-color: #58D68D"><?php echo $datos_producto['stock_producto']?></td>
                          <?php
                          }
                          ?>
                          <td>
                          <div class="btn-group btn-group-sm">
                              <a href="show.php?id=<?php echo $id_producto;?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i> Ver</a>
                              <a href="update.php?id=<?php echo $id_producto;?>" type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Editar</a>
                              <a href="delete.php?id=<?php echo $id_producto;?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</a>
                            </div>
                          </td>
                        </tr>
                      <?php  
                      }  
                      ?>
                    </tbody>
                  </table>
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


<?php include('../../../layout/parte2.php');?>
<?php include('../../../layout/mensajes.php');?>

<script>
  $(function () {
    $("#example1").DataTable({
      /* cambio de idiomas de datatable */
      "pageLength": 10,
          "language": {
              "emptyTable": "No hay información",
              "info": "Mostrando _START_ - _END_ de _TOTAL_ Productos",
              "infoEmpty": "Mostrando 0 to 0 of 0 Productos",
              "infoFiltered": "(Filtrado de _MAX_ total Productos)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Productos",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscar:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
             },
      /* fin de idiomas */
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": [{text:'Copiar', extend: "copy", },{
      extend:"csv", },{
      extend:"excel",},{
      extend:"pdf",},{ 
      text:'Imprimir', extend:"print",},{
      text:'Visor de Columnas',extend:"colvis"}
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
