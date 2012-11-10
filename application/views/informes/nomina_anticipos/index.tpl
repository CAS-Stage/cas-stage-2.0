<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
			<h1>Nómina de Anticipos</h1>
			<form method="post" class="filter">
				<input type="month" name="mes" value="2012-05">
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
                                    {foreach item=entry from=$empleados}
					<tr>
                                            	<td class="number">{$entry.rut|number_format:0:',':'.'}-{$entry.rut|modulo11}</td>
						<td>{$entry.apellidos|ucwords|htmlspecialchars}</td>
						<td>{$entry.nombres|ucwords|htmlspecialchars}</td>
						<td class="number"><span>$</span>{$entry.monto_anticipo|number_format:0:',':'.'}</td>
                                                <td class="print"> </td>
					</tr>
					{/foreach}
				</tbody>
			
		</table>
			<button type="button" onclick="window.print();">Imprimir</button>
		</section>
		{include file='includes/body_footer.tpl'}
    </body>
</html>