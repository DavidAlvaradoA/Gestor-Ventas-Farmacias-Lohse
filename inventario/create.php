<?php
  include('../App/config.php');
  include('../layout/sesion.php');
  include('../layout/parte1.php');
  include ('../App/controllers/inventario/listado_productos.php');
  include ('../App/controllers/categorias/listado_categorias.php');

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
      <div clas="container-fluid" >
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
                    <form  action="../App/controllers/inventario/create.php" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Codigo:</label>
                                            <?php 
                                              function ceros($numero){
                                                $len=0;
                                                $cantidad_ceros = 5;
                                                $aux=$numero;
                                                $pos=strlen($numero);
                                                $len=$cantidad_ceros-$pos;
                                                for ($i=0;$i<$len;$i++){
                                                    $aux="0".$aux;
                                                }
                                                return $aux;
                                            }
                                            $contador_id_productos = 1;
                                            foreach($datos_productos as $datos_producto) {  
                                              $contador_id_productos = $contador_id_productos +1;
                                            }
                                            ?>
                                            <input type="text" class="form-control" placeholder="Ingrese Código del producto" value="<?php echo "P-".ceros($contador_id_productos)?>" disabled>
                                            <input name="codigo_producto" type="text" value="<?php echo "P-".ceros($contador_id_productos)?>" hidden>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Categoría:</label>
                                            <div style="display: flex">
                                            <select name="id_categoria" id="" class="form-control" required>
                                              <?php
                                              foreach($datos_categorias as $datos_categoria){ ?>
                                                <option value="<?php echo $datos_categoria['id_categoria'];?>">
                                                  <?php echo $datos_categoria['nombre_categoria'];?>
                                                </option>
                                              <?php
                                              }
                                              ?>
                                            </select>
                                            <a href="<?php echo $URL;?>/categorias" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Usuario:</label>
                                            <input type="text" class="form-control" placeholder="Ingrese usuario" value="<?php echo $nombres_sesion;?>" disabled>
                                            <input type="text" name="id_usuario" value="<?php echo $id_usuario_sesion;?>" hidden>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre:</label>
                                            <input type="text" name="nombre_producto" class="form-control" placeholder="Ingrese Nombre del producto" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Descripción:</label>
                                            <textarea name="descripcion_producto" id="" cols="30" rows="1" class="form-control" placeholder="Ingrese descripción del Producto" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Stock:</label>
                                            <input name="stock_producto" type="number" class="form-control" placeholder="Stock" required>
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
                                            <input type="number" name="precio_compra" class="form-control" placeholder="Precio compra" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Precio venta:</label>
                                            <input type="number" name="precio_venta" class="form-control" placeholder="Precio venta" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Fecha Ingreso:</label>
                                            <input type="date" name="fecha_ingreso" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Imagen del Producto:</label>
                                    <input type="file" name="imagen_producto" class="form-control" id="file" >
                                   
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


<?php include('../layout/parte2.php');?>
<?php include('../layout/mensajes.php');?>