<?php
require_once "model/artista.php";
require_once "model/genero.php";


class ArtistaController
{
  private $model;
  private $genero;

  public function __construct()
  {
    if (!isset($_SESSION["usuario"])) { //session permite si hay un usuario logeaqdo
      header("Location: index.php");
    }else{
      $this->model = new Artista();
      $this->genero = new Genero();
    }
  }

  public function Listar_Artistas()
  {
    require_once "view/cabecera.php";
    require_once "view/artista/listar_artistas.php";
    require_once "view/pie.php";
  }

  public function Agregar_Artista()
  {
    $fecha = new DateTime();
    $nombreArchivo = $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"];
    $tmpImagen = $_FILES["imagen"]["tmp_name"];
    move_uploaded_file($tmpImagen, "../assets/img/artista/" . $nombreArchivo);
    $url = "assets/img/artista/" . $nombreArchivo;
    $artista = new Artista();
    $artista->nombre = $_REQUEST['nombre'];
    $artista->codigo_genero = $_REQUEST['codigo_genero'];
    $artista->nacionalidad = $_REQUEST['nacionalidad'];
    $artista->imagen = $url;
    $this->model->Agregar_Artista($artista);
    header("Location: index.php?c=artista&a=Listar_Artistas");
  }

  public function Editar_Artista()
  {
    $txtImagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
    $r = $this->model->Listar_Artista_Id($_REQUEST['codigo_artista']);
    if ($txtImagen != "") {
      if (file_exists("../".$r->imagen)) {
        unlink("../".$r->imagen);
      }
      $fecha = new DateTime();
      $nombreArchivo = $fecha->getTimestamp() . "_" . $_FILES["imagen"]["name"];
      $tmpImagen = $_FILES["imagen"]["tmp_name"];
      move_uploaded_file($tmpImagen, "../assets/img/artista/" . $nombreArchivo);
      $imagen = "assets/img/artista/" . $nombreArchivo;
    }else{
      $imagen = $r->imagen;
    }
    $artista = new Artista();
    $artista->codigo_artista = $_REQUEST['codigo_artista'];
    $artista->codigo_genero = $_REQUEST['codigo_genero'];
    $artista->nombre = $_REQUEST['nombre'];
    $artista->nacionalidad = $_REQUEST['nacionalidad'];
    $artista->imagen = $imagen;
    /*echo "<pre>";
    var_dump($artista);
    echo "</pre>";*/
    $this->model->Editar_Artista($artista);
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }
}
