<?php
include ('../../../App/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php');
include ('../../../App/controllers/ventas/listado_ventas.php');
include ('../../../App/controllers/inventario/listado_productos.php');
include ('../../../App/controllers/clientes/listado_clientes.php');

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
                                                <table id="example1" style="text-align: center"
                                                    class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Añadir</th>
                                                            <th>Código</th>
                                                            <th>Nombre</th>
                                                            <th>Marca</th>
                                                            <th>Principio</th>
                                                            <th>Concentración</th>
                                                            <th>Forma</th>
                                                            <th>Bioequivalente</th>
                                                            <th>Petitorio</th>
                                                            <th>Comprimidos</th>
                                                            <th>Medida</th>
                                                            <th>Precio</th>
                                                            <th>Vencimiento</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($datos_productos as $datos_producto) {
                                                            $id_producto = $datos_producto['id_producto'] ?>
                                                            <tr>
                                                                <td>
                                                                    <button class="btn btn-info btn-sm"
                                                                        id="btn_seleccionar<?php echo $id_producto; ?>">
                                                                        Seleccionar
                                                                    </button>
                                                                    <script>
                                                                        $('#btn_seleccionar<?php echo $id_producto; ?>').click(function () {

                                                                            var id_producto = "<?php echo $id_producto; ?>";
                                                                            $('#id_producto').val(id_producto);

                                                                            var producto = "<?php echo $datos_producto['nombre_producto'] ?>";
                                                                            $('#producto').val(producto);

                                                                            var marca = "<?php echo $datos_producto['nombre_marca'] ?>";
                                                                            $('#detalle').val(marca);

                                                                            var precio_venta = "<?php echo $datos_producto['precio_venta'] ?>";
                                                                            $('#precio_venta').val(precio_venta);
                                                                            $('#cantidad').focus();


                                                                            //$('#modal-buscar-producto').modal('toggle');
                                                                        });        
                                                                    </script>
                                                                </td>
                                                                <td><?php echo $datos_producto['codigo_producto'] ?></td>
                                                                <td><?php echo $datos_producto['nombre_producto'] ?></td>
                                                                <td><?php echo $datos_producto['nombre_marca'] ?> </td>
                                                                <td><?php echo $datos_producto['principio_activo'] ?></td>
                                                                <td><?php echo $datos_producto['concentracion'] ?> </td>
                                                                <td><?php echo $datos_producto['forma_farmaceutica'] ?>
                                                                </td>
                                                                <td><?php echo $datos_producto['bioequivalente'] ?> </td>
                                                                <td><?php echo $datos_producto['petitorio'] ?> </td>
                                                                <td><?php echo $datos_producto['cantidad'] ?> </td>
                                                                <td><?php echo $datos_producto['unidad_medida'] ?> </td>
                                                                <td><?php echo $datos_producto['precio_venta'] ?></td>
                                                                <td><?php echo $datos_producto['fecha_vencimiento'] ?> </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <input type="text" id="id_producto" hidden>
                                                            <label for="">Producto</label>
                                                            <input type="text" id="producto" class="form-control"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="">Detalle</label>
                                                            <input type="text" id="detalle" class="form-control"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio</label>
                                                            <input type="text" id="precio_venta" class="form-control"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Cantidad</label>
                                                            <input type="text" id="cantidad" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button style="float: right" id="btn_agregar"
                                                    class="btn btn-primary">Agregar Producto</button>
                                                <div id="respuesta_carrito"></div>
                                                <script>
                                                    $('#btn_agregar').click(function () {
                                                        var nro_venta = '<?php echo $contador_ventas + 1; ?>';
                                                        var id_producto = $('#id_producto').val();
                                                        var cantidad = $('#cantidad').val();

                                                        if (id_producto == "") {
                                                            alert("Debe llenar los campos...");
                                                        } else if (cantidad == "") {
                                                            alert("Debe Ingresar la cantidad...")
                                                        } else {
                                                            var url = "../../../App/controllers/ventas/agregar_carrito.php";

                                                            $.get(url, {
                                                                nro_venta: nro_venta,
                                                                id_producto: id_producto,
                                                                cantidad: cantidad
                                                            }, function (datos) {
                                                                $('#respuesta_carrito').html(datos);
                                                            });
                                                        }
                                                    });
                                                </script>
                                                <br>
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
                                        <tr style="background-color: #e7e7e7; text-align: center">
                                            <th>Nro</th>
                                            <th>Producto</th>
                                            <th>Detalle</th>
                                            <th>Cantidad</th>
                                            <th>Valor Unitario</th>
                                            <th>SubTotal</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador_carrito = 0;
                                        $cantidad_total = 0;
                                        $valor_unitario = 0;
                                        $suma_subtotal = 0;
                                        $PRECIO_FINAL = 0;
                                        $nro_venta = $contador_ventas + 1;
                                        $sql_carrito = "SELECT *, CAR.cantidad as cantidad_carrito , 
                                            MAR.nombre_marca as nombre_marca, PRO.precio_venta as precio_venta
                                            FROM carrito AS CAR INNER JOIN inventario AS PRO 
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
                                                <td><?php echo $contador_carrito; ?></td>
                                                <td><?php echo $dato_carrito['nombre_producto'] . " " . $dato_carrito['nombre_marca']; ?>
                                                </td>
                                                <td><?php echo $dato_carrito['cantidad'] . " " . $dato_carrito['forma_farmaceutica'] . ", " .
                                                    $dato_carrito['principio_activo']; ?></td>
                                                <td><?php echo $dato_carrito['cantidad_carrito']; ?></td>
                                                <td><?php echo $dato_carrito['precio_venta']; ?></td>
                                                <td><?php
                                                $cantidad = floatval($dato_carrito['cantidad_carrito']);
                                                $precio_venta = floatval($dato_carrito['precio_venta']);
                                                echo $subtotal = $cantidad * $precio_venta;
                                                $suma_subtotal = $suma_subtotal + $subtotal;
                                                $IVA = $suma_subtotal * 0.19;
                                                $PRECIO_FINAL = round($suma_subtotal + $IVA);
                                                ?>
                                                </td>
                                                <td>
                                                    <form action="../../../App/controllers/ventas/eliminar_carrito.php"
                                                        method="post">
                                                        <input type="text" name="id_carrito"
                                                            value="<?php echo $id_carrito ?>" hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <tr style="text-align: center">
                                            <th colspan="3" style="background-color: #e7e7e7; text-align: right">Total
                                            </th>
                                            <th><?php echo $cantidad_total; ?></th>
                                            <th><?php echo $valor_unitario; ?></th>
                                            <th><?php echo $suma_subtotal; ?></th>
                                        </tr>
                                        <tr style="text-align: center; background-color: #e7e7e7">
                                            <th colspan="3" style="text-align: right">Total + IVA(19%)</th>
                                            <th></th>
                                            <th></th>
                                            <th><?php echo $PRECIO_FINAL; ?></th>
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
                        <div class="card-body">
                            <b>Clientes</b>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#modal-buscar-cliente">
                                <i class="fa fa-search"></i>
                                Buscar Clientes
                            </button>
                            <!---- Modal para Buscar Clientes ---->
                            <div class="modal fade" id="modal-buscar-cliente">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #AEB6BF ;color: black">
                                            <h4 class="modal-title">Búsqueda de Cliente</h4>
                                            <div style="width: 10px"></div>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal-agregar-cliente">
                                                <i class="fa fa-users"></i>
                                                Nuevo cliente
                                            </button>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="example2" style="text-align: center"
                                                    class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>Añadir</th>
                                                            <th>Nombre Cliente</th>
                                                            <th>Rut</th>
                                                            <th>Celular</th>
                                                            <th>Email</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($datos_clientes as $datos_cliente) {
                                                            $id_cliente = $datos_cliente['id_cliente'] ?>
                                                            <tr>
                                                                <td>
                                                                    <button class="btn btn-info btn-sm"
                                                                        id="btn_seleccionar_cliente<?php echo $id_cliente; ?>">
                                                                        Seleccionar
                                                                    </button>
                                                                    <script>
                                                                        $('#btn_seleccionar_cliente<?php echo $id_cliente; ?>').click(function () {

                                                                            var id_cliente = '<?php echo $datos_cliente['id_cliente'] ?>';
                                                                            $('#id_cliente').val(id_cliente);

                                                                            var nombre_cliente = '<?php echo $datos_cliente['nombre_cliente'] ?>';
                                                                            $('#nombre_cliente').val(nombre_cliente);

                                                                            var rut_cliente = '<?php echo $datos_cliente['rut_cliente'] ?>';
                                                                            $('#rut_cliente').val(rut_cliente);

                                                                            var celular_cliente = '<?php echo $datos_cliente['celular_cliente'] ?>';
                                                                            $('#celular_cliente').val(celular_cliente);

                                                                            var email_cliente = '<?php echo $datos_cliente['email_cliente'] ?>';
                                                                            $('#email_cliente').val(email_cliente);

                                                                            $('#modal-buscar-cliente').modal('toggle');

                                                                        })
                                                                    </script>
                                                                </td>
                                                                <td><?php echo $datos_cliente['nombre_cliente']; ?></td>
                                                                <td><?php echo $datos_cliente['rut_cliente']; ?></td>
                                                                <td><?php echo $datos_cliente['celular_cliente']; ?></td>
                                                                <td><?php echo $datos_cliente['email_cliente']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <br><br>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" id="id_cliente" hidden>
                                        <label for="">Nombre Cliente</label>
                                        <input type="text" class="form-control" id="nombre_cliente">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Rut Cliente</label>
                                        <input type="text" class="form-control" id="rut_cliente">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular Cliente</label>
                                        <input type="text" class="form-control" id="celular_cliente">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Email Cliente</label>
                                        <input type="email" class="form-control" id="email_cliente">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-shopping-basket"></i> Registrar Venta </h3>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Monto Efectivo</label>
                                        <input type="text" id="monto_efectivo" class="form-control"
                                            style="text-align: center">
                                        <script>
                                            $('#monto_efectivo').keyup(function () {
                                                var monto_venta = $('#monto_venta').val();
                                                var monto_efectivo = $('#monto_efectivo').val();
                                                var vuelto = parseFloat(monto_efectivo) - parseFloat(monto_venta);
                                                $('#vuelto_venta').val(vuelto);
                                            })
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Vuelto</label>
                                        <input type="text" id="vuelto_venta" class="form-control"
                                            style="text-align: center" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" id="btn-registrar-venta">Registrar
                                    Venta</button>
                                <script>
                                        % ('#btn-registrar-venta').click(function () {
                                            var nro_venta = '<?php echo $contador_ventas + 1; ?>';
                                            var id_cliente = $('#id_cliente').val();
                                            var id_cliente = $('#monto_venta').val();

                                        })
                                </script>
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


<!---- Modal para registrar Clientes ---->
<div class="modal fade" id="modal-agregar-cliente">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #AEB6BF ;color: black">
                <h4 class="modal-title">Registrar nuevo Cliente</h4>
                <div style="width: 10px"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../../../App/controllers/clientes/registrar_clientes.php" method="post">
                    <div class="form-group">
                        <label for="">Nombre cliente</label>
                        <input type="text" name="nombre_cliente" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Rut cliente</label>
                        <input type="text" name="rut_cliente" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Celular cliente</label>
                        <input type="text" name="celular_cliente" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email cliente</label>
                        <input type="email" name="email_cliente" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn btn-block" >Registrar cliente</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->