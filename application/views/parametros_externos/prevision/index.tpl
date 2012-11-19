<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Previsión</h1>
            <!--
            <form method="post" class="filter">
                <input type="search" name="buscar" placeholder="Buscar">
            </form>
            -->
                <a href="{''|base_url}parametros_externos/prevision/actualizar.html"><span>Actualizar Cotizaciones</span></a>
            <table>
                <thead>
                    <tr>
                        <th>Nombre Sistema</th>
                        <th>Cotización</th>
                        <th>Fecha Vigencia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach item=entry from=$descuentos_prevision}
                    <tr>
                        <td>{$entry.nombre_prevision|htmlspecialchars}</td>
                        <td class="decimal"><span>{'%.2f'|sprintf:($entry.descuento*100)}</span> <span>%</span></td>
                        <td>{{'%B %Y'|strftime:$entry.fecha_periodo}|ucwords}</td>
                        <td>
                            <a href="{''|base_url}parametros_externos/prevision/modificar/{$entry.id}.html">[Modificar]</a>
                            <a href="{''|base_url}parametros_externos/prevision/borrar/{$entry.id}.html" onclick="return confirm('¿Está seguro que desea eliminar la siguiente actualización del valor de cotización?\n\nFecha: {{'%B %Y'|strftime:$entry.fecha_periodo}|ucwords}\nNombre Sistema: {$entry.nombre_prevision|htmlspecialchars}\nCotización: {($entry.descuento*100)|number_format:2:',':'.'}%');">[Borrar]</a>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>