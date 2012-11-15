<?php /* Smarty version Smarty-3.0.9, created on 2012-11-15 21:34:14
         compiled from "application/views/registro_empleados/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2412250a551c6e65c42-16367357%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b1399e3ee50005057dd7f088b66813fb68f352a' => 
    array (
      0 => 'application/views/registro_empleados/index.tpl',
      1 => 1352995426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2412250a551c6e65c42-16367357',
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
            <form method="post" class="filter">
                <input type="search" name="buscar" placeholder="Buscar">
            </form>
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
                    <tr>
                        
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
                            <a href="<?php echo htmlspecialchars('');?>
registro_empleados/modificar/<?php echo $_smarty_tpl->tpl_vars['entry']->value['rut'];?>
.html">[Modificar]</a>
                            <a href="<?php echo htmlspecialchars('');?>
registro_empleados/recontratar/<?php echo $_smarty_tpl->tpl_vars['entry']->value['rut'];?>
.html">[Alta]</a>
                            <a href="<?php echo htmlspecialchars('');?>
registro_empleados/actualizar_pacto_salud/<?php echo $_smarty_tpl->tpl_vars['entry']->value['rut'];?>
.html">[Actualizar Pacto Salud]</a>
                        </td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
            <button type="button" onclick="window.print();">Imprimir</button>
        </section>
        <?php $_template = new Smarty_Internal_Template('includes/body_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</body>
</html>