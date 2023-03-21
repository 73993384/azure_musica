<?php
class Album
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = Conexion::Conectar();
  }

  public function Listar_Albums_1()
  {
    try {
      $sql = "SELECT al.*,a.nombre AS artista FROM albums AS al 
      INNER JOIN artistas AS a ON al.codigo_artista=a.codigo_artista;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Listar_Albums($codigo_genero,$codigo_artista)
  {
    try {
      $sql = "SELECT al.*,g.nombre AS genero,a.nombre AS artista FROM albums AS al 
      INNER JOIN artistas AS a ON al.codigo_artista=a.codigo_artista 
      INNER JOIN generos AS g ON a.codigo_genero=g.codigo_genero 
      WHERE g.codigo_genero=? AND a.codigo_artista=?;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute([$codigo_genero,$codigo_artista]);
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Agregar_Album($album)
  {
    try {
      $sql = "INSERT INTO albums (nombre,codigo_artista,imagen,descripcion) VALUES(?,?,?,?)";
      $this->pdo->prepare($sql)->execute(array(
        $album->nombre,
        $album->codigo_artista,
        $album->imagen,
        $album->descripcion
      ));
    } catch (Exception $e) {
       die($e->getMessage());
    }
  }

  public function Listar_Album_Id($codigo_album)
  {
    try {
      $sql = "SELECT * FROM albums WHERE codigo_album=?;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute([$codigo_album]);
      return $consulta->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Editar_Album($album)
  {
    try {
      $sql = "UPDATE albums SET nombre=?,descripcion=?,imagen=?,codigo_artista=?,fecha_actualizacion=NOW() WHERE codigo_album=?";
      $this->pdo->prepare($sql)->execute(array(
        $album->nombre,
        $album->descripcion,
        $album->imagen,
        $album->codigo_artista,
        $album->codigo_album
      ));
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}