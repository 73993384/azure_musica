<?php
date_default_timezone_set("America/Lima");//Zona horaria de Peru
require_once "model/conexion.php";
session_start();

if (!isset($_GET['c'])) {
  require_once "controller/login.controller.php";
  $controller = new LoginController();
  call_user_func(array($controller, "Inicio"));
} else {
  $controller =  $_GET['c'];
  require_once "controller/$controller.controller.php";
  $controller = ucwords($controller) . "Controller";
  $controller = new $controller;
  $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
  call_user_func(array($controller, $accion));
}
