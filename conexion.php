<?php
$conexion=mysql_connect('localhost','root','')or die("Error de Hosting");
mysql_select_db('ctrl_escolar')or die("Error de Base de Datos");
mysql_query("SET NAMES utf8");
?>