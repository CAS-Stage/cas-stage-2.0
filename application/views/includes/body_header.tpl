        <header>
            <p>Conectado como: <em>Encargado Administrativo</em> <a href="index.html">[Cerrar sesión]</a></p>
            <h1>CAS Stage Ltda.</h1>
            <nav id="breadcrumb">
                Usted está en:
                <ul>
                    <li>
                        <a href="{''|base_url}">Sistema CAS Stage</a>
                        {if ''|base_url neq ''|current_url}
                        <ul>
                            <li>
                                {assign var=location value=''|current_url}
                                {assign var=segment value=''}
                                {if '/'|cat:$segment:'[a-z0-9_]*\/[a-z0-9_]*(\.html|\/[a-z0-9_]*\.html)/'|preg_match:$location}
                                <a href="{$location}/../bienvenido.html">
                                {else}
                                <a href="{$location}">
                                {/if}
                                {if '/tipos_contrato(\/|\.)/'|preg_match:$location}{assign var=segment value='tipos_contrato'}Tipos de Contrato{/if}
                                {if '/registro_empleados(\/|\.)/'|preg_match:$location}{assign var=segment value='registro_empleados'}Registro de Empleados{/if}
                                {if '/registro_mensual(\/|\.)/'|preg_match:$location}{assign var=segment value='registro_mensual'}Registro Mensual{/if}
                                {if '/parametros_externos(\/|\.)/'|preg_match:$location}{assign var=segment value='parametros_externos'}Actualizar Parámetros Externos{/if}
                                {if '/informes(\/|\.)/'|preg_match:$location}{assign var=segment value='informes'}Generación de Informes{/if}
                                </a>
                                {if '/'|cat:$segment:'[a-z0-9_]*\/[a-z0-9_]*([0-9]*|\.html|\/[a-z0-9_]*\.html)/'|preg_match:$location}
                                <ul>
                                    <li>
                                        {if '/'|cat:$segment:'\/actualizar(\/|\.)/'|preg_match:$location}Actualizar{/if}
                                        {if '/'|cat:$segment:'\/actualizar_pacto_salud(\/|\.)/'|preg_match:$location}Actualizar pacto de Salud{/if}
                                        {if '/'|cat:$segment:'\/agregar(\/|\.)/'|preg_match:$location}Agregar{/if}
                                        {if '/'|cat:$segment:'\/baja(\/|\.)/'|preg_match:$location}Baja{/if}
                                        {if '/'|cat:$segment:'\/modificar(\/|\.)/'|preg_match:$location}Modificar{/if}
                                        {if '/'|cat:$segment:'\/recontratar(\/|\.)/'|preg_match:$location}Recontratar{/if}
                                        
                                        {assign var=segment value=''}
                                        {if '/'|cat:$segment:'[a-z0-9_]*\/[a-z0-9_]*\/[a-z0-9_]*([0-9]*|\.html|\/[a-z0-9_]*\.html)/'|preg_match:$location}
                                        <a href="{$location}">
                                        {else}
                                        <a href="{$location}/../bienvenido.html">
                                        {/if}
                                            {if '/'|cat:$segment:'\/ficha_empleado(\/|\.)/'|preg_match:$location}Ficha de Empleado{/if}
                                            {if '/'|cat:$segment:'\/listado_empleados(\/|\.)/'|preg_match:$location}Listado de Empleados{/if}
                                            {if '/'|cat:$segment:'\/liquidaciones_sueldo(\/|\.)/'|preg_match:$location}Liquidaciones de Sueldo{/if}
                                            {if '/'|cat:$segment:'\/nomina_anticipos(\/|\.)/'|preg_match:$location}Nómina de Anticipos{/if}
                                            {if '/'|cat:$segment:'\/informe_horas_extras(\/|\.)/'|preg_match:$location}Informe de Horas Extras{/if}
                                            
                                            {if '/'|cat:$segment:'\/prevision(\/|\.)/'|preg_match:$location}Previsión{/if}
                                            {if '/'|cat:$segment:'\/sistemas_salud(\/|\.)/'|preg_match:$location}Sistemas de Salud{/if}
                                            {if '/'|cat:$segment:'\/sueldo_minimo(\/|\.)/'|preg_match:$location}Sueldo Mínimo{/if}
                                            {if '/'|cat:$segment:'\/valor_uf(\/|\.)/'|preg_match:$location}Valor UF{/if}
                                        </a>
                                        
                                        {if '/'|cat:$segment:'[a-z0-9_]*\/[a-z0-9_]*\/[a-z0-9_]*([0-9]*|\.html|\/[a-z0-9_]*\.html)/'|preg_match:$location}
                                            asdf
                                        {/if}
                                    </li>
                                 </ul>
                                {/if}
                            </li>
                        </ul>
                        {/if}
                    </li>
                </ul>
            </nav>
        </header>