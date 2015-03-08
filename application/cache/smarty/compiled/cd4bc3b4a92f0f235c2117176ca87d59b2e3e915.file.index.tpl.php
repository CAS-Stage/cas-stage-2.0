<?php /* Smarty version Smarty-3.0.9, created on 2015-03-08 02:45:46
         compiled from "application/views/informes/liquidaciones_sueldo/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1363654fba9ca62e0b1-56446451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd4bc3b4a92f0f235c2117176ca87d59b2e3e915' => 
    array (
      0 => 'application/views/informes/liquidaciones_sueldo/index.tpl',
      1 => 1425671652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1363654fba9ca62e0b1-56446451',
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
            <h1>Liquidaciones de Sueldo</h1>
            <form method="post" class="filter" action="<?php echo base_url('');?>
informes/liquidaciones_sueldo.html">
                <input type="month" name="mes" value="<?php echo $_smarty_tpl->getVariable('mes')->value;?>
" onchange="this.parentNode.submit();">
            </form>
            <table>
                <thead>
                    <tr>
                        <th>RUT</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>Fecha Contrato</th>
                        <th>Cargo</th>
                        <th>Acción</th>
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
                        <td><?php echo strftime('%d %b %Y',$_smarty_tpl->tpl_vars['entry']->value['fecha_contrato']);?>
</td>
                        <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['entry']->value['cargo']);?>
</td>
                        <td>
                            <a href="<?php echo base_url('');?>
informes/liquidaciones_sueldo/ver/<?php echo $_smarty_tpl->tpl_vars['entry']->value['rut'];?>
/<?php echo $_smarty_tpl->getVariable('mes')->value;?>
.html">[Ver Liquidación]</a>
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