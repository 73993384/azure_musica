<?php
class Cancion
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = Conexion::Conectar();
  }

  public function Listar_Canciones_()
  {
    try {
      $sql = "SELECT c.*,a.nombre AS artista,al.nombre AS album FROM canciones AS c 
      INNER JOIN albums AS al ON c.codigo_album=al.codigo_album 
      INNER JOIN artistas AS a ON al.codigo_artista=a.codigo_artista;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Listar_Canciones($codigo_album)
  {
    try {
      $sql = "SELECT c.*,a.nombre AS artista,al.nombre AS album FROM canciones AS c 
      INNER JOIN albums AS al ON c.codigo_album=al.codigo_album 
      INNER JOIN artistas AS a ON al.codigo_artista=a.codigo_artista 
      WHERE al.codigo_album=?;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute([$codigo_album]);
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Agregar_Cancion($cancion)
  {
    try {
      $sql = "INSERT INTO canciones (nombre,duracion,codigo_album,audio) VALUES(?,?,?,?)";
      $this->pdo->prepare($sql)->execute(array(
        $cancion->nombre,
        $cancion->duracion,
        $cancion->codigo_album,
        $cancion->audio
      ));
    } catch (Exception $e) {
       die($e->getMessage());
    }
  }

  public function Listar_Cancion_Id($codigo_cancion)
  {
    try {
      $sql = "SELECT c.*,a.nombre AS artista,al.nombre AS album FROM canciones AS c 
      INNER JOIN albums AS al ON c.codigo_album=al.codigo_album 
      INNER JOIN artistas AS a ON al.codigo_artista=a.codigo_artista 
      WHERE c.codigo_cancion=?";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute([$codigo_cancion]);
      return $consulta->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Editar_Cancion($cancion)
  {
    try {
      $sql = "UPDATE canciones SET nombre=?,duracion=?,codigo_album=?,audio=?,fecha_actualizacion=NOW() WHERE codigo_cancion=?";
      $this->pdo->prepare($sql)->execute(array(
        $cancion->nombre,
        $cancion->duracion,
        $cancion->codigo_album,
        $cancion->audio,
        $cancion->codigo_cancion
      ));
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}