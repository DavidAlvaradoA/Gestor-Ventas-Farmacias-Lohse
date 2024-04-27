<?php
include ('../App/config.php');
include ('../layout/sesion.php');
include ('../layout/parte1.php');
include ('../App/controllers/inventario/listado_productos.php');
include ('../App/controllers/categorias/listado_categorias.php');
include ('../App/controllers/marcas/listado_marcas.php');
include ('../App/controllers/laboratorios/listado_laboratorios.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid" style="text-align: center;" style="display: flex;">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Registrar nuevo Producto </h1>
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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"> Registro de Productos</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
              <div class="row">
                <div class="col-md-12">
                  <form action="../App/controllers/inventario/create.php" method="post" enctype="multipart/form-data">

                    <div class="row">
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Codigo:</label>
                              <?php
                              function ceros($numero)
                              {
                                $len = 0;
                                $cantidad_ceros = 5;
                                $aux = $numero;
                                $pos = strlen($numero);
                                $len = $cantidad_ceros - $pos;
                                for ($i = 0; $i < $len; $i++) {
                                  $aux = "0" . $aux;
                                }
                                return $aux;
                              }
                              $contador_id_productos = 1;
                              foreach ($datos_productos as $datos_producto) {
                                $contador_id_productos = $contador_id_productos + 1;
                              }
                              ?>
                              <input type="text" class="form-control" placeholder="Ingrese Código del producto"
                                value="<?php echo "P-" . ceros($contador_id_productos) ?>" disabled>
                              <input name="codigo_producto" type="text"
                                value="<?php echo "P-" . ceros($contador_id_productos) ?>" hidden>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Categoría:</label>
                              <div style="display: flex">
                                <select name="id_categoria" class="form-control" required>
                                  <?php
                                  foreach ($datos_categorias as $datos_categoria) { ?>
                                    <option value="<?php echo $datos_categoria['id_categoria']; ?>">
                                      <?php echo $datos_categoria['nombre_categoria']; ?>
                                    </option>
                                    <?php
                                  }
                                  ?>
                                </select>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                  data-target="#modal-create">
                                  <i class="fa fa-plus"></i>
                                </button>
                                <!---- Modal para registrar categorias ---->

                                <div class="modal fade" id="modal-create">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header" style="background-color: #1D72F5 ;color: white">
                                        <h4 class="modal-title">Creación de Nueva Categoría</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="">Nombre Categoría <b style="color: red">*</b></label>
                                              <input type="text" id="nombre_categoria" class="form-control">
                                              <small style="color: red; display: none" id="lbl_create">* Este campo es
                                                requerido</small>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                          data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary" id="btn_create">Guardar
                                          Categoría</button>
                                        <div id="respuesta" hidden></div>
                                      </div>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                <script>
                                  $('#btn_create').click(function () {
                                    var nombre_categoria = $('#nombre_categoria').val();

                                    if (nombre_categoria == "") {
                                      $('#nombre_categoria').focus();
                                      $('#lbl_create').css('display', 'block');
                                    } else {
                                      var url = "../App/controllers/categorias/registro_categorias.php";

                                      $.get(url, { nombre_categoria: nombre_categoria }, function (datos) {
                                        $('#respuesta').html(datos);
                                      });
                                    }

                                  });
                                </script>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Marca:</label>
                              <div style="display: flex">
                                <select name="id_marca" class="form-control" required>
                                  <?php
                                  foreach ($datos_marcas as $datos_marca) { ?>
                                    <option value="<?php echo $datos_marca['id_marca']; ?>">
                                      <?php echo $datos_marca['nombre_marca']; ?>
                                    </option>
                                    <?php
                                  }
                                  ?>
                                </select>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                  data-target="#modal-marca">
                                  <i class="fa fa-plus"></i>
                                </button>
                                <!---- Modal para registrar Marcas ---->

                                <div class="modal fade" id="modal-marca">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header" style="background-color: #1D72F5 ;color: white">
                                        <h4 class="modal-title">Creación de Nueva Marca</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="">Nombre Marca <b style="color: red">*</b></label>
                                              <input type="text" id="nombre_marca" class="form-control">
                                              <small style="color: red; display: none" id="lbl_create-marca">* Este
                                                campo es
                                                requerido</small>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                          data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary" id="btn_create-marca">Guardar
                                          Marca</button>
                                        <div id="respuesta-marca" hidden></div>
                                      </div>
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->

                                <script>
                                  $('#btn_create-marca').click(function () {
                                    var nombre_marca = $('#nombre_marca').val();

                                    if (nombre_marca == "") {
                                      $('#nombre_marca').focus();
                                      $('#lbl_create-marca').css('display', 'block');
                                    } else {
                                      var url = "../App/controllers/marcas/create_marca.php";

                                      $.get(url, { nombre_marca: nombre_marca }, function (datos) {
                                        $('#respuesta-marca').html(datos);
                                      });
                                    }

                                  });
                                </script>

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
                                placeholder="Ingrese Nombre del producto" required>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Laboratorio:</label>
                              <div style="display: flex">
                                <select name="id_laboratorio" class="form-control" required>
                                  <?php
                                  foreach ($datos_laboratorios as $datos_laboratorio) { ?>
                                    <option value="<?php echo $datos_laboratorio['id_laboratorio']; ?>">
                                      <?php echo $datos_laboratorio['nombre_laboratorio']; ?>
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
                                placeholder="Ingrese Principio activo" required>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Concentración:</label>
                              <select name="concentracion" class="form-control">
                                <option value="Mg">Mg</option>
                                <option value="Gr">Gr</option>
                                <option value="Ml">Ml</option>
                              </select>
                            </div>
                            <script>
                              var concentracion = document.querySelector("#concentracion")
                              $('#concentracion').val(concentracion);
                            </script>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Forma Farmaceutica:</label>
                              <select name="forma_farmaceutica" class="form-control">
                                <option value="Forma 1">Forma 1</option>
                                <option value="Forma 2">Forma 2</option>
                              </select>
                            </div>
                            <script>
                              var forma_farmaceutica = document.querySelector("#forma_farmaceutica")
                              $('#forma_farmaceutica').val(forma_farmaceutica);
                            </script>
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
                              <input name="stock_producto" type="number" class="form-control" placeholder="Stock"
                                required>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock mínimo:</label>
                              <input type="number" name="stock_minimo" class="form-control" placeholder="Stock mínimo">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock máximo:</label>
                              <input type="number" name="stock_maximo" class="form-control" placeholder="Stock máximo">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Precio compra:</label>
                              <input type="number" name="precio_compra" class="form-control" placeholder="Precio compra"
                                required>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Precio venta:</label>
                              <input type="number" name="precio_venta" class="form-control" placeholder="Precio venta"
                                required>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Fecha Ingreso:</label>
                              <input type="date" name="fecha_ingreso" class="form-control" required>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Cantidad:</label>
                              <input type="number" name="cantidad" class="form-control" placeholder="Ingrese Cantidad"
                                required>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">N°lote:</label>
                              <input type="text" name="lote" class="form-control" placeholder="Ingrese n° de lote"
                                required>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Fecha de vencimiento:</label>
                              <input type="date" name="fecha_vencimiento" class="form-control"
                                placeholder="Ingrese Fecha de vencimiento" required>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Unidad de medida:</label>
                              <input type="number" name="unidad_medida" class="form-control"
                                placeholder="Campo Automatico">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="">Imagen del Producto:</label>
                          <input type="file" name="imagen_producto" class="form-control" id="file">

                          <output id="list"></output>
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
                      <button type="submit" class="btn btn-primary">Registrar</button>
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


<?php include ('../layout/parte2.php'); ?>
<?php include ('../layout/mensajes.php'); ?>