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

  <title>Bienvenido a la pagina de la UC</title>

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

      <li class="nav-item active">
        <a class="nav-link" href="admin_eerm.php">
          <i class="fa fa-check-square" aria-hidden="true"></i>
          <span>Inicio</span></a>
      </li>

      <li class="nav-item">
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

        <div class="container-fluid">
        	<h1 style="margin-left: 500px">Que es la universidad de cartagena</h1>
        	<p>
        		La Universidad de Cartagena es una universidad pública colombiana localizada en Cartagena de Indias, sujeta a inspección y vigilancia por medio de la Ley 1740 de 2014 y la ley 30 de 1992 del Ministerio de Educación de Colombia. Fue fundada en 1827 por Francisco de Paula Santander y Simón Bolívar, y es reconocida por ser la más antigua del Caribe colombiano. El 26 de marzo de 2014, la Universidad de Cartagena, recibió por parte del Ministerio de Educación Nacional la Acreditación Institucional de Alta Calidad convirtiéndose en la primera universidad pública de la región Caribe con éste tipo de acreditación. En el 2015 estuvo en el Ranking de Scimago para Colombia catalogada como la décima mejor universidad del país y como la quinta mejor pública.
        	</p>
        	<h1 style="margin-left: 500px">Ofertas academicas</h1>
        	<h2 style="margin-left: 600px">Pregrados</h2>
			<b>Facultad de Ciencias Económicas:</b> Administración de Empresas, Administración Industrial, Contaduría Pública Diurna y nocturna, Economía.<br>
			<b>Facultad de Ciencias Humanas:</b> Filosofía, Historia, Lingüística y Literatura, Profesional en lenguas extranjeras con énfasis en inglés y francés<br>
			<b>Facultad de Ingeniería:</b> Ingeniería Civil, Ingeniería de Alimentos, Ingeniería Química, Ingeniería de Sistemas.<br>
			<b>Facultad de Ciencias Sociales y Educación:</b> Comunicación Social, Trabajo Social y Licenciatura en Educación con énfasis en Ciencias Sociales y Ambientales. La Universidad de Cartagena cuenta con la mejor facultad de Comunicación Social de Colombia, de acuerdo a las pruebas Saber Pro donde ocupó siempre los primeros lugares.<br>
			<b>Facultad de Ciencias Exactas y Naturales:</b> Matemáticas, Biología, Química, Técnica Profesional en Procesos Metrológicos, Tecnología en Metrología Industrial.<br>
			<b>Facultad de Ciencias Farmacéuticas:</b> Química Farmacéutica<br>
			<b>Facultad de Derecho y Ciencias Políticas:</b> Derecho<br>
			<b>Facultad de Enfermería:</b> Enfermería<br>
			<b>Facultad de Medicina:</b> Medicina<br>
			<b>Facultad de Odontología:</b> Odontología<br>
			<h2 style="margin-left: 600px">Postgrados</h2>
			<b>Especializaciones</b><br>
			<b>Ciencias Económicas:</b> Administración del Turismo, Finanzas, Gerencia en Impuestos, Gerencia en Salud, Gestión de la Calidad y Auditoría en Salud, Gestión de Comercio Internacional y Desarrollo Industrial, Gestión Gerencial, Revisoría Fiscal.<br>
			<b>Derecho y Ciencias Políticas:</b> Ciencias Penales y Criminológicas, Conciliación, Arbitraje y Resolución de Conflictos, Derecho de Familia, Seguridad Social.<br>
			<b>Medicina:</b> Anestesiología y Reanimación, Cirugía General, Dermatología, Gineco - Obstetricia, Medicina Interna, Medicina Intensiva y Cuidado Crítico, Neurocirugía, Ortopedia y Traumatología, Patología, Pediatría, Psiquiatría, Radiología, Urología, Otorrinolaringología.<br>
			<b>Enfermería:</b> Salud Familiar y Comunitaria, Salud Ocupacional.<br>
			<b>Ingenierías:</b> Gerencia de Proyectos de Construcción, Sanitaria y Ambiental, Ingeniería de Vías Terrestres, Planificación de Tránsito y Transporte.<br>
			<b>Odontología:</b> Endodoncia, Estomatología y Cirugía Oral, Odontopediatría y Ortopedia Maxilar, Ortodoncia.<br>
			<b>Ciencias Exactas y Naturales:</b> Matemáticas Avanzadas.<br>
			<b>Ciencias Sociales:</b> Convivencia y Conflicto Social, Procesos Sociales de la Familia.<br>
			<b>Especializaciones a distancia en convenio con otras casas de estudio:</b> Gerencia en Proyectos, Gerencia de Instituciones Educativas, Docencia de la Literatura Infantil.
        </div>

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
