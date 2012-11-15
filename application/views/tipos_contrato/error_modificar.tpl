<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Modificar Tipos de Contrato</h1>
            <p><strong>Error:</strong> el valor del tipo de contrato no ha podido modificarse. Por favor, verifique que los datos ingresados sean válidos e inténtelo nuevamente.</p>
            <a href="{''|base_url}tipos_contrato/modificar/{$renta_contrato.id}.html">Volver</a>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>