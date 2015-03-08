<?php /* Smarty version Smarty-3.0.9, created on 2015-03-06 22:06:24
         compiled from "application/views/informes/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1515954fa16d0ad5b89-57921517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6d638a793f5f51f0e4b6505f4c84e5e3d77de81' => 
    array (
      0 => 'application/views/informes/index.tpl',
      1 => 1425671652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1515954fa16d0ad5b89-57921517',
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
            <h1>Generación de Informes</h1>
            <nav>
                <ul>
                    <li><a href="<?php echo base_url('');?>
informes/ficha_empleado.html">Ficha de Empleado</a></li>
                    <li><a href="<?php echo base_url('');?>
informes/listado_empleados.html">Listado de Empleados</a></li>
                    <li><a href="<?php echo base_url('');?>
informes/liquidaciones_sueldo.html">Liquidaciones de Sueldo</a></li>
                    <li><a href="<?php echo base_url('');?>
informes/nomina_anticipos.html">Nómina de Anticipos</a></li>
                    <li><a href="<?php echo base_url('');?>
informes/horas_extras.html">Informe de Horas Extras</a></li>
                </ul>
            </nav>
        </section>
        <?php $_template = new Smarty_Internal_Template('includes/body_footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
    </body>
</html>