<?php
class Playlist
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = Conexion::Conectar();
  }

  public function Listar_Playlist()
  {
    try {
      $sql = "SELECT * FROM playlist;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Listar_Playlist_Id($codigo_playlist)
  {
    try {
      $sql = "SELECT * FROM playlist WHERE codigo_playlist=?;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute([$codigo_playlist]);
      return $consulta->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Agregar_Playlist($playlist)
  {
    try {
      $sql = "INSERT INTO playlist (nombre,codigo_usuario) VALUES(?,?)";
      $this->pdo->prepare($sql)->execute(array(
        $playlist->nombre,
        $playlist->codigo_usuario
      ));
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Eliminar_Playlist($codigo_playlist)
  {
    try {
      $sql = "DELETE FROM playlist WHERE codigo_playlist=?";
      $this->pdo->prepare($sql)->execute(array(
        $codigo_playlist
      ));
    } catch (Exception $e) {
       die($e->getMessage());
    }
  }
  
  public function Listar_Detalle_Playlist($codigo_playlist)
  {
    try {
      $sql = "SELECT dp.*,c.nombre AS cancion,c.duracion,c.audio,al.nombre AS album,a.nombre AS artista 
      FROM detalle_playlist AS dp INNER JOIN canciones AS c ON dp.codigo_cancion=c.codigo_cancion 
      INNER JOIN albums AS al ON c.codigo_album=al.codigo_album 
      INNER JOIN artistas AS a ON al.codigo_artista=a.codigo_artista WHERE dp.codigo_playlist=?;";
      $consulta = $this->pdo->prepare($sql);
      $consulta->execute([$codigo_playlist]);
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Agregar_Cancion_Playlist($playlist)
  {
    try {
      $sql = "INSERT INTO detalle_playlist (codigo_playlist,codigo_cancion) VALUES(?,?)";
      $this->pdo->prepare($sql)->execute(array(
        $playlist->codigo_playlist,
        $playlist->codigo_cancion
      ));
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
