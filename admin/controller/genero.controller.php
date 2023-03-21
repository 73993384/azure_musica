<?php
require_once "model/genero.php";

class GeneroController
{
  private $model;

  public function __construct()
  {
    if (!isset($_SESSION["usuario"])) { //session permite si hay un usuario logeaqdo
      header("Location: index.php");
    }else{
      $this->model = new Genero();
    }
  }

  public function Listar_Generos()
  {
    require_once "view/cabecera.php";
    require_once "view/genero/listar_generos.php";
    require_once "view/pie.php";
  }

  public function Agregar_Genero()
  {
    $genero = new Genero();
    $genero->nombre = $_REQUEST['nombre'];
    $this->model->Agregar_Genero($genero);
    header("Location: index.php?c=genero&a=Listar_Generos");
  }

  public function Editar_Genero()
  {
    $genero = new Genero();
    $genero->codigo_genero = $_REQUEST['codigo_genero'];
    $genero->nombre = $_REQUEST['nombre'];
    $this->model->Editar_Genero($genero);
    header("Location: index.php?c=genero&a=Listar_Generos");
  }

}
