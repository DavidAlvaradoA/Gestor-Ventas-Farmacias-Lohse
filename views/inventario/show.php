<?php
include ('../../App/config.php');
include ('../../layout/sesion.php');
include ('../../layout/parte1.php');
include ('../../App/controllers/inventario/cargar_producto.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid" style="text-align: center;" style="display: flex;">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0"> Detalle Producto
            <hr style="width: 200px">
            <h5> <b> <?php echo $nombre; ?> </b> </h5>
          </h1>
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
                  <form enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Codigo:</label>
                              <input type="text" class="form-control" value="<?php echo $codigo; ?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Categoría:</label>
                              <div style="display: flex">
                                <input type="text" value="<?php echo $nombre_categoria; ?>" class="form-control"
                                  disabled>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Marca:</label>
                              <div style="display: flex">
                                <input type="text" value="<?php echo $nombre_marca; ?>" class="form-control" disabled>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Nombre:</label>
                              <input type="text" name="nombre_producto" class="form-control"
                                value="<?php echo $nombre; ?>" disabled>
                            </div>

                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Laboratorio:</label>
                              <input type="text" name="laboratorio" class="form-control"
                                value="<?php echo $nombre_laboratorio; ?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Principio Activo:</label>
                              <input type="text" name="principio_activo" class="form-control"
                                value="<?php echo $principio_activo; ?>" disabled>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Concentración:</label>
                              <input type="text" name="concentracion" class="form-control"
                                value="<?php echo $concentracion; ?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Forma Farmaceutica:</label>
                              <input type="text" name="forma_farmaceutica" class="form-control"
                                value="<?php echo $forma_farmaceutica; ?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Bioequivalente:</label>
                              <input type="text" name="bioequivalente" class="form-control"
                                value="<?php echo $bioequivalente; ?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Petitorio:</label>
                              <input type="text" name="petitorio" class="form-control"
                                value="<?php echo $petitorio; ?>" disabled>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock:</label>
                              <input name="stock_producto" type="number" class="form-control" value="<?php echo $stock;?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock mínimo:</label>
                              <input type="number" name="stock_minimo" class="form-control" value="<?php echo $stock_minimo;?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Stock máximo:</label>
                              <input type="number" name="stock_maximo" class="form-control" value="<?php echo $stock_maximo;?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Precio compra:</label>
                              <input type="number" name="precio_compra" class="form-control" value="<?php echo $precio_compra;?>" disabled>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Precio venta:</label>
                              <input type="number" name="precio_venta" class="form-control" value="<?php echo $precio_venta;?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="">Fecha Ingreso:</label>
                              <input type="date" name="fecha_ingreso" class="form-control" value="<?php echo $fecha_ingreso;?>" disabled>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Cantidad:</label>
                              <input type="number" name="cantidad" class="form-control" value="<?php echo $cantidad;?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">N°lote:</label>
                              <input type="number" name="lote" class="form-control" value="<?php echo $lote;?>" disabled>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Fecha de vencimiento:</label>
                              <input type="date" name="fecha_vencimiento" class="form-control" value="<?php echo $fecha_vencimiento;?>" disabled>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="">Unidad de medida:</label>
                              <input type="number" name="unidad_medida" class="form-control" value="<?php echo $unidad_medida;?>" disabled>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Imagen del Producto:</label>       
                        <img src="<?php echo $URL."/public/img/productos/".$imagen;?>" width="100%" alt="">
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <a href="index.php" class="btn btn-secondary">Volver</a>
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


<?php include ('../../layout/parte2.php'); ?>
<?php include ('../../layout/mensajes.php'); ?>