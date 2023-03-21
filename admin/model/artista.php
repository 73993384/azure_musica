<?php
class Artista
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = Conexion::Conectar();
  }

  public function Listar_Artistas_()
  {
    try {
      $sql = "SELECT * FROM artistas;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Listar_Artistas($codigo_genero)
  {
    try {
      $sql = "SELECT a.*,g.nombre AS genero FROM artistas AS a 
      INNER JOIN generos AS g ON a.codigo_genero=g.codigo_genero WHERE g.codigo_genero=?;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute([$codigo_genero]);
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Agregar_Artista($artista)
  {
    try {
      $sql = "INSERT INTO artistas (nombre,codigo_genero,imagen,nacionalidad) VALUES(?,?,?,?)";
      $this->pdo->prepare($sql)->execute(array(
        $artista->nombre,
        $artista->codigo_genero,
        $artista->imagen,
        $artista->nacionalidad
      ));
    } catch (Exception $e) {
       die($e->getMessage());
    }
  }

  public function Listar_Artista_Id($codigo_artista)
  {
    try {
      $sql = "SELECT * FROM artistas WHERE codigo_artista=?;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute([$codigo_artista]);
      return $consulta->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Editar_Artista($artista)
  {
    try {
      $sql = "UPDATE artistas SET nombre=?,codigo_genero=?,imagen=?,nacionalidad=?,fecha_actualizacion=NOW() WHERE codigo_artista=?";
      $this->pdo->prepare($sql)->execute(array(
        $artista->nombre,
        $artista->codigo_genero,
        $artista->imagen,
        $artista->nacionalidad,
        $artista->codigo_artista
      ));
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
