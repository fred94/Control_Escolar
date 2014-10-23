<?php
require("Usuario.php");
require("Maestro.php");
$maestro = new Maestro();
$maestro->deleteUsuario();
$maestro->createUsuario();
$maestro->readUsuarioS();
$maestro->readUsuarioG();
$maestro->updateUsuario();
?>