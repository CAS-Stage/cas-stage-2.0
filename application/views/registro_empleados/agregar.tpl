<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Agregar Nuevo Empleado</h1>
            <form method="post" class="registro_empleados" action="{''|base_url}registro_empleados/agregar.html">
                <fieldset>
                    <legend>Datos Personales</legend>
                    <label class="rut">
                        <span>RUT</span>
                        <input type="text" name="rut" pattern="([1-9])|([0-9]{ldelim}2,8{rdelim})" required="required">
                    </label>
                    <label class="dv">
                        <span>-</span>
                        <input type="text" name="dv" maxlength="1" required="required">
                    </label>
                    <label>
                        <span>Apellidos</span>
                        <input type="text" name="apellidos" maxlength="45" required="required">
                    </label>
                    <label>
                        <span>Nombres</span>
                        <input type="text" name="nombres" maxlength="45" required="required">
                    </label>
                    <label>
                        <span>Fecha de Nacimiento</span>
                        <input type="date" name="fecha_nacimiento" max="{'%Y-%m-%d'|strftime:{'-15 years'|strtotime}}" required="required">
                    </label>
                    <label>
                        <span>Dirección</span>
                        <input type="text" name="direccion" maxlength="100" required="required">
                    </label>
                    <label>
                        <span>Comuna</span>
                        <select name="id_comuna" required="required">
                            <option></option>
                            {foreach item=entry from=$comunas}
                            <option value="{$entry.id}">{$entry.nombre|htmlspecialchars}</option>
                            {/foreach}
                        </select>
                    </label>
                    <label>
                        <span>Fono</span>
                        <input type="text" name="fono" maxlength="45">
                    </label>
                </fieldset>
                <fieldset>
                    <legend>Datos Contractuales</legend>
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
                    <button type="submit">Agregar Empleado</button>
                </fieldset>
            </form>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>