<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
			<h1>Informe de Horas Extras</h1>
			<form method="post" class="filter" action="{''|base_url}informes/horas_extras.html">
                            <input type="month" name="mes" value="{$mes}" onchange="this.parentNode.submit();">
                        </form>
			<table>
				<thead>
					<tr>
						<th>RUT</th>
						<th>Apellidos</th>
						<th>Nombres</th>
						<th>Horas Extras</th>
                                                <th>Horas Extras Festivos</th>
						<th>Valor Monetario</th>
					</tr>
				</thead>
				<tbody>
                                    {assign var=suma_horas_extras value=0}
                                    {assign var=suma_horas_extras_f value=0}
                                    {assign var=suma_valor_horas_extras value=0}
                                    {foreach item=entry from=$empleados}
                                    <tr>
                                            <td class="number">{$entry.rut|number_format:0:',':'.'}-{$entry.rut|modulo11}</td>
                                            <td>{$entry.apellidos|ucwords|htmlspecialchars}</td>
                                            <td>{$entry.nombres|ucwords|htmlspecialchars}</td>
                                            <td class="number">{$entry.cantidad_horas_extras|number_format:2:',':'.'}</td>
                                            <td class="number">{$entry.cantidad_horas_extras_f|number_format:2:',':'.'}</td>
                                            <td class="number"><span>$</span>{$entry.valor_monetario|number_format:0:',':'.'}</td>
                                    </tr>
                                    {assign var=suma_horas_extras value=$suma_horas_extras+$entry.cantidad_horas_extras}
                                    {assign var=suma_horas_extras_f value=$suma_horas_extras_f+$entry.cantidad_horas_extras_f}
                                    {assign var=suma_valor_horas_extras value=$suma_valor_horas_extras+$entry.valor_monetario}
                                    {/foreach}
				</tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <td class="number">{$suma_horas_extras|number_format:2:',':'.'}</td>
                                        <td class="number">{$suma_horas_extras_f|number_format:2:',':'.'}</td>
                                        <td class="number"><span>$</span>{$suma_valor_horas_extras|number_format:0:',':'.'}</td>
                                    </tr>
                                </tfoot>
			</table>
			<button type="button" onclick="window.print();">Imprimir</button>
		</section>
		{include file='includes/body_footer.tpl'}
    </body>
</html>