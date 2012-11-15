<?php /* Smarty version Smarty-3.0.9, created on 2012-11-15 16:31:17
         compiled from "application/views/parametros_externos/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10291509eefa54e43e3-05646833%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1717e54a303efcd06a67d443ba30a442bbf639e8' => 
    array (
      0 => 'application/views/parametros_externos/index.tpl',
      1 => 1352590191,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10291509eefa54e43e3-05646833',
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
            <h1>Parámetros Externos</h1>
            <nav>
                <ul>
                    <li><a href="<?php echo base_url('');?>
parametros_externos/prevision.html">Previsión</a></li>
                    <li><a href="<?php echo base_url('');?>
parametros_externos/sistemas_salud.html">Sistemas de Salud</a></li>
                    <li><a href="<?php echo base_url('');?>
parametros_externos/sueldo_minimo.html">Sueldo Mínimo</a></li>
                    <li><a href="<?php echo base_url('');?>
parametros_externos/valor_uf.html">Valor UF</a></li>
                </ul>
            </nav>
        </section>
        <?php $_template = new Smarty_Internal_Template('includes/body_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </body>
</html>