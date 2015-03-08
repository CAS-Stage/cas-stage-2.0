<?php /* Smarty version Smarty-3.0.9, created on 2015-03-06 22:06:28
         compiled from "application/views/informes/listado_empleados/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2145954fa16d4d2bcb5-41170076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48a37054d1496638de86373f37a94d08e9ff6b92' => 
    array (
      0 => 'application/views/informes/listado_empleados/index.tpl',
      1 => 1425671652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2145954fa16d4d2bcb5-41170076',
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
            <h1>Listado de Empleados</h1>
            <h2 class="print">Realizaciones, Escenografías y Eventos Limitada</h2>
            <h3 class="print">RUT: 76.178.122-7 (CAS Stage Ltda.)</h3>
            <table class="small">
                <thead>
                    <tr>
                        <th>RUT</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>Dirección</th>
                        <th>Comuna</th>
                        <th>Fono</th>
                        <th>Inicio Contrato</th>
                        <th>Fin Contrato</th>
                        <th>Renta Bruta</th>
                        <th>Previsión</th>
                        <th>Sist. Salud</th>
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
                        <td><?php echo htmlspecialchars(ucwords($_smarty_tpl->tpl_vars['entry']->value['direccion']));?>
</td>
                        <td><?php echo htmlspecialchars(ucwords($_smarty_tpl->tpl_vars['entry']->value['comuna']));?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['entry']->value['fono'];?>
</td>
                        <td><?php echo strftime('%d %b %Y',$_smarty_tpl->tpl_vars['entry']->value['inicio_contrato']);?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['entry']->value['fin_contrato']){?><?php echo strftime('%d %b %Y',$_smarty_tpl->tpl_vars['entry']->value['fin_contrato']);?>
<?php }else{ ?>Indefinido<?php }?></td>
                        <td class="number"><span>$</span> <?php echo number_format($_smarty_tpl->tpl_vars['entry']->value['renta_bruta'],0,',','.');?>
</td>
                        <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['entry']->value['prevision']);?>
</td>
                        <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['entry']->value['sistema_salud']['nombre']);?>
<?php if ($_smarty_tpl->tpl_vars['entry']->value['sistema_salud']['pacto']){?> (<?php echo number_format($_smarty_tpl->tpl_vars['entry']->value['sistema_salud']['pacto'],3,',','.');?>
 UF)<?php }?></td>
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