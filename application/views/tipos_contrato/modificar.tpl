<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Modificar Tipo de Contrato: {$renta_contrato.cargo_tipo_contrato}</h1>
            <form method="post" action="{''|base_url}tipos_contrato/modificar/{$renta_contrato.id}.html">
                <fieldset>
                    <legend>Datos Actuales: {$renta_contrato.cargo_tipo_contrato} (${$renta_contrato.renta_bruta|number_format:0:',':'.'}), {'%B %Y'|strftime:$renta_contrato.fecha_periodo}</legend>
                    <label>
                        <span>Cargo</span>
                        <select name="id_tipo_contrato" required="required">
                            <option></option>
                            {foreach item=entry from=$tipo_contrato}
                            <option value="{$entry.id}"{if $entry.id eq $renta_contrato.id_tipo_contrato} selected="selected"{/if}>{$entry.cargo|htmlspecialchars}</option>
                            {/foreach}
                        </select>
                    </label>
                    <label>
                        <span>Fecha Vigencia</span>
                        <input type="month" name="fecha_periodo" required="required" value="{'%Y-%m'|strftime:$renta_contrato.fecha_periodo}">
                    </label>
                    <label>
                        <span>Renta Bruta ($)</span>
                        <input type="number" name="renta_bruta" min="182000" max="9999999" required="required" value="{$renta_contrato.renta_bruta}">
                    </label>
                    <label>
                        <input type="checkbox" name="gratificacion" value="1"{if $renta_contrato.gratificacion} checked="checked"{/if}>
                        <span>¿Tiene gratificación?</span>
                    </label>
                    <button type="submit">Guardar Cambios</button>
                </fieldset>
            </form>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>