<?php
require_once "model/cancion.php";
require_once "model/album.php";
require_once "model/artista.php";
require_once "model/genero.php";

class CancionController
{
  private $model;
  private $genero;
  private $artista;
  private $album;

  public function __construct()
  {
    if (!isset($_SESSION["usuario"])) { //session permite si hay un usuario logeaqdo
      header("Location: index.php");
    }else{
      $this->model = new Cancion();
      $this->album = new Album();
      $this->genero = new Genero();
      $this->artista = new Artista();
    }
  }

  public function Listar_Canciones()
  {
    require_once "view/cabecera.php";
    require_once "view/cancion/listar_canciones.php";
    require_once "view/pie.php";
  }

  public function Agregar_Cancion()
  {
    $audio_name = $_FILES['audio']['name'];
    $tmp_name = $_FILES['audio']['tmp_name'];
    $audio_ex = pathinfo($audio_name, PATHINFO_EXTENSION);
    $audio_ex_lc = strtolower($audio_ex);
    $new_audio_name = uniqid("audio-", true). '.'.$audio_ex_lc;
    move_uploaded_file($tmp_name, "../assets/cancion/" . $new_audio_name);
    $cancion = new Cancion();
    $cancion->nombre = $_REQUEST['nombre'];
    $cancion->codigo_album = $_REQUEST['codigo_album'];
    $cancion->duracion = $_REQUEST['duracion'];
    $cancion->audio = $new_audio_name;
    $this->model->Agregar_Cancion($cancion);
    header("Location: index.php?c=cancion&a=Listar_Canciones");
  }

  public function Detalle_Cancion()
  {
    $id = $_REQUEST['id'];
    $r = $this->model->Listar_Cancion_Id($id);
    require_once "view/cabecera.php";
    require_once "view/cancion/listar_detalle_cancion.php";
    require_once "view/pie.php";
  }

  public function Editar_Cancion()
  {
    $audio_name = $_FILES['audio']['name'];
    $r = $this->model->Listar_Cancion_Id($_REQUEST['codigo_cancion']);
    if ($audio_name != "") {
      if (file_exists("../assets/cancion/".$r->audio)) {
        unlink("../assets/cancion/".$r->audio);
      }
      $tmp_name = $_FILES['audio']['tmp_name'];
      $audio_ex = pathinfo($audio_name, PATHINFO_EXTENSION);
      $audio_ex_lc = strtolower($audio_ex);
      $new_audio_name = uniqid("audio-", true). '.'.$audio_ex_lc;
      move_uploaded_file($tmp_name, "../assets/cancion/" . $new_audio_name);
    }else{
      $new_audio_name = $r->audio;
    }
    $cancion = new Cancion();
    $cancion->codigo_cancion = $_REQUEST['codigo_cancion'];
    $cancion->nombre = $_REQUEST['nombre'];
    $cancion->codigo_album = $_REQUEST['codigo_album'];
    $cancion->duracion = $_REQUEST['duracion'];
    $cancion->audio = $new_audio_name;
    $this->model->Editar_Cancion($cancion);
    /*echo "<pre>";
    var_dump($cancion);
    echo "</pre>";*/
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }
}
