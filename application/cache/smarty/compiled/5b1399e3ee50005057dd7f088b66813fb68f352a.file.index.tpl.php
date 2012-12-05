<?php /* Smarty version Smarty-3.0.9, created on 2012-12-05 21:58:55
         compiled from "application/views/registro_empleados/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:646150bfb58fee7797-21704553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b1399e3ee50005057dd7f088b66813fb68f352a' => 
    array (
      0 => 'application/views/registro_empleados/index.tpl',
      1 => 1354740984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '646150bfb58fee7797-21704553',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
    <head>
        <?php $_template = new Smarty_Internal_Template('includes/head.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </head>
    <body>
        <?php $_template = new Smarty_Internal_Template('includes/body_header.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
        <section>
            <h1>Registro de Empleados</h1>
            <!-- <form method="post" class="filter">
                <input type="search" name="buscar" placeholder="Buscar">
            </form> -->
            <a href="<?php echo base_url('');?>
registro_empleados/agregar.html"><span>Agregar Nuevo Empleado</span></a>
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
                    <?php  $_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('empleados')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['entry']->key => $_smarty_tpl->tpl_vars['entry']->value){
?>
                    <tr<?php ob_start();?><?php echo strftime('%Y-%m-%d',$_smarty_tpl->tpl_vars['entry']->value['fecha_termino_contrato']);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo strtotime($_tmp1);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo strtotime('now');?>
<?php $_tmp3=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['entry']->value['fecha_termino_contrato']&&$_tmp2<$_tmp3){?> class="baja"<?php }?>>                        
                        <td class="number"><?php echo number_format($_smarty_tpl->tpl_vars['entry']->value['rut'],0,',','.');?>
-<?php echo modulo11($_smarty_tpl->tpl_vars['entry']->value['rut']);?>
</td>
                        <td><?php echo htmlspecialchars(ucwords($_smarty_tpl->tpl_vars['entry']->value['apellidos']));?>
</td>
                        <td><?php echo htmlspecialchars(ucwords($_smarty_tpl->tpl_vars['entry']->value['nombres']));?>
</td>
                        <td><?php echo strftime('%d %b %Y',$_smarty_tpl->tpl_vars['entry']->value['fecha_inicio_contrato']);?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['entry']->value['fecha_termino_contrato']){?><?php echo strftime('%d %b %Y',$_smarty_tpl->tpl_vars['entry']->value['fecha_termino_contrato']);?>
<?php }else{ ?>Indefinido<?php }?></td>
                        <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['entry']->value['cargo_tipo_contrato']);?>
</td>
                        <td>
                            <a href="<?php echo base_url('');?>
registro_empleados/modificar/<?php echo $_smarty_tpl->tpl_vars['entry']->value['id_contrato'];?>
.html">[Modificar]</a>
                            <?php ob_start();?><?php echo strftime('%Y-%m-%d',$_smarty_tpl->tpl_vars['entry']->value['fecha_termino_contrato']);?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo strtotime($_tmp4);?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo strtotime('now');?>
<?php $_tmp6=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['entry']->value['fecha_termino_contrato']&&$_tmp5<$_tmp6){?>
                            <a href="<?php echo base_url('');?>
registro_empleados/recontratar/<?php echo $_smarty_tpl->tpl_vars['entry']->value['id_contrato'];?>
.html">[Alta]</a>
                            <?php }else{ ?>
                            <a href="<?php echo base_url('');?>
registro_empleados/baja/<?php echo $_smarty_tpl->tpl_vars['entry']->value['id_contrato'];?>
.html" onclick="return confirm('¿Está seguro que desea dar de baja al siguiente empleado?\n\nRUT: <?php echo number_format($_smarty_tpl->tpl_vars['entry']->value['rut'],0,',','.');?>
-<?php echo modulo11($_smarty_tpl->tpl_vars['entry']->value['rut']);?>
\nNombre: <?php echo $_smarty_tpl->tpl_vars['entry']->value['apellidos'];?>
, <?php echo $_smarty_tpl->tpl_vars['entry']->value['nombres'];?>
\nCargo: <?php echo $_smarty_tpl->tpl_vars['entry']->value['cargo_tipo_contrato'];?>
');">[Baja]</a>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['entry']->value['tiene_pacto_sistema_salud']){?>
                            <a href="<?php echo base_url('');?>
registro_empleados/actualizar_pacto_salud/<?php echo $_smarty_tpl->tpl_vars['entry']->value['id_contrato'];?>
.html">[Actualizar Pacto Salud]</a>
                            <?php }?>
                        </td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </section>
        <?php $_template = new Smarty_Internal_Template('includes/body_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</body>
</html>