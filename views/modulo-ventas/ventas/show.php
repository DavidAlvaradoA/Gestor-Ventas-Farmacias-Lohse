<?php
$id_venta_get = $_GET['id_venta'];

include ('../../../App/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php');
include ('../../../App/controllers/ventas/cargar_venta.php');
include ('../../../App/controllers/clientes/cargar_cliente.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid" style="text-align: center;" style="display: flex;">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Detalle Venta N° <?=  $nro_venta; ?></h1>
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
                            <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Venta Nro
                                <input type="text" style="text-align: center" value="<?php echo $nro_venta ?>"
                                    disabled>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover table-stripped">
                                    <thead>
                                        <tr style="background-color: #e7e7e7; text-align: center">
                                            <th>Nro</th>
                                            <th>Producto</th>
                                            <th>Detalle</th>
                                            <th>Cantidad</th>
                                            <th>Valor Unitario</th>
                                            <th>SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador_carrito = 0;
                                        $cantidad_total = 0;
                                        $valor_unitario = 0;
                                        $suma_subtotal = 0;
                                        $PRECIO_FINAL = 0;
                                        $sql_carrito = "SELECT *, CAR.cantidad as cantidad_carrito , 
                                            MAR.nombre_marca as nombre_marca, PRO.precio_venta as precio_venta,
                                            PRO.stock_producto as stock, PRO.id_producto as id_producto
                                            FROM carrito AS CAR 
                                            INNER JOIN inventario AS PRO 
                                            ON CAR.id_producto = PRO.id_producto 
                                            INNER JOIN marca AS MAR 
                                            ON MAR.id_marca = PRO.id_marca
                                            WHERE nro_venta = '$nro_venta' ORDER BY id_carrito ASC";
                                        $query_carrito = $pdo->prepare($sql_carrito);
                                        $query_carrito->execute();
                                        $datos_carrito = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($datos_carrito as $dato_carrito) {
                                            $id_carrito = $dato_carrito['id_carrito'];
                                            $contador_carrito = $contador_carrito + 1;
                                            $cantidad_total = $cantidad_total + $dato_carrito['cantidad_carrito'];
                                            $valor_unitario = $valor_unitario + floatval($dato_carrito['precio_venta']);
                                            ?>

                                            <tr style="text-align: center">

                                                <td>
                                                    <?php echo $contador_carrito; ?>
                                                    <input type="text" id="id_producto<?php echo$contador_carrito; ?>" value="<?php  echo $dato_carrito['id_producto']; ?>" hidden>
                                                </td>

                                                <td>
                                                    <?php echo $dato_carrito['nombre_producto'] . " " . $dato_carrito['nombre_marca']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $dato_carrito['cantidad'] . " " . $dato_carrito['forma_farmaceutica'] . ", " .
                                                    $dato_carrito['principio_activo']; ?>
                                                </td>

                                                <td>
                                                    <span id="cantidad_producto<?php echo $contador_carrito?>"><?php echo $dato_carrito['cantidad_carrito']; ?></span>
                                                    <input type="text" value="<?php echo $dato_carrito['stock']; ?>" 
                                                        id="stock_inventario<?php echo $contador_carrito; ?>" hidden>
                                                </td>

                                                <td>
                                                    <?php echo $dato_carrito['precio_venta']; ?>
                                                </td>

                                                <td><span>$</span>
                                                    <?php
                                                $cantidad = floatval($dato_carrito['cantidad_carrito']);
                                                $precio_venta = floatval($dato_carrito['precio_venta']);
                                                echo $subtotal = $cantidad * $precio_venta;
                                                $suma_subtotal = $suma_subtotal + $subtotal;
                                                $IVA = $suma_subtotal * 0.19;
                                                $PRECIO_FINAL = round($suma_subtotal + $IVA);
                                                ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <tr style="text-align: center">
                                            <th colspan="3" style="background-color: #e7e7e7; text-align: right">Total
                                            </th>
                                            <th><?php echo $cantidad_total; ?></th>
                                            <th><span>$</span><?php echo $valor_unitario; ?></th>
                                            <th><span>$</span><?php echo $suma_subtotal; ?></th>
                                        </tr>
                                        <tr style="text-align: center; background-color: #e7e7e7">
                                            <th colspan="3" style="text-align: right">Total + IVA(19%)</th>
                                            <th></th>
                                            <th></th>
                                            <th><span>$</span><?php echo $PRECIO_FINAL; ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del cliente </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <?php
                        foreach ($datos_clientes as $datos_cliente)
                        {
                            $nombre_cliente = $datos_cliente['nombre_cliente'];
                            $rut_cliente = $datos_cliente['rut_cliente'];
                            $celular_cliente = $datos_cliente['celular_cliente'];
                            $email_cliente = $datos_cliente['email_cliente'];
                        }
                        
                        ?>                    
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" id="id_cliente" hidden>
                                        <label for="">Nombre Cliente</label>
                                        <input type="text" value="<?php echo $nombre_cliente?>" 
                                        class="form-control" id="nombre_cliente" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Rut Cliente</label>
                                        <input type="text" value="<?php echo $rut_cliente?>"  
                                        class="form-control" id="rut_cliente" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular Cliente</label>
                                        <input type="text" value="<?php echo $celular_cliente?>"  
                                        class="form-control" id="celular_cliente" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Email Cliente</label>
                                        <input type="email" value="<?php echo $email_cliente?>"   
                                        class="form-control" id="email_cliente" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-shopping-basket"></i> Total Venta </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Monto Venta</label>
                                <input type="text" class="form-control" style="text-align: center" id="monto_venta"
                                    value="<?php echo $PRECIO_FINAL; ?>" disabled>
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
                "info": "Mostrando _START_ - _END_ de _TOTAL_ Clientes",
                "infoEmpty": "Mostrando 0 to 0 of 0 Clientes",
                "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
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

