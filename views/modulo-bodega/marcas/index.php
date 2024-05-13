<?php
include ('../../../App/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php');
include ('../../../App/controllers/marcas/listado_marcas.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid" style="text-align: center;" style="display: flex;">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Listado de Marcas </h1>
          <br>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
            <i class="fa fa-plus"></i> Nueva Marca
          </button>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->



  <!-- Main content -->
  <div class="content" style="text-align: center">
    <div class="container-fluid">
      <div class="row" style="justify-content: center; align-items: center;">
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Marcas</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
              <table id="example1" class="table table-bordered table-striped table-sm">
                <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Nombre Marca</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador = 0;
                  foreach ($datos_marcas as $datos_marca) {
                    $id_marca = $datos_marca['id_marca'];
                    $nombre_marca = $datos_marca['nombre_marca'];
                    ?>
                    <tr>
                      <td><?php echo $contador = $contador + 1 ?></td>
                      <td><?php echo $datos_marca['nombre_marca'] ?></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#modal-update-marca<?php echo $id_marca; ?>">
                            <i class="fa fa-pencil-alt"></i> Editar
                          </button>
                          <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#modal-delete-marca<?php echo $id_marca; ?>">
                            <i class="fa fa-trash"></i> Borrar
                          </button>
                        </div>

                        <!---- Modal para actualizar Marcas ---->
                        <div class="modal fade" id="modal-update-marca<?php echo $id_marca; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header" style="background-color: #23AF27 ;color: white">
                                <h4 class="modal-title">Actualizar Marcas</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="">Nombre Marca <b style="color: red">*</b></label>
                                      <input type="text" id="nombre_marca<?php echo $id_marca; ?>"
                                        value="<?php echo $datos_marca['nombre_marca']; ?>" class="form-control">
                                      <small style="color: red; display: none"
                                        id="lbl_nombre<?php echo $id_marca; ?>">* Este campo es requerido</small>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success"
                                  id="btn_update<?php echo $id_marca; ?>">Actualizar Marca</button>
                                <div id="respuesta_update<?php echo $id_marca; ?>" hidden></div>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <script>
                          $('#btn_update<?php echo $id_marca; ?>').click(function () {

                            var id_marca = '<?php echo $id_marca; ?>';
                            var nombre_marca = $('#nombre_marca<?php echo $id_marca; ?>').val();
                            
                            if (nombre_marca == "") {
                              $('#nombre_marca<?php echo $id_marca; ?>').focus();
                              $('#lbl_nombre<?php echo $id_marca; ?>').css('display', 'block');

                            } else {
                              var url = "../../../App/controllers/marcas/update.php";

                              $.get(url, { nombre_marca: nombre_marca, id_marca: id_marca }, function (datos) {
                                $('#respuesta_update<?php echo $id_marca; ?>').html(datos);
                              });
                            }
                          });
                        </script>

                        <!---- Modal para eliminar Marcas ---->
                        <div class="modal fade" id="modal-delete-marca<?php echo $id_marca; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header" style="background-color: #E22C32 ;color: white">
                                <h4 class="modal-title"> ¿Esta seguro de eliminar Marca?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="">Nombre Marca <b style="color: red">*</b></label>
                                      <input type="text" id="nombre_marca<?php echo $id_marca; ?>"
                                        value="<?php echo $datos_marca['nombre_marca']; ?>" class="form-control"
                                        disabled>
                                      <small style="color: red; display: none"
                                        id="lbl_nombre<?php echo $id_marca; ?>">* Este campo es requerido</small>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger"
                                  id="btn_delete<?php echo $id_marca; ?>">Eliminar Marca</button>
                                <div id="respuesta_delete<?php echo $id_marca; ?>" hidden></div>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <script>
                          $('#btn_delete<?php echo $id_marca; ?>').click(function () {

                            var id_marca = '<?php echo $id_marca; ?>';

                            var url2 = "../../../App/controllers/marcas/delete_marca.php";

                            $.get(url2, { id_marca: id_marca }, function (datos) {
                              $('#respuesta_delete<?php echo $id_marca; ?>').html(datos);
                            });
                          });
                        </script>
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

<?php include ('../../../layout/mensajes.php'); ?>
<?php include ('../../../layout/parte2.php'); ?>

<script>
  $(function () {
    $("#example1").DataTable({
      /* cambio de idiomas de datatable */
      "pageLength": 10,
      "language": {
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ - _END_ de _TOTAL_ Marcas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Marcas",
        "infoFiltered": "(Filtrado de _MAX_ total Marcas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Marcas",
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
      },//{
        //text:'Visor de Columnas',extend:"colvis"}
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<!---- Modal para registrar Marcas ---->

<div class="modal fade" id="modal-create">
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
              <small style="color: red; display: none" id="lbl_nombre">* Este campo es requerido</small>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_create">Guardar Marca</button>
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
    var nombre_marca = $('#nombre_marca').val();


    if (nombre_marca == "") {
      $('#nombre_marca').focus();
      $('#lbl_nombre').css('display', 'block');

    } else {
      var url = "../../../App/controllers/marcas/create_marca.php";

      $.get(url, {
        nombre_marca: nombre_marca,

      }, function (datos) {
        $('#respuesta').html(datos);
      });
    }

  });
</script>