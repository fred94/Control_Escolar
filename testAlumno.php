<?php
require("Alumno.php");
$alumno=new Alumno();
$alumno->updateUsuario();
$alumno->readUsuarioS();
$alumno->readUsuarioG();
$alumno->createUsuario();
$alumno->deleteUsuario();
?>