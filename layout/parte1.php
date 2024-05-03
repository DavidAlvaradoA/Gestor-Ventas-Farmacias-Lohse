<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestor Ventas | Farmacia Lohse</title>
  <link rel="icon" href="<?php echo $URL; ?>/public/img/logofarmaciatrans.png" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet"
    href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Styles -->
  <link rel="stylesheet" href="<?php echo $URL; ?>/public/styles/styles.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet"
    href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet"
    href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet"
    href="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Libreria SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- jQuery -->
  <script src="<?php echo $URL; ?>/public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">GESTOR FARMACIA LOHSE</a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" >
      <!-- Brand Logo -->


      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="display: flex; justify-content: center ">
          <a href="<?php echo $URL; ?>" style="padding-right: 10px; padding-top: 3px">
            <img src="<?php echo $URL; ?>/public/img/logofarmaciatrans.png" class="brand-image">
          </a>
          <div class="info">
            <h6 style="text-align: center; color: gray; font-size: 15px"><?php echo $rol_sesion ?></h6>
            <a href="#" class="d-block"><?php echo $nombres_sesion ?> <?php echo $apellidos_sesion; ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="#" class="nav-link active" style="background-color: #34495E">
                <i class="nav-icon fas fa-address-card"></i>
                <p>
                  Gestor de usuarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-nurse"></i>
                    <p>
                      Roles
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item" style="font-size: 15px;">
                      <a href="<?php echo $URL; ?>/views/modulo-roles/roles/create.php" class="nav-link">
                        <i class="nav-icon fas fa-user-nurse"></i>
                        <p>Creación de Roles</p>
                      </a>
                    </li>
                    <li class="nav-item" style="font-size: 15px;">
                      <a href="<?php echo $URL; ?>/views/modulo-roles/roles" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>Listado de Roles</p>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Usuarios
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item" style="font-size: 15px;">
                      <a href="<?php echo $URL; ?>/views/modulo-usuarios/usuarios/create.php" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>Creación de usuarios</p>
                      </a>
                    </li>
                    <li class="nav-item" style="font-size: 15px;">
                      <a href="<?php echo $URL; ?>/views/modulo-usuarios/usuarios" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>Listado de usuarios</p>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link active" style="background-color: #34495E">
                <i class="nav-icon fas fa-clipboard"></i>
                <p>
                  Bodega
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                      Categorías
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item" style="font-size: 15px;">
                      <a href="<?php echo $URL; ?>/views/modulo-bodega/categorias" class="nav-link">
                        <i class="nav-icon fas fa-list-ol"></i>
                        <p>Listado de Categorías</p>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-syringe"></i>
                    <p>
                      Productos
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item" style="font-size: 15px;">
                      <a href="<?php echo $URL; ?>/views/modulo-bodega/inventario/create.php" class="nav-link">
                        <i class="nav-icon fas fa-barcode"></i>
                        <p>Creación de Productos</p>
                      </a>
                    </li>
                    <li class="nav-item" style="font-size: 15px;">
                      <a href="<?php echo $URL; ?>/views/modulo-bodega/inventario" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>Listado de Productos</p>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>
                      Registros
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item" style="font-size: 15px;">
                      <a href="<?php echo $URL; ?>/views/modulo-bodega/marcas" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Marcas</p>
                      </a>
                    </li>
                    <li class="nav-item" style="font-size: 15px;">
                      <a href="<?php echo $URL; ?>/views/modulo-bodega/laboratorios" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Laboratorios</p>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link active" style="background-color: #34495E">
                <i class="nav-icon fas fa-cart-plus"></i>
                <p>
                  Administración
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cart-arrow-down"></i>
                    <p>
                      Compras
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item" style="font-size: 15px;">
                      <a href="<?php echo $URL; ?>/views/modulo-administracion/compras/create.php" class="nav-link">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>Registro de compras</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item" style="font-size: 15px;">
                      <a href="<?php echo $URL; ?>/views/modulo-administracion/compras" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>Listado de compras</p>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-truck"></i>
                    <p>
                      Proveedores
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item" style="font-size: 15px;">
                      <a href="<?php echo $URL; ?>/views/modulo-administracion/proveedores" class="nav-link">
                        <i class="nav-icon fas fa-list-ul"></i>
                        <p>Listado de Proveedores</p>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>


            <li class="nav-item">
              <a href="#" class="nav-link active" style="background-color: #34495E">
                <i class="nav-icon fas fa-cash-register"></i>
                <p>
                  Ventas
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item" style="font-size: 15px;">
                  <a href="<?php echo $URL; ?>/views/modulo-ventas/ventas/create.php" class="nav-link">
                    <i class="nav-icon fas fa-shopping-basket"></i>
                    <p>Realizar Venta</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item" style="font-size: 15px;">
                  <a href="<?php echo $URL; ?>/views/modulo-ventas/ventas" class="nav-link">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>Listado de ventas</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item">
              <a href="<?php echo $URL; ?>/App/controllers/login/cerrarSesion.php" class="nav-link"
                style="background-color: #CD2500">
                <i class="nav-icon fas fa-door-closed"></i>
                <p>
                  Cerrar Sesión
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>