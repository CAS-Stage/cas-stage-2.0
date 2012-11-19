<!DOCTYPE html>
<html>
    <head>
        {include file='includes/head.tpl'}
    </head>
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Sistemas de Salud</h1>
            <!-- <form method="post" class="filter">
                <input type="search" name="buscar" placeholder="Buscar">
            </form> -->
            <!-- <a href="sistemas_salud_agregar.html"><span>Agregar Nuevo Sistema de Salud</span></a> -->
            <table>
                <thead>
                    <tr>
                        <th>Nombre Sistema</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach item=entry from=$sistemas_salud}
                    <tr>
                        <td>{$entry.nombre|htmlspecialchars}</td>
                        <td>
                            <a href="{''|base_url}parametros_externos/sistemas_salud/modificar/{$entry.id}.html">[Modificar]</a>
                            <!-- <a href="#">[Borrar]</a> -->
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
            </table>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>