<?php
$user=$_POST['user'];
$psw=$_POST['contra'];
if($user=="" or $psw==""){
    $msg="Usuario y Constraseña Obligatoros.";
    print "<meta http-equiv='refresh' content='0; url=index.php?msg=".$msg."'>";
}
else{
    require('conexion.php');
    $sql="SELECT * FROM usuarios WHERE usuario = '$user'";
    $consulta=mysql_query($sql)or die("Error en consulta");
    $cuantos=mysql_num_rows($consulta);
    if($cuantos==1){
        $psw=md5($psw);
        $contra=mysql_result($consulta,0,'contrasena');
        if($contra==$psw){
            $act=mysql_result($consulta,0,'estatus');
            if($act==1){
                $idu=mysql_result($consulta,0,'idu');
                $niv=mysql_result($consulta,0,'nivel');
                print"<meta http-equiv='refresh' content='0; url=accesos.php?idu=".$idu."&niv=".$niv."'>";
            }
            else{
                $msg="Usuario no disponible.";
                print"<meta http-equiv='refresh' content='0; url=index.php?msg=".$msg."'>";
            }
        }
        else{
            $msg="Usuario y/o Contraseña no son correctos.";
            print"<meta http-equiv='refresh' content='0; url=index.php?msg=".$msg."'>";
        }
    }
    else{
        $msg="Existe un error con su Usuario.";
        //echo($sql);
        print"<meta http-equiv='refresh' content='0; url=index.php?msg=".$msg."'>";
    }
}
?>