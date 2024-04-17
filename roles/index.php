<?php
  include('../App/config.php');
  include('../layout/sesion.php');
  include('../layout/parte1.php');
  include ('../App/controllers/roles/listado_roles.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid" style="text-align: center;" style="display: flex;">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de Roles </h1>
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
                <h3 class="card-title">Roles</h3>
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
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $contador = 0;
                      foreach($datos_roles as $datos_rol) { 
                      $id_rol = $datos_rol['id_rol'] ?>
                      <tr>
                        <td><?php echo $contador = $contador + 1?></td>
                        <td><?php echo $datos_rol['rol']?></td>
                        <td>
                          <div class="btn-group">
                            <a href="update.php?id=<?php echo $id_rol;?>" type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Editar</a>
                          </div>
                        </td>
                      </tr>
                    <?php  
                    }  
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nro</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
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


<?php include('../layout/parte2.php');?>
<?php include('../layout/mensajes.php');?>

<script>
  $(function () {
    $("#example1").DataTable({
      /* cambio de idiomas de datatable */
      "pageLength": 10,
          "language": {
              "emptyTable": "No hay información",
              "info": "Mostrando _START_ - _END_ de _TOTAL_ Roles",
              "infoEmpty": "Mostrando 0 to 0 of 0 Roles",
              "infoFiltered": "(Filtrado de _MAX_ total Roles)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Roles",
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
