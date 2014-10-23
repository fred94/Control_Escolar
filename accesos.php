<?php
$idu=$_GET['idu'];
$niv=$_GET['niv'];
session_start();
$_SESSION['id']=$idu;
$_SESSION['nv']=$niv;
$_SESSION['ac']=1;
setcookie('id',$idu);
setcookie('nv',$niv);
setcookie('ac',1);
print"<meta http-equiv='refresh' content='0; url=home.php'>";
?>