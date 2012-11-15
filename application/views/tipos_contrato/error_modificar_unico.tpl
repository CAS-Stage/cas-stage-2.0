<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Modificar Tipos de Contrato</h1>
            <p><strong>Error:</strong> el valor del tipo de contrato no ha podido modificarse, ya que para la fecha de vigencia y cargo indicados ya existe otro valor definido.</p>
            <p>Si desea modificar el valor para la fecha y cargo indicados, por favor búsquelo entre los valores existentes y utilice la opción &quot;Modificar&quot;.</p>
            <a href="{''|base_url}tipos_contrato/index.html">Volver</a>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>