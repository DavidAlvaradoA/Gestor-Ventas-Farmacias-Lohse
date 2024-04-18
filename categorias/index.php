<?php
  include('../App/config.php');
  include('../layout/sesion.php');
  include('../layout/parte1.php');
  include ('../App/controllers/categorias/listado_categorias.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid" style="text-align: center;" style="display: flex;">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de Categorías </h1>
            <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
             <i class="fa fa-plus"></i>  Nueva Categoría
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
          <div class="col-md-10">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Categorías</h3>
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
                    <th>Categoría</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $contador = 0;
                      foreach($datos_categorias as $datos_categoria) { 
                      $id_categoria = $datos_categoria['id_categoria'];
                      $nombre_categoria = $datos_categoria['nombre_categoria']; ?>
                      <tr>
                        <td><?php echo $contador = $contador + 1?></td>
                        <td><?php echo $datos_categoria['nombre_categoria']?></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-update<?php echo $id_categoria;?>">
                            <i class="fa fa-pencil-alt"></i>  Editar
                            </button>
                            <!---- Modal para actualizar categorias ---->
                            <div class="modal fade" id="modal-update<?php echo $id_categoria;?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Actualizar Categoría</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group">
                                          <label for="">Nombre Categoría <b style="color: red">*</b></label>
                                          <input type="text" id="nombre_categoria<?php echo $id_categoria;?>" value="<?php echo $nombre_categoria; ?>" class="form-control">
                                          <small style="color: red; display: none" id="lbl_update<?php echo $id_categoria;?>">* Este campo es requerido</small>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-success" id="btn_update<?php echo $id_categoria;?>">Actualizar categoría</button>
                                    <div id="respuesta_update<?php echo $id_categoria;?>" hidden></div>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <script>
                              $('#btn_update<?php echo $id_categoria;?>').click(function () {
                                
                                var nombre_categoria = $('#nombre_categoria<?php echo $id_categoria;?>').val();
                                var id_categoria = '<?php echo $id_categoria;?>';

                                if(nombre_categoria == ""){
                                  $('#nombre_categoria<?php echo $id_categoria;?>').focus();
                                  $('#lbl_update<?php echo $id_categoria;?>').css('display','block');
                                } else{
                                  var url = "../App/controllers/categorias/update_categorias.php";

                                  $.get(url, {nombre_categoria:nombre_categoria,id_categoria:id_categoria},function (datos) {
                                  $('#respuesta_update<?php echo $id_categoria;?>').html(datos);
                                }); 
                                }
                              });
                            </script>
                          </div>
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
              "info": "Mostrando _START_ - _END_ de _TOTAL_ Categorías",
              "infoEmpty": "Mostrando 0 to 0 of 0 Categoría",
              "infoFiltered": "(Filtrado de _MAX_ total Categorías)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Categorías",
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
              <small style="color: red; display: none" id="lbl_create">* Este campo es requerido</small>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_create">Guardar Categoría</button>
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

    if(nombre_categoria == "") {
      $('#nombre_categoria').focus();
      $('#lbl_create').css('display','block');
    } else {
      var url = "../App/controllers/categorias/registro_categorias.php";
    
    $.get(url, {nombre_categoria:nombre_categoria},function (datos) {
      $('#respuesta').html(datos);
    });
    }

  });
</script>