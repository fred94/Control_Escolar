<?php
require("header.php");
require("Alumno.php");
require("conexion.php");
    $alumno=new Alumno();
    $alumno->readUsuarioG();
require("footer.php");
?>