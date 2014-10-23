<?php
class Usuario {
    private $id;
    private $nombre;
    private $paterno;
    private $materno;
    private $telefono;
    private $calle;
    private $exterior;
    private $interior;
    private $colonia;
    private $municipio;
    private $estado;
    private $cp;
    private $correo;
    private $usuario;
    private $contrasena;
    private $nivel;
    private $estatus;

    public function createUsuario($nombre,$paterno,$materno,$nivel){
        require("conexion.php");
        $sql="insert into usuarios (nombre,paterno,materno,nivel,estatus) values ('$nombre','$paterno','$materno',$nivel,1)";
        $consulta=mysql_query($sql);

    }
    public function readUsuarioG(){
        require('conexion.php');
        $sql="SELECT * FROM usuarios ORDER BY paterno ASC ";
        $consulta=mysql_query($sql)or die("Error de consulta".mysql_error());

        echo("<table class='table table-striped table-responsive' ><tr><th colspan='7'>Lista de Usuarios</th></tr><tr><th>ID</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nombre(s)</th><th>Nivel</th><th>Estatus</th></tr>");
        while($field = mysql_fetch_array($consulta)){
            $this->id = $field['idu'];
            $this->nombre=$field['nombre'];
            $this->paterno=$field['paterno'];
            $this->materno=$field['materno'];
            $this->nivel=$field['nivel'];
            $this->usuario=$field['usuario'];
            $this->estatus=$field['estatus'];
            switch($this->nivel){
                case 1:
                    $niv="Administrador";
                    break;
                case 2:
                    $niv="Profesor";
                    break;
                case 3:
                    $niv="Alumno";
                    break;
            }
            switch ($this->estatus) {
                case 0:
                    $aux="Inactivo";
                    break;
                case 1:
                    $aux="Activo";
                    break;
            }
            echo("<tr><td>".$this->id."</td><td>".$this->paterno."</td><td>".$this->materno."</td><td>".$this->nombre."</td><td>".$niv."</td><td>".$aux."</td></tr>");
        }
    }
    public function readUsuarioS($id){
        require('conexion.php');
        $sql2="SELECT * FROM usuarios where idu = $id  ";
        $consulta2=mysql_query($sql2);
        if($consulta2==true){
        echo("<div class='panel panel-info'><div class='panel-heading'><h3 class='panel-title'>Resultado de la Búsqueda</h3></div><div class='panel-body'><table class='table table-striped'><tr><th>ID</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nombre(s)</th></tr>");
        while($field = mysql_fetch_array($consulta2)){
            $this->id = $field['idu'];
            $this->nombre=$field['nombre'];
            $this->paterno=$field['paterno'];
            $this->materno=$field['materno'];
            $this->nivel=$field['nivel'];
            echo("<tr><td>".$this->id."</td><td>".$this->paterno."</td><td>".$this->materno."</td><td>".$this->nombre."</td></tr>");
        }
        echo("</table></div></div>");
        }
    }
    public function updateUsuario($id,$nombre,$paterno,$materno,$nivel){
        require("conexion.php");
        $sql="UPDATE usuarios SET nombre='$nombre', paterno='$paterno', materno='$materno', nivel=$nivel WHERE idu=$id";
        $consulta=mysql_query($sql);
    }
    public function deleteUsuario($id){
        require("conexion.php");
        $sql="DELETE FROM usuarios WHERE idu=$id";
        $consulta=mysql_query($sql);
    }
}
?>