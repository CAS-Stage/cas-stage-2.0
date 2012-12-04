<!DOCTYPE html>
<html>
    {include file='includes/head.tpl'}
    <body>
        {include file='includes/body_header.tpl'}
        <section>
            <h1>Login</h1>
            <form method="post" action="{''|base_url}">
                <fieldset>
                    <legend>Ingrese sus datos</legend>
                    <label>
                        <span>Usuario</span>
                        <input type="text" name="username">
                    </label>
                    <label>
                        <span>Contraseña</span>
                        <input type="password" name="password">
                    </label>
                    <div>
                        <p><strong>Error:</strong> Nombre de usuario y/o contraseña no válidos.</p>
                    </div>
                    <!-- <label>
                        <input type="checkbox" name="recordar">
                        <span>Recordar</span>
                    </label> -->
                <button type="submit">Entrar</button>
                </fieldset>
            </form>
        </section>
        {include file='includes/body_footer.tpl'}
    </body>
</html>