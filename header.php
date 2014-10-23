<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="favicon.ico">-->
    <title>Control Escolar</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/theme.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="bootstrap/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>
    <script src="bootstrap/js/jquery-1.4.2.min.js"></script>
    <style type="text/css"></style>
    <style id="holderjs-style" type="text/css"></style></head>
    <style>
        .mio{
            text-align: right;
            font-weight: bold;
        }
    </style>
<body role="document">
<?php
session_start();
$niv=$_SESSION['nv'];
if($niv==1){
    include('menu.php');
}
if($niv==2){
    include('menu_maestro.php');
}
?>
<div class="container theme-showcase" role="main">
