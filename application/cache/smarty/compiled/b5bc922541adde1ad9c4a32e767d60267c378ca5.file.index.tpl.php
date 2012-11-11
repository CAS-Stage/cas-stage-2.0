<?php /* Smarty version Smarty-3.0.9, created on 2012-11-11 02:04:40
         compiled from "application/views/parametros_externos/sueldo_minimo/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7313509ef9a80703d4-22271938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5bc922541adde1ad9c4a32e767d60267c378ca5' => 
    array (
      0 => 'application/views/parametros_externos/sueldo_minimo/index.tpl',
      1 => 1342199719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7313509ef9a80703d4-22271938',
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
            <h1>Sueldo Mínimo</h1>
            <a href="<?php echo base_url('');?>
parametros_externos/sueldo_minimo/actualizar.html"><span>Actualizar Parámetro</span></a>
            <table>
                <thead>
                    <tr>
                        <th>Fecha Vigencia</th>
                        <th>Valor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['entry'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('parametros_externos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['entry']->key => $_smarty_tpl->tpl_vars['entry']->value){
?>
                    <tr>
                        <td><?php ob_start();?><?php echo strftime('%B %Y',$_smarty_tpl->tpl_vars['entry']->value['fecha_vigencia']);?>
<?php $_tmp1=ob_get_clean();?><?php echo ucwords($_tmp1);?>
</td>
                        <td class="number"><span>$</span> <?php echo number_format($_smarty_tpl->tpl_vars['entry']->value['valor'],0,',','.');?>
</td>
                        <td>
                            <a href="<?php echo base_url('');?>
parametros_externos/sueldo_minimo/modificar/<?php echo $_smarty_tpl->tpl_vars['entry']->value['id'];?>
.html">[Modificar]</a>
                            <a href="<?php echo base_url('');?>
parametros_externos/sueldo_minimo/borrar/<?php echo $_smarty_tpl->tpl_vars['entry']->value['id'];?>
.html" onclick="return confirm('¿Está seguro que desea eliminar la siguiente actualización del valor del sueldo mínimo?\n\nFecha: <?php ob_start();?><?php echo strftime('%B %Y',$_smarty_tpl->tpl_vars['entry']->value['fecha_vigencia']);?>
<?php $_tmp2=ob_get_clean();?><?php echo ucwords($_tmp2);?>
\nValor: <?php echo number_format($_smarty_tpl->tpl_vars['entry']->value['valor'],0,',','.');?>
');">[Borrar]</a>
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