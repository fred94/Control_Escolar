<?php
class Materia {
    private $idm;
    private $nombre;
    private $orden;
    private $avatar;
    private $activo;

    public function insertMateria($i,$n,$o,$a){
        require("conexion.php");
        $sql="insert into materias (idm,nombre,orden,activo) values ($i,'$n','$o','$a')";
        $consulta=mysql_query($sql);
        if($consulta==true){
            echo("Muy Bien");
        }else{
            echo("Muy Mal");
        }
    }
    public function queryMaterias(){
        require("conexion.php");
        $sql="Select * from materias order by nombre asc ";
        $consulta=mysql_query($sql);
        echo("<table class='table table-bordered' ><tr><th>ID</th><th>Materia</th><th>Orden</th><th>Estatus</th><th>Acciones</th></tr>");
        while($field = mysql_fetch_array($consulta)){
            $this->idm = $field['idm'];
            $this->nombre=$field['nombre'];
            $this->orden=$field['orden'];
            $this->activo=$field['activo'];
            echo("<tr><td>".$this->idm."</td><td>".$this->nombre."</td><td>".$this->orden."</td><td>".$this->activo."</td><td><img src='img/modify.png'><img src='img/delete.png'</td></tr>");
        }
    }
    public function mostrarMaestro(){
        require("conexion.php");
        echo"<div class=table-responsive>";
        echo"<form action=ajax.php method='POST' name='materia' target='_self'>";
        echo"<table class='table table-striped'>";
        echo"<tr><td class='mio'>Maestro:</td><td><select name='maestro'>";
        $sql="select * from usuarios where estatus='1' and nivel=2 order by paterno asc ";
        $consulta=mysql_query($sql)or die("Error de consulta");
        while($field=mysql_fetch_array($consulta)){
            $idt = $field['idu'];
            $opc = utf8_decode($field['paterno']." ".$field['materno']." ".$field['nombre']);
            echo"<option value=$idt>$opc</option>";
        }
        echo"</select></td></tr>";
        echo"<tr><td colspan='2' align='center'><input type='submit' id='submit' value='Seleccionar' /></td></tr>";
        echo"</table>";
        echo"</form>";
        echo"</div";
    }
    public function datosMaestro($idt){
        require("conexion.php");
        $sql="select * from usuarios where idu=$idt";
        $consulta=mysql_query($sql)or die("Error de consulta $sql");
        $cuantos=mysql_num_rows($consulta);
        if($cuantos > 0){
            $nombre = $idt ." ";
            $nombre .=mysql_result($consulta,0,'paterno');
            $nombre .=" ".mysql_result($consulta,0,'materno');
            $nombre .=" ".mysql_result($consulta,0,'nombre');
            $nombre=utf8_decode($nombre);
            echo"<div class='panel panel-primary'>
            <div class='panel-heading'>
              <h3 class='panel-title'>Materias Asignadas del Profesor: <strong>".$nombre."</h3>
            </div>";

        }
    }
    public function materiasAsignadas($idt){
        require("conexion.php");
        $sql="SELECT ma.nombre, ma.idm FROM materias AS ma, maestro_materia AS de WHERE ma.idm=de.idm AND de.idp=$idt";
        $consulta=mysql_query($sql)or die("Error de consulta");
        echo"<div class='panel-body'><table class='table table-striped'><tr><td>Materia</td><td>¿Eliminar?</td></tr>";
        while($field=mysql_fetch_array($consulta)){
            $nombre=$field['nombre'];
            $idm=$field['idm'];
            echo("<tr><td>$nombre</td><td><a href='testMateria.php?materia=$idm&maestro=$idt&accion=2'>Eliminar</a></td></tr>");
        }
        echo"</table></div></div>";
    }
    public function asignarMateriasaMaestro($idmaestro){
        echo"<div class='table-responsive'>";
        echo"<table class=\"table table-striped\">";
        echo"<form action='testMateria.php' method='POST' id='materias'>";
        echo"<tr><td colspan='2' align='center'><strong>Asignar Nueva Materia</strong></td></tr>";
        echo"<tr><td>Materia:</td><td><select name='materia' id='materia'>";
        require('conexion.php');
        $sql="select * from materias where activo='1' order by nombre asc ";
        $consulta=mysql_query($sql)or die("Error de consulta1");
        while($field=mysql_fetch_array($consulta)){
            $idm=$field['idm'];
            $nom=utf8_decode($field['nombre']);
            $sql2="select * from maestro_materia where idp=$idmaestro and idm=$idm";
            $consulta2=mysql_query($sql2)or die("Error de consulta2");
            $esxite=mysql_num_rows($consulta2);
            if($esxite>0){

            }else{
                echo"<option value=$idm>$nom</option>";
            }
        }
        echo"</select></td></tr>";
        echo"<input type='hidden' id='accion' name='accion' value='1'>";
        echo"<input type='hidden' id='maestro' name='maestro' value='$idmaestro'>";
        echo"<tr><td colspan='2' align='center'><input type='submit' value='Agregar'></td></tr>";
        echo"</form></table></div>";
    }
    public function createMaestroMateria($idmateria, $idmaestro){
        require('conexion.php');
        $sql="INSERT INTO maestro_materia(idp, idm) VALUES ($idmaestro,$idmateria)";
        $consulta=mysql_query($sql)or die("Error de consulta");
    }
    public function deleteMaestroMateria($idmateria, $idmaestro){
        require('conexion.php');
        $sql="DELETE FROM maestro_materia WHERE idp=$idmaestro AND idm=$idmateria";
        $consulta=mysql_query($sql)or die("Error de consulta");
    }
    public function consultarMateriasAsignadas($idt){
        require("conexion.php");
        $sql="SELECT ma.nombre, ma.idm FROM materias AS ma, maestro_materia AS de WHERE ma.idm=de.idm AND de.idp=$idt";
        $consulta=mysql_query($sql)or die("Error de consulta");
        echo"<div class='panel-body'><table class='table table-striped'><tr><td>Materia(s)</td></tr>";
        while($field=mysql_fetch_array($consulta)){
            $nombre=$field['nombre'];
            $idm=$field['idm'];
            echo("<tr><td>$nombre</td></tr>");
        }
        echo"</table></div></div>";
    }
}
?>