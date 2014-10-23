<?php
require('header.php');
require('Login.php');
$id=$_SESSION['id'];
$log=new Login();
$log->mostrarNombre($id);
require('footer.php');
?>