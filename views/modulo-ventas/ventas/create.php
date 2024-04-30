<?php
include ('../../../App/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php');
include ('../../../App/controllers/ventas/listado_ventas.php');
include ('../../../App/controllers/inventario/listado_productos.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid" style="text-align: center;" style="display: flex;">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registrar nueva Venta </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
        <div clas="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <?php
                            $contador_ventas = 0;
                            foreach ($datos_ventas as $datos_venta) {
                                $contador_ventas = $contador_ventas + 1;
                            }
                            ?>
                            <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Venta Nro
                                <input type="text" style="text-align: center" value="<?php echo $contador_ventas + 1 ?>"
                                    disabled>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <b>Carrito</b>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#modal-buscar-producto">
                                <i class="fa fa-search"></i>
                                Buscar Productos
                            </button>
                            <!---- Modal para ver Productos ---->
                            <div class="modal fade" id="modal-buscar-producto">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #AEB6BF ;color: black">
                                            <h4 class="modal-title">Búsqueda de Producto</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="example1"
                                                    class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Nro</th>
                                                            <th>Añadir</th>
                                                            <th>Código</th>
                                                            <th>Categoría</th>
                                                            <th>Imagen</th>
                                                            <th>Nombre</th>
                                                            <th>Marca</th>
                                                            <th>Stock</th>
                                                            <th>Precio compra</th>
                                                            <th>Precio Venta</th>
                                                            <th>Fecha compra</th>
                                                            <th>Ingresado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $contador = 0;
                                                        foreach ($datos_productos as $datos_producto) {
                                                            $id_producto = $datos_producto['id_producto'] ?>
                                                            <tr>
                                                                <td><?php echo $contador = $contador + 1 ?></td>
                                                                <td>
                                                                    <button class="btn btn-info btn-sm"
                                                                        id="btn_seleccionar<?php echo $id_producto; ?>">
                                                                        Seleccionar
                                                                    </button>
                                                                    <script>
                                                                        $('#btn_seleccionar<?php echo $id_producto; ?>').click(function () {

                                                                            var producto = "<?php echo $datos_producto['nombre_producto'] ?>";
                                                                            $('#producto').val(producto);

                                                                            var marca = "<?php echo $datos_producto['nombre_marca'] ?>";
                                                                            $('#detalle').val(marca);

                                                                                                                                        

                                                                            //$('#modal-buscar-producto').modal('toggle');
                                                                        });        
                                                                    </script>
                                                                </td>
                                                                <td><?php echo $datos_producto['codigo_producto'] ?>
                                                                </td>
                                                                <td><?php echo $datos_producto['categoria'] ?>
                                                                </td>
                                                                <td>
                                                                    <img src="<?php echo $URL . "/public/img/productos/" . $datos_producto['imagen_producto'] ?>"
                                                                        width="50px" alt="">
                                                                </td>
                                                                <td><?php echo $datos_producto['nombre_producto'] ?>
                                                                </td>
                                                                <td><?php echo $datos_producto['nombre_marca'] ?>
                                                                </td>
                                                                <td><?php echo $datos_producto['stock_producto'] ?>
                                                                </td>
                                                                <td><?php echo $datos_producto['precio_compra'] ?>
                                                                </td>
                                                                <td><?php echo $datos_producto['precio_venta'] ?>
                                                                </td>
                                                                <td><?php echo $datos_producto['fecha_ingreso'] ?>
                                                                </td>
                                                                <td><?php echo $datos_producto['nombre_usuario'] ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Producto</label>
                                                            <input type="text" id="producto" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="">Detalle</label>
                                                            <input type="text" id="detalle" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Cantidad</label>
                                                            <input type="text" id="cantidad" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Valor Unitario</label>
                                                            <input type="text" id="precio_unitario" class="form-control">
                                                        </div>
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
                            <br><br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover table-stripped">
                                    <thead>
                                        <tr>
                                            <th style="background-color: #e7e7e7; text-align: center">Nro</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Producto</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Detalle</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Cantidad</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Valor Unitario
                                            </th>
                                            <th style="background-color: #e7e7e7; text-align: center">SubTotal</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align: center">
                                            <td>1</td>
                                            <td>Medicamentos</td>
                                            <td>Paracetamol</td>
                                            <td>2</td>
                                            <td>5</td>
                                            <td>1</td>
                                            <td><a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center">
                                            <th colspan="3" style="background-color: #e7e7e7; text-align: right">Total
                                            </th>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del cliente </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

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


<?php include ('../../../layout/parte2.php'); ?>
<?php include ('../../../layout/mensajes.php'); ?>

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
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    $(function () {
        $("#example2").DataTable({
            /* cambio de idiomas de datatable */
            "pageLength": 10,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ - _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "Mostrando 0 to 0 of 0 Proveedores",
                "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Proveedores",
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
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>