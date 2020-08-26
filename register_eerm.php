<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UC - Registro usuario</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row" style="background: yellow">
          <div class="col-lg-5">
            <img src="img/escudoUC.jpg" alt="" width="500" height="560">
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Por favor haga su registro para loguearse</h1>
              </div>
              <form action="register_user_eerm.php" method="post">
                <div class="form-group">
                  <div class="form-group">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres" required="text">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos" required="text">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico" required="email">
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required="password">
                    <div class="input-group-append">
                      <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                    </div>
                </div>
                <br>
                <div class="form-group">
                      <select name="tipo_usuario" class="form-control">
                        <option>Seleccione su tipo de usuario</option>
                        <option value="Administrativo">Administrativo</option>
                      </select>
                </div>
                <div class="form-group">
                  <button class="btn btn-success btn-user btn-block" type="submit">
                    Registrarse
                  </button>
                </div>
                
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login_eerm.php">si tienes una cuenta? inicia session!</a>
              </div>
            </div>
          </div>
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

  <script type="text/javascript">
function mostrarPassword(){
    var cambio = document.getElementById("password");
    if(cambio.type == "password"){
      cambio.type = "text";
      $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
      cambio.type = "password";
      $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  } 
  
  $(document).ready(function () {
  //CheckBox mostrar contraseña
  $('#ShowPassword').click(function () {
    $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
  });
});
</script>

</body>

</html>
