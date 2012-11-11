<?php /* Smarty version Smarty-3.0.9, created on 2012-11-11 02:28:54
         compiled from "application/views/informes/nomina_anticipos/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3516509eff56ba1960-22099356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24345aa812beeb1c67aa7b281ef6207b5368135b' => 
    array (
      0 => 'application/views/informes/nomina_anticipos/index.tpl',
      1 => 1342047066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3516509eff56ba1960-22099356',
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
			<h1>Nómina de Anticipos</h1>
			<form method="post" class="filter">
				<input type="month" name="mes" value="2012-05">
			</form>
			<table>
				<thead>
					<tr>
						<th>RUT</th>
						<th>Apellidos</th>
						<th>Nombres</th>
						<th>Monto</th>
						<th class="print">Firma</th>
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
						<td class="number"><span>$</span><?php echo number_format($_smarty_tpl->tpl_vars['entry']->value['monto_anticipo'],0,',','.');?>
</td>
                                                <td class="print"> </td>
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