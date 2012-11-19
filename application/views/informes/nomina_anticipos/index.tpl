<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
			<h1>Nómina de Anticipos</h1>
			<form method="post" class="filter" action="{''|base_url}informes/nomina_anticipos.html">
                            <input type="month" name="mes" value="{$mes}" onchange="this.parentNode.submit();">
                        </form>
			<table>
				<thead>
					<tr>
						<th>RUT</th>
						<th>Apellidos</th>
						<th>Nombres</th>
						<th>Monto</th>
						<th class="print">Firma</th>
					</tr>
				</thead>
				<tbody>
                                    {assign var=suma_monto_anticipo value=0}
                                    {foreach item=entry from=$empleados}
					<tr>
                                            	<td class="number">{$entry.rut|number_format:0:',':'.'}-{$entry.rut|modulo11}</td>
						<td>{$entry.apellidos|ucwords|htmlspecialchars}</td>
						<td>{$entry.nombres|ucwords|htmlspecialchars}</td>
						<td class="number"><span>$</span>{$entry.monto_anticipo|number_format:0:',':'.'}</td>
                                                <td class="print"> </td>
					</tr>
                                        {assign var=suma_monto_anticipo value=$suma_monto_anticipo+$entry.monto_anticipo}
					{/foreach}
				</tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <td class="number"><span>$</span>{$suma_monto_anticipo|number_format:0:',':'.'}</td>
                                    </tr>
                                </tfoot>
			
		</table>
			<button type="button" onclick="window.print();">Imprimir</button>
		</section>
		{include file='includes/body_footer.tpl'}
    </body>
</html>