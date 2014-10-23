<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../favicon.ico">-->

    <title>Control Escolar</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="bootstrap/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>

</head>

<body>

<div class="container">

    <form class="form-signin" role="form"  method="POST" action="valida.php">
        <h2 class="form-signin-heading">Iniciar Sesión</h2>
        <input type="text" class="form-control" placeholder="Usuario" name="user" required autofocus>
        <input type="password" class="form-control" placeholder="Contraseña" name="contra" required>
       <!-- <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
        </label>-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
    </form>
<?php $msg=$_GET['msg']; echo("<center><font color='red' size=4 >".$msg."</font></center>"); ?>
</div> <!-- /container -->


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
