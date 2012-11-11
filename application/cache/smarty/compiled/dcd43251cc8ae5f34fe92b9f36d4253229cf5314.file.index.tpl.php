<?php /* Smarty version Smarty-3.0.9, created on 2012-11-11 02:29:49
         compiled from "application/views/parametros_externos/valor_uf/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18856509eff8d22b9b5-39643175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcd43251cc8ae5f34fe92b9f36d4253229cf5314' => 
    array (
      0 => 'application/views/parametros_externos/valor_uf/index.tpl',
      1 => 1342199720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18856509eff8d22b9b5-39643175',
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
            <h1>Valor UF</h1>
            <a href="<?php echo base_url('');?>
parametros_externos/valor_uf/actualizar.html"><span>Actualizar Parámetro</span></a>
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
                        <td><?php echo strftime('%d %b %Y',$_smarty_tpl->tpl_vars['entry']->value['fecha_vigencia']);?>
</td>
                        <td class="number"><span>$</span> <?php echo number_format($_smarty_tpl->tpl_vars['entry']->value['valor'],2,',','.');?>
</td>
                        <td>
                            <a href="<?php echo base_url('');?>
parametros_externos/valor_uf/modificar/<?php echo $_smarty_tpl->tpl_vars['entry']->value['id'];?>
.html">[Modificar]</a>
                            <a href="<?php echo base_url('');?>
parametros_externos/valor_uf/borrar/<?php echo $_smarty_tpl->tpl_vars['entry']->value['id'];?>
.html" onclick="return confirm('¿Está seguro que desea eliminar la siguiente actualización del valor de UF?\n\nFecha: <?php echo strftime('%d %b %Y',$_smarty_tpl->tpl_vars['entry']->value['fecha_vigencia']);?>
\nValor: $<?php echo number_format($_smarty_tpl->tpl_vars['entry']->value['valor'],0,',','.');?>
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