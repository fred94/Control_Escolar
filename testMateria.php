<?php
require("header.php");
require("Materia.php");
$materia=new Materia();
if(isset($_REQUEST['accion'])){
    $accion=$_REQUEST['accion'];
    $idmaestro=$_REQUEST['maestro'];
    $idmateria=$_REQUEST['materia'];
}else{
    $accion=0;
}
switch($accion){
    case 0:
        $materia->mostrarMaestro();
        break;
    case 1:
        $materia->createMaestroMateria($idmateria,$idmaestro);
        $materia->mostrarMaestro();
        break;
    case 2:
        $materia->deleteMaestroMateria($idmateria,$idmaestro);
        $materia->mostrarMaestro();
        break;
}

require('footer.php');
?>