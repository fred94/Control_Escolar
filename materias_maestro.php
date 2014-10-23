<?php
require("header.php");
require("Materia.php");
$materia= new Materia();

$id=$_SESSION['id'];
$materia->datosMaestro($id);
$materia->consultarMateriasAsignadas($id);

require("footer.php");
?>