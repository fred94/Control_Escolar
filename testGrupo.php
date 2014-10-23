<?php
require('header.php');
require('Grupo.php');
require('conexion.php');
$grupo=new Grupo();
if(isset($_REQUEST['accion'])){
    $accion=$_REQUEST['accion'];
}else{
    $accion=0;
}
switch($accion){
    case 0:
        $grupo->mostarGrupos();
        $grupo->mostrarAlumnos();
        break;
    case 1:
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $idalu = $_POST['alumnos'];
            $idgrup = $_POST['grupo'];
            $count = count($idalu);
            for($i = 0; $i < $count; $i++){
                $idalumno = $idalu[$i];
                $grupo->asignarAlummnos($idalumno,$idgrup);
                //$Grup->InsertVal($idalumno,$idgrup);
            }
        }
        $grupo->mostarGrupos();
        $grupo->mostrarAlumnos();
        break;
    case 2:
        $idu=$_REQUEST['idu'];
        $grupo->desasignarAlummnos($idu);
        $grupo->mostarGrupos();
        $grupo->mostrarAlumnos();
        break;
}
require('footer.php');
?>