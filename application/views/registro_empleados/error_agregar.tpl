<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Agregar Registro de Empleado</h1>
            <p><strong>Error:</strong> los datos del empleado no han podido agregarse. Por favor, verifique que los datos ingresados sean válidos e inténtelo nuevamente.</p>
            <a href="{''|base_url}registro_empleados/agregar.html" onclick="history.back(); return 0;">Volver</a>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>