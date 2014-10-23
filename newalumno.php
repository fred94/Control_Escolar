<?php
include('header.php');
require('Usuario.php');
$usuario = new Usuario();
if(isset($_POST['submit'])){
    switch($_POST['submit']){
        case "Registrar":
            $usuario->createUsuario("$_POST[nombre]","$_POST[paterno]","$_POST[materno]",$_POST['nivel']);
          //  echo("Registrar");
            break;
        case "Modificar":
            $usuario->updateUsuario($_POST['idm'],"$_POST[nombre]","$_POST[paterno]","$_POST[materno]",$_POST['nivel']);
           // echo("modificar");
            break;
        case "Eliminar";
            $usuario->deleteUsuario($_POST['idd']);
            //echo("Eliminar");
            break;
        case "Buscar";
            $usuario->readUsuarioS($_POST['idb']);
            //echo("Buscar");
            break;
    }
}
?>



            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Registro de Usuarios</h3>
                </div>
                <div class="panel-body">
                    <form method="post" action="newalumno.php">
                        <table class="table">
                            <tr><td class="mio">A. Paterno:</td><td><input class="form-control" type="text" name="paterno" id="paterno"/></td>
                                <td class="mio">A. Materno:</td><td><input class="form-control" type="text" name="materno" id="materno"/></td></tr>
                            <tr><td class="mio">Nombres (s):</td><td><input class="form-control" type="text" name="nombre" id="nombre"/><!--</td>
                <td class="mio">Teléfono:</td><td><input class="form-control" type="text" name="telefono" id="telefono"/></td></tr>
            <tr><td class="mio">Calle:</td><td><input class="form-control" type="text" name="calle" id="calle"/></td>
                <td class="mio">Num. Exterior:</td><td><input class="form-control" type="text" name="exterior" id="exterior"/></td></tr>
            <tr><td class="mio">Num. Interior:</td><td><input class="form-control" type="text" name="interior" id="interior"/></td>
                <td class="mio">Colonia:</td><td><input class="form-control" type="text" name="colonia" id="materno"/></td></tr>
            <tr><td class="mio">Municipio:</td><td><input type="text"  class="form-control" name="municipio" id="municipio"/></td>
                <td class="mio">Estado:</td><td><input type="text" class="form-control" name="estado" id="estado"/></td></tr>
            <tr><td class="mio">Código Postal:</td><td><input type="text" name="cp" class="form-control" id="cp"/></td>
                <td class="mio">Correo:</td><td><input type="text" name="correo" id="correo" class="form-control"/></td></tr>
            <tr><td class="mio">Usuario:</td><td><input type="text" name="usuario" id="usuario" class="form-control"/></td>
                <td class="mio">Contraseña:</td><td><input type="password" name="psw" id="psw" class="form-control"/></td></tr>
            <tr><td class="mio">Confirmar Contraseña:</td><td><input type="password" name="psw2" id="psw2" class="form-control"/></td>-->
                                <td class="mio">Nivel:</td><td><select name="nivel" id="nivel" class="form-control"><option value="1">Administrador</option><option value="2">Profesor</option><option value="3">Alumno</option></select></td></tr>
                            <!-- <tr><td class="mio">Estatus:</td><td><input type="radio" value="1" name="estatus" id="estatus" checked="" />Activo <input type="radio" name="estatus" id="estatus" value="0"/>Inactivo</td>
                                 <td class="mio"></td><td></td></tr>-->
                            <tr><td></td><td></td><td><input type="submit" name="submit" class="btn btn-lg btn-success" value="Registrar" /></td><td></td></tr>
                            <tr><td class="mio">ID:</td><td><input type="text" class="form-control" name="idm" id="idm"/></td><td><input type="submit" name="submit" class="btn btn-lg btn-warning" value="Modificar"/></td><td></td></tr>
                            <tr><td class="mio">ID:</td><td><input type="text" class="form-control" name="idd" id="idd"/></td><td><input type="submit" name="submit" class="btn btn-lg btn-danger" value="Eliminar"/></td><td></td></tr>
                            <tr><td class="mio">ID:</td><td><input type="text"  class="form-control" name="idb" id="idb"/></td><td><input type="submit" name="submit" class="btn btn-lg btn-info" value="Buscar"/></td><td></td></tr>
                        </table>

                    </form>

                </div>
            </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Lista de Usuarios</h3>
        </div>
        <div class="panel-body">
            <?php $usuario->readUsuarioG(); ?>
        </div>
    </div>
<?php
include('footer.php');
?>