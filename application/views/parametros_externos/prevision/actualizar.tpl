<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Actualizar Valor de Cotizaciones</h1>
            <form method="post" action="{''|base_url}parametros_externos/prevision/actualizar.html">
                <fieldset>
                    <legend>Ingreso de Datos Actualizados</legend>
                    <label>
                        <span>Nombre</span>
                        <select name="id_prevision" required="required">
                            {foreach item=entry from=$prevision}
                            <option value="{$entry.id}">{$entry.nombre|htmlspecialchars}</option>
                            {/foreach}
                        </select>
                    </label>
                    <label>
                        <span>Fecha Vigencia</span>
                        <input type="month" name="fecha_periodo" required="required">
                    </label>
                    <label>
                        <span>Valor (%)</span>
                        <input type="number" name="descuento" min="0.00" max="49.99" step="0.01">
                    </label>
                    <button type="submit">Actualizar Parámetro</button>
                </fieldset>
            </form>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>