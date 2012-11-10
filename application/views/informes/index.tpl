<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Generación de Informes</h1>
            <nav>
                <ul>
                    <li><a href="{''|base_url}informes/ficha_empleado.html">Ficha de Empleado</a></li>
                    <li><a href="{''|base_url}informes/listado_empleados.html">Listado de Empleados</a></li>
                    <li><a href="{''|base_url}informes/liquidaciones_sueldo.html">Liquidaciones de Sueldo</a></li>
                    <li><a href="{''|base_url}informes/nomina_anticipos.html">Nómina de Anticipos</a></li>
                    <li><a href="{''|base_url}informes/horas_extras.html">Informe de Horas Extras</a></li>
                </ul>
            </nav>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>