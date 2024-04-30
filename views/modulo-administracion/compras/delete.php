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
                    <h1 class="m-0"> Compra N° <?php echo $nro_compra ?></h1>
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
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Eliminar compra</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body" style="display: block;">
                                    <h5 style="text-align: center">Datos del producto</h5>
                                    <hr>
                                    <div class="row" style="font-size: 14px">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="text" value="<?php echo $id_producto_tabla; ?>"
                                                                    id="id_producto" hidden>
                                                                <label for="">Codigo:</label>
                                                                <input type="text" class="form-control"
                                                                    value="<?= $codigo_producto ?>" id="codigo_producto"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Categoría:</label>
                                                                <div style="display: flex">
                                                                    <input type="text" id="categoria"
                                                                        value="<?= $categoria ?>" class="form-control"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Registro por:</label>
                                                                <input type="text" class="form-control"
                                                                    id="usuario_producto" disabled
                                                                    value="<?= $usuario ?>">
                                                                <input type="text" name="id_usuario"
                                                                    value="<?php echo $id_usuario_sesion; ?>" hidden>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Nombre:</label>
                                                                <input type="text" name="nombre_producto"
                                                                    value="<?= $nombre_producto ?>" class="form-control"
                                                                    id="nombre_producto" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Marca:</label>
                                                                <input name="nombre_marca" class="form-control"
                                                                    id="nombre_marca" value="<?= $marca ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Laboratorio:</label>
                                                                <input name="nombre_laboratorio" class="form-control"
                                                                    id="nombre_laboratorio" value="<?= $laboratorio ?>"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock:</label>
                                                                <input name="stock_producto" type="number"
                                                                    value="<?= $stock ?>" class="form-control"
                                                                    id="stock_producto" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock mínimo:</label>
                                                                <input type="number" name="stock_minimo"
                                                                    value="<?= $stock_minimo ?>" class="form-control"
                                                                    id="stock_minimo" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock máximo:</label>
                                                                <input type="number" name="stock_maximo"
                                                                    value="<?= $stock_maximo ?>" class="form-control"
                                                                    id="stock_maximo" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Ultima compra:</label>
                                                                <input type="number" name="precio_compra"
                                                                    value="<?= $precio_compra ?>" class="form-control"
                                                                    id="precio_compra" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Precio venta:</label>
                                                                <input type="number" name="precio_venta"
                                                                    value="<?= $precio_venta ?>" class="form-control"
                                                                    id="precio_venta" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Ultimo ingreso:</label>
                                                                <input type="date" name="fecha_ingreso"
                                                                    value="<?= $fecha_compra ?>" class="form-control"
                                                                    id="fecha_ingreso" disabled>
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
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" id="id_proveedor" hidden>
                                                        <label for="">Nombre Proveedor <b
                                                                style="color: red">*</b></label>
                                                        <input type="text" id="nombre_proveedor" class="form-control"
                                                            value="<?= $nombre_proveedor ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Celular <b style="color: red">*</b></label>
                                                        <input type="text" id="celular" class="form-control"
                                                            value="<?= $celular ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Teléfono </label>
                                                        <input type="text" id="telefono" class="form-control"
                                                            value="<?= $telefono ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Email <b style="color: red">*</b></label>
                                                        <input type="text" id="email" class="form-control"
                                                            value="<?= $email ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Empresa <b style="color: red">*</b></label>
                                                        <input type="text" id="empresa" class="form-control"
                                                            value="<?= $empresa ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Dirección <b style="color: red">*</b></label>
                                                        <input type="text" id="direccion" class="form-control"
                                                            value="<?= $direccion ?>" disabled>

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
                    <div class="card card-outline card-danger">
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
                                    <input style="text-align: center" type="text" value="<?php echo $nro_compra; ?>"
                                        class="form-control" disabled>
                                    <input type="text" value="<?php echo $id_compra_get; ?>" id="nro_compra" hidden>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Comprobante:</label>
                                    <input style="text-align: center" type="text" class="form-control" id="comprobante"
                                        value="<?= $comprobante ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Precio compra:</label>
                                    <input style="text-align: center" type="number" class="form-control"
                                        id="ingreso_compra" value="<?= $precio_comprac ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Fecha de compra:</label>
                                    <input style="text-align: center" type="date" class="form-control" id="fecha_compra"
                                        value="<?= $fecha_compra ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Ingreso stock:</label>
                                    <input style="text-align: center" type="number" 
                                        class="form-control" value="<?= $ingreso_stock ?>" disabled>
                                </div>
                            </div>
                            <div class="row" style="margin: 1px">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Ingresada por:</label>
                                        <input style="text-align: center" type="text"
                                            value="<?php echo $nombres_sesion, " ", $apellidos_sesion; ?>"
                                            class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-danger btn-block" id="btn_eliminar"><i
                                            class="fa fa-trash"></i> Eliminar compra
                                        </button>
                                    </div>
                                </div>
                                <div id="respuesta_delete"></div>

                                <script>
                                    $('#btn_eliminar').click(function () {
                                        var id_compra = '<?php echo $id_compra_get; ?>';
                                        var id_producto = $('#id_producto').val();
                                        var cantidad_compra = '<?= $ingreso_stock; ?>';
                                        var stock_actual = '<?= $stock; ?>';

                                        Swal.fire({
                                            title: '¿Está seguro de eliminar la compra?',
                                            icon: 'question',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Si, deseo eliminar'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                Swal.fire(
                                                    eliminar(),
                                                    'Compra eliminada',
                                                    'success'

                                                )
                                            }
                                        });

                                        function eliminar() {
                                            var url = "../../../App/controllers/compras/delete_compra.php";
                                            $.get(url, {
                                                id_compra: id_compra,
                                                id_producto: id_producto,
                                                cantidad_compra: cantidad_compra,
                                                stock_actual: stock_actual
                                            }, function (datos) {
                                                $('#respuesta_delete').html(datos);
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