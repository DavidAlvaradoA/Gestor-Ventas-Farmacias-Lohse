<?php
include ('../../../App/config.php');
include ('../../../layout/sesion.php');
include ('../../../layout/parte1.php');
include ('../../../App/controllers/clientes/listado_clientes.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid" style="text-align: center;" style="display: flex;">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Listado de Clientes </h1>
          <br>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
            <i class="fa fa-plus"></i> Nuevo Cliente
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
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Clientes</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
              <table id="example1" class="table table-bordered table-striped table-lg">
                <thead>
                  <tr>
                    <th>Nro</th>
                    <th>Nombre Cliente</th>
                    <th>Rut Cliente</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $contador = 0;
                  foreach ($datos_clientes as $datos_cliente) {
                    $id_cliente = $datos_cliente['id_cliente'];
                    $nombre_cliente = $datos_cliente['nombre_cliente'];
                    $rut_cliente = $datos_cliente['rut_cliente'];
                    $celular_cliente = $datos_cliente['celular_cliente'];
                    $email_cliente = $datos_cliente['email_cliente'];
                    ?>
                    <tr>
                      <td><?php echo $contador = $contador + 1 ?></td>
                      <td><?php echo $datos_cliente['nombre_cliente'] ?></td>
                      <td><?php echo $datos_cliente['rut_cliente'] ?></td>
                      <td><?php echo $datos_cliente['celular_cliente'] ?></td>
                      <td><?php echo $datos_cliente['email_cliente'] ?></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#modal-show-cliente<?php echo $id_cliente; ?>">
                            <i class="fa fa-eye"></i> Ver
                          </button>
                          <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#modal-update<?php echo $id_cliente; ?>">
                            <i class="fa fa-pencil-alt"></i> Editar
                          </button>
                          <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#modal-delete<?php echo $id_cliente; ?>">
                            <i class="fa fa-trash"></i> Borrar
                          </button>
                        </div>

                        <!---- Modal para ver Clientes ---->
                        <div class="modal fade" id="modal-show-cliente<?php echo $id_cliente; ?>">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header" style="background-color: #1D72F5 ;color: white">
                                <h4 class="modal-title">Ver Cliente</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Nombre Cliente </label>
                                      <input type="text" id="nombre_cliente<?php echo $id_cliente; ?>"
                                        value="<?php echo $nombre_cliente; ?>" class="form-control" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Rut Cliente </label>
                                      <input type="text" id="rut_cliente<?php echo $id_cliente; ?>"
                                        value="<?php echo $rut_cliente; ?>" class="form-control" disabled>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Celular </label>
                                      <input type="text" id="celular_cliente<?php echo $id_cliente; ?>"
                                        value="<?php echo $celular_cliente; ?>" class="form-control" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Email </label>
                                      <input type="text" id="email_cliente<?php echo $id_cliente; ?>"
                                        value="<?php echo $email_cliente; ?>" class="form-control" disabled>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                        <!---- Modal para eliminar Cliente ---->
                        <div class="modal fade" id="modal-delete<?php echo $id_cliente; ?>">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header" style="background-color: #E22C32 ;color: white">
                                <h4 class="modal-title"> ¿Esta seguro de eliminar Cliente?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Nombre Cliente <b style="color: red">*</b></label>
                                      <input type="text" id="nombre_cliente<?php echo $id_cliente; ?>"
                                        value="<?php echo $datos_cliente['nombre_cliente']; ?>" class="form-control"
                                        disabled>
                                      <small style="color: red; display: none"
                                        id="lbl_nombre<?php echo $id_cliente; ?>">* Este campo es requerido</small>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Rut Cliente <b style="color: red">*</b></label>
                                      <input type="text" id="rut_cliente<?php echo $id_cliente; ?>"
                                        value="<?php echo $datos_cliente['rut_cliente']; ?>" class="form-control" disabled>
                                      <small style="color: red; display: none"
                                        id="lbl_rut<?php echo $id_cliente; ?>">* Este campo es requerido</small>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Celular</label>
                                      <input type="text" id="celular<?php echo $id_cliente; ?>"
                                        value="<?php echo $datos_cliente['celular_cliente']; ?>" class="form-control" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Email <b style="color: red">*</b></label>
                                      <input type="text" id="email<?php echo $id_cliente; ?>"
                                        value="<?php echo $datos_cliente['email_cliente']; ?>" class="form-control" disabled>
                                      <small style="color: red; display: none" id="lbl_email<?php echo $id_cliente; ?>">*
                                        Este campo es requerido</small>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger"
                                  id="btn_delete<?php echo $id_cliente; ?>">Eliminar Cliente</button>
                                <div id="respuesta_delete<?php echo $id_cliente; ?>" hidden></div>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <script>
                          $('#btn_delete<?php echo $id_cliente; ?>').click(function () {

                            var id_cliente = '<?php echo $id_cliente; ?>';

                            var url2 = "../../../App/controllers/clientes/delete_clientes.php";

                            $.get(url2, { id_cliente: id_cliente }, function (datos) {
                              $('#respuesta_delete<?php echo $id_cliente; ?>').html(datos);
                            });
                          });
                        </script>


                        <!---- Modal para actualizar clientees ---->
                        <div class="modal fade" id="modal-update<?php echo $id_cliente; ?>">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header" style="background-color: #23AF27 ;color: white">
                                <h4 class="modal-title">Actualizar Clientes</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Nombre Cliente <b style="color: red">*</b></label>
                                      <input type="text" id="nombre_cliente<?php echo $id_cliente; ?>"
                                        value="<?php echo $datos_cliente['nombre_cliente']; ?>" class="form-control">
                                      <small style="color: red; display: none"
                                        id="lbl_nombre<?php echo $id_cliente; ?>">* Este campo es requerido</small>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Rut Cliente <b style="color: red">*</b></label>
                                      <input type="text" id="rut_cliente<?php echo $id_cliente; ?>"
                                        value="<?php echo $datos_cliente['rut_cliente']; ?>" class="form-control">
                                      <small style="color: red; display: none"
                                        id="lbl_rut<?php echo $id_cliente; ?>">* Este campo es requerido</small>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Celular</label>
                                      <input type="text" id="celular_cliente<?php echo $id_cliente; ?>"
                                        value="<?php echo $datos_cliente['celular_cliente']; ?>" class="form-control">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Email <b style="color: red">*</b></label>
                                      <input type="text" id="email_cliente<?php echo $id_cliente; ?>"
                                        value="<?php echo $datos_cliente['email_cliente']; ?>" class="form-control">
                                      <small style="color: red; display: none" id="lbl_email<?php echo $id_cliente; ?>">*
                                        Este campo es requerido</small>
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success"
                                  id="btn_update<?php echo $id_cliente; ?>">Actualizar Cliente</button>
                                <div id="respuesta_update_cliente<?php echo $id_cliente; ?>" hidden></div>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <script>
                          $('#btn_update<?php echo $id_cliente; ?>').click(function () {

                            var id_cliente = '<?php echo $id_cliente; ?>';
                            var nombre_cliente = $('#nombre_cliente<?php echo $id_cliente; ?>').val();
                            var rut_cliente = $('#rut_cliente<?php echo $id_cliente; ?>').val();
                            var celular_cliente = $('#celular_cliente<?php echo $id_cliente; ?>').val();
                            var email_cliente = $('#email_cliente<?php echo $id_cliente; ?>').val();

                            if (nombre_cliente == "") {
                              $('#nombre_cliente<?php echo $id_cliente; ?>').focus();
                              $('#lbl_nombre<?php echo $id_cliente; ?>').css('display', 'block');

                            } else if (rut_cliente == "") {
                              $('#rut_cliente<?php echo $id_cliente; ?>').focus();
                              $('#lbl_rut<?php echo $id_cliente; ?>').css('display', 'block');

                            } else if (email_cliente == "") {
                              $('#email_cliente<?php echo $id_cliente; ?>').focus();
                              $('#lbl_email<?php echo $id_cliente; ?>').css('display', 'block');
                            } else {
                              var url = "../../../App/controllers/clientes/update_clientes.php";

                              $.get(url, { nombre_cliente: nombre_cliente, rut_cliente: rut_cliente, celular_cliente: celular_cliente, email_cliente: email_cliente, id_cliente: id_cliente }, function (datos) {
                                $('#respuesta_update_cliente<?php echo $id_cliente; ?>').html(datos);
                              });
                            }
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

<!---- Modal para registrar Proveedores ---->

<div class="modal fade" id="modal-create">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #1D72F5 ;color: white">
        <h4 class="modal-title">Registrar Nuevo Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Nombre Cliente <b style="color: red">*</b></label>
              <input type="text" id="nombre_cliente" class="form-control">
              <small style="color: red; display: none" id="lbl_nombre">* Este campo es requerido</small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Rut Cliente <b style="color: red">*</b></label>
              <input type="text" id="rut" class="form-control">
              <small style="color: red; display: none" id="lbl_rut">* Este campo es requerido</small>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Celular </label>
              <input type="text" id="celular" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Email <b style="color: red">*</b></label>
              <input type="text" id="email" class="form-control">
              <small style="color: red; display: none" id="lbl_email">* Este campo es requerido</small>
            </div>
          </div>
        </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_create">Guardar Cliente</button>
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
    var nombre_cliente = $('#nombre_cliente').val();
    var rut_cliente = $('#rut').val();
    var celular_cliente = $('#celular').val();
    var email_cliente = $('#email').val();

    if (nombre_cliente == "") {
      $('#nombre_cliente').focus();
      $('#lbl_nombre').css('display', 'block');

    } else if (rut == "") {
      $('#rut').focus();
      $('#lbl_rut').css('display', 'block');

    } else if (celular == "") {
      $('#celular').focus();
      $('#lbl_celular').css('display', 'block');

    } else if (email == "") {
      $('#email').focus();
      $('#lbl_email').css('display', 'block');

    } else {
      var url = "../../../App/controllers/clientes/create_cliente.php";

      $.post(url, {
        nombre_cliente: nombre_cliente,
        rut_cliente: rut_cliente,
        celular_cliente: celular_cliente,
        email_cliente: email_cliente,
      }, function (datos) {
        $('#respuesta').html(datos);
      });
    }

  });
</script>