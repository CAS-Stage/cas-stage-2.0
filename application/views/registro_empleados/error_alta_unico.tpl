<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Recontratar Empleado Antiguo</h1>
            <p><strong>Error:</strong> el empleado antiguo no ha podido recontratarse, debido a que dentro del rango de fechas indicado ya existe un contrato.</p>
            <p>Si desea modificar los datos para el empleado indicado, por favor búsquelo entre los valores existentes y utilice la opción &quot;Modificar&quot;.</p>
            <a href="{''|base_url}registro_empleados/index.html">Volver</a>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>