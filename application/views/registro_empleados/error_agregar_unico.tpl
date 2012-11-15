<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Agregar Registro de Empleado</h1>
            <p><strong>Error:</strong> el registro de empleado no ha podido agregarse, debido a que el RUT ya se encuentra registrado.</p>
            <p>Si desea modificar el registro para dicho empleado, por favor búsquelo entre los valores existentes y utilice la opción &quot;Modificar&quot;.</p>
            <a href="{''|base_url}registro_empleados/index.html">Volver</a>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>