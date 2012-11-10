<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Actualizar Valor de Sueldo Mínimo</h1>
            <form method="post" action="{''|base_url}parametros_externos/sueldo_minimo/actualizar.html">
                <fieldset>
                    <legend>Ingreso de Datos Actualizados</legend>
                    <label>
                        <span>Fecha Vigencia</span>
                        <input type="month" name="fecha_vigencia" required="required">
                    </label>
                    <label>
                        <span>Valor ($)</span>
                        <input type="number" name="valor" min="1" max="9999999" required="required">
                    </label>
                    <button type="submit">Actualizar Parámetro</button>
                </fieldset>
            </form>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>