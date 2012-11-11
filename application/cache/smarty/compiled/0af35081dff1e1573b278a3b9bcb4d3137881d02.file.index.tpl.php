<?php /* Smarty version Smarty-3.0.9, created on 2012-11-11 01:20:04
         compiled from "application/views/bienvenido/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27610509eef341b0363-63058217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0af35081dff1e1573b278a3b9bcb4d3137881d02' => 
    array (
      0 => 'application/views/bienvenido/index.tpl',
      1 => 1342033516,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27610509eef341b0363-63058217',
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
            <h1>Menú</h1>
            <nav>
                <ul>
                    <li><a href="tipos_contrato.html">Tipos de Contrato</a></li>
                    <li><a href="registro_empleados.html">Registro Empleados</a></li>
                    <li><a href="registro_mensual.html">Registro Mensual</a></li>
                    <li><a href="parametros_externos.html">Actualizar Parámetros Externos</a></li>
                    <li><a href="informes.html">Generar Informes</a></li>
                </ul>
            </nav>
        </section>
        <?php $_template = new Smarty_Internal_Template('includes/body_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </body>
</html>