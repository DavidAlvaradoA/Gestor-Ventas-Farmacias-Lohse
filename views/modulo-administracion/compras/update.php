<?php
include ('../../../App/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php');
include ('../../../App/controllers/inventario/listado_productos.php');
include ('../../../App/controllers/proveedores/listado_proveedores.php');
include ('../../../App/controllers/compras/cargar_Compra.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid" style="text-align: center;" style="display: flex;">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar Compra N° <?php echo $nro_compra?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
        <div clas="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="row" style="justify-content: center; align-items: center;">
                        <div class="col-md-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title"> Añadir productos</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    <h5 style="text-align: center">Datos del producto</h5>
                                    <hr>
                                    <div style="display: flex ;justify-content: center; align-items: cnter;">
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#modal-buscar-producto">
                                            <i class="fa fa-search"></i>
                                            Buscar Productos
                                        </button>

                                        <!---- Modal para ver Productos ---->
                                        <div class="modal fade" id="modal-buscar-producto">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header"
                                                        style="background-color: #AEB6BF ;color: black">
                                                        <h4 class="modal-title">Búsqueda de Producto</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
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

                                                                                        var id_producto = "<?php echo $datos_producto['id_producto'] ?>";
                                                                                        $('#id_producto').val(id_producto);

                                                                                        var codigo_producto = "<?php echo $datos_producto['codigo_producto'] ?>";
                                                                                        $('#codigo_producto').val(codigo_producto);

                                                                                        var categoria = "<?php echo $datos_producto['categoria'] ?>";
                                                                                        $('#categoria').val(categoria);

                                                                                        var nombre_producto = "<?php echo $datos_producto['nombre_producto'] ?>";
                                                                                        $('#nombre_producto').val(nombre_producto);

                                                                                        var marca = "<?php echo $datos_producto['nombre_marca'] ?>";
                                                                                        $('#marca').val(marca);

                                                                                        var stock_producto = "<?php echo $datos_producto['stock_producto'] ?>";
                                                                                        $('#stock_producto').val(stock_producto);
                                                                                        $('#stock_actual').val(stock_producto);

                                                                                        var stock_minimo = "<?php echo $datos_producto['stock_minimo'] ?>";
                                                                                        $('#stock_minimo').val(stock_minimo);

                                                                                        var stock_maximo = "<?php echo $datos_producto['stock_maximo'] ?>";
                                                                                        $('#stock_maximo').val(stock_maximo);

                                                                                        var precio_compra = "<?php echo $datos_producto['precio_compra'] ?>";
                                                                                        $('#precio_compra').val(precio_compra);

                                                                                        var precio_venta = "<?php echo $datos_producto['precio_venta'] ?>";
                                                                                        $('#precio_venta').val(precio_venta);

                                                                                        var fecha_ingreso = "<?php echo $datos_producto['fecha_ingreso'] ?>";
                                                                                        $('#fecha_ingreso').val(fecha_ingreso);

                                                                                        var nombre_usuario = "<?php echo $datos_producto['nombre_usuario'] ?>";
                                                                                        $('#usuario_producto').val(nombre_usuario);

                                                                                        var ruta_img = "<?php echo $URL . "/public/img/productos/" . $datos_producto['imagen_producto']; ?>";
                                                                                        $('#imagen_producto').attr({ src: ruta_img });

                                                                                        $('#modal-buscar-producto').modal('toggle');
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
                                                                            <td><?php echo $datos_producto['nombre_usuario'], " ", $datos_producto['apellidos_usuario'] ?>
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
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>
                                    <br>
                                    <div class="row" style="font-size: 14px">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="text" value="<?= $id_producto_tabla;?>" id="id_producto" hidden>
                                                                <label for="">Codigo:</label>
                                                                <input type="text" class="form-control" value="<?= $codigo_producto; ?>"
                                                                    id="codigo_producto" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Categoría:</label>
                                                                <div style="display: flex">
                                                                    <input type="text" id="categoria" value="<?= $categoria; ?>"
                                                                        class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Registrado por:</label>
                                                                <input type="text" class="form-control"
                                                                    id="usuario_producto" disabled value="<?= $usuario; ?>">
                                                                <input type="text" name="id_usuario"
                                                                    value="<?php echo $id_usuario_sesion; ?>" hidden>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Nombre:</label>
                                                                <input type="text" name="nombre_producto" value="<?= $nombre_producto; ?>"
                                                                    class="form-control" id="nombre_producto" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Marca:</label>
                                                                <input name="marca" class="form-control" id="marca"
                                                                    value="<?= $marca; ?>"  disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Laboratorio:</label>
                                                                <input name="laboratorio" class="form-control" id="laboratorio"
                                                                    value="<?= $laboratorio; ?>"  disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock:</label>
                                                                <input name="stock_producto" type="number" value="<?= $stock; ?>"
                                                                    class="form-control" id="stock_producto" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock mínimo:</label>
                                                                <input type="number" name="stock_minimo" value="<?= $stock_minimo; ?>"
                                                                    class="form-control" id="stock_minimo" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock máximo:</label>
                                                                <input type="number" name="stock_maximo" value="<?= $stock_maximo; ?>"
                                                                    class="form-control" id="stock_maximo" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Ultima compra:</label>
                                                                <input type="number" name="precio_compra" value="<?= $precio_compra; ?>"
                                                                    class="form-control" id="precio_compra" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Precio venta:</label>
                                                                <input type="number" name="precio_venta" value="<?= $precio_venta; ?>"
                                                                    class="form-control" id="precio_venta" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Ultimo ingreso:</label>
                                                                <input type="date" name="fecha_ingreso" value="<?= $fecha_compra; ?>"
                                                                    class="form-control" style="font-size: 14px" id="fecha_ingreso" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Imagen del Producto:</label>
                                                        <img src="<?php echo $URL . "/public/img/productos/" . $imagen; ?>"
                                                            width="80%" alt="" id="imagen_producto">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h5 style="text-align: center">Datos del Proveedor</h5>
                                            <p>
                                            <div style="display: flex ;justify-content: center; align-items: cnter;">
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#modal-buscar-proveedores">
                                                    <i class="fa fa-search"></i>
                                                    Buscar Proveedor
                                                </button>
                                                <!---- Modal para ver Proveedor ---->
                                                <div class="modal fade" id="modal-buscar-proveedores">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header"
                                                                style="background-color: #AEB6BF ;color: black">
                                                                <h4 class="modal-title">Búsqueda de Proveedor</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table table-responsive">
                                                                    <table id="example2"
                                                                        class="table table-bordered table-striped table-lg">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nro</th>
                                                                                <th>Añadir</th>
                                                                                <th>Nombre Proveedor</th>
                                                                                <th>Celular</th>
                                                                                <th>Teléfono</th>
                                                                                <th>Empresa</th>
                                                                                <th>Email</th>
                                                                                <th>Dirección</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $contador = 0;
                                                                            foreach ($datos_proveedores as $datos_proveedor) {
                                                                                $id_proveedor = $datos_proveedor['id_proveedor'];
                                                                                $nombre_proveedor = $datos_proveedor['nombre_proveedor'];
                                                                                $celular = $datos_proveedor['celular'];
                                                                                $telefono = $datos_proveedor['telefono'];
                                                                                $empresa = $datos_proveedor['empresa'];
                                                                                $email = $datos_proveedor['email'];
                                                                                $direccion = $datos_proveedor['direccion'];
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $contador = $contador + 1 ?>
                                                                                    <td>
                                                                                        <button class="btn btn-info btn-sm"
                                                                                            id="btn_seleccionar_proveedor<?php echo $id_proveedor; ?>">
                                                                                            Seleccionar
                                                                                        </button>
                                                                                        <script>
                                                                                            $('#btn_seleccionar_proveedor<?php echo $id_proveedor; ?>').click(function () {

                                                                                                var id_proveedor = "<?php echo $datos_proveedor['id_proveedor'] ?>";
                                                                                                $('#id_proveedor').val(id_proveedor);

                                                                                                var nombre_proveedor = "<?php echo $datos_proveedor['nombre_proveedor'] ?>";
                                                                                                $('#nombre_proveedor').val(nombre_proveedor);

                                                                                                var celular_proveedor = "<?php echo $datos_proveedor['celular'] ?>";
                                                                                                $('#celular').val(celular_proveedor);

                                                                                                var telefono_proveedor = "<?php echo $datos_proveedor['telefono'] ?>";
                                                                                                $('#telefono').val(telefono_proveedor);

                                                                                                var email_proveedor = "<?php echo $datos_proveedor['email'] ?>";
                                                                                                $('#email').val(email_proveedor);

                                                                                                var empresa_proveedor = "<?php echo $datos_proveedor['empresa'] ?>";
                                                                                                $('#empresa').val(empresa_proveedor);

                                                                                                var direccion_proveedor = "<?php echo $datos_proveedor['direccion'] ?>";
                                                                                                $('#direccion').val(direccion_proveedor);

                                                                                                $('#modal-buscar-proveedores').modal('toggle');
                                                                                            });        
                                                                                        </script>
                                                                                    </td>
                                                                                    </td>
                                                                                    <td><?php echo $datos_proveedor['nombre_proveedor'] ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href="https://wa.me/569<?php echo $datos_proveedor['celular'] ?>"
                                                                                            class="btn btn-success btn-sm"
                                                                                            target="_blank">
                                                                                            <i class="fa fa-phone"></i>
                                                                                            <?php echo $datos_proveedor['celular'] ?>
                                                                                        </a>
                                                                                    </td>
                                                                                    <td><?php echo $datos_proveedor['telefono'] ?>
                                                                                    </td>
                                                                                    <td><?php echo $datos_proveedor['empresa'] ?>
                                                                                    </td>
                                                                                    <td><?php echo $datos_proveedor['email'] ?>
                                                                                    </td>
                                                                                    <td><?php echo $datos_proveedor['direccion'] ?>
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
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" value="<?= $id_proveedor_tabla;?>" id="id_proveedor" hidden>
                                                        <label for="">Nombre Proveedor </label>
                                                        <input type="text" id="nombre_proveedor" class="form-control" 
                                                            value="<?= $nombre_proveedor; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Celular</label>
                                                        <input type="text" id="celular" class="form-control" 
                                                            value="<?= $celular; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Teléfono</label>
                                                        <input type="text" id="telefono" class="form-control" 
                                                            value="<?= $telefono; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="text" id="email" class="form-control" 
                                                            value="<?= $email; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Empresa</label>
                                                        <input type="text" id="empresa" class="form-control" 
                                                            value="<?= $empresa; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Dirección</label>
                                                        <input type="text" id="direccion" class="form-control" 
                                                            value="<?= $direccion; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Detalle Compra</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Número de compra:</label>
                                    <input type="text" value="<?php echo $nro_compra; ?>" class="form-control"
                                        disabled>
                                    <input type="text" value="<?php echo $nro_compra; ?>" id="nro_compra" hidden>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Comprobante:<b style="color: red">*</b></label>
                                    <input type="text" class="form-control" id="comprobante" value="<?= $comprobante; ?>" required>
                                    <small style="color: red; display: none" id="lbl_comprobante">* Este campo es requerido</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Precio compra:<b style="color: red">*</b></label>
                                    <input type="number" class="form-control" id="ingreso_compra" value="<?= $precio_comprac; ?>" required>
                                    <small style="color: red; display: none" id="lbl_compra_precio">* Este campo es requerido</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Fecha de compra:<b style="color: red">*</b></label>
                                    <input type="date" class="form-control" id="fecha_compra" value="<?= $fecha_comprac; ?>" required>
                                    <small style="color: red; display: none" id="lbl_fecha_compra">* Este campo es requerido</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Ingreso stock:<b style="color: red">*</b></label>
                                    <input type="number" id="cantidad_compra" class="form-control" value="<?= $ingreso_stock; ?>" required>
                                    <small style="color: red; display: none" id="lbl_ingreso_stock">* Este campo es requerido</small>
                                </div>
                            </div>
                            <div class="row" style="margin: 1px">
                                <div class="col-md-6">
                                    <div class="form-group" style="text-align:center">
                                        <label for="">Stock Anterior:</label>
                                        <input type="text" id="stock_actual" class="form-control"
                                            value="<?= $stock= $stock-$ingreso_stock; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="text-align:center">
                                        <label for="">Stock Total:</label>
                                        <input type="number" id="stock_total" class="form-control" disabled>
                                    </div>
                                </div>
                                <script>
                                    $('#cantidad_compra').keyup(function () {
                                        sumaStock();
                                    });
                                    sumaStock();
                                    function sumaStock() {
                                        var stock_actual = $('#stock_actual').val();
                                        var stock_compra = $('#cantidad_compra').val();
                                        var total_stock = parseInt(stock_actual) + parseInt(stock_compra);
                                        $('#stock_total').val(total_stock);
                                    }
                                </script>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Usuario:</label>
                                    <input type="text" value="<?php echo $usuario; ?> <?php echo $apellidos_sesion; ?>" class="form-control"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" style="text-align:center">
                                    <button class="btn btn-success btn-block" id="btn-actualizar-compra">Actualizar
                                    compra</button>
                                    <div id="respuesta_update" hidden ></div> 
                                </div>
                            </div>
                            <script>
                                $('#btn-actualizar-compra').click(function () {

                                    var id_compra = '<?php echo $id_compra; ?>';
                                    var id_producto = $('#id_producto').val();
                                    var id_proveedor = $('#id_proveedor').val();
                                    var id_usuario = '<?php echo $id_usuario_sesion; ?>';
                                    var nro_compra = $('#nro_compra').val();
                                    var comprobante = $('#comprobante').val();
                                    var ingreso_compra = $('#ingreso_compra').val();
                                    var fecha_compra = $('#fecha_compra').val();
                                    var ingreso_stock = $('#cantidad_compra').val();
                                    var stock_total = $('#stock_total').val();

                                    if (id_producto == "") {
                                        $('#id_producto').focus();  
                                        alert("Debe seleccionar un producto");

                                    }else if(id_proveedor == "") {
                                        $('#id_proveedor').focus();
                                        alert("Debe seleccionar un Proveedor");

                                    }else if(comprobante == "") {
                                        $('#comprobante').focus();
                                        $('#lbl_comprobante').css('display','block');

                                    }else if(ingreso_compra == "") {
                                        $('#ingreso_compra').focus();
                                        $('#lbl_compra_precio').css('display','block');

                                    }else if(fecha_compra == "") {
                                        $('#fecha_compra').focus();
                                        $('#lbl_fecha_compra').css('display','block');

                                    }else if(ingreso_stock == "") {
                                        $('#cantidad_compra').focus();
                                        $('#lbl_ingreso_stock').css('display','block');
                                        
                                    } else {
                                        var url = "../../../App/controllers/compras/update.php";

                                        $.get(url, {
                                            id_compra:id_compra,
                                            nro_compra:nro_compra,
                                            fecha_compra:fecha_compra,
                                            comprobante:comprobante,
                                            ingreso_compra:ingreso_compra,
                                            ingreso_stock:ingreso_stock,
                                            id_proveedor:id_proveedor,
                                            id_producto:id_producto,
                                            id_usuario:id_usuario,
                                            stock_total:stock_total
                                        }, function (datos) {
                                            $('#respuesta_update').html(datos);
                                        });
                                    }
                                });
                            </script>
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