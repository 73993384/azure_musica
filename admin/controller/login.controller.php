<?php
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>';
echo '<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">';
require_once "model/login.php";

class LoginController
{
  private $model;

  public function __construct()
  {
    $this->model = new Login();
  }

  public function Inicio()
  {
    require_once "view/login.php";
  }

  public function Iniciar_Sesion()
  {
    // $contrasena = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
    
    $login = new Login();
    $usuario = $_REQUEST['user'];
    $contrasena = $_REQUEST['password'];
    $login = $this->model->Iniciar_Sesion($usuario);
    $password = $login->contraseña;
    $user = $login->nombre;
    if((password_verify($contrasena, $password)) && ($usuario == $user)){
      $_SESSION['codigo_usuario'] = $login->codigo_usuario;
      $_SESSION['usuario'] = $login->nombre;
      $_SESSION['estado'] = $login->estado;
      require_once "view/cabecera.php";
      echo "<script>Swal.fire('Bienvenido!','Inicio de Sesión Correcto.','success')</script>";
      require_once "view/pie.php";
    }else {
      require_once "view/login.php";
      echo "<script>Swal.fire('Error!','Las credenciales que envió son incorrectas','error')</script>";
    }
    if ($usuario == null) {
      require_once 'view/login.php';
    }
  }

  public function Registrar_Usuario()
  {
    $contraseña1 = $_REQUEST['contraseña1'];
    $contraseña2 = $_REQUEST['contraseña2'];
    if($contraseña1 != $contraseña2){
      require_once 'view/login.php';
      echo "<script>Swal.fire('Registro Cancelado!','Las Contraseñas ingresadas no coindicen entre ellas.','error')</script>";
    }else{
      $login = new Login();
      $login->nombre = $_REQUEST['nombre'];
      $login->contraseña = password_hash($contraseña2,PASSWORD_DEFAULT);
      $this->model->Registrar_Usuario($login);
      require_once 'view/login.php';
      echo "<script>Swal.fire('Registro Completo!','Se ha registrado a un nuevo usuario correctamente.','success')</script>";
    }
  }

  public function Cerrar_Sesion()
  {
    session_start();
    session_destroy();
    echo '<script>window.location.href ="index.php"</script>';
  }
}