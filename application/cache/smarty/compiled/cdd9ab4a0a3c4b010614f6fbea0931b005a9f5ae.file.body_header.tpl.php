<?php /* Smarty version Smarty-3.0.9, created on 2015-03-06 22:01:43
         compiled from "application/views/includes/body_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:730854fa15b7a96748-99816814%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdd9ab4a0a3c4b010614f6fbea0931b005a9f5ae' => 
    array (
      0 => 'application/views/includes/body_header.tpl',
      1 => 1425671652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '730854fa15b7a96748-99816814',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
        <header>
            <?php if (isset($_smarty_tpl->getVariable('usuario',null,true,false)->value)){?>
            <p>Conectado como: <em><?php echo $_smarty_tpl->getVariable('usuario')->value['nombre'];?>
</em>
                <a href="<?php echo base_url('');?>
bienvenido/logout.html">[Cerrar sesión]</a>
                <a rel="external" href="<?php echo base_url('');?>
docs/manual.pdf" onclick="window.open('<?php echo base_url('');?>
docs/manual.pdf'); return false;">[Ayuda]</a>
            </p>
            <?php }?>
            <h1><img src="<?php echo base_url('');?>
design/logo.png" alt="CAS Stage Ltda."></h1>
            <?php if (isset($_smarty_tpl->getVariable('usuario',null,true,false)->value)){?>
            <?php $_smarty_tpl->tpl_vars['location'] = new Smarty_variable(current_url(''), null, null);?>
            <?php if (preg_match('/menu\.html/',$_smarty_tpl->getVariable('location')->value)){?>
            <?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('', null, null);?>
            <?php }?>
            <nav id="breadcrumb">
                Usted está en:
                <ul>
                    <li>
                        <a href="<?php echo base_url('');?>
">Sistema CAS Stage</a>
                        <?php ob_start();?><?php echo preg_match('/menu\.html/',$_smarty_tpl->getVariable('location')->value);?>
<?php $_tmp1=ob_get_clean();?><?php if (base_url('')!=current_url('')&&!$_tmp1){?>
                        <ul>
                            <li>
                                
                                
                                <?php if (preg_match(('/').('(tipos_contrato)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                <?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('tipos_contrato', null, null);?>
                                <?php }?>
                                <?php if (preg_match(('/').('(registro_empleados)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                <?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('registro_empleados', null, null);?>
                                <?php }?>
                                <?php if (preg_match(('/').('(registro_mensual)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                <?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('registro_mensual', null, null);?>
                                <?php }?>
                                <?php if (preg_match(('/').('(parametros_externos)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                <?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('parametros_externos', null, null);?>
                                <?php }?>
                                <?php if (preg_match(('/').('(informes)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                <?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('informes', null, null);?>
                                <?php }?>
                                
                                <a href="<?php echo base_url('');?>
<?php echo $_smarty_tpl->getVariable('segment')->value;?>
.html">
                                
                                <?php if (preg_match('/tipos_contrato(\/|\.)/',$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('tipos_contrato', null, null);?>Tipos de Contrato<?php }?>
                                <?php if (preg_match('/registro_empleados(\/|\.)/',$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('registro_empleados', null, null);?>Registro de Empleados<?php }?>
                                <?php if (preg_match('/registro_mensual(\/|\.)/',$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('registro_mensual', null, null);?>Registro Mensual<?php }?>
                                <?php if (preg_match('/parametros_externos(\/|\.)/',$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('parametros_externos', null, null);?>Actualizar Parámetros Externos<?php }?>
                                <?php if (preg_match('/informes(\/|\.)/',$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('informes', null, null);?>Generación de Informes<?php }?>
                                </a>
                                <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('[a-z0-9_]*\/([0-9]*|\.html|\/[a-z0-9_]*\.html)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                <ul>
                                    <li>
                                        <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/actualizar(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('actualizar', null, null);?>Actualizar<?php }?>
                                        <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/actualizar_pacto_salud(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('actualizar_pacto_salud', null, null);?>Actualizar pacto de Salud<?php }?>
                                        <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/agregar(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('agregar', null, null);?>Agregar<?php }?>
                                        <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/baja(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('baja', null, null);?>Baja<?php }?>
                                        <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/modificar(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('modificar', null, null);?>Modificar<?php }?>
                                        <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/recontratar(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('recontratar', null, null);?>Recontratar<?php }?>

                                        <!--
                                        <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('[a-z0-9_]*\/[a-z0-9_]*\/[a-z0-9_]*([0-9]*|\.html|\/[a-z0-9_]*\.html)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                        <a href="<?php echo $_smarty_tpl->getVariable('location')->value;?>
">
                                        <?php }else{ ?>
                                        <a href="<?php echo $_smarty_tpl->getVariable('location')->value;?>
/../bienvenido.html">
                                        <?php }?>
                                        
                                        -->
                                        
                                        
                                        <?php $_smarty_tpl->tpl_vars['subsegment'] = new Smarty_variable($_smarty_tpl->getVariable('segment')->value, null, null);?>
                                        
                                        <?php if (preg_match(('/').('(ficha_empleado)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                        <?php $_smarty_tpl->tpl_vars['subsegment'] = new Smarty_variable(($_smarty_tpl->getVariable('segment')->value).('/ficha_empleado'), null, null);?>
                                        <?php }?>
                                        <?php if (preg_match(('/').('(listado_empleados)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                        <?php $_smarty_tpl->tpl_vars['subsegment'] = new Smarty_variable(($_smarty_tpl->getVariable('segment')->value).('/listado_empleados'), null, null);?>
                                        <?php }?>
                                        <?php if (preg_match(('/').('(liquidaciones_sueldo)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                        <?php $_smarty_tpl->tpl_vars['subsegment'] = new Smarty_variable(($_smarty_tpl->getVariable('segment')->value).('/liquidaciones_sueldo'), null, null);?>
                                        <?php }?>
                                        <?php if (preg_match(('/').('(nomina_anticipos)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                        <?php $_smarty_tpl->tpl_vars['subsegment'] = new Smarty_variable(($_smarty_tpl->getVariable('segment')->value).('/nomina_anticipos'), null, null);?>
                                        <?php }?>
                                        <?php if (preg_match(('/').('(horas_extras)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                        <?php $_smarty_tpl->tpl_vars['subsegment'] = new Smarty_variable(($_smarty_tpl->getVariable('segment')->value).('/horas_extras'), null, null);?>
                                        <?php }?>
                                        
                                        <?php if (preg_match(('/').('(prevision)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                        <?php $_smarty_tpl->tpl_vars['subsegment'] = new Smarty_variable(($_smarty_tpl->getVariable('segment')->value).('/prevision'), null, null);?>
                                        <?php }?>
                                        <?php if (preg_match(('/').('(sistemas_salud)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                        <?php $_smarty_tpl->tpl_vars['subsegment'] = new Smarty_variable(($_smarty_tpl->getVariable('segment')->value).('/sistemas_salud'), null, null);?>
                                        <?php }?>
                                        <?php if (preg_match(('/').('(sueldo_minimo)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                        <?php $_smarty_tpl->tpl_vars['subsegment'] = new Smarty_variable(($_smarty_tpl->getVariable('segment')->value).('/sueldo_minimo'), null, null);?>
                                        <?php }?>
                                        <?php if (preg_match(('/').('(valor_uf)/'),$_smarty_tpl->getVariable('location')->value)){?>
                                        <?php $_smarty_tpl->tpl_vars['subsegment'] = new Smarty_variable(($_smarty_tpl->getVariable('segment')->value).('/valor_uf'), null, null);?>
                                        <?php }?>
                                        
                                        <a href="<?php echo base_url('');?>
<?php echo $_smarty_tpl->getVariable('subsegment')->value;?>
.html">
                                            <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/ficha_empleado(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('ficha_empleado', null, null);?>Ficha de Empleado<?php }?>
                                            <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/listado_empleados(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('listado_empleados', null, null);?>Listado de Empleados<?php }?>
                                            <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/liquidaciones_sueldo(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('liquidaciones_sueldo', null, null);?>Liquidaciones de Sueldo<?php }?>
                                            <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/nomina_anticipos(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('nomina_anticipos', null, null);?>Nómina de Anticipos<?php }?>
                                            <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/horas_extras(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('informe_horas_extras', null, null);?>Informe de Horas Extras<?php }?>
                                            
                                            <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/prevision(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('prevision', null, null);?>Previsión<?php }?>
                                            <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/sistemas_salud(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('sistemas_salud', null, null);?>Sistemas de Salud<?php }?>
                                            <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/sueldo_minimo(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('sueldo_minimo', null, null);?>Sueldo Mínimo<?php }?>
                                            <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/valor_uf(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?><?php $_smarty_tpl->tpl_vars['segment'] = new Smarty_variable('valor_uf', null, null);?>Valor UF<?php }?>
                                        </a>
                                        <?php if (preg_match(('/').('(informes|parametros_externos)\/[a-z0-9_]+\/[a-z0-9_]+(\/[0-9\-]+)*\.html/'),$_smarty_tpl->getVariable('location')->value)){?>
                                        <ul>
                                            <li>

                                                <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/actualizar(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?>Actualizar<?php }?>
                                                <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/agregar(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?>Agregar<?php }?>
                                                <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/modificar(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?>Modificar<?php }?>
                                                <?php if (preg_match(('/').($_smarty_tpl->getVariable('segment')->value).('\/ver(\/|\.)/'),$_smarty_tpl->getVariable('location')->value)){?>Ver<?php }?>
                                            </li>
                                        </ul>
                                        <?php }?>
                                    </li>
                                 </ul>
                                <?php }?>
                            </li>
                        </ul>
                        <?php }?>
                    </li>
                </ul>
            </nav>
            <?php }?>
        </header>