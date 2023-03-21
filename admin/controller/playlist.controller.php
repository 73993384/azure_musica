<?php
require_once "model/playlist.php";
require_once "model/cancion.php";


class PlaylistController
{
  private $model;
  private $cancion;

  public function __construct()
  {
    if (!isset($_SESSION["usuario"])) { //session permite si hay un usuario logeaqdo
      header("Location: index.php");
    }else{
      $this->model = new Playlist();
      $this->cancion = new Cancion();
    }
  }

  public function Listar_Playlists()
  {
    require_once "view/cabecera.php";
    require_once "view/playlist/listar_playlist.php";
    require_once "view/pie.php";
  }

  public function Agregar_Playlist()
  {
    $playlist = new Playlist();
    $playlist->nombre = $_REQUEST['nombre'];
    $playlist->codigo_usuario = $_SESSION['codigo_usuario'];
    $this->model->Agregar_Playlist($playlist);
    header("Location: index.php?c=playlist&a=Listar_Playlists");
  }
  public function Eliminar_Playlist()
  {
    $playlist = new Playlist();
    $codigo_playlist = $_REQUEST['id'];
    $this->model->Eliminar_Playlist($codigo_playlist);
    header("Location: index.php?c=playlist&a=Listar_Playlists");
  }

  public function Detalle_Playlist()
  {
    $id = $_REQUEST['id'];
    $r = $this->model->Listar_Playlist_Id($id);
    $p = $this->model->Listar_Detalle_Playlist($id);
    require_once "view/cabecera.php";
    require_once "view/playlist/listar_detalle_playlist.php";
    require_once "view/pie.php";
  }

  public function Agregar_Cancion_Playlist()
  {
    $playlist = new Playlist();
    $playlist->codigo_playlist = $_REQUEST['codigo_playlist'];
    $playlist->codigo_cancion = $_REQUEST['codigo_cancion'];
    $this->model->Agregar_Cancion_Playlist($playlist);
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }

}
