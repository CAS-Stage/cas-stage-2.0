<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Modificar Valor de Cotización</h1>
            <p><strong>Error:</strong> el valor de cotización no ha podido modificarse. Por favor, verifique que los datos ingresados sean válidos e inténtelo nuevamente.</p>
            <a href="{''|base_url}parametros_externos/prevision/modificar/{$descuento_prevision.id}.html">Volver</a>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>