<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Sueldo Mínimo</h1>
            <a href="{''|base_url}parametros_externos/sueldo_minimo/actualizar.html"><span>Actualizar Parámetro</span></a>
            <table>
                <thead>
                    <tr>
                        <th>Fecha Vigencia</th>
                        <th>Valor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach item=entry from=$parametros_externos}
                    <tr>
                        <td>{{'%B %Y'|strftime:$entry.fecha_vigencia}|ucwords}</td>
                        <td class="number"><span>$</span> {$entry.valor|number_format:0:',':'.'}</td>
                        <td>
                            <a href="{''|base_url}parametros_externos/sueldo_minimo/modificar/{$entry.id}.html">[Modificar]</a>
                            <a href="{''|base_url}parametros_externos/sueldo_minimo/borrar/{$entry.id}.html" onclick="return confirm('¿Está seguro que desea eliminar la siguiente actualización del valor del sueldo mínimo?\n\nFecha: {{'%B %Y'|strftime:$entry.fecha_vigencia}|ucwords}\nValor: {$entry.valor|number_format:0:',':'.'}');">[Borrar]</a>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>