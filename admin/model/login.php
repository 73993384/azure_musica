<?php
class Login
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = Conexion::Conectar();
  }

  public function Iniciar_Sesion($usuario)
  {
    try {
      $sql = "SELECT * FROM usuarios WHERE nombre = ?;";
      $stm = $this->pdo->prepare($sql);
      $stm->execute([$usuario]);
      return $stm->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Registrar_Usuario($usuario)
  {
    try {
      $sql = "INSERT INTO usuarios (nombre,contraseña,estado) VALUES(?,?,2)";
      $this->pdo->prepare($sql)->execute(array(
        $usuario->nombre,
        $usuario->contraseña
      ));
    } catch (Exception $e) {
       die($e->getMessage());
    }
  }
}
