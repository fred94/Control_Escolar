<?php

class Login {
    public function mostrarNombre($id){
        require('conexion.php');
        $sql="select * from usuarios where idu=$id";
        $consulta=mysql_query($sql)or die("Error de consulta");
        $n=mysql_result($consulta,0,'nombre');
        $p=mysql_result($consulta,0,'paterno');
        echo"<h1>¡Bienvenido $n $p!</h1><p>Al Sistema de Control Escolar .</p>";
    }

} 