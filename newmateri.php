<?php
$idm=$_REQUEST['clave'];
$nom=$_REQUEST['nombre'];
$ord=$_REQUEST['orden'];
$act=$_REQUEST['activo'];
//$ava=$_REQUEST["avatar"];
require('Materia.php');
$materia = new Materia();
$materia->insertMateria($idm,$nom,$ord,$act);

$materia->queryMaterias();
?>