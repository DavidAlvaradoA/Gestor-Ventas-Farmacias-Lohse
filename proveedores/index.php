<?php
  include('../App/config.php');
  include('../layout/sesion.php');
  include('../layout/parte1.php');
  include ('../App/controllers/proveedores/listado_proveedores.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid" style="text-align: center;" style="display: flex;">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de Proveedores </h1>
            <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
             <i class="fa fa-plus"></i>  Nuevo Proveedor
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
                <h3 class="card-title">Proveedores</h3>
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
                    <th>Nombre Proveedor</th>
                    <th>Celular</th>
                    <th>Teléfono</th>
                    <th>Empresa</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $contador = 0;
                      foreach($datos_proveedores as $datos_proveedor) { 
                      $id_proveedor = $datos_proveedor['id_proveedor'];
                      $nombre_proveedor = $datos_proveedor['nombre_proveedor']; 
                      $celular = $datos_proveedor['celular']; 
                      $telefono = $datos_proveedor['telefono']; 
                      $empresa = $datos_proveedor['empresa']; 
                      $email = $datos_proveedor['email']; 
                      $direccion = $datos_proveedor['direccion']; 
                      ?>
                      <tr>
                        <td><?php echo $contador = $contador + 1?></td>
                        <td><?php echo $datos_proveedor['nombre_proveedor']?></td>
                        <td>
                          <a href="https://wa.me/569<?php echo $datos_proveedor['celular']?>" class="btn btn-success btn-sm" target="_blank">
                            <i class="fa fa-phone"></i>
                            <?php echo $datos_proveedor['celular']?>
                          </a>
                        </td>
                        <td><?php echo $datos_proveedor['telefono']?></td>
                        <td><?php echo $datos_proveedor['empresa']?></td>
                        <td><?php echo $datos_proveedor['email']?></td>
                        <td><?php echo $datos_proveedor['direccion']?></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-show<?php echo $id_proveedor;?>">
                                    <i class="fa fa-eye"></i>  Ver
                                </button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-update<?php echo $id_proveedor;?>">
                                    <i class="fa fa-pencil-alt"></i>  Editar
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $id_proveedor;?>">
                                    <i class="fa fa-trash"></i>  Borrar
                                </button>
                            </div>

                                <!---- Modal para actualizar Proveedores ---->
                                <div class="modal fade" id="modal-update<?php echo $id_proveedor;?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header" style="background-color: #23AF27 ;color: white" >
                                        <h4 class="modal-title">Actualizar Proveedor</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Nombre Proveedor <b style="color: red">*</b></label>
                                            <input type="text" id="nombre_proveedor<?php echo $id_proveedor;?>" value="<?php echo $datos_proveedor['nombre_proveedor']; ?>" class="form-control">
                                            <small style="color: red; display: none" id="lbl_nombre<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Celular <b style="color: red">*</b></label>
                                            <input type="text" id="celular<?php echo $id_proveedor;?>" value="<?php echo $datos_proveedor['celular']; ?>" class="form-control">
                                            <small style="color: red; display: none" id="lbl_celular<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Teléfono</label>
                                            <input type="text" id="telefono<?php echo $id_proveedor;?>" value="<?php echo $datos_proveedor['telefono']; ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Empresa <b style="color: red">*</b></label>
                                            <input type="text" id="empresa<?php echo $id_proveedor;?>" value="<?php echo $datos_proveedor['empresa']; ?>" class="form-control">
                                            <small style="color: red; display: none" id="lbl_empresa<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Email <b style="color: red">*</b></label>
                                            <input type="text" id="email<?php echo $id_proveedor;?>" value="<?php echo $datos_proveedor['email']; ?>" class="form-control">
                                            <small style="color: red; display: none" id="lbl_email<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Dirección <b style="color: red">*</b></label>
                                            <input type="text" id="direccion<?php echo $id_proveedor;?>" value="<?php echo $datos_proveedor['direccion']; ?>" class="form-control">
                                            <small style="color: red; display: none" id="lbl_direccion<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-success" id="btn_update<?php echo $id_proveedor;?>">Actualizar Proveedor</button>
                                        <div id="respuesta_update<?php echo $id_proveedor;?>" hidden></div>
                                    </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                <script>
                                $('#btn_update<?php echo $id_proveedor;?>').click(function () {
                                    
                                    var id_proveedor = '<?php echo $id_proveedor;?>';
                                    var nombre_proveedor = $('#nombre_proveedor<?php echo $id_proveedor;?>').val();
                                    var celular = $('#celular<?php echo $id_proveedor;?>').val();
                                    var telefono = $('#telefono<?php echo $id_proveedor;?>').val();
                                    var empresa = $('#empresa<?php echo $id_proveedor;?>').val();
                                    var email = $('#email<?php echo $id_proveedor;?>').val();
                                    var direccion = $('#direccion<?php echo $id_proveedor;?>').val();

                                    if(nombre_proveedor == ""){
                                    $('#nombre_proveedor<?php echo $id_proveedor;?>').focus();
                                    $('#lbl_nombre<?php echo $id_proveedor;?>').css('display','block');

                                        }else if(celular == ""){  
                                        $('#celular<?php echo $id_proveedor;?>').focus();
                                        $('#lbl_celular<?php echo $id_proveedor;?>').css('display','block');

                                        }else if(empresa == ""){  
                                        $('#empresa<?php echo $id_proveedor;?>').focus();
                                        $('#lbl_empresa<?php echo $id_proveedor;?>').css('display','block');

                                        }else if(email == ""){  
                                        $('#email<?php echo $id_proveedor;?>').focus();
                                        $('#lbl_email<?php echo $id_proveedor;?>').css('display','block');

                                        }else if(direccion == ""){  
                                        $('#direccion<?php echo $id_proveedor;?>').focus();
                                        $('#lbl_direccion<?php echo $id_proveedor;?>').css('display','block');
                                    } else {
                                    var url = "../App/controllers/proveedores/update_proveedor.php";

                                    $.get(url, {nombre_proveedor:nombre_proveedor,celular:celular,telefono:telefono,empresa:empresa,email:email,direccion:direccion, id_proveedor:id_proveedor},function (datos) {
                                    $('#respuesta_update<?php echo $id_proveedor;?>').html(datos);
                                    }); 
                                    }
                                });
                                </script>

                                <!---- Modal para ver Proveedores ---->
                                <div class="modal fade" id="modal-show<?php echo $id_proveedor;?>">
                                    <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #1D72F5 ;color: white">
                                        <h4 class="modal-title">Ver Proveedor</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nombre Proveedor </label>
                                                <input type="text" id="nombre_proveedor<?php echo $id_proveedor;?>" value="<?php echo $nombre_proveedor; ?>" class="form-control" disabled>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Celular </label>
                                                <input type="text" id="celular<?php echo $id_proveedor;?>" value="<?php echo $celular; ?>" class="form-control" disabled>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Teléfono </label>
                                                <input type="text" id="telefono<?php echo $id_proveedor;?>" value="<?php echo $telefono; ?>" class="form-control" disabled>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Empresa </label>
                                                <input type="text" id="empresa<?php echo $id_proveedor;?>" value="<?php echo $empresa; ?>" class="form-control" disabled>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email </label>
                                                <input type="text" id="email<?php echo $id_proveedor;?>" value="<?php echo $email; ?>" class="form-control" disabled>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Dirección </label>
                                                <input type="text" id="direccion<?php echo $id_proveedor;?>" value="<?php echo $direccion; ?>" class="form-control" disabled>
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

                                <!---- Modal para eliminar Proveedores ---->
                                <div class="modal fade" id="modal-delete<?php echo $id_proveedor;?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header" style="background-color: #E22C32 ;color: white" >
                                        <h4 class="modal-title"> ¿Esta seguro de eliminar Proveedor?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Nombre Proveedor <b style="color: red">*</b></label>
                                            <input type="text" id="nombre_proveedor<?php echo $id_proveedor;?>" value="<?php echo $datos_proveedor['nombre_proveedor']; ?>" class="form-control" disabled>
                                            <small style="color: red; display: none" id="lbl_nombre<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Celular <b style="color: red">*</b></label>
                                            <input type="text" id="celular<?php echo $id_proveedor;?>" value="<?php echo $datos_proveedor['celular']; ?>" class="form-control" disabled>
                                            <small style="color: red; display: none" id="lbl_celular<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Teléfono</label>
                                            <input type="text" id="telefono<?php echo $id_proveedor;?>" value="<?php echo $datos_proveedor['telefono']; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Empresa <b style="color: red">*</b></label>
                                            <input type="text" id="empresa<?php echo $id_proveedor;?>" value="<?php echo $datos_proveedor['empresa']; ?>" class="form-control" disabled>
                                            <small style="color: red; display: none" id="lbl_empresa<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Email <b style="color: red">*</b></label>
                                            <input type="text" id="email<?php echo $id_proveedor;?>" value="<?php echo $datos_proveedor['email']; ?>" class="form-control" disabled>
                                            <small style="color: red; display: none" id="lbl_email<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Dirección <b style="color: red">*</b></label>
                                            <input type="text" id="direccion<?php echo $id_proveedor;?>" value="<?php echo $datos_proveedor['direccion']; ?>" class="form-control" disabled>
                                            <small style="color: red; display: none" id="lbl_direccion<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-danger" id="btn_delete<?php echo $id_proveedor;?>">Eliminar Proveedor</button>
                                        <div id="respuesta_delete<?php echo $id_proveedor;?>" hidden></div>
                                    </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                <script>
                                $('#btn_delete<?php echo $id_proveedor;?>').click(function () {
                                    
                                    var id_proveedor = '<?php echo $id_proveedor;?>';
                                   
                                    var url2 = "../App/controllers/proveedores/delete_proveedor.php";

                                    $.get(url2, {id_proveedor:id_proveedor},function (datos) {
                                    $('#respuesta_delete<?php echo $id_proveedor;?>').html(datos);
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

<?php include('../layout/mensajes.php');?>
<?php include('../layout/parte2.php');?>

<script>
  $(function () {
    $("#example1").DataTable({
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
      "buttons": [{text:'Copiar', extend: "copy", },{
      extend:"csv", },{
      extend:"excel",},{
      extend:"pdf",},{ 
      text:'Imprimir', extend:"print",},//{
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
        <h4 class="modal-title">Creación de Nuevo Proveedor</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Nombre Proveedor <b style="color: red">*</b></label>
                        <input type="text" id="nombre_proveedor" class="form-control">
                        <small style="color: red; display: none" id="lbl_nombre">* Este campo es requerido</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Celular <b style="color: red">*</b></label>
                        <input type="text" id="celular" class="form-control">
                        <small style="color: red; display: none" id="lbl_celular">* Este campo es requerido</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Teléfono </label>
                        <input type="text" id="telefono" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Empresa <b style="color: red">*</b></label>
                        <input type="text" id="empresa" class="form-control">
                        <small style="color: red; display: none" id="lbl_empresa">* Este campo es requerido</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email <b style="color: red">*</b></label>
                        <input type="text" id="email" class="form-control">
                        <small style="color: red; display: none" id="lbl_email">* Este campo es requerido</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Dirección <b style="color: red">*</b></label>
                        <input type="text" id="direccion" class="form-control">
                        <small style="color: red; display: none" id="lbl_direccion">* Este campo es requerido</small>
                    </div>
                </div>
            </div>
        </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_create">Guardar Proveedor</button>
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
    var nombre_proveedor = $('#nombre_proveedor').val();
    var celular = $('#celular').val();
    var telefono = $('#telefono').val();
    var empresa = $('#empresa').val();
    var email = $('#email').val();
    var direccion = $('#direccion').val();

    if(nombre_proveedor == "") {
      $('#nombre_proveedor').focus();
      $('#lbl_nombre').css('display','block');

    }else if(celular == ""){  
      $('#celular').focus();
      $('#lbl_celular').css('display','block');

    }else if(empresa == ""){  
      $('#empresa').focus();
      $('#lbl_empresa').css('display','block');

    }else if(email == ""){  
      $('#email').focus();
      $('#lbl_email').css('display','block');

    }else if(direccion == ""){  
      $('#direccion').focus();
      $('#lbl_direccion').css('display','block');

    } else {
      var url = "../App/controllers/proveedores/create_proveedor.php";
    
        $.get(url, {nombre_proveedor:nombre_proveedor,
                    celular:celular,
                    telefono:telefono,
                    empresa:empresa,
                    email:email,
                    direccion:direccion},function (datos) {
        $('#respuesta').html(datos);
        });
    }

  });
</script>