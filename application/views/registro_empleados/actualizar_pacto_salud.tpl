<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Actualizar Pacto de Salud de Empleado: {$empleado.nombres} {$empleado.apellidos}</h1>
            <form method="post" action="{''|base_url}registro_empleados/actualizar_pacto_salud/{$empleado.id_contrato}.html">
                <table>
                    <caption>Pactos Anteriores: {$empleado.nombre_sistema_salud}</caption>
                    <thead>
                        <tr>
                            <th>Fecha vigencia</th>
                            <th>Pacto</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach item=entry from=$pactos_anteriores}
                        <tr>
                            <td>{'%B %Y'|strftime:$entry.fecha_periodo}</td>
                            {if $entry.pacto}
                            <td class="decimal">{{$entry.pacto|number_format:3:',':''}|floor}<span>,{{$entry.pacto|number_format:3:',':''}|substr:-3}</span> <span>UF</span></td>
                            {else}
                            <td class="decimal">N/A</td>
                            {/if}
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
                <fieldset>
                    <legend>Datos de Nuevo Pacto de Salud: {$empleado.nombre_sistema_salud}</legend>
                    <label>
                        <span>Pacto de Salud (UF)</span>
                        <input type="number" name="pacto" min="0.001" max="100.000" step="0.001" required="required">
                    </label>
                    <button type="submit">Actualizar Pacto</button>
                </fieldset>
            </form>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>