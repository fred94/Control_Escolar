<?php
require("Usuario.php");
require("conexion.php");
$usuario =new Usuario();
//$usuario->createUsuario('alfredo','neri','colin','7223763280','juan alvares','s/n','22','Barrio de santiaguito','ocoyoacac,','mexico','52740','ferdyneri94@hotmail.com','fredy','gdshahsgahs','2','1');
$usuario->readUsuarioG();
$usuario->readUsuarioS(1);
//$usuario->updateUsuario();
//$usuario->deleteUsuario();
?>