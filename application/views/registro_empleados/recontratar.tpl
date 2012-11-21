<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Recontratar empleado antiguo: {$empleado.nombres} {$empleado.apellidos}</h1>
            <form method="post" action="{''|base_url}registro_empleados/recontratar/{$empleado.id_contrato}.html">
                <table>
                    <caption>Contratos Anteriores</caption>
                    <thead>
                        <tr>
                            <th>Inicio</th>
                            <th>Término</th>
                            <th>Cargo</th>
                            <th>Previsión</th>
                            <th>Sist. Salud</th>
                            <th>Últ. Pacto</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach item=entry from=$contratos_anteriores}
                        <tr>
                            <td>{'%d-%m-%y'|strftime:$entry.fecha_inicio}</td>
                            <td>{if $entry.fecha_termino}{'%d-%m-%y'|strftime:$entry.fecha_termino}{else}N/A{/if}</td>
                            <td>{$entry.cargo_tipo_contrato}</td>
                            <td>{$entry.nombre_prevision}</td>
                            <td>{$entry.nombre_sistema_salud}</td>
                            {if $entry.pacto_salud}
                            <td class="decimal">{{$entry.pacto_salud|number_format:3:',':''}|floor}<span>,{{$entry.pacto_salud|number_format:3:',':''}|substr:-3}</span> <span>UF</span></td>
                            {else}
                            <td class="decimal">N/A</td>
                            {/if}
                        </tr>
                        {/foreach}
                    </tbody>
                </table>
                <fieldset>
                    <legend>Datos de Nuevo Contrato</legend>
                    <label class="start">
                        <span>Periodo de Contrato</span>
                        <input type="date" name="fecha_inicio_contrato" required="required">
                    </label>
                    <label class="end">
                        <span>-</span>
                        <input type="date" name="fecha_termino_contrato">
                    </label>
                    <label>
                        <span>Cargo</span>
                        <select name="id_tipo_contrato" required="required">
                            <option></option>
                            {foreach item=entry from=$tipos_contrato}
                            <option value="{$entry.id}">{$entry.cargo|htmlspecialchars}</option>
                            {/foreach}
                        </select>
                    </label>
                    <label>
                        <span>Previsión</span>
                        <select name="id_prevision" required="required">
                            <option></option>
                            {foreach item=entry from=$prevision}
                            <option value="{$entry.id}">{$entry.nombre|htmlspecialchars}</option>
                            {/foreach}
                        </select>
                    </label>
                    <label>
                        <span>Sistema de Salud</span>
                        <select name="id_sistema_salud" required="required" onchange="if(this.options[this.selectedIndex].getAttribute('data-tiene-pacto') == '0') { document.getElementById('pacto_salud').style.visibility = 'hidden'; document.getElementById('input_pacto_salud').removeAttribute('required'); } else { document.getElementById('pacto_salud').style.visibility = 'visible'; document.getElementById('input_pacto_salud').setAttribute('required', 'required'); }">
                            {foreach item=entry from=$sistemas_salud}
                            <option data-tiene-pacto="{if $entry.tiene_pacto}1{else}0{/if}" value="{$entry.id}">{$entry.nombre|htmlspecialchars}</option>
                            {/foreach}
                        </select>
                    </label>
                    <label id="pacto_salud">
                        <span>Pacto de Salud (UF)</span>
                        <input id="input_pacto_salud" type="number" name="pacto" min="0.001" max="100.000" step="0.001" required="required">
                    </label>
                    <script type="text/javascript">
                        document.getElementById('pacto_salud').style.visibility = 'hidden';
                        document.getElementById('input_pacto_salud').removeAttribute('required');
                    </script>
                    <button type="submit">Crear Nuevo Contrato</button>
                </fieldset>
            </form>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>