<?php
session_start();
try{
  $email = $_POST['email'];
  $password = $_POST['password'];
  $tipo_usuario = $_POST['tipo_usuario'];

  $user = 'root';
  $pass = '';
  $namebd = 'udc_eerm';

  $bd = new PDO(
    $dsn = "mysql:host=localhost;dbname=".$namebd,$user,$pass,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
  );

  if($tipo_usuario == 'Administrativo'){
    $sql = "SELECT * FROM users_eerm WHERE email = ? AND password = ?";
  }else{
    $sql = "SELECT * FROM students_eerm WHERE email = ? AND password = ?";
  }

$stm = $bd->prepare($sql);
$stm->execute(array($email,$password));

  if($stm->rowCount() >= 0){
  $row = $stm->fetch(PDO::FETCH_OBJ);
  $_SESSION['genero'] = $row->genero;
  $_SESSION['tipo_usuario'] = $row->tipo_usuario;
  $_SESSION['nombre'] = $row->nombre;
  $_SESSION['id'] = $row->id;
header('location: index_eerm.php');
}else{
header('location: login_eerm.php');
}

}catch(PDOException $e){
	echo "Error".$e->getMessage();
}
?>