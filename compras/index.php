<?php
  include('../App/config.php');
  include('../layout/sesion.php');
  include('../layout/parte1.php');
  include ('../App/controllers/compras/listado_Compras.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid" style="text-align: center;" style="display: flex;">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de Compras </h1>
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
                <h3 class="card-title">Compras</h3>
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
                      <th>Nro de compra</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Comprobante</th>
                      <th>Precio compra</th>
                      <th>Fecha de compra</th>
                      <th>Proveedor</th>
                      <th>Usuario</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $contador = 0;
                        foreach($datos_compras as $datos_compra) { 
                        $id_compra = $datos_compra['id_compra'] ?>
                        <tr>
                          <td><?php echo $contador = $contador + 1?></td>
                          <td><?php echo $datos_compra['nro_compra']?></td>
                          <td>
                            <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-producto<?php echo $id_compra?>">
                                <?php echo $datos_compra['nombre_producto']?>
                            </button>
                            <!---- Modal para ver Productos ---->
                            <div class="modal fade" id="modal-producto<?php echo $id_compra;?>">
                              <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header" style="background-color: #AEB6BF ;color: black" >
                                        <h4 class="modal-title">Datos de producto</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col-md-9">
                                          <div class="row">
                                            <div class="col-md-2">
                                              <div class="form-group">
                                                <label for="">Código:</label>
                                                <input type="text" class="form-control" value="<?php echo $datos_compra['codigo_producto']?>" disabled>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <label for="">Nombre Producto:</label>
                                                <input type="text" class="form-control" value="<?php echo $datos_compra['nombre_producto']?>" disabled>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label for="">Descripción Producto:</label>
                                                <input type="text" class="form-control" value="<?php echo $datos_compra['descripcion_producto']?>" disabled>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="">Stock Producto:</label>
                                                <input type="text" class="form-control" value="<?php echo $datos_compra['stock_producto']?>" disabled>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="">Stock mínimo:</label>
                                                <input type="text" class="form-control" value="<?php echo $datos_compra['stock_minimo']?>" disabled>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="">Stock máximo:</label>
                                                <input type="text" class="form-control" value="<?php echo $datos_compra['stock_maximo']?>" disabled>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="">Ultimo ingreso:</label>
                                                <input type="text" class="form-control" value="<?php echo $datos_compra['fecha_ingreso']?>" disabled>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="">Ultima Compra:</label>
                                                <input type="text" class="form-control" value="<?php echo $datos_compra['precio_producto']?>" disabled>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="">Precio venta:</label>
                                                <input type="text" class="form-control" value="<?php echo $datos_compra['precio_venta_p']?>" disabled>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="">Categoría:</label>
                                                <input type="text" class="form-control" value="<?php echo $datos_compra['nombre_categoria']?>" disabled>
                                              </div>
                                            </div>
                                            <div class="col-md-3">
                                              <div class="form-group">
                                                <label for="">Registrado Por:</label>
                                                <input type="text" class="form-control" value="<?php echo $datos_compra['nombre_usuario']?>" disabled>
                                              </div>
                                            </div>
                                          </div>
                                      </div>  
                                        <div class="col-md-3"> 
                                          <div class="form-group">
                                            <label for="">Imagen Producto:</label>
                                            <img src="<?php echo $URL."/public/img/productos/".$datos_compra['imagen'];?>" width="100%" alt="">
                                          </div>
                                        </div>
                                    </div>    
                                  </div>
                                  <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                          </td>
                          <td><?php echo $datos_compra['cantidad']?></td>
                          <td><?php echo $datos_compra['comprobante']?></td>
                          <td><?php echo $datos_compra['ingreso_compra']?></td>
                          <td><?php echo $datos_compra['fecha_compra']?></td>
                          <td>
                            <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-proveedor<?php echo $id_compra?>">
                                <?php echo $datos_compra['nombre_proveedor']?>
                            </button>
                            <!---- Modal para ver Proveedores ---->
                            <div class="modal fade" id="modal-proveedor<?php echo $id_compra;?>">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header" style="background-color: #AEB6BF ;color: black" >
                                        <h4 class="modal-title">Datos de Proveedor</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="">Nombre Proveedor:</label>
                                            <input type="text" value="<?php echo $datos_compra['nombre_proveedor'];?>" class="form-control" disabled>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="">Celular Proveedor:</label>
                                            <a href="https://wa.me/569<?php echo $datos_compra['celular_proveedor'];?>" target="_blank" class="btn btn-success" style="width:100%" >
                                              <i class="fa fa-phone"></i>
                                               <?php echo $datos_compra['celular_proveedor'];?>
                                            </a>
                                          </div>
                                        </div> 
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="">Telefono Proveedor:</label>
                                              <input type="text" value="<?php echo $datos_compra['telefono_proveedor'];?>" class="form-control" disabled>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="">email:</label>
                                              <input type="text" value="<?php echo $datos_compra['email_proveedor'];?>" class="form-control" disabled>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="">Empresa:</label>
                                              <input type="text" value="<?php echo $datos_compra['empresa_proveedor'];?>" class="form-control" disabled>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="">Dirección:</label>
                                              <input type="text" value="<?php echo $datos_compra['direccion_proveedor'];?>" class="form-control" disabled>
                                            </div>
                                          </div>
                                        </div>
                                      </div>    
                                  </div>
                                  <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                          </td>
                          <td><?php echo $datos_compra['nombre_usuario']?></td>
                          <td>
                          <div class="btn-group">
                              <a href="show.php?id=<?php echo $id_compra;?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver</a>
                              <a href="update.php?id=<?php echo $id_compra;?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
                              <a href="delete.php?id=<?php echo $id_compra;?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Borrar</a>
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


<?php include('../layout/parte2.php');?>
<?php include('../layout/mensajes.php');?>

<script>
  $(function () {
    $("#example1").DataTable({
      /* cambio de idiomas de datatable */
      "pageLength": 10,
          "language": {
              "emptyTable": "No hay información",
              "info": "Mostrando _START_ - _END_ de _TOTAL_ Compras",
              "infoEmpty": "Mostrando 0 to 0 of 0 Compras",
              "infoFiltered": "(Filtrado de _MAX_ total Compras)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Compras",
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
