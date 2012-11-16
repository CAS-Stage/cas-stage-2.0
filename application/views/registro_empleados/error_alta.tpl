<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Recontratar Empleado Antiguo</h1>
            <p><strong>Error:</strong> el empleado antiguo no ha podido recontratarse. Por favor, verifique que los datos ingresados sean válidos e inténtelo nuevamente.</p>
            <a href="{''|base_url}registro_empleados/recontratar/{$contrato.id}.html">Volver</a>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>