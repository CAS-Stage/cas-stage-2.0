<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Actualizar Valor de Cotización</h1>
            <p><strong>Error:</strong> el valor de cotización no ha podido actualizarse, ya que para la fecha de vigencia indicada ya existe otro valor definido.</p>
            <p>Si desea modificar el valor para la fecha indicada, por favor búsquelo entre los valores existentes y utilice la opción &quot;Modificar&quot;.</p>
            <a href="{''|base_url}parametros_externos/prevision.html">Volver</a>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>