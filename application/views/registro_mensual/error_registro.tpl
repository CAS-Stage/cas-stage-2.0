<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Actualizar Registro Mensual</h1>
            <p><strong>Error:</strong> el registro mensual no ha podido actualizarse. Por favor, verifique que al menos uno de los valores solicitados se haya ingresado, e inténtelo nuevamente.</p>
            <a href="{''|base_url}registro_mensual/actualizar/{$contrato.id}/{$mes}.html">Volver</a>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>