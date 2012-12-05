<?php /* Smarty version Smarty-3.0.9, created on 2012-12-05 20:27:59
         compiled from "application/views/informes/horas_extras/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151350bfa03fe5b794-59881066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2f002ab6535857e71bb28b280c78f76eda9b870' => 
    array (
      0 => 'application/views/informes/horas_extras/index.tpl',
      1 => 1354735678,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151350bfa03fe5b794-59881066',
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
			<h1>Informe de Horas Extras</h1>
			<form method="post" class="filter" action="<?php echo base_url('');?>
informes/horas_extras.html">
                            <input type="month" name="mes" value="<?php echo $_smarty_tpl->getVariable('mes')->value;?>
" onchange="this.parentNode.submit();">
                        </form>
			<table>
				<thead>
					<tr>
						<th>RUT</th>
						<th>Apellidos</th>
						<th>Nombres</th>
						<th>Horas Extras</th>
                                                <th>Horas Extras Festivos</th>
						<th>Valor Monetario</th>
					</tr>
				</thead>
				<tbody>
                                    <?php $_smarty_tpl->tpl_vars['suma_horas_extras'] = new Smarty_variable(0, null, null);?>
                                    <?php $_smarty_tpl->tpl_vars['suma_horas_extras_f'] = new Smarty_variable(0, null, null);?>
                                    <?php $_smarty_tpl->tpl_vars['suma_valor_horas_extras'] = new Smarty_variable(0, null, null);?>
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
                                            <td class="number"><?php echo number_format($_smarty_tpl->tpl_vars['entry']->value['cantidad_horas_extras'],2,',','.');?>
</td>
                                            <td class="number"><?php echo number_format($_smarty_tpl->tpl_vars['entry']->value['cantidad_horas_extras_f'],2,',','.');?>
</td>
                                            <td class="number"><span>$</span><?php echo number_format($_smarty_tpl->tpl_vars['entry']->value['valor_monetario'],0,',','.');?>
</td>
                                    </tr>
                                    <?php $_smarty_tpl->tpl_vars['suma_horas_extras'] = new Smarty_variable($_smarty_tpl->getVariable('suma_horas_extras')->value+$_smarty_tpl->tpl_vars['entry']->value['cantidad_horas_extras'], null, null);?>
                                    <?php $_smarty_tpl->tpl_vars['suma_horas_extras_f'] = new Smarty_variable($_smarty_tpl->getVariable('suma_horas_extras_f')->value+$_smarty_tpl->tpl_vars['entry']->value['cantidad_horas_extras_f'], null, null);?>
                                    <?php $_smarty_tpl->tpl_vars['suma_valor_horas_extras'] = new Smarty_variable($_smarty_tpl->getVariable('suma_valor_horas_extras')->value+$_smarty_tpl->tpl_vars['entry']->value['valor_monetario'], null, null);?>
                                    <?php }} ?>
				</tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total</th>
                                        <td class="number"><?php echo number_format($_smarty_tpl->getVariable('suma_horas_extras')->value,2,',','.');?>
</td>
                                        <td class="number"><?php echo number_format($_smarty_tpl->getVariable('suma_horas_extras_f')->value,2,',','.');?>
</td>
                                        <td class="number"><span>$</span><?php echo number_format($_smarty_tpl->getVariable('suma_valor_horas_extras')->value,0,',','.');?>
</td>
                                    </tr>
                                </tfoot>
			</table>
			<button type="button" onclick="window.print();">Imprimir</button>
		</section>
		<?php $_template = new Smarty_Internal_Template('includes/body_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </body>
</html>