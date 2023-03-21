<?php
require_once "model/album.php";
require_once "model/artista.php";
require_once "model/genero.php";

class AlbumController
{
  private $model;
  private $genero;
  private $artista;

  public function __construct()
  {
    if (!isset($_SESSION["usuario"])) { //session permite si hay un usuario logeaqdo
      header("Location: index.php");
    }else{
      $this->model = new Album();
      $this->genero = new Genero();
      $this->artista = new Artista();
    }
  }

  public function Listar_Albums()
  {
    require_once "view/cabecera.php";
    require_once "view/album/listar_albums.php";
    require_once "view/pie.php";
  }

  public function Agregar_Album()
  {
    $fecha = new DateTime();
    $nombreArchivo = $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"];
    $tmpImagen = $_FILES["imagen"]["tmp_name"];
    move_uploaded_file($tmpImagen, "../assets/img/album/" . $nombreArchivo);
    $url = "assets/img/album/" . $nombreArchivo;
    $album = new Album();
    $album->nombre = $_REQUEST['nombre'];
    $album->codigo_artista = $_REQUEST['codigo_artista'];
    $album->descripcion = $_REQUEST['descripcion'];
    $album->imagen = $url;
    $this->model->Agregar_Album($album);
    header("Location: index.php?c=album&a=Listar_Albums");
  }

  public function Editar_Album()
  {
    $txtImagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
    $r = $this->model->Listar_Album_Id($_REQUEST['codigo_album']);
    if ($txtImagen != "") {
      if (file_exists("../".$r->imagen)) {
        unlink("../".$r->imagen);
      }
      $fecha = new DateTime();
      $nombreArchivo = $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"];
      $tmpImagen = $_FILES["imagen"]["tmp_name"];
      move_uploaded_file($tmpImagen, "../assets/img/album/" . $nombreArchivo);
      $imagen = "assets/img/album/" . $nombreArchivo;
    }else{
      $imagen = $r->imagen;
    }
    $album = new Album();
    $album->codigo_album = $_REQUEST['codigo_album'];
    $album->nombre = $_REQUEST['nombre'];
    $album->codigo_artista = $_REQUEST['codigo_artista'];
    $album->descripcion = $_REQUEST['descripcion'];
    $album->imagen = $imagen;
    /*echo "<pre>";
    var_dump($artista);
    echo "</pre>";*/
    $this->model->Editar_Album($album);
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }
}
