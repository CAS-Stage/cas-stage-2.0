<!DOCTYPE html>
<html>
    {include file='includes/head.tpl'}
    <body>
    {include file='includes/body_header.tpl'}
    <section>
        <h1>Actualizar Registro Mensual de Empleado: {$empleado.nombres|ucwords|htmlspecialchars} {$empleado.apellidos|ucwords|htmlspecialchars}, {'%B %Y'|strftime:$mes}</h1>
        <form method="post" class="registro_mensual" action="{''|base_url}registro_mensual/actualizar/{$empleado.id_contrato}/{'%Y-%m'|strftime:$mes}.html">
            <fieldset>
                <legend>Bonos</legend>
                <label>
                    <span>Bono Movilización ($)</span>
                    <input type="number" name="bono_movilizacion" min="0" max="9999999" step="1000" value="{$registro_mensual.bono_movilizacion}">
                </label>
                <label>
                    <span>Bono Colación ($)</span>
                    <input type="number" name="bono_colacion" min="0" max="9999999" step="1000" value="{$registro_mensual.bono_colacion}">
                </label>
                <label>
                    <span>Bono Producción ($)</span>
                    <input type="number" name="bono_produccion" min="0" max="9999999" step="1000" value="{$registro_mensual.bono_produccion}">
                </label>
                <label>
                    <span>Otros Bonos ($)</span>
                    <input type="number" name="otros_bonos" min="0" max="9999999" step="1000" value="{$registro_mensual.otros_bonos}">
                </label>
            </fieldset>
            <fieldset>
                <legend>Anticipos y Horas Extras</legend>
                <label>
                    <span>Monto Anticipo ($)</span>
                    <input type="number" name="monto_anticipo" min="0" max="9999999" value="{$registro_mensual.monto_anticipo}">
                </label>
                <label>
                    <span>Cantidad Horas Extras</span>
                    <input type="number" name="cantidad_horas_extras" min="0.00" max="100.00" step="0.05" value="{$registro_mensual.cantidad_horas_extras|number_format:2:'.':''}">
                </label>
                 <label>
                    <span>Cantidad Horas Extras Festivos</span>
                    <input type="number" name="cantidad_horas_extras_f" min="0.00" max="100.00" step="0.05" value="{$registro_mensual.cantidad_horas_extras_f|number_format:2:'.':''}">
                </label>
                <button type="submit">Guardar Cambios</button>
            </fieldset>
        </form>
    </section>
    {include file='includes/body_footer.tpl'}
    </body>
</html>