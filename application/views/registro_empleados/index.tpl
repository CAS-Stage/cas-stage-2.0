<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Registro de Empleados</h1>
            <form method="post" class="filter">
                <input type="search" name="buscar" placeholder="Buscar">
            </form>
            <a href="{''|base_url}registro_empleados/agregar.html"><span>Agregar Nuevo Empleado</span></a>
            <table class="registro_empleados">
                <thead>
                    <tr>
                        <th>RUT</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>Inicio Contrato</th>
                        <th>Término Contrato</th>
                        <th>Cargo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach item=entry from=$empleados}
                    <tr>
                        
                        <td class="number">{$entry.rut|number_format:0:',':'.'}-{$entry.rut|modulo11}</td>
                        <td>{$entry.apellidos|ucwords|htmlspecialchars}</td>
                        <td>{$entry.nombres|ucwords|htmlspecialchars}</td>
                        <td>{'%d %b %Y'|strftime:$entry.fecha_inicio_contrato}</td>
                        <td>{if $entry.fecha_termino_contrato}{'%d %b %Y'|strftime:$entry.fecha_termino_contrato}{else}Indefinido{/if}</td>
                        <td>{$entry.cargo_tipo_contrato|htmlspecialchars}</td>
                        <td>
                            <a href="{''|base_url}registro_empleados/modificar/{$entry.id_contrato}.html">[Modificar]</a>
                            {if $entry.fecha_termino_contrato && {{'%Y-%m-%d'|strftime:$entry.fecha_termino_contrato}|strtotime} < {'now'|strtotime}}
                            <a href="{''|base_url}registro_empleados/recontratar/{$entry.id_contrato}.html">[Alta]</a>
                            {else}
                            <a href="{''|base_url}registro_empleados/baja/{$entry.id_contrato}.html" onclick="return confirm('¿Está seguro que desea dar de baja al siguiente empleado?\n\nRUT: {$entry.rut|number_format:0:',':'.'}-{$entry.rut|modulo11}\nNombre: {$entry.apellidos}, {$entry.nombres}\nCargo: {$entry.cargo_tipo_contrato}');">[Baja]</a>
                            {/if}
                            {if $entry.tiene_pacto_sistema_salud}
                            <a href="{''|base_url}registro_empleados/actualizar_pacto_salud/{$entry.id_contrato}.html">[Actualizar Pacto Salud]</a>
                            {/if}
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </section>
        {include file='includes/body_footer.tpl'}
</body>
</html>