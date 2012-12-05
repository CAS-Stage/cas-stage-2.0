<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Registro Mensual</h1>
            <form method="post" class="filter" action="{''|base_url}registro_mensual.html">
                <input type="month" name="mes" value="{$mes}" onchange="this.parentNode.submit();">
            </form>
            <table>
                <thead>
                    <tr>
                        <th>RUT</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>Anticipo</th>
                        <th>Horas Extras</th>
                        <th>Horas Extras Festivos</th>
                        <th>Bono Movilización</th>
                        <th>Bono Colación</th>
                        <th>Bono Producción</th>
                        <th>Otros Bonos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {assign var=suma_anticipo value=0}
                    {assign var=suma_horas_extras value=0}
                    {assign var=suma_horas_extras_f value=0}
                    {assign var=suma_bono_movilizacion value=0}
                    {assign var=suma_bono_colacion value=0}
                    {assign var=suma_bono_produccion value=0}
                    {assign var=suma_otros_bonos value=0}
                    
                    {foreach item=entry from=$empleados}
                    <tr>
                        <td class="number">{$entry.rut|number_format:0:',':'.'}-{$entry.rut|modulo11}</td>
                        <td>{$entry.apellidos|ucwords|htmlspecialchars}</td>
                        <td>{$entry.nombres|ucwords|htmlspecialchars}</td>
                        <td class="number"><span>$</span>{$entry.monto_anticipo_registro_mensual|number_format:0:',':'.'}</td>
                        <td class="number">{$entry.cantidad_horas_extras_registro_mensual|number_format:2:',':'.'}</td>
                        <td class="number">{$entry.cantidad_horas_extras_f_registro_mensual|number_format:2:',':'.'}</td>
                        <td class="number"><span>$</span>{$entry.bono_movilizacion_registro_mensual|number_format:0:',':'.'}</td>
                        <td class="number"><span>$</span>{$entry.bono_colacion_registro_mensual|number_format:0:',':'.'}</td>
                        <td class="number"><span>$</span>{$entry.bono_produccion_registro_mensual|number_format:0:',':'.'}</td>
                        <td class="number"><span>$</span>{$entry.otros_bonos_registro_mensual|number_format:0:',':'.'}</td>
                        <td>
                            <a href="{''|base_url}registro_mensual/actualizar/{$entry.id_contrato}/{$mes}.html">[Actualizar]</a>
                            <a href="{''|base_url}registro_mensual/restablecer/{$entry.id_contrato}/{$mes}.html" onclick="return confirm('¿Está seguro que desea restablecer el siguiente registro mensual?\n\nRUT: {$entry.rut|number_format:0:',':'.'}-{$entry.rut|modulo11}\nNombre: {$entry.apellidos}, {$entry.nombres}\nMes: {'%B %Y'|strftime:{$mes|strtotime}}\n\nADVERTENCIA: Esta operación no se puede deshacer.');">[Restablecer]</a>
                        </td>
                        
                    </tr>
                    
                    {assign var=suma_anticipo value=$suma_anticipo+$entry.monto_anticipo_registro_mensual}
                    {assign var=suma_horas_extras value=$suma_horas_extras+$entry.cantidad_horas_extras_registro_mensual}
                    {assign var=suma_horas_extras_f value=$suma_horas_extras_f+$entry.cantidad_horas_extras_f_registro_mensual}
                    {assign var=suma_bono_movilizacion value=$suma_bono_movilizacion+$entry.bono_movilizacion_registro_mensual}
                    {assign var=suma_bono_colacion value=$suma_bono_colacion+$entry.bono_colacion_registro_mensual}
                    {assign var=suma_bono_produccion value=$suma_bono_produccion+$entry.bono_produccion_registro_mensual}
                    {assign var=suma_otros_bonos value=$suma_otros_bonos+$entry.otros_bonos_registro_mensual}
                    {/foreach}
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total</th>
                        <td class="number"><span>$</span>{$suma_anticipo|number_format:0:',':'.'}</td>
                        <td class="number">{$suma_horas_extras|number_format:2:',':'.'}</td>
                        <td class="number">{$suma_horas_extras_f|number_format:2:',':'.'}</td>
                        <td class="number"><span>$</span>{$suma_bono_movilizacion|number_format:0:',':'.'}</td>
                        <td class="number"><span>$</span>{$suma_bono_colacion|number_format:0:',':'.'}</td>
                        <td class="number"><span>$</span>{$suma_bono_produccion|number_format:0:',':'.'}</td>
                        <td class="number"><span>$</span>{$suma_otros_bonos|number_format:0:',':'.'}</td>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>