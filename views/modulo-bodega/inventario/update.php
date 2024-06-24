<?php
include ('../../../App/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php');
include ('../../../App/controllers/inventario/cargar_producto.php');
include ('../../../App/controllers/categorias/listado_categorias.php');
include ('../../../App/controllers/marcas/listado_marcas.php');
include ('../../../App/controllers/laboratorios/listado_laboratorios.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid" style="text-align: center;" style="display: flex;">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Actualizar <?php echo $nombre ?></h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->



  <!-- Main content -->
  <div class="content">
    <div clas="container-fluid">
      <div class="row" style="justify-content: center; align-items: center;">
        <div class="col-md-10">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title"> Actualización de Productos</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
              <div class="row">
                <div class="col-md-12">
                  <form action="../../../App/controllers/inventario/update.php" name="form" method="post"
                    enctype="multipart/form-data">
                    <input type="text" value="<?php echo $id_producto_get;?>" name="id_producto" hidden>
                    <div class="row">
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Código:</label>
                              <input type="text" class="form-control" placeholder="Ingrese Código del producto"
                                value="<?php echo $codigo ?>">
                              <input name="codigo_producto" type="text" value="<?php echo $codigo ?>" hidden>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Categoría:</label>
                              <div style="display: flex">
                                <select name="id_categoria" id="" class="form-control" required>
                                  <?php
                                  foreach ($datos_categorias as $datos_categoria) {
                                    $nombre_categoria_tabla = $datos_categoria['nombre_categoria'];
                                    $id_categoria = $datos_categoria['id_categoria'] ?>
                                    <option value="<?php echo $id_categoria; ?>" <?php if ($nombre_categoria_tabla == $nombre_categoria) { ?> selected="selected" <?php } ?>>
                                      <?php echo $nombre_categoria_tabla; ?>
                                    </option>
                                    <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Marca:</label>
                              <div style="display: flex">
                                <select name="id_marca" id="" class="form-control" required>
                                  <?php
                                  foreach ($datos_marcas as $datos_marca) {
                                    $nombre_marca_tabla = $datos_marca['nombre_marca'];
                                    $id_marca = $datos_marca['id_marca'] ?>
                                    <option value="<?php echo $id_marca; ?>" <?php if ($nombre_marca_tabla == $nombre_marca) { ?> selected="selected" <?php } ?>>
                                      <?php echo $nombre_marca_tabla; ?>
                                    </option>
                                    <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                            <input type="text" name="id_usuario" value="<?php echo $id_usuario_sesion; ?>" hidden>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Nombre:</label>
                              <input type="text" name="nombre_producto" class="form-control"
                                value="<?php echo $nombre; ?>" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Laboratorio:</label>
                              <div style="display: flex">
                                <select name="id_laboratorio" id="" class="form-control" required>
                                  <?php
                                  foreach ($datos_laboratorios as $datos_laboratorio) {
                                    $nombre_laboratorio_tabla = $datos_laboratorio['nombre_laboratorio'];
                                    $id_laboratorio = $datos_laboratorio['id_laboratorio'] ?>
                                    <option value="<?php echo $id_laboratorio; ?>" <?php if ($nombre_laboratorio_tabla == $nombre_laboratorio) { ?> selected="selected" <?php } ?>>
                                      <?php echo $nombre_laboratorio_tabla; ?>
                                    </option>
                                    <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Principio Activo:</label>
                              <input type="text" name="principio_activo" class="form-control"
                                value="<?php echo $principio_activo; ?>" required>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Concentración:</label>
                              <input value="<?php echo $concentracion; ?>" type="text" 
                                name="concentracion" class="form-control" placeholder="Concentración">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Forma Farmacéutica:</label>
                              <input type="text" value="<?php echo $forma_farmaceutica; ?>" 
                                name="forma_farmaceutica" class="form-control" placeholder="Forma Farmacéutica">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Bioequivalente:</label>
                              <select name="bioequivalente" class="form-control">
                                <option value="SI">Si</option>
                                <option value="NO">No</option>
                              </select>
                            </div>
                            <script>
                              var bioequivalente = document.querySelector("#bioequivalente")
                              $('#bioequivalente').val(bioequivalente);
                            </script>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Petitorio:</label>
                              <select name="petitorio" class="form-control">
                                <option value="SI">Si</option>
                                <option value="NO">No</option>
                              </select>
                            </div>
                            <script>
                              var petitorio = document.querySelector("#petitorio")
                              $('#petitorio').val(petitorio);
                            </script>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock:</label>
                              <input name="stock_producto" type="number" class="form-control"
                                value="<?php echo $stock; ?>" required>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock mínimo:</label>
                              <input type="number" name="stock_minimo" class="form-control"
                                value="<?php echo $stock_minimo; ?>">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock máximo:</label>
                              <input type="number" name="stock_maximo" class="form-control"
                                value="<?php echo $stock_maximo; ?>">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Precio compra:</label>
                              <input type="number" name="precio_compra" class="form-control"
                                value="<?php echo $precio_compra; ?>" required>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Precio venta:</label>
                              <input type="number" name="precio_venta" class="form-control"
                                value="<?php echo $precio_venta; ?>" required>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Fecha Ingreso:</label>
                              <input type="date" name="fecha_ingreso" class="form-control"
                                value="<?php echo $fecha_ingreso; ?>" required>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Cantidad Unitaria:</label>
                              <input type="number" name="cantidad" class="form-control" placeholder="Ingrese cantidad"
                                value="<?php echo $cantidad; ?>" required>
                            </div>
                          </div>
                          
                          <script>
                            document.addEventListener("DOMContentLoaded", function () {
                              var cantidadInput = document.getElementsByName("cantidad")[0];
                              var precioVentaInput = document.getElementsByName("precio_venta")[0];
                              var unidadMedida = document.getElementsByName("unidad_medida")[0];

                              cantidadInput.addEventListener("keyup", function () {
                                var precioVenta = parseFloat(precioVentaInput.value);
                                var cantidad = parseFloat(cantidadInput.value);

                                if (!isNaN(precioVenta) && !isNaN(cantidad) && cantidad !== 0) {
                                  var unidadMedidaCalculo = Math.round(precioVenta / cantidad);
                                  unidadMedida.value = unidadMedidaCalculo;
                                }
                              });
                            });
                          </script>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">N°lote:</label>
                              <input type="text" name="lote" class="form-control" placeholder="Ingrese n° de lote"
                                value="<?php echo $lote; ?>" required>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Fecha de vencimiento:</label>
                              <input type="date" name="fecha_vencimiento" class="form-control"
                                placeholder="Ingrese Fecha de vencimiento" value="<?php echo $fecha_vencimiento; ?>"
                                required>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Unidad de medida:</label>
                              <input type="number" name="unidad_medida" class="form-control campo-moneda"
                                placeholder="Campo automático" value="<?php echo $unidad_medida; ?>" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="">Imagen del Producto:</label>
                          <input type="file" name="imagen_producto" class="form-control" id="file">
                          <input type="text" name="image_text" value="<?php echo $imagen ?>" hidden>
                          <output id="list">
                            <img src="<?php echo $URL . "/public/img/productos/" . $imagen; ?>" width="100%" alt="">
                          </output>
                          <script>
                            function archivo(evt) {
                              var files = evt.target.files; // FileList object
                              // Obtenemos la imagen del campo "file".
                              for (var i = 0, f; f = files[i]; i++) {
                                //Solo admitimos imágenes.
                                if (!f.type.match('image.*')) {
                                  continue;
                                }
                                var reader = new FileReader();
                                reader.onload = (function (theFile) {
                                  return function (e) {
                                    // Insertamos la imagen
                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                  };
                                })(f);
                                reader.readAsDataURL(f);
                              }
                            }
                            document.getElementById('file').addEventListener('change', archivo, false);
                          </script>

                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <a href="index.php" class="btn btn-secondary">Cancelar</a>
                      <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                  </form>
                </div>
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