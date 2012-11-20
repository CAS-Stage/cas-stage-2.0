<!DOCTYPE html>
<html>
    {include file='includes/head.tpl'}
    <body>
    {include file='includes/body_header.tpl'}
    <section>
        <h1>Liquidación de Sueldo Mensual: {$empleado.nombres|ucwords|htmlspecialchars} {$empleado.apellidos|ucwords|htmlspecialchars}, {'%B %Y'|strftime:$empleado.periodo}</h1>
        <div>
            <ul>
                <li>Nombre: <span>{$empleado.nombres|ucwords|htmlspecialchars} {$empleado.apellidos|ucwords|htmlspecialchars}</span></li>
                <li>RUT: <span>{$empleado.rut|number_format:0:',':'.'}-{$empleado.rut|modulo11}</span></li>
                <li>
                    <ul>
                        {assign var='total_haberes' value=0}
                        <li>Haberes</li>
                        <li>
                            {assign var='total_imponible' value=0}
                            <ul>
                                <li>Imponible</li>
                                <li>
                                    <ul>
                                        <li>
                                            <ul>
                                                <li>Sueldo base 30 días mes <span>{'%B %Y'|strftime:$empleado.periodo}</span> año <span>2012</span></li>
                                                <li>$ <span>{$empleado.haberes.imponible.sueldo_base|number_format:0:',':'.'}</span></li>
                                            </ul>
                                            {$total_imponible=$total_imponible+$empleado.haberes.imponible.sueldo_base|round}
                                        </li>
                                        {if $empleado.haberes.imponible.gratificacion}
                                        <li>
                                            <ul>
                                                <li>Gratificación Legal Garantizada</li>
                                                <li>$ <span>{$empleado.haberes.imponible.gratificacion|number_format:0:',':'.'}</span></li>
                                            </ul>
                                            {$total_imponible=$total_imponible+$empleado.haberes.imponible.gratificacion|round}
                                        </li>
                                        {/if}
                                        {if $empleado.haberes.imponible.horas_extras}
                                        <li>
                                            <ul>
                                                <li><span>{$empleado.haberes.imponible.horas_extras.cantidad|number_format:2:',':'.'}</span> horas extras</li>
                                                <li>$ <span>{$empleado.haberes.imponible.horas_extras.valor_monetario|number_format:0:',':'.'}</span></li>
                                            </ul>
                                        {$total_imponible=$total_imponible+$empleado.haberes.imponible.horas_extras.valor_monetario|round}
                                        </li>
                                        {/if}
                                        {if $empleado.haberes.imponible.bono_produccion}
                                        <li>
                                            <ul>
                                                <li>Bono de Producción</li>
                                                <li>$ <span>{$empleado.haberes.imponible.bono_produccion|number_format:0:',':'.'}</span></li>
                                            </ul>
                                            {$total_imponible=$total_imponible+$empleado.haberes.imponible.bono_produccion|round}
                                        </li>
                                        {/if}
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li>Total Remuneración Imponible</li>
                                        <li>$ <span>{$total_imponible|number_format:0:',':'.'}</span></li>
                                    </ul>
                                </li>
                            </ul>
                            {assign var='total_no_imponible' value=0}
                            {if $empleado.haberes.no_imponible.bono_colacion || $empleado.haberes.no_imponible.bono_movilizacion}
                            <ul>
                                <li>No Imponible</li>
                                <li>
                                    <ul>
                                        <li>
                                            {if $empleado.haberes.no_imponible.bono_movilizacion}
                                            <ul>
                                                <li>Bono de Movilización</li>
                                                <li>$ <span>{$empleado.haberes.no_imponible.bono_movilizacion|number_format:0:',':'.'}</span></li>
                                            </ul>
                                            {$total_no_imponible=$total_no_imponible+$empleado.haberes.no_imponible.bono_movilizacion|round}
                                            {/if}
                                            {if $empleado.haberes.no_imponible.bono_colacion}
                                            <ul>
                                                <li>Bono de Colación</li>
                                                <li>$ <span>{$empleado.haberes.no_imponible.bono_colacion|number_format:0:',':'.'}</span></li>
                                            </ul>
                                            {$total_no_imponible=$total_no_imponible+$empleado.haberes.no_imponible.bono_colacion|round}
                                            {/if}
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li>Total Remuneración No Imponible</li>
                                        <li>$ <span>{$total_no_imponible|number_format:0:',':'.'}</span></li>
                                    </ul>
                                </li>
                            </ul>
                            {/if}
                        </li>
                        {$total_haberes=$total_imponible+$total_no_imponible}
                        <li>
                            <ul>
                                <li>Total Haberes</li>
                                <li>$ <span>{$total_haberes|number_format:0:',':'.'}</span></li>
                            </ul>
                        </li>
                    </ul>

                    <ul>
                        {assign var='total_descuentos' value=0}
                        <li>Descuentos</li>
                        <li>
                            {assign var='total_descuentos_legales' value=0}
                            <ul>
                                <li>Descuentos Legales</li>
                                <li>
                                    <ul>
                                        {if $empleado.descuentos.legales.prevision.descuento}
                                        <li>
                                            <ul>
                                                <li><span>{($empleado.descuentos.legales.prevision.descuento*100)|number_format:2:',':'.'}</span>% <span> {$empleado.descuentos.legales.prevision.nombre|htmlspecialchars}</span></li>
                                                <li>$ <span>{($empleado.descuentos.legales.prevision.descuento*$total_imponible)|number_format:0:',':'.'}</span></li>
                                            </ul>
                                        </li>
                                        {/if}
                                        {$total_descuentos_legales=$total_descuentos_legales+($empleado.descuentos.legales.prevision.descuento*$total_imponible)|round}
                                        <li>
                                            <ul>
                                                <li><span>{($empleado.descuentos.legales.sistema_salud.descuento*100)|number_format:2:',':'.'}</span>% Salud {$empleado.descuentos.legales.sistema_salud.nombre|htmlspecialchars}</li>
                                                <li>$ <span>{($empleado.descuentos.legales.sistema_salud.descuento*$total_imponible)|number_format:0:',':'.'}</span></li>
                                            </ul>
                                        </li>
                                        {$total_descuentos_legales=$total_descuentos_legales+($empleado.descuentos.legales.sistema_salud.descuento*$total_imponible)|round}
                                        {if $empleado.descuentos.legales.sistema_salud.pacto}
                                        <li>
                                            <ul>
                                                <li>Diferencia Pactada</li>
                                                <li>$ <span>{($empleado.descuentos.legales.sistema_salud.pacto-$empleado.descuentos.legales.sistema_salud.descuento*$total_imponible)|number_format:0:',':'.'}</span></li>
                                            </ul>
                                        </li>
                                        {$total_descuentos_legales=$total_descuentos_legales+($empleado.descuentos.legales.sistema_salud.pacto-$empleado.descuentos.legales.sistema_salud.descuento*$total_imponible)|round}
                                        {/if}
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li>Total Descuentos Legales</li>
                                        <li>$ <span>{$total_descuentos_legales|number_format:0:',':'.'}</span></li>
                                    </ul>
                                </li>
                            </ul>
                            {assign var='total_otros_descuentos' value=0}
                            {if $empleado.descuentos.otros.anticipo}
                            <ul>
                                <li>Otros Descuentos</li>
                                <li>
                                    <ul>
                                        <li>
                                            <ul>
                                                <li>Anticipo</li>
                                                <li>$ <span>{$empleado.descuentos.otros.anticipo|number_format:0:',':'.'}</span></li>
                                            </ul>
                                            {$total_otros_descuentos=$total_otros_descuentos+$empleado.descuentos.otros.anticipo|round}
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li>Total Otros Descuentos</li>
                                        <li>$ <span>{$total_otros_descuentos|number_format:0:',':'.'}</span></li>
                                    </ul>
                                </li>
                            </ul>
                            {/if}
                        </li>
                        {$total_descuentos=$total_descuentos_legales+$total_otros_descuentos}
                        <li>
                            <ul>
                                <li>Total Descuentos</li>
                                <li>$ <span>{$total_descuentos|number_format:0:',':'.'}</span></li>
                            </ul>
                        </li>
                    </ul>


                    <ul>
                        <li>Saldo Líquido a Percibir</li>
                        <li>$ <span>{($total_haberes-$total_descuentos)|number_format:0:',':'.'}</span></li>
                    </ul>

                    </li>
            </ul>
            <button type="button" onclick="window.print();">Imprimir</button>
        </div>
        <div class="print">
            <p>Son: <span>{($total_haberes-$total_descuentos)|to_words:'es'}</span> pesos.</p>
            <p>Certifico recibir conforme de parte de la Empresa &quot;Realizaciones, Escenografías y Eventos Limitada&quot; el saldo líquido de la presente liquidación, no teniendo reclamo alguno que formular.</p>
            <div><span>Firma Trabajador</span></div>
        </div>
    </section>
    {include file='includes/body_footer.tpl'}
    </body>
</html>