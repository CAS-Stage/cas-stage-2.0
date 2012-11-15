<?php /* Smarty version Smarty-3.0.9, created on 2012-11-15 16:37:10
         compiled from "application/views/informes/liquidaciones_sueldo/ver.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112450a50c2621a8d6-06909300%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '090f68ae3dba1b2a47e42205e4559c765a27b072' => 
    array (
      0 => 'application/views/informes/liquidaciones_sueldo/ver.tpl',
      1 => 1352590191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112450a50c2621a8d6-06909300',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
    <?php $_template = new Smarty_Internal_Template('includes/head.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    <body>
    <?php $_template = new Smarty_Internal_Template('includes/body_header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    <section>
        <h1>Liquidación de Sueldo Mensual: <?php echo htmlspecialchars(ucwords($_smarty_tpl->getVariable('empleado')->value['nombres']));?>
 <?php echo htmlspecialchars(ucwords($_smarty_tpl->getVariable('empleado')->value['apellidos']));?>
, <?php echo strftime('%B %Y',$_smarty_tpl->getVariable('empleado')->value['periodo']);?>
</h1>
        <div>
            <ul>
                <li>Nombre: <span><?php echo htmlspecialchars(ucwords($_smarty_tpl->getVariable('empleado')->value['nombres']));?>
 <?php echo htmlspecialchars(ucwords($_smarty_tpl->getVariable('empleado')->value['apellidos']));?>
</span></li>
                <li>RUT: <span><?php echo number_format($_smarty_tpl->getVariable('empleado')->value['rut'],0,',','.');?>
-<?php echo modulo11($_smarty_tpl->getVariable('empleado')->value['rut']);?>
</span></li>
                <li>
                    <ul>
                        <?php $_smarty_tpl->tpl_vars['total_haberes'] = new Smarty_variable(0, null, null);?>
                        <li>Haberes</li>
                        <li>
                            <?php $_smarty_tpl->tpl_vars['total_imponible'] = new Smarty_variable(0, null, null);?>
                            <ul>
                                <li>Imponible</li>
                                <li>
                                    <ul>
                                        <li>
                                            <ul>
                                                <li>Sueldo base 30 días mes <span>junio</span> año <span>2012</span></li>
                                                <li>$ <span><?php echo number_format($_smarty_tpl->getVariable('empleado')->value['haberes']['imponible']['sueldo_base'],0,',','.');?>
</span></li>
                                            </ul>
                                            <?php $_smarty_tpl->tpl_vars['total_imponible'] = new Smarty_variable($_smarty_tpl->getVariable('total_imponible')->value+round($_smarty_tpl->getVariable('empleado')->value['haberes']['imponible']['sueldo_base']), null, null);?>
                                        </li>
                                        <?php if ($_smarty_tpl->getVariable('empleado')->value['haberes']['imponible']['gratificacion']){?>
                                        <li>
                                            <ul>
                                                <li>Gratificación Legal Garantizada</li>
                                                <li>$ <span><?php echo number_format($_smarty_tpl->getVariable('empleado')->value['haberes']['imponible']['gratificacion'],0,',','.');?>
</span></li>
                                            </ul>
                                            <?php $_smarty_tpl->tpl_vars['total_imponible'] = new Smarty_variable($_smarty_tpl->getVariable('total_imponible')->value+round($_smarty_tpl->getVariable('empleado')->value['haberes']['imponible']['gratificacion']), null, null);?>
                                        </li>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->getVariable('empleado')->value['haberes']['imponible']['horas_extras']){?>
                                        <li>
                                            <ul>
                                                <li><span><?php echo number_format($_smarty_tpl->getVariable('empleado')->value['haberes']['imponible']['horas_extras']['cantidad'],2,',','.');?>
</span> horas extras</li>
                                                <li>$ <span><?php echo number_format($_smarty_tpl->getVariable('empleado')->value['haberes']['imponible']['horas_extras']['valor_monetario'],0,',','.');?>
</span></li>
                                            </ul>
                                        <?php $_smarty_tpl->tpl_vars['total_imponible'] = new Smarty_variable($_smarty_tpl->getVariable('total_imponible')->value+round($_smarty_tpl->getVariable('empleado')->value['haberes']['imponible']['horas_extras']['valor_monetario']), null, null);?>
                                        </li>
                                        <?php }?>
                                        <?php if ($_smarty_tpl->getVariable('empleado')->value['haberes']['imponible']['bono_produccion']){?>
                                        <li>
                                            <ul>
                                                <li>Bono de Producción</li>
                                                <li>$ <span><?php echo number_format($_smarty_tpl->getVariable('empleado')->value['haberes']['imponible']['bono_produccion'],0,',','.');?>
</span></li>
                                            </ul>
                                            <?php $_smarty_tpl->tpl_vars['total_imponible'] = new Smarty_variable($_smarty_tpl->getVariable('total_imponible')->value+round($_smarty_tpl->getVariable('empleado')->value['haberes']['imponible']['bono_produccion']), null, null);?>
                                        </li>
                                        <?php }?>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li>Total Remuneración Imponible</li>
                                        <li>$ <span><?php echo number_format($_smarty_tpl->getVariable('total_imponible')->value,0,',','.');?>
</span></li>
                                    </ul>
                                </li>
                            </ul>
                            <?php $_smarty_tpl->tpl_vars['total_no_imponible'] = new Smarty_variable(0, null, null);?>
                            <?php if ($_smarty_tpl->getVariable('empleado')->value['haberes']['no_imponible']['bono_colacion']||$_smarty_tpl->getVariable('empleado')->value['haberes']['no_imponible']['bono_movilizacion']){?>
                            <ul>
                                <li>No Imponible</li>
                                <li>
                                    <ul>
                                        <li>
                                            <?php if ($_smarty_tpl->getVariable('empleado')->value['haberes']['no_imponible']['bono_movilizacion']){?>
                                            <ul>
                                                <li>Bono de Movilización</li>
                                                <li>$ <span><?php echo number_format($_smarty_tpl->getVariable('empleado')->value['haberes']['no_imponible']['bono_movilizacion'],0,',','.');?>
</span></li>
                                            </ul>
                                            <?php $_smarty_tpl->tpl_vars['total_no_imponible'] = new Smarty_variable($_smarty_tpl->getVariable('total_no_imponible')->value+round($_smarty_tpl->getVariable('empleado')->value['haberes']['no_imponible']['bono_movilizacion']), null, null);?>
                                            <?php }?>
                                            <?php if ($_smarty_tpl->getVariable('empleado')->value['haberes']['no_imponible']['bono_colacion']){?>
                                            <ul>
                                                <li>Bono de Colación</li>
                                                <li>$ <span><?php echo number_format($_smarty_tpl->getVariable('empleado')->value['haberes']['no_imponible']['bono_colacion'],0,',','.');?>
</span></li>
                                            </ul>
                                            <?php $_smarty_tpl->tpl_vars['total_no_imponible'] = new Smarty_variable($_smarty_tpl->getVariable('total_no_imponible')->value+round($_smarty_tpl->getVariable('empleado')->value['haberes']['no_imponible']['bono_colacion']), null, null);?>
                                            <?php }?>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li>Total Remuneración No Imponible</li>
                                        <li>$ <span><?php echo number_format($_smarty_tpl->getVariable('total_no_imponible')->value,0,',','.');?>
</span></li>
                                    </ul>
                                </li>
                            </ul>
                            <?php }?>
                        </li>
                        <?php $_smarty_tpl->tpl_vars['total_haberes'] = new Smarty_variable($_smarty_tpl->getVariable('total_imponible')->value+$_smarty_tpl->getVariable('total_no_imponible')->value, null, null);?>
                        <li>
                            <ul>
                                <li>Total Haberes</li>
                                <li>$ <span><?php echo number_format($_smarty_tpl->getVariable('total_haberes')->value,0,',','.');?>
</span></li>
                            </ul>
                        </li>
                    </ul>

                    <ul>
                        <?php $_smarty_tpl->tpl_vars['total_descuentos'] = new Smarty_variable(0, null, null);?>
                        <li>Descuentos</li>
                        <li>
                            <?php $_smarty_tpl->tpl_vars['total_descuentos_legales'] = new Smarty_variable(0, null, null);?>
                            <ul>
                                <li>Descuentos Legales</li>
                                <li>
                                    <ul>
                                        <?php if ($_smarty_tpl->getVariable('empleado')->value['descuentos']['legales']['prevision']['descuento']){?>
                                        <li>
                                            <ul>
                                                <li><span><?php echo number_format(($_smarty_tpl->getVariable('empleado')->value['descuentos']['legales']['prevision']['descuento']*100),2,',','.');?>
</span>% <span> <?php echo htmlspecialchars($_smarty_tpl->getVariable('empleado')->value['descuentos']['legales']['prevision']['nombre']);?>
</span></li>
                                                <li>$ <span><?php echo number_format(($_smarty_tpl->getVariable('empleado')->value['descuentos']['legales']['prevision']['descuento']*$_smarty_tpl->getVariable('total_imponible')->value),0,',','.');?>
</span></li>
                                            </ul>
                                        </li>
                                        <?php }?>
                                        <?php $_smarty_tpl->tpl_vars['total_descuentos_legales'] = new Smarty_variable($_smarty_tpl->getVariable('total_descuentos_legales')->value+round(($_smarty_tpl->getVariable('empleado')->value['descuentos']['legales']['prevision']['descuento']*$_smarty_tpl->getVariable('total_imponible')->value)), null, null);?>
                                        <li>
                                            <ul>
                                                <li><span><?php echo number_format(($_smarty_tpl->getVariable('empleado')->value['descuentos']['legales']['sistema_salud']['descuento']*100),2,',','.');?>
</span>% Salud <?php echo htmlspecialchars($_smarty_tpl->getVariable('empleado')->value['descuentos']['legales']['sistema_salud']['nombre']);?>
</li>
                                                <li>$ <span><?php echo number_format(($_smarty_tpl->getVariable('empleado')->value['descuentos']['legales']['sistema_salud']['descuento']*$_smarty_tpl->getVariable('total_imponible')->value),0,',','.');?>
</span></li>
                                            </ul>
                                        </li>
                                        <?php $_smarty_tpl->tpl_vars['total_descuentos_legales'] = new Smarty_variable($_smarty_tpl->getVariable('total_descuentos_legales')->value+round(($_smarty_tpl->getVariable('empleado')->value['descuentos']['legales']['sistema_salud']['descuento']*$_smarty_tpl->getVariable('total_imponible')->value)), null, null);?>
                                        <?php if ($_smarty_tpl->getVariable('empleado')->value['descuentos']['legales']['sistema_salud']['pacto']){?>
                                        <li>
                                            <ul>
                                                <li>Diferencia Pactada</li>
                                                <li>$ <span><?php echo number_format(($_smarty_tpl->getVariable('empleado')->value['descuentos']['legales']['sistema_salud']['pacto']-$_smarty_tpl->getVariable('empleado')->value['descuentos']['legales']['sistema_salud']['descuento']*$_smarty_tpl->getVariable('total_imponible')->value),0,',','.');?>
</span></li>
                                            </ul>
                                        </li>
                                        <?php $_smarty_tpl->tpl_vars['total_descuentos_legales'] = new Smarty_variable($_smarty_tpl->getVariable('total_descuentos_legales')->value+round(($_smarty_tpl->getVariable('empleado')->value['descuentos']['legales']['sistema_salud']['pacto']-$_smarty_tpl->getVariable('empleado')->value['descuentos']['legales']['sistema_salud']['descuento']*$_smarty_tpl->getVariable('total_imponible')->value)), null, null);?>
                                        <?php }?>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li>Total Descuentos Legales</li>
                                        <li>$ <span><?php echo number_format($_smarty_tpl->getVariable('total_descuentos_legales')->value,0,',','.');?>
</span></li>
                                    </ul>
                                </li>
                            </ul>
                            <?php $_smarty_tpl->tpl_vars['total_otros_descuentos'] = new Smarty_variable(0, null, null);?>
                            <?php if ($_smarty_tpl->getVariable('empleado')->value['descuentos']['otros']['anticipo']){?>
                            <ul>
                                <li>Otros Descuentos</li>
                                <li>
                                    <ul>
                                        <li>
                                            <ul>
                                                <li>Anticipo</li>
                                                <li>$ <span><?php echo number_format($_smarty_tpl->getVariable('empleado')->value['descuentos']['otros']['anticipo'],0,',','.');?>
</span></li>
                                            </ul>
                                            <?php $_smarty_tpl->tpl_vars['total_otros_descuentos'] = new Smarty_variable($_smarty_tpl->getVariable('total_otros_descuentos')->value+round($_smarty_tpl->getVariable('empleado')->value['descuentos']['otros']['anticipo']), null, null);?>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li>Total Otros Descuentos</li>
                                        <li>$ <span><?php echo number_format($_smarty_tpl->getVariable('total_otros_descuentos')->value,0,',','.');?>
</span></li>
                                    </ul>
                                </li>
                            </ul>
                            <?php }?>
                        </li>
                        <?php $_smarty_tpl->tpl_vars['total_descuentos'] = new Smarty_variable($_smarty_tpl->getVariable('total_descuentos_legales')->value+$_smarty_tpl->getVariable('total_otros_descuentos')->value, null, null);?>
                        <li>
                            <ul>
                                <li>Total Descuentos</li>
                                <li>$ <span><?php echo number_format($_smarty_tpl->getVariable('total_descuentos')->value,0,',','.');?>
</span></li>
                            </ul>
                        </li>
                    </ul>


                    <ul>
                        <li>Saldo Líquido a Percibir</li>
                        <li>$ <span><?php echo number_format(($_smarty_tpl->getVariable('total_haberes')->value-$_smarty_tpl->getVariable('total_descuentos')->value),0,',','.');?>
</span></li>
                    </ul>

                    </li>
            </ul>
            <button type="button" onclick="window.print();">Imprimir</button>
        </div>
        <div class="print">
            <p>Son: <span><?php echo to_words(($_smarty_tpl->getVariable('total_haberes')->value-$_smarty_tpl->getVariable('total_descuentos')->value),'es');?>
</span> pesos.</p>
            <p>Certifico recibir conforme de parte de la Empresa &quot;Realizaciones, Escenografías y Eventos Limitada&quot; el saldo líquido de la presente liquidación, no teniendo reclamo alguno que formular.</p>
            <div><span>Firma Trabajador</span></div>
        </div>
    </section>
    <?php $_template = new Smarty_Internal_Template('includes/body_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </body>
</html>