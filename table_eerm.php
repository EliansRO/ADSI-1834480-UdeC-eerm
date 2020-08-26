<?php
session_start();

if(isset($_SESSION['tipo_usuario'])){
$user = 'root';
$pass = '';
$namebd = 'udc_eerm';

try{


$bd = new PDO(
    $dsn = "mysql:host=localhost;dbname=".$namebd,$user,$pass,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);

$sentencia = $bd->query("SELECT * FROM students_eerm;");
$estudiantes = $sentencia->fetchAll(PDO::FETCH_OBJ);

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

  <title>Listado de los estudiantes</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script type="text/javascript">
    function ConfirmUpdate(){
      var respuesta = confirm("¿Estas seguro que deseas modificar los datos de este estudiante?");
      if(respuesta == true){
        return true;
      }else{
        return false;
      }
    }
  </script>

  <script type="text/javascript">
    function ConfirmDelete(){
      var respuesta = confirm("¿Estas seguro que deseas eliminar los datos de este estudiante?");
      if(respuesta == true){
        return true;
      }else{
        return false;
      }
    }
  </script>

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
        <a class="nav-link" href="index_eerm.php">
          <i class="fa fa-home" aria-hidden="true"></i>
          <span>Inicio</span></a>
      </li>

      <li class="nav-item active">
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


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h1 class="m-0 font-weight-bold text-primary">Estudiantes Registrados</h1>
              <a href="form_eerm.php" class="btn btn-success" style="margin-left: 10px;">
                <h4 style="color: white"><i class="fas fa-user-plus"></i>Crear Estudiante</h4>
              </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Numero de documento</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Correo</th>
                      <th>Contraseña</th>
                      <th>Genero</th>
                      <th>Programa Formacion</th>
                      <th>Tipo de usuario</th>
                      <th>Editar</th>
                      <th>Borrar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($estudiantes as $dato) {
                      ?>
                    <tr>
                      <th><?php echo $dato->num_doc; ?></th>
                      <th><?php echo $dato->nombre; ?></th>
                      <th><?php echo $dato->apellido; ?></th>
                      <th><?php echo $dato->email; ?></th>
                      <th><?php echo $dato->password; ?></th>
                      <th><?php echo $dato->genero; ?></th>
                      <th><?php echo $dato->programaf; ?></th>
                      <th><?php echo $dato->tipo_usuario; ?></th>
                <!--Boton para editar registro -->
                <th>
                <a class="btn btn-primary"  href="edit_eerm_2.php?id=<?php echo $dato->id; ?>" onclick="return ConfirmUpdate()">
                <svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
                </a>
                </th>
                <th>
                <a class="btn btn-danger"  href="delete_eerm.php?id=<?php echo $dato->id; ?>" onclick="return ConfirmDelete()"><svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg></a>
                </th>
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
            <label>Proyecto Creado Por: Elians Enrique Rocha Muñoz</label><br>
            <label>Para mayor informacion llame al numero 300-797-6437</label><br>
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