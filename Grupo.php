<?php
class Grupo {
private $idg;
private $nombre;
private $orden;
private $estatus;
    public function mostarGrupos(){
        $sql="SELECT * FROM grupos WHERE estatus=1";
        $consulta=mysql_query($sql)or die("Error de consulta");
        echo"<form method='POST' action='testGrupo.php'> <table><tr><td><strong>Grupo:</strong></td><td><select name='grupo' id='grupo'>";
        while($field=mysql_fetch_array($consulta)){
            $idg=$field['idg'];
            $nom=$field['nombre'];
            echo"<option value=$idg>$nom</option>";
        }
        echo"</select></td></tr></table>";
    }
    public function mostrarAlumnos(){
        $sql="SELECT * FROM usuarios WHERE nivel=3";
        $consulta=mysql_query($sql)or die("Error de consulta");
        echo"<table>";
        while($field=mysql_fetch_array($consulta)){
            $nombre=$field['nombre'];
            $materno=$field['materno'];
            $paterno=$field['paterno'];
            $idu=$field['idu'];
            $sql2="SELECT * FROM grupo_alumnos WHERE idu=$idu";
            $consulta2=mysql_query($sql2)or die("error de consulta2");
            $cuantos=mysql_num_rows($consulta2);
            if($cuantos>0){
                echo"<tr><td colspan='2'>$nombre $paterno $materno Ya tiene grupo<br><a href='testGrupo.php?accion=2&idu=$idu'>Desasignar del Grupo</a> </td></tr>";
            }
            else{
                echo"<tr><td><input type='checkbox' name='alumnos[]' value='$idu'></td><td>$nombre $paterno $materno</td></tr>";
            }
        }
        echo"<tr><td colspan='2'><input type='hidden' name='accion' value='1'><input type='submit' value='Asignar Grupo'></td> </tr></table></form>";
    }
    public function asignarAlummnos($alumnos,$grupo){
        $sql="insert into grupo_alumnos (idu,idg) values ($alumnos,$grupo)";
        $consulta=mysql_query($sql)or die("Error de consulta");
    }
    public function desasignarAlummnos($alummno){
        $sql="DELETE FROM grupo_alumnos WHERE idu=$alummno";
        $consulta=mysql_query($sql)or die("Error de consulta");
    }
}
?>