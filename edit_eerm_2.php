<?php
session_start();

if(isset($_SESSION['tipo_usuario'])){
$id = $_REQUEST['id'];
$user = 'root';
$pass = '';
$namebd = 'udc_eerm';

try{


$bd = new PDO(
    $dsn = "mysql:host=localhost;dbname=".$namebd,$user,$pass,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);

$sentencia2 = $bd->prepare("SELECT * FROM students_eerm WHERE id = ?;");
$sentencia2->execute([$id]);
$estudiantes2 = $sentencia2->fetch(PDO::FETCH_OBJ);

}catch(PDOException $e){
  echo "Error".$e->getMessage();
}?>
<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Universidad de Cartagena</title>

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

      <?php
      if($_SESSION['tipo_usuario'] == 'Administrativo'){
      ?>

      <li class="nav-item">
        <a class="nav-link" href="eerm_index.php">
          <i class="fa fa-home" aria-hidden="true"></i>
          <span>Inicio</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="table_eerm.php">
          <i class="fa fa-users" aria-hidden="true"></i>
          <span>Estudiantes</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="stats_eerm.php">
          <i class="fa fa-chart-area" aria-hidden="true"></i>
          <span>Estadisticas</span></a>
      </li>

      <?php
      }
      ?>



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
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>



            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white big">Bienvenido <?= $_SESSION['nombre']?></span>
                <?php
                if($_SESSION['tipo_usuario'] == 'Administrativo'){
                  echo "<img src='img/administrativo.png' width='50' height='50'>";
                }
                ?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Session
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h1 class="m-0 font-weight-bold text-primary">Actualizar Datos Del Estudiante</h1>
            </div>
            <div class="card-body">
              <?php
              if($_SESSION['tipo_usuario'] == 'Administrativo'){
              ?>
              <form action="update_eerm_2.php" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label>Numero de documento</label>
                    <input readonly type="text" class="form-control"  name="num_doc" value="<?= $estudiantes2->num_doc; ?>">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Nombres</label>
                    <input type="text" class="form-control"  name="nombre" value="<?= $estudiantes2->nombre; ?>">
                  </div>
                </div>
                 <div class="form-row">
                  <div class="form-group col-md-3">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" name="apellido" value="<?= $estudiantes2->apellido; ?>">
                  </div>
                  <div class="form-group col-md-3">
                    <label>Correo</label>
                    <input type="email" class="form-control" name="email" value="<?= $estudiantes2->email; ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" name="password" value="<?= $estudiantes2->password; ?>">
                  </div>
                </div>
                <input type="hidden" name="id" value="<?= $estudiantes2->id; ?>" >
                <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
              <?php
            }
            ?>
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
            <label>Proyecto Creado Por: Juan Fernando Chica Medina</label><br>
            <label>Para mayor informacion llame al numero 3002661261</label><br>
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
          <a class="btn btn-primary" href="logout_eerm.php"><i class="fas fa-door-closed"></i>Cerrar Session</a>
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