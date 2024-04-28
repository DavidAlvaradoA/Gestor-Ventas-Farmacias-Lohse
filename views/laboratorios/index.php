<?php
include ('../../App/config.php');
include ('../../layout/sesion.php');
include ('../../layout/parte1.php');
include ('../../App/controllers/laboratorios/listado_laboratorios.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid" style="text-align: center;" style="display: flex;">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Listado de Laboratorios </h1>
          <br>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-laboratorio">
            <i class="fa fa-plus"></i> Nuevo Laboratorio
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
              <h3 class="card-title">Laboratorios</h3>
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
                    <th>Nombre Laboratorio</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador = 0;
                  foreach ($datos_laboratorios as $datos_laboratorio) {
                    $id_laboratorio = $datos_laboratorio['id_laboratorio'];
                    $nombre_laboratorio = $datos_laboratorio['nombre_laboratorio'];
                    ?>
                    <tr>
                      <td><?php echo $contador = $contador + 1 ?></td>
                      <td><?php echo $datos_laboratorio['nombre_laboratorio'] ?></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#modal-update-laboratorio<?php echo $id_laboratorio; ?>">
                            <i class="fa fa-pencil-alt"></i> Editar
                          </button>
                          <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#modal-delete-laboratorio<?php echo $id_laboratorio; ?>">
                            <i class="fa fa-trash"></i> Borrar
                          </button>
                        </div>

                        <!---- Modal para actualizar Laboratorios ---->
                        <div class="modal fade" id="modal-update-laboratorio<?php echo $id_laboratorio; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header" style="background-color: #23AF27 ;color: white">
                                <h4 class="modal-title">Actualizar Laboratorios</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="">Nombre Laboratorio <b style="color: red">*</b></label>
                                      <input type="text" id="nombre_laboratorio<?php echo $id_laboratorio; ?>"
                                        value="<?php echo $datos_laboratorio['nombre_laboratorio']; ?>" class="form-control">
                                      <small style="color: red; display: none"
                                        id="lbl_nombre<?php echo $id_laboratorio; ?>">* Este campo es requerido</small>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success"
                                  id="btn_update<?php echo $id_laboratorio; ?>">Actualizar Laboratorio</button>
                                <div id="respuesta_update<?php echo $id_laboratorio; ?>" hidden></div>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <script>
                          $('#btn_update<?php echo $id_laboratorio; ?>').click(function () {

                            var id_laboratorio = '<?php echo $id_laboratorio; ?>';
                            var nombre_laboratorio = $('#nombre_laboratorio<?php echo $id_laboratorio; ?>').val();
                            
                            if (nombre_laboratorio == "") {
                              $('#nombre_laboratorio<?php echo $id_laboratorio; ?>').focus();
                              $('#lbl_nombre<?php echo $id_laboratorio; ?>').css('display', 'block');

                            } else {
                              var url = "../../App/controllers/laboratorios/update.php";

                              $.get(url, { nombre_laboratorio: nombre_laboratorio, id_laboratorio: id_laboratorio }, function (datos) {
                                $('#respuesta_update<?php echo $id_laboratorio; ?>').html(datos);
                              });
                            }
                          });
                        </script>

                        <!---- Modal para eliminar Laboratorios ---->
                        <div class="modal fade" id="modal-delete-laboratorio<?php echo $id_laboratorio; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header" style="background-color: #E22C32 ;color: white">
                                <h4 class="modal-title"> ¿Esta seguro de eliminar Laboratorio?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="">Nombre Laboratorio <b style="color: red">*</b></label>
                                      <input type="text" id="nombre_laboratorio<?php echo $id_laboratorio; ?>"
                                        value="<?php echo $datos_laboratorio['nombre_laboratorio']; ?>" class="form-control"
                                        disabled>
                                      <small style="color: red; display: none"
                                        id="lbl_nombre<?php echo $id_laboratorio; ?>">* Este campo es requerido</small>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger"
                                  id="btn_delete<?php echo $id_laboratorio; ?>">Eliminar Laboratorio</button>
                                <div id="respuesta_delete<?php echo $id_laboratorio; ?>" hidden></div>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <script>
                          $('#btn_delete<?php echo $id_laboratorio; ?>').click(function () {

                            var id_laboratorio = '<?php echo $id_laboratorio; ?>';

                            var url2 = "../../App/controllers/laboratorios/delete_laboratorio.php";

                            $.get(url2, { id_laboratorio: id_laboratorio }, function (datos) {
                              $('#respuesta_delete<?php echo $id_laboratorio; ?>').html(datos);
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

<?php include ('../../layout/mensajes.php'); ?>
<?php include ('../../layout/parte2.php'); ?>

<script>
  $(function () {
    $("#example1").DataTable({
      /* cambio de idiomas de datatable */
      "pageLength": 10,
      "language": {
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ - _END_ de _TOTAL_ Laboratorios",
        "infoEmpty": "Mostrando 0 to 0 of 0 Laboratorios",
        "infoFiltered": "(Filtrado de _MAX_ total Laboratorios)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Laboratorios",
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
      },//{
        //text:'Visor de Columnas',extend:"colvis"}
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<!---- Modal para registrar Laboratorios ---->

<div class="modal fade" id="modal-create-laboratorio">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #1D72F5 ;color: white">
        <h4 class="modal-title">Creación de Nuevo Laboratorio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Nombre Laboratorio <b style="color: red">*</b></label>
              <input type="text" id="nombre_laboratorio" class="form-control">
              <small style="color: red; display: none" id="lbl_nombre">* Este campo es requerido</small>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_create">Guardar Laboratorio</button>
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
    var nombre_laboratorio = $('#nombre_laboratorio').val();


    if (nombre_laboratorio == "") {
      $('#nombre_laboratorio').focus();
      $('#lbl_nombre').css('display', 'block');

    } else {
      var url = "../../App/controllers/laboratorios/create_laboratorio.php";

      $.get(url, {
        nombre_laboratorio: nombre_laboratorio,

      }, function (datos) {
        $('#respuesta').html(datos);
      });
    }

  });
</script>