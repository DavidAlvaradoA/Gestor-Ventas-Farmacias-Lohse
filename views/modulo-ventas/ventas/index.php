<?php
include ('../../../App/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php');
include ('../../../App/controllers/ventas/listado_ventas.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid" style="text-align: center;" style="display: flex;">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Ventas </h1>
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
                            <h3 class="card-title">Ventas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Nro</th>
                                            <th>Nro Venta</th>
                                            <th>Productos</th>
                                            <th>Cantidad Total</th>
                                            <th>Total + IVA</th>
                                            <th>Fecha venta</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        foreach ($datos_ventas as $datos_venta) {
                                            $id_venta = $datos_venta['id_venta'] ?>
                                            <tr>
                                                <td><?php echo $contador = $contador + 1 ?></td>
                                                <td><?php echo $datos_venta['nro_venta'] ?></td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-light btn-sm" data-toggle="modal"
                                                        data-target="#modal-productos<?php echo $id_venta ?>">
                                                        <i class="fa fa-shopping-basket"></i> Detalle Productos
                                                    </button>

                                                    <!-- Modal Productos -->
                                                    <div class="modal fade" id="modal-productos<?php echo $id_venta ?>"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        Productos vendidos</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="table-responsive">
                                                                        <table
                                                                            class="table table-bordered table-sm table-hover table-stripped">
                                                                            <thead>
                                                                                <tr
                                                                                    style="background-color: #e7e7e7; text-align: center">
                                                                                    <th>Producto</th>
                                                                                    <th>Detalle</th>
                                                                                    <th>Cantidad</th>
                                                                                    <th>Valor Unitario</th>
                                                                                    <th>SubTotal</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php
                                                                                $cantidad_total = 0;
                                                                                $valor_unitario = 0;
                                                                                $suma_subtotal = 0;
                                                                                $PRECIO_FINAL = 0;
                                                                                $nro_venta = $datos_venta['nro_venta'];
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
                                                                                    $cantidad_total = $cantidad_total + $dato_carrito['cantidad_carrito'];
                                                                                    $valor_unitario = $valor_unitario + floatval($dato_carrito['precio_venta']);
                                                                                    ?>

                                                                                    <tr style="text-align: center">
                                                                                        <td>
                                                                                            <?php echo $dato_carrito['nombre_producto'] . " " . $dato_carrito['nombre_marca']; ?>
                                                                                        </td>

                                                                                        <td>
                                                                                            <?php echo $dato_carrito['cantidad'] . " " . $dato_carrito['forma_farmaceutica'] . ", " .
                                                                                                $dato_carrito['principio_activo']; ?>
                                                                                        </td>

                                                                                        <td><?php echo $dato_carrito['cantidad_carrito']; ?></td>

                                                                                        <td>
                                                                                            <span>$</span><?php echo $dato_carrito['precio_venta']; ?>
                                                                                        </td>

                                                                                        <td>
                                                                                            <span>$</span>
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
                                                                            </tbody>
                                                                        </table>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cerrar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo $cantidad_total; ?></td>
                                                <td><span>$ </span><?php echo $datos_venta['total_pagado'] ?></td>
                                                <td><?php echo $datos_venta['fecha_creacion'] ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="show.php?id=<?php echo $id_venta; ?>" type="button"
                                                            class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver
                                                        </a>
                                                        
                                                        <a href="delete.php?id=<?php echo $id_venta; ?>" type="button"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Borrar
                                                        </a>
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


<?php include ('../../../layout/parte2.php'); ?>
<?php include ('../../../layout/mensajes.php'); ?>

<script>
    $(function () {
        $("#example1").DataTable({
            /* cambio de idiomas de datatable */
            "pageLength": 10,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ - _END_ de _TOTAL_ Ventas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Ventas",
                "infoFiltered": "(Filtrado de _MAX_ total Ventas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Ventas",
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
            "buttons": [{ text: 'Copiar', extend: "copy", }, {
                extend: "csv",
            }, {
                extend: "excel",
            }, {
                extend: "pdf",
            }, {
                text: 'Imprimir', extend: "print",
            }, {
                text: 'Visor de Columnas', extend: "colvis"
            }
            ]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>