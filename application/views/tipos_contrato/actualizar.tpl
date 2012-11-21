<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Actualizar Tipo de Contrato</h1>
            <form method="post" class="tipos_contrato" action="{''|base_url}tipos_contrato/actualizar.html">
                
                <fieldset>
                    <legend>Ingreso de Nuevos Datos</legend>
                    <label>
                        <span>Cargo</span>
                        <select name="id_tipo_contrato" required="required">
                            <option></option>
                            {foreach item=entry from=$tipo_contrato}
                            <option value="{$entry.id}">{$entry.cargo|htmlspecialchars}</option>
                            {/foreach}
                        </select>
                    </label>
                    <label>
                        <span>Fecha Vigencia</span>
                        <input type="month" name="fecha_periodo" required="required">
                    </label>
                    <label>
                        <span>Renta Bruta ($)</span>
                        <input type="number" name="renta_bruta" min="182000" max="9999999" required="required">
                    </label>
                    <label>
                        <input type="checkbox" name="gratificacion" value="1">
                        <span>¿Tiene gratificación?</span>
                    </label>
                    <button type="submit">Actualizar Tipo de Contrato</button>
                </fieldset>
            </form>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>