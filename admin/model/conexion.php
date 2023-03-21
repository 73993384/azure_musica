<?php
class Conexion
{
  const server = "localhost";
  const user = "root";
  const pass = "";
  const name = "senati_musica_azure";

  public static function Conectar()
  {
    try {
      $conexion = new PDO("mysql:host=" . self::server . ";dbname=" . self::name . ";charset=utf8", self::user, self::pass);
      $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conexion;
    } catch (PDOException $e) {
      return "FALLO" . $e->getMessage();
    }
  }
}
