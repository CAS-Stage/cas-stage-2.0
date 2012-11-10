<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Modificar Valor de Cotización</h1>
            <form method="post" action="{''|base_url}parametros_externos/prevision/modificar/{$descuento_prevision.id}.html">
                <fieldset>
                    <legend>Datos Actuales: {$descuento_prevision.nombre_prevision|htmlspecialchars}{if $descuento_prevision.descuento} ({($descuento_prevision.descuento*100)|number_format:2:',':'.'}%){/if}</legend>
                    <label>
                        <span>Nombre</span>
                        <select name="id_prevision" required="required">
                            {foreach item=entry from=$prevision}
                            <option value="{$entry.id}"{if $entry.id eq $descuento_prevision.id_prevision} selected="selected"{/if}>{$entry.nombre|htmlspecialchars}</option>
                            {/foreach}
                        </select>
                    </label>
                    <label>
                        <span>Fecha Vigencia</span>
                        <input type="month" name="fecha_periodo" required="required" value="{'%Y-%m'|strftime:$descuento_prevision.fecha_periodo}">
                    </label>
                    <label>
                        <span>Valor (%)</span>
                        <input type="number" name="descuento" min="0.00" max="49.99" step="0.01" value="{($descuento_prevision.descuento*100)|number_format:'2':'.':''}">
                    </label>
                    <button type="submit">Guardar Cambios</button>
                </fieldset>
            </form>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>