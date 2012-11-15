<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Tipos de Contrato</h1>
            <a href="{''|base_url}tipos_contrato/actualizar.html"><span>Actualizar Tipos de Contrato</span></a>
            <table class="tipos_contrato">
                <thead>
                    <tr>
                        <th>Cargo</th>
                        <th>Fecha vigencia</th>
                        <th>Renta bruta</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach item=entry from=$renta_contrato}
                    <tr>                 
                        <td>{$entry.cargo_tipo_contrato}</td>
                        <td>{'%b %Y'|strftime:$entry.fecha_periodo}</td>
                        <td class="number"><span>$</span>{$entry.renta_bruta|number_format:0:',':'.'}</td>
                        <td>
                            <a href="{''|base_url}tipos_contrato/modificar/{$entry.id}.html">[Modificar]</a>
                            <a href="{''|base_url}tipos_contrato/borrar/{$entry.id}.html" onclick="return confirm('¿Está seguro que desea eliminar el siguiente valor de tipo de contrato?\n\nCargo: {$entry.cargo_tipo_contrato}\nFecha vigencia: {'%d %b %Y'|strftime:$entry.fecha_periodo}\nRenta bruta: ${$entry.renta_bruta|number_format:0:',':'.'}\n\nADVERTENCIA: Esta operación no se puede deshacer.');">[Borrar]</a>
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </section>
        {include file='includes/body_footer.tpl'}
</body>
</html>