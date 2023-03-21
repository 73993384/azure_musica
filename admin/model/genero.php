<?php
class Genero
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = Conexion::Conectar();
  }

  public function Listar_Generos()
  {
    try {
      $sql = "SELECT * FROM generos;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Agregar_Genero($artista)
  {
    try {
      $sql = "INSERT INTO generos (nombre) VALUES(?)";
      $this->pdo->prepare($sql)->execute(array(
        $artista->nombre
      ));
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }


  public function Editar_Genero($genero)
  {
    try {
      $sql = "UPDATE generos SET nombre=?,fecha_actualizacion=NOW() WHERE codigo_genero=?";
      $this->pdo->prepare($sql)->execute(array(
        $genero->nombre,
        $genero->codigo_genero
      ));
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
