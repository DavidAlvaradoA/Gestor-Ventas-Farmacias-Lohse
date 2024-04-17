<?php
  include('../App/config.php');
  include('../layout/sesion.php');
  include('../layout/parte1.php');
  include ('../App/controllers/categorias/listado_categorias.php');
  include ('../App/controllers/inventario/cargar_producto.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid" style="text-align: center;" style="display: flex;">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Edición de Productos </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


 
    <!-- Main content -->
    <div class="content">
      <div clas="container-fluid" >
        <div class="row" style="justify-content: center; align-items: center;">
          <div class="col-md-10">
          <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title"> Editar Productos </h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                  </div>
              </div>
              <div class="card-body" style="display: block;">
                <div class="row">
                  <div class="col-md-12">
                    <form  action="../App/controllers/inventario/update.php" method="post" enctype="multipart/form-data">
                        <input type="text" value="<?php echo $id_producto_get;?>" name="id_producto" hidden>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Codigo:</label>
                                            <input type="text" class="form-control" placeholder="Ingrese Código del producto" value="<?php echo $codigo?>" disabled>
                                            <input name="codigo_producto" type="text" value="<?php echo $codigo?>" hidden>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Categoría:</label>
                                            <div style="display: flex">
                                            <select name="id_categoria" id="" class="form-control" required>
                                              <?php
                                              foreach($datos_categorias as $datos_categoria){ 
                                                $nombre_categoria_tabla = $datos_categoria['nombre_categoria'];
                                                $id_categoria = $datos_categoria['id_categoria']?>
                                                <option value="<?php echo $id_categoria; ?>"<?php if($nombre_categoria_tabla == $nombre_categoria){ ?> selected = "selected" <?php } ?> >
                                                    <?php echo $nombre_categoria_tabla;?>
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
                                            <label for="">Usuario:</label>
                                            <input type="text" class="form-control" placeholder="Ingrese usuario" value="<?php echo $nombres_sesion;?>" disabled>
                                            <input type="text" name="id_usuario" value="<?php echo $id_usuario;?>" hidden>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre:</label>
                                            <input type="text" name="nombre_producto" class="form-control" value="<?php echo $nombre;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Descripción:</label>
                                            <textarea name="descripcion_producto" id="" cols="30" rows="1" class="form-control" required><?php echo $descripcion;?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Stock:</label>
                                            <input name="stock_producto" type="number" class="form-control" value="<?php echo $stock;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Stock mínimo:</label>
                                            <input type="number" name="stock_minimo" class="form-control" value="<?php echo $stock_minimo;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Stock máximo:</label>
                                            <input type="number" name="stock_maximo" class="form-control" value="<?php echo $stock_maximo;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Precio compra:</label>
                                            <input type="number" name="precio_compra" class="form-control" value="<?php echo $precio_compra;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Precio venta:</label>
                                            <input type="number" name="precio_venta" class="form-control" value="<?php echo $precio_venta;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Fecha Ingreso:</label>
                                            <input type="date" name="fecha_ingreso" class="form-control" value="<?php echo $fecha_ingreso;?>" required>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Imagen del Producto:</label>
                                    <input type="file" name="imagen_producto" class="form-control" id="file">
                                    <input type="text" name="image_text" value="<?php echo $imagen?>" hidden>
                                    <output id="list">
                                        <img src="<?php echo $URL."/public/img/productos/".$imagen;?>" width="100%" alt="">
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
                                                document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
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


<?php include('../layout/parte2.php');?>
<?php include('../layout/mensajes.php');?>