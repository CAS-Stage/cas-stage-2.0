<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Modificar Valor de UF</h1>
            <form method="post" action="{''|base_url}parametros_externos/valor_uf/modificar/{$parametro_externo.id}.html">
                <fieldset>
                    <legend>Modificación de Datos Existentes</legend>
                    <label>
                        <span>Fecha Vigencia</span>
                        <input type="date" name="fecha_vigencia" required="required" value="{$parametro_externo.fecha_vigencia}">
                    </label>
                    <label>
                        <span>Valor ($)</span>
                        <input type="number" name="valor" min="1.00" max="9999999.99" step="0.01" required="required" value="{$parametro_externo.valor|number_format:2:'.':''}">
                    </label>
                    <button type="submit">Guardar Cambios</button>
                </fieldset>
            </form>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>