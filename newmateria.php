<?php
include('header.php');
?>
<h2 align="center">Registro de Materias</h2>
<form method="POST" action="newmateria.php" name="frmdo" id="frmdo" target="_self">
    <table class="table">
        <tr><td><label>Clave:</label></td><td><input type="text" name="clave" id="clave" /></td></tr>
        <tr><td><label>Nombre:</label></td><td><input type="text" name="nombre" id="nombre" /></td></tr>
        <tr><td><label>Orden:</label></td><td><input type="text" name="orden" id="orden" /></td></tr>
        <!--<tr><td><label>Avatar:</label></td><td><input type="" name="avatar" id="avatar" /></td></tr>-->
        <tr><td><label>Activo:</label></td><td><input type="radio" name="activo" id="activo" value="Si" checked="checked"/>Si<input type="radio" name="activo" id="activo" value="No"/>No</td></tr>
    </table>
    <input type="submit" value="Guardar" class="btn btn-lg btn-success" /><input type="reset" value="Limpiar" class="btn btn-lg btn-primary" />
</form>
<div id="ajax"></div>
    <script type="text/javascript">
        $(function (e) {
            $('#frmdo').submit(function (e) {
                e.preventDefault()
                $('#ajax').load('newmateri.php?' + $('#frmdo').serialize())
            })
        })
    </script>

<?php
include('footer.php');
?>