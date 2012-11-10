<!DOCTYPE html>
<html>
    {include file='includes/head.tpl'}
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Ficha de Empleado: {$empleado.nombres|ucwords|htmlspecialchars} {$empleado.apellidos|ucwords|htmlspecialchars}</h1>
            <ul>
                <li>
                    <ul>
                        <li>RUT</li>
                        <li>{$empleado.rut|number_format:0:',':'.'}-{$empleado.rut|modulo11}</li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>Apellidos</li>
                        <li>{$empleado.apellidos|ucwords|htmlspecialchars}</li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>Nombres</li>
                        <li>{$empleado.nombres|ucwords|htmlspecialchars}</li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>Fecha de Nacimiento</li>
                        <li>{'%e de %B de %Y'|strftime:$empleado.fecha_nacimiento}</li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>Dirección</li>
                        <li>{$empleado.direccion|ucwords|htmlspecialchars}</li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>Comuna</li>
                        <li>{$empleado.comuna|ucwords|htmlspecialchars}</li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>Fono</li>
                        <li>{$empleado.fono|htmlspecialchars}</li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li>
                    <ul>
                        <li>Periodo de Contrato</li>
                        <li>{'%d %b %Y'|strftime:$empleado.periodo_contrato.inicio} - {if $empleado.periodo_contrato.fin}{'%d %b %Y'|strftime:$empleado.periodo_contrato.fin}{else}indefinido{/if}</li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>Renta Bruta</li>
                        <li>{'%.0n'|money_format:$empleado.renta_bruta}</li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>Previsión</li>
                        <li>{$empleado.prevision|htmlspecialchars}</li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>Sistema de Salud</li>
                        <li>{$empleado.sistema_salud.nombre}{if $empleado.sistema_salud.pacto} ({$empleado.sistema_salud.pacto|number_format:3:',':'.'} UF){/if}</li>
                    </ul>
                </li>
            </ul>
            <button type="button" onclick="window.print();">Imprimir</button>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>