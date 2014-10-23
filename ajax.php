<?php
require("header.php");
require("Materia.php");
$materia= new Materia();
$idt=$_POST['maestro'];
$materia->datosMaestro($idt);
$materia->materiasAsignadas($idt);
$materia->asignarMateriasaMaestro($idt);
require("footer.php");
?>