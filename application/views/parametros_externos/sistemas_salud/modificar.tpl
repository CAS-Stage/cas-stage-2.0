<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Modificar Datos de Sistema de Salud</h1>
            <form method="post" action="{''|base_url}parametros_externos/sistemas_salud/modificar/{$sistema_salud.id}.html">
                <fieldset>
                    <legend>Datos Actuales: {$sistema_salud.nombre|htmlspecialchars} ({if $sistema_salud.tiene_pacto}con{else}sin{/if} pacto)</legend>
                    <label>
                        <span>Nombre</span>
                        <input type="text" name="nombre" maxlength="45" required="required" value="{$sistema_salud.nombre|htmlspecialchars}">
                    </label>
                    <label>
                        <input type="checkbox" name="tiene_pacto" value="1"{if $sistema_salud.tiene_pacto} checked="checked"{/if}>
                        <span>¿Tiene pacto?</span>
                    </label>
                    <button type="submit">Guardar Cambios</button>
                </fieldset>
            </form>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>