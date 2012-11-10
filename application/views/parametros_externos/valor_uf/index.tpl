<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Valor UF</h1>
            <a href="{''|base_url}parametros_externos/valor_uf/actualizar.html"><span>Actualizar Parámetro</span></a>
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
                        <td>{'%d %b %Y'|strftime:$entry.fecha_vigencia}</td>
                        <td class="number"><span>$</span> {$entry.valor|number_format:2:',':'.'}</td>
                        <td>
                            <a href="{''|base_url}parametros_externos/valor_uf/modificar/{$entry.id}.html">[Modificar]</a>
                            <a href="{''|base_url}parametros_externos/valor_uf/borrar/{$entry.id}.html" onclick="return confirm('¿Está seguro que desea eliminar la siguiente actualización del valor de UF?\n\nFecha: {'%d %b %Y'|strftime:$entry.fecha_vigencia}\nValor: ${$entry.valor|number_format:0:',':'.'}');">[Borrar]</a>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>