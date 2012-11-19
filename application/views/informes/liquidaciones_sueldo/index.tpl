<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Liquidaciones de Sueldo</h1>
            <form method="post" class="filter" action="{''|base_url}informes/liquidaciones_sueldo.html">
                <input type="month" name="mes" value="{$mes}" onchange="this.parentNode.submit();">
            </form>
            <table>
                <thead>
                    <tr>
                        <th>RUT</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>Fecha Contrato</th>
                        <th>Cargo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach item=entry from=$empleados}
                    <tr>
                        <td class="number">{$entry.rut|number_format:0:',':'.'}-{$entry.rut|modulo11}</td>
                        <td>{$entry.apellidos|ucwords|htmlspecialchars}</td>
                        <td>{$entry.nombres|ucwords|htmlspecialchars}</td>
                        <td>{'%d %b %Y'|strftime:$entry.fecha_contrato}</td>
                        <td>{$entry.cargo|htmlspecialchars}</td>
                        <td>
                            <a href="{''|base_url}informes/liquidaciones_sueldo/ver/{$entry.rut}.html">[Ver Liquidación]</a>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>