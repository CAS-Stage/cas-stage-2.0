<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Listado de Empleados</h1>
            <h2 class="print">Realizaciones, Escenografías y Eventos Limitada</h2>
            <h3 class="print">RUT: 76.178.122-7 (CAS Stage Ltda.)</h3>
            <table class="small">
                <thead>
                    <tr>
                        <th>RUT</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>Dirección</th>
                        <th>Comuna</th>
                        <th>Fono</th>
                        <th>Inicio Contrato</th>
                        <th>Fin Contrato</th>
                        <th>Renta Bruta</th>
                        <th>Previsión</th>
                        <th>Sist. Salud</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach item=entry from=$empleados}
                    <tr>
                        <td class="number">{$entry.rut|number_format:0:',':'.'}-{$entry.rut|modulo11}</td>
                        <td>{$entry.apellidos|ucwords|htmlspecialchars}</td>
                        <td>{$entry.nombres|ucwords|htmlspecialchars}</td>
                        <td>{$entry.direccion|ucwords|htmlspecialchars}</td>
                        <td>{$entry.comuna|ucwords|htmlspecialchars}</td>
                        <td>{$entry.fono}</td>
                        <td>{'%d %b %Y'|strftime:$entry.inicio_contrato}</td>
                        <td>{if $entry.fin_contrato}{'%d %b %Y'|strftime:$entry.fin_contrato}{else}Indefinido{/if}</td>
                        <td class="number"><span>$</span> {$entry.renta_bruta|number_format:0:',':'.'}</td>
                        <td>{$entry.prevision|htmlspecialchars}</td>
                        <td>{$entry.sistema_salud.nombre|htmlspecialchars}{if $entry.sistema_salud.pacto} ({$entry.sistema_salud.pacto|number_format:3:',':'.'} UF){/if}</td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
            <button type="button" onclick="window.print();">Imprimir</button>
        </section>
        {include file='includes/body_footer.tpl'}
</body>
</html>