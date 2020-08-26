<?php
include 'model/conexion_eerm.php';
$sentencia = $bd->query("SELECT * FROM students_eerm;");
$estudiantes = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<?php
session_start();

if(isset($_SESSION['rol_id'])){?>
<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Consulta Informacion Estudiante</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="col-lg-4">
          <img src="img/escudoUC.jpg" alt="" width="60" height="60">
        </div>
        <div class="sidebar-brand-text mx-3">UNIVERSIDAD CARTAGENA</div>
      </a>

      <li class="nav-item">
        <a class="nav-link" href="admin_eerm.php">
          <i class="fa fa-check-square" aria-hidden="true"></i>
          <span>Inicio</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="table_eerm_2.php">
          <i class="fa fa-users" aria-hidden="true"></i>
          <span>Estudiantes</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="stats_eerm.php">
          <span>Estadisticas</span></a>
      </li>



      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-info topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input id="filtrar" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>



            <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Bienvenido <?= $_SESSION['nombre']?>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar Session</a>
            </div>
          </div>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Informacion del estudiante</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Tipo de documento</th>
                      <th>Numero de documento</th>
                      <th>Direccion</th>
                      <th>Celular</th>
                      <th>Fecha de nacimiento</th>
                      <th>Genero</th>
                      <th>Zona</th>
                      <th>Estado Civil</th>
                      <th>Programa de formacion</th>
                      <th>Tipo Institucion Educativa</th>
                      <th>Tiempo de graduacion de bachiller</th>
                      <th>Nivel Educativo de padres</th>
                      <th>Actividad Educativa de los padres</th>
                      <th>Tipo Vivienda</th>
                      <th>Nivel de ingresos del hogar</th>
                      <th>Calificacion del programa matriculado</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($estudiantes as $dato) {
                      ?>
                    <tr>
                      <th><?php echo $dato->nombre; ?></th>
                      <th><?php echo $dato->apellido; ?></th>
                      <th><?php echo $dato->tipo_doc; ?></th>
                      <th><?php echo $dato->num_doc; ?></th>
                      <th><?php echo $dato->direccion; ?></th>
                      <th><?php echo $dato->celular; ?></th>
                      <th><?php echo $dato->fecha_nacimiento; ?></th>
                      <th><?php echo $dato->genero; ?></th>
                      <th><?php echo $dato->zona; ?></th>
                      <th><?php echo $dato->estadoc; ?></th>
                      <th><?php echo $dato->programaf; ?></th>
                      <th><?php echo $dato->tipoie; ?></th>
                      <th><?php echo $dato->tiempogb; ?></th>
                      <th><?php echo $dato->nivelep; ?></th>
                      <th><?php echo $dato->actividadep; ?></th>
                      <th><?php echo $dato->tipovi; ?></th>
                      <th><?php echo $dato->nivelih; ?></th>
                      <th><?php echo $dato->calificacionpm; ?></th>
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-info">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Desea Cerrar Sesion?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="logout_eerm.php">Cerrar Session</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>
<?php
}else{
    header('location: login_eerm.php');
  }
?>