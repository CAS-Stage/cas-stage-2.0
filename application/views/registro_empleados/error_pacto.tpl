<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Actualizar Pacto de Salud</h1>
            <p><strong>Error:</strong> el pacto de salud no ha podido actualizarse. Por favor, verifique que los datos ingresados sean válidos e inténtelo nuevamente.</p>
            <a href="{''|base_url}registro_empleados/actualizar_pacto_salud/{$contrato.id}.html">Volver</a>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>